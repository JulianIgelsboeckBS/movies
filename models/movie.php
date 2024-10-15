<?php
require_once("DbConn.php");
class Movie extends DbConn
{   public $pdo;

    public $id;
    public $title;
    public $trailer;
    public $fsk;
    public $posterLink;
    public $originalTitle;
    public $rating;
    public $description;
    public $releaseYear;
    public $duration;
    public $offers_id;

    public function __construct($isAdmin = null)
    {
        $this->pdo = $this->connect();
        if ($isAdmin) {
            $this->pdo= $this->connectAdmin();
        }
    }

    // Get all movies
    public function fetchAllMovies()
    {
        $pdo = $this->connect();
        $sql = "SELECT o.id, o.title, o.trailer, o.fsk, o.posterLink, 
                       o.originalTitle, o.rating, o.description, 
                       m.releaseYear, m.duration
                FROM offers o 
                JOIN movie m ON o.id = m.offers_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllMovies()
    {
        $pdo = $this->connect();
        $sql = "SELECT o.id, o.title, o.description, o.rating,o.posterlink, m.releaseYear, p.name AS providers,p.id as providerId, g.name AS genre, g.id as genreId
        FROM offers o
        JOIN movie m ON o.id = m.offers_id
        JOIN offersHasGenres og ON o.id = og.offers_id
        JOIN genres g ON og.genres_id = g.id
        JOIN offersHasProviders op ON o.id = op.offers_id
        JOIN providers p ON op.provider_id = p.id
        GROUP BY o.title;";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch movie by ID from the database
    public function fetchMovieById($id)
    {
        $pdo = $this->pdo;
        $sql = "SELECT o.id, o.title, o.description, o.rating,o.posterlink, m.releaseYear, p.name AS providers,p.id as providerId, g.name AS genre, g.id as genreId
        FROM offers o
        JOIN movie m ON o.id = m.offers_id
        JOIN offersHasGenres og ON o.id = og.offers_id
        JOIN genres g ON og.genres_id = g.id
        JOIN offersHasProviders op ON o.id = op.offers_id
        JOIN providers p ON op.provider_id = p.id
        WHERE o.id = :id;";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

        /* if ($movie) {
            $this->id = $movie['id'];
            $this->title = $movie['title'];
            $this->trailer = $movie['trailer'];
            $this->fsk = $movie['fsk'];
            $this->posterLink = $movie['posterLink'];
            $this->originalTitle = $movie['originalTitle'];
            $this->rating = $movie['rating'];
            $this->description = $movie['description'];
            $this->releaseYear = $movie['releaseYear'];
            $this->duration = $movie['duration'];
            $this->offers_id = $movie['offers_id'];
        } */
    }

    // Create a new movie record in the database
    public function createMovie($data)
    {
        $pdo = $this->pdo;
        $sql = "INSERT INTO offers (title, trailer, posterLink, originalTitle, rating, description) 
                VALUES (:title, :trailer, :posterLink, :originalTitle, :rating, :description)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':trailer', $data['trailer']);

        $stmt->bindParam(':posterLink', $data['poster']);
        $stmt->bindParam(':originalTitle', $data['original_title']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':description', $data['plot']);

        if ($stmt->execute()) {
            $offer_id = $pdo->lastInsertId();

            $sqlMovie = "INSERT INTO movie (releaseYear, duration, offers_id) 
                         VALUES (:releaseYear, :duration, :offers_id)";
            $stmtMovie = $pdo->prepare($sqlMovie);
            $stmtMovie->bindParam(':releaseYear', $data['release_year']);
            $stmtMovie->bindParam(':duration', $data['duration']);
            $stmtMovie->bindParam(':offers_id', $offer_id);

             $stmtMovie->execute();

            $sqlMovie = "INSERT INTO offershasproviders (provider_id, offers_id) 
                         VALUES (:provider_id, :offers_id)";
            $stmtMovie = $pdo->prepare($sqlMovie);

            $stmtMovie->bindParam(':provider_id', $data['provider']);
            $stmtMovie->bindParam(':offers_id', $offer_id);

            $stmtMovie->execute();

            $sqlMovie = "INSERT INTO offershasgenres (genres_id, offers_id) 
                         VALUES (:genres_id, :offers_id)";
            $stmtMovie = $pdo->prepare($sqlMovie);

            $stmtMovie->bindParam(':genres_id', $data['genre']);
            $stmtMovie->bindParam(':offers_id', $offer_id);

            $stmtMovie->execute();

            return true;


        }

        return false;
    }

    // Update an existing movie record
    public function updateMovie($data)
    {
        $pdo = $this->pdo;
        $sql = "UPDATE offers o
                JOIN movie m ON o.id = m.offers_id
                SET o.title = :title, o.trailer = :trailer, o.fsk = :fsk, 
                    o.posterLink = :posterLink, o.originalTitle = :originalTitle, 
                    o.rating = :rating, o.description = :description, 
                    m.releaseYear = :releaseYear, m.duration = :duration
                WHERE o.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':trailer', $data['trailer']);
        $stmt->bindParam(':fsk', $data['fsk']);
        $stmt->bindParam(':posterLink', $data['posterLink']);
        $stmt->bindParam(':originalTitle', $data['originalTitle']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':releaseYear', $data['releaseYear']);
        $stmt->bindParam(':duration', $data['duration']);
        $stmt->bindParam(':id', $data['id']);

        return $stmt->execute();
    }
    public function deleteMovie($sid): bool
    {
        $pdo = $this->connectAdmin();

        try {
            // Start a transaction
            $pdo->beginTransaction();

            // Execute each delete statement separately
            $sql1 = "DELETE FROM offersHasGenres WHERE offers_id = :id";
            $sql2 = "DELETE FROM offersHasProviders WHERE offers_id = :id";
            $sql3 = "DELETE FROM actors WHERE movies_id = :id";
            $sql4 = "DELETE FROM directors WHERE movies_id = :id";
            $sql5 = "DELETE FROM hasDubs WHERE offers_id = :id";
            $sql6 = "DELETE FROM hasSubs WHERE offers_id = :id";
            $sql7 = "DELETE FROM movie WHERE offers_id = :id";
            $sql8 = "DELETE FROM watchlists WHERE offers_id = :id";
            $sql9 = "DELETE FROM seasons WHERE offers_id = :id";
            $sql10 = "DELETE FROM offers WHERE id = :id";

            $stmt = $pdo->prepare($sql1);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql2);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql3);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql4);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql5);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql6);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql7);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql8);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql9);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            $stmt = $pdo->prepare($sql10);
            $stmt->bindParam(':id', $sid, PDO::PARAM_INT);
            $stmt->execute();

            // Commit the transaction
            $pdo->commit();

            return true;

        } catch (PDOException $e) {
            // Rollback the transaction on error
            $pdo->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


// Delete a movie by ID


    
}



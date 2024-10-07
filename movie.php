<?php
require_once("DbConn.php");
class Movie extends DbConn
{
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

    public function __construct($id = null)
    {
        $this->id = $id;
        if ($id) {
            $this->fetchMovieById($id);
        }
    }

    // Fetch movie by ID from the database
    public function fetchMovieById($id)
    {
        $pdo = $this->connect();
        $sql = "SELECT o.id, o.title, o.trailer, o.fsk, o.posterLink, o.originalTitle, 
                       o.rating, o.description, m.releaseYear, m.duration, m.offers_id
                FROM offers o 
                JOIN movie m ON o.id = m.offers_id
                WHERE o.id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $movie = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($movie) {
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
        }
    }

    // Create a new movie record in the database
    public function createMovie($data)
    {
        $pdo = $this->connect();
        $sql = "INSERT INTO offers (title, trailer, fsk, posterLink, originalTitle, rating, description) 
                VALUES (:title, :trailer, :fsk, :posterLink, :originalTitle, :rating, :description)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':trailer', $data['trailer']);
        $stmt->bindParam(':fsk', $data['fsk']);
        $stmt->bindParam(':posterLink', $data['posterLink']);
        $stmt->bindParam(':originalTitle', $data['originalTitle']);
        $stmt->bindParam(':rating', $data['rating']);
        $stmt->bindParam(':description', $data['description']);

        if ($stmt->execute()) {
            $offer_id = $pdo->lastInsertId();

            $sqlMovie = "INSERT INTO movie (releaseYear, duration, offers_id) 
                         VALUES (:releaseYear, :duration, :offers_id)";
            $stmtMovie = $pdo->prepare($sqlMovie);
            $stmtMovie->bindParam(':releaseYear', $data['releaseYear']);
            $stmtMovie->bindParam(':duration', $data['duration']);
            $stmtMovie->bindParam(':offers_id', $offer_id);

            return $stmtMovie->execute();
        }

        return false;
    }

    // Update an existing movie record
    public function updateMovie($data)
    {
        $pdo = $this->connect();
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
public function deleteMovie($id){
    $pdo = $this->connect();
    $sqlDeleteProviders = "DELETE FROM offershasgenres WHERE offers_id = :id";
    $stmtDeleteProviders = $pdo->prepare($sqlDeleteProviders);
    $stmtDeleteProviders->execute([':id' => $id]);

    $sqlDeleteProviders = "DELETE FROM offersHasProviders WHERE offers_id = :id";
    $stmtDeleteProviders = $pdo->prepare($sqlDeleteProviders);
    $stmtDeleteProviders->execute([':id' => $id]);
}
    // Delete a movie by ID
    public  function  deleteMovies($sid):bool
    {
        $pdo = $this->connect();
        $sql = "DELETE FROM offershasgenres WHERE offers_id = :id;
DELETE FROM offersHasProviders WHERE offers_id = :id;
DELETE FROM actors WHERE movies_id = :id;
DELETE FROM directors WHERE movies_id = :id;
DELETE FROM hasdubs WHERE offers_id = :id;
DELETE FROM hassubs WHERE offers_id = :id;
DELETE FROM movie WHERE offers_id = :id;
DELETE FROM watchlists WHERE offers_id = :id;
DELETE FROM seasons WHERE offers_id = :id;
DELETE FROM offers WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $sid, PDO::PARAM_INT);

        return $stmt->execute();
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
        $sql = "SELECT o.id, o.title, o.description, o.rating,o.posterlink, m.releaseYear, GROUP_CONCAT(p.name SEPARATOR ', ') AS providers, g.name AS genre
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
}



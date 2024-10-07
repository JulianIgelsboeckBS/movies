<?php
require_once 'DbConn.php';

class MovieManager extends DbConn
{
    // Function to get the movie details by ID
    public function getMovieById($id)
    {
        $pdo = $this->connect();
        $sql = "SELECT o.id, o.title, o.description, o.rating, o.posterlink, m.releaseYear, GROUP_CONCAT(p.id SEPARATOR ',') AS provider_ids, g.id AS genre_id
                FROM offers o
                JOIN movie m ON o.id = m.offers_id
                JOIN offersHasGenres og ON o.id = og.offers_id
                JOIN genres g ON og.genres_id = g.id
                JOIN offersHasProviders op ON o.id = op.offers_id
                JOIN providers p ON op.provider_id = p.id
                WHERE o.id = :id
                GROUP BY o.title";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function to update movie details
    public function updateMovie($id, $title, $description, $rating, $releaseYear, $posterLink, $genre_id, $providers)
    {
        $pdo = $this->connect();
        try {
            $pdo->beginTransaction();

            // Update movie details in 'offers' table
            $sqlOffers = "UPDATE offers SET title = :title, description = :description, rating = :rating, posterLink = :posterLink WHERE id = :id";
            $stmtOffers = $pdo->prepare($sqlOffers);
            $stmtOffers->execute([
                ':title' => $title,
                ':description' => $description,
                ':rating' => $rating,
                ':posterLink' => $posterLink,
                ':id' => $id
            ]);

            // Update release year in 'movie' table
            $sqlMovie = "UPDATE movie SET releaseYear = :releaseYear WHERE offers_id = :id";
            $stmtMovie = $pdo->prepare($sqlMovie);
            $stmtMovie->execute([
                ':releaseYear' => $releaseYear,
                ':id' => $id
            ]);

            // Update genre in 'offersHasGenres' table
            $sqlGenre = "UPDATE offersHasGenres SET genres_id = :genre_id WHERE offers_id = :id";
            $stmtGenre = $pdo->prepare($sqlGenre);
            $stmtGenre->execute([
                ':genre_id' => $genre_id,
                ':id' => $id
            ]);

            // Update providers in 'offersHasProviders' table
            // First, delete existing providers for the movie
            $sqlDeleteProviders = "DELETE FROM offersHasProviders WHERE offers_id = :id";
            $stmtDeleteProviders = $pdo->prepare($sqlDeleteProviders);
            $stmtDeleteProviders->execute([':id' => $id]);

            // Insert new providers
            $sqlInsertProviders = "INSERT INTO offersHasProviders (offers_id, provider_id) VALUES (:id, :provider_id)";
            $stmtInsertProviders = $pdo->prepare($sqlInsertProviders);
            foreach ($providers as $provider_id) {
                $stmtInsertProviders->execute([':id' => $id, ':provider_id' => $provider_id]);
            }

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    // Function to get all genres
    public function getAllGenres()
    {
        $pdo = $this->connect();
        $sql = "SELECT * FROM genres";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to get all providers
    public function getAllProviders()
    {
        $pdo = $this->connect();
        $sql = "SELECT * FROM providers";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

$movieManager = new MovieManager();

if (isset($_POST['update'])) {
    // If form is submitted, update the movie
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $releaseYear = $_POST['releaseYear'];
    $posterLink = $_POST['posterLink'];
    $genre_id = $_POST['genre_id'];
    $providers = $_POST['providers'];

    $movieManager->updateMovie($id, $title, $description, $rating, $releaseYear, $posterLink, $genre_id, $providers);
    header("Location: cms_movies_list.php");  // Redirect after update
    exit;
} else {
    // If no form is submitted, fetch the movie details
    $id = $_GET['id'];
    $movie = $movieManager->getMovieById($id);
    $genres = $movieManager->getAllGenres();
    $providers = $movieManager->getAllProviders();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Update Movie</h2>
    <form method="post" action="updateMovie.php">
        <input type="hidden" name="id" value="<?= $movie['id'] ?>">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($movie['title']) ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($movie['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" class="form-control" id="rating" name="rating" value="<?= htmlspecialchars($movie['rating']) ?>" required>
        </div>

        <div class="form-group">
            <label for="releaseYear">Release Year</label>
            <input type="number" class="form-control" id="releaseYear" name="releaseYear" value="<?= htmlspecialchars($movie['releaseYear']) ?>" required>
        </div>

        <div class="form-group">
            <label for="posterLink">Poster Link</label>
            <input type="text" class="form-control" id="posterLink" name="posterLink" value="<?= htmlspecialchars($movie['posterlink']) ?>" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre_id" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['id'] ?>" <?= $movie['genre_id'] == $genre['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genre['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="providers">Providers</label>
            <select multiple class="form-control" id="providers" name="providers[]" required>
                <?php foreach ($providers as $provider): ?>
                    <option value="<?= $provider['id'] ?>" <?= in_array($provider['id'], explode(',', $movie['provider_ids'])) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($provider['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

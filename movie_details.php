<?php
// Connection to MySQL
$host = 'localhost';
$db = 'streamingPortal';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Get the movie ID from the URL
$movieId = $_GET['id'] ?? null;

if ($movieId) {
    // Fetch movie details by ID
    $query = "
         SELECT o.title, o.description, o.rating, m.releaseYear, GROUP_CONCAT(p.name SEPARATOR ', ') AS providers,
               g.name AS genre, m.duration, fpd.lastname as director, fpa.lastname as actor
        FROM offers o
        JOIN movie m ON o.id = m.offers_id
        JOIN offersHasGenres og ON o.id = og.offers_id
        JOIN genres g ON og.genres_id = g.id
        JOIN offersHasProviders op ON o.id = op.offers_id
        JOIN providers p ON op.provider_id = p.id
        join directors d on d.movies_id = m.id
        join filmindustryprofessional fpd on fpd.id = d.filmIndustryProfessional_id
        join actors a on a.movies_id = m.id
        join filmindustryprofessional fpa on fpa.id = a.filmIndustryProfessional_id
        WHERE o.id = :id
        GROUP BY o.title;";

    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $movieId]);

    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redirect or show error if no ID is provided
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review | <?= htmlspecialchars($movie['title']) ?></title>
    <?php include __DIR__ . '/head.php'; ?>
</head>

<body>
    <div id="site-content">
        <?php include __DIR__ . '/nav.php'; ?>

        <main class="main-content">
            <div class="container">
                <div class="page">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a>
                        <a href="review.html">Movie Review</a>
                        <span><?= htmlspecialchars($movie['title']) ?></span>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <figure class="movie-poster"><img src="../dummy/single-image.jpg" alt="#"></figure>
                            </div>
                            <div class="col-md-6">
                                <h2 class="movie-title"><?= htmlspecialchars($movie['title']) ?></h2>
                                <div class="movie-summary">
                                    <p><?= htmlspecialchars($movie['description']) ?></p>
                                </div>
                                <ul class="movie-meta">
                                    <li><strong>Rating:</strong>
                                        <div class="star-rating" title="Rated <?= htmlspecialchars($movie['rating']) ?> out of 5">
                                            <span style="width:<?= htmlspecialchars($movie['rating']) * 20 ?>%">
                                                <strong class="rating"><?= htmlspecialchars($movie['rating']) ?></strong> out of 5
                                            </span>
                                        </div>
                                    </li>
                                    <li><strong>Length:</strong> <?= htmlspecialchars($movie['duration']) ?> min</li>
                                    <li><strong>Premiere:</strong> <?= htmlspecialchars($movie['releaseYear']) ?></li>
                                    <li><strong>Category:</strong> <?= htmlspecialchars($movie['genre']) ?></li>
                                </ul>

                                <ul class="starring">
                                    <li><strong>Directors:</strong> <?= htmlspecialchars($movie['director']) ?></li>
                                    <li><strong>Stars:</strong> <?= htmlspecialchars($movie['actor']) ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="entry-content">
                            <!-- Additional description or content can go here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include __DIR__ . '/footer.php'; ?>
    </div>

    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/app.js"></script>

</body>

</html>

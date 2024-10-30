<?php
session_start();
error_reporting(0);
include('./models/DbConn.php');

if(strlen($_SESSION['alogin'])==0)
{
    // header('location:index.php');
}
else{
    $instance= new DbConn();
    $dbh = $instance->connect();
    $email = $_SESSION['alogin'];
    $sql = "SELECT * from users where email = (:email);";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $loginData=$query->fetch(PDO::FETCH_OBJ);
    $cnt=1;
    $status=$loginData->status;
}


// Get the movie ID from the URL
$movieId = $_GET['id'] ?? null;

if ($movieId) {

     function getMovieById($id)
    {
        $db = new DbConn;
        $pdo = $db->connect();
        $sql = "SELECT  o.title, o.description, o.rating, o.posterlink,m.duration, m.releaseYear, p.name AS provider, g.name AS genre
                FROM offers o
                JOIN movie m ON o.id = m.offers_id
                JOIN offersHasGenres og ON o.id = og.offers_id
                JOIN genres g ON og.genres_id = g.id
                JOIN offersHasProviders op ON o.id = op.offers_id
                JOIN providers p ON op.provider_id = p.id
                WHERE o.id = :id
                GROUP BY o.title";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    $movie = getMovieById($movieId);

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
    <meta name="description"
        content="Alle nötigen Informationen zu deinem Lieblingsfilm, findest du auf dieser Seite">
    <meta name="keywords" content="Filmdetails, Infos, Filme, Filmbewertung, Filmgenres">


    <title>Movie Review | <?= htmlspecialchars($movie['title']) ?></title>
    <?php include __DIR__ . '/head.php'; ?>
</head>

<body>
    <div id="site-content">
        <?php
        if($status == 1 || $status == 2)
        {
            if($status == 2){ include __DIR__ . '/navAdmin.php';}
            else{ include __DIR__ . '/navLogout.php';}
        }

        else
        {include __DIR__ . '/nav.php';}

        ?>

        <main class="main-content">
            <div class="container">
                <div class="page">
                    <div class="breadcrumbs">
                        <a href="index.php">Home</a>
                        <a href="review.php">Movie Review</a>
                        <span><?= htmlspecialchars($movie['title']) ?></span>
                    </div>
                    <h1>Details</h1>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <figure class="movie-poster"><img src="<?= htmlspecialchars($movie['posterlink']) ?>" alt="#"></figure>
                            </div>
                            <div class="col-md-6">
                                <h2 class="movie-title"><?= htmlspecialchars($movie['title']) ?></h2>
                                <div class="movie-summary">
                                    <p><?= htmlspecialchars($movie['description']) ?></p>
                                </div>
                                <ul class="movie-meta">
                                    <li><strong>Rating:</strong>
                                        <div class="star-rating" title="Rated <?= htmlspecialchars($movie['rating']) ?> out of 10">
                                            <span style="width:<?= htmlspecialchars($movie['rating']) * 20 ?>%">
                                                <strong class="rating"><?= htmlspecialchars($movie['rating']) ?></strong> out of 10
                                            </span>
                                        </div>
                                    </li>
                                    <li><strong>Length:</strong> <?= htmlspecialchars($movie['duration']) ?> min</li>
                                    <li><strong>Premiere:</strong> <?= htmlspecialchars($movie['releaseYear']) ?></li>
                                    <li><strong>Category:</strong> <?= htmlspecialchars($movie['genre']) ?></li>
                                </ul>

                                <!--<ul class="starring">
                                    <li><strong>Directors:</strong> <?php /*= htmlspecialchars($movie['director']) */?></li>
                                    <li><strong>Stars:</strong> <?php /*= htmlspecialchars($movie['actor']) */?></li>
                                </ul>-->
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

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>

</body>

</html>

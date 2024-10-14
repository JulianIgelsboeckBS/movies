<?php
session_start();
error_reporting(0);
include('./models/DbConn.php');

if (strlen($_SESSION['alogin']) == 0) {
    // header('location:index.php');
} else {
    $instance = new DbConn();
    $dbh = $instance->connect();
    $email = $_SESSION['alogin'];
    $sql = "SELECT * from users where email = (:email);";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $loginData = $query->fetch(PDO::FETCH_OBJ);
    $cnt = 1;
    $status = $loginData->status;
}
?>
<?php
$instance = new DbConn();
$dbh = $instance->connect();
$userId = $_SESSION['userId'];
$sql = "select o.* from 
offers o
join watchlists w on o.id = w.offers_id
join users u on u.id = w.user_id
where u.id = :userId;";
$query = $dbh->prepare($sql);
$query->bindParam(':userId', $userId, PDO::PARAM_STR);
$query->execute();
$offers = $query->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">


    <script src="js/disableFilter.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>


    <title>Movie Review </title>
    <?php require_once("./models/movie.php");
    $movie = new Movie();
    $results = $movie->getAllMovies();
    ?>

    <?php include __DIR__ . '/head.php'; ?>

</head>


<body>


<div id="site-content">
    <p class="watchlist"></p>
    <?php
    if ($status == 1 || $status == 2) {
        if ($status == 2) {
            include __DIR__ . '/navAdmin.php';
        } else {
            include __DIR__ . '/navLogout.php';
        }
    } else {
        include __DIR__ . '/nav.php';
    }

    ?>

    <main class="main-content">
        <div class="page">
            <div class="container">
                <div class="row">



                    <div class="row">
                        <?php if (isset($results)): ?>
                            <div class="search-results">

                                <?php if (empty($results)): ?>
                                    <p class="text-muted">No movies found.</p>
                                <?php else: ?>
                                    <div class="row">
                                        <?php foreach ($results as $result): ?>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="card mb-4 shadow-sm">
                                                    <img src="<?= $result['posterlink'] ?>"
                                                         class="card-img-top" alt="Movie 1">
                                                    <div class="card-body p-3">
                                                        <h3 class="card-title">
                                                            <a href="movie_details.php?id=<?= $result['id'] ?>">
                                                                <?= $result['title'] ?>
                                                            </a>
                                                        </h3>
                                                        <p class="card-text">
                                                            <strong>Description:</strong> <?= $result['description'] ?>
                                                            <br>
                                                            <strong>Genre:</strong> <?= $result['genre'] ?><br>
                                                            <strong>Release Year:</strong> <?= $result['releaseYear'] ?>
                                                            <br>
                                                            <strong>Rating:</strong> <?= $result['rating'] ?><br>
                                                            <strong>Providers:</strong> <?= $result['providers'] ?><br>
                                                            <?php if ($status == 1): ?>
                                                                <button class="btn btn-light" value="<?= $result['id'] ?>"><i
                                                                        class="fa fa-heart"></i> Add to watchlist
                                                                </button>

                                                            <?php endif; ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>


                    </div>
                </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</div>
<!-- Default snippet for navigation -->



</body>

</html>

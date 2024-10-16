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
$offers = $query->fetchAll(PDO::FETCH_ASSOC);
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


    <title>Watchlist</title>
    <?php require_once("./models/movie.php");
    $movies = new Movie();
    
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
                        <?php if (isset($offers)): ?>
                            <div class="search-results">

                                <?php if (empty($offers)): ?>
                                    <p class="text-muted">No movies in watchlist yet.</p>
                                <?php else: ?>
                                    <div class="row">
                                        <?php foreach ($offers as $offer): 
                                            $result = $movies->fetchMovieById($offer['id'])?>
                                            <div class="col-sm-6 col-md-3" id="<?= $result['id']?>">
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
                                                            
                                                            <strong>Genre:</strong> <?= $result['genre'] ?><br>
                                                            <strong>Release Year:</strong> <?= $result['releaseYear'] ?>
                                                            <br>
                                                            <strong>Rating:</strong> <?= $result['rating'] ?><br>
                                                            
                                                            <?php if ($status == 1): ?>
                                                                <?php if ($status == 1): ?>
                                                                <button class="watchlist-btn btn btn-warning btn-sm" data-movie-id="<?= $result['id'] ?>" value="<?= $result['id'] ?>">Remove</button>

                                                            <?php endif; ?>

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
<script>$(document).ready(function() {
    $('.watchlist-btn').click(function() {
        var movieId = $(this).data('movie-id');
        var action = $(this).text() === 'Add to Watchlist' ? 'add' : 'remove';

        $.ajax({
            url: 'watchlistAjax.php',
            type: 'POST',
            data: { movie_id: movieId, action: action },
            success: function(response) {
                if (response) {
                    if (action === 'add') {
                        $('div[id="'+movieId+'"]').hide();
                    } else {
                        $('div[id="'+movieId+'"]').hide();
                    }
                }
            }
        });
    });
});</script>


</body>

</html>

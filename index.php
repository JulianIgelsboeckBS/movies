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

// PHP program to pop an alert
// message box on the screen

// Function definition
function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}


// Function call
function_alert($_SESSION['userId']);

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

<div id="site-content">
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
                    <p id="watchlists"></p>
                    <?php include __DIR__ . '/searchFilterCollaps.php'; ?>
                    <?php include __DIR__ . '/slider.php'; ?>

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
                                                                <button class="watchlist-btn" data-movie-id="<?= $result['id'] ?>" value="<?= $result['id'] ?>"><i
                                                                            class="fa fa-heart"></i>Add to Watchlist</button>

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
<script src="js/owlCarousel.js"></script>
<link href="css/owlCarousel.css" rel="stylesheet" type="text/css" media="all">
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({

            autoPlay: 2000, //Set AutoPlay to 3 seconds
            autoPlay: true,
            navigation: false,

            items: 5,
            itemsDesktop: [640, 4],
            itemsDesktopSmall: [414, 3]

        });

    });
</script>

<script>
    // function watchlistInput() {
    //     var movieId = document.getElementById("watchlistButton").value;
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("GET", "get_watchlist.php?movie_id=" + movieId, true);
    //     xhr.onreadystatechange = function () {
    //         if (xhr.readyState === 4 && xhr.status === 200) {
    //             document.getElementById("watchlists").innerHTML = xhr.responseText;
    //         }
    //     };
    //     xhr.send();
    // };

    // function watchlist() {
    //     var movieId = document.getElementById("watchlistButton").value;
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("GET", "watchlistAjax.php", true);
    //     xhr.onreadystatechange = function () {
    //         if (xhr.readyState === 4 && xhr.status === 200) {
    //             document.getElementById("watchlists").innerHTML = xhr.responseText;
    //             document.getElementById("watchlistButton").innerHTML = "Remove"
    //         }
    //     };
    //     xhr.send();
    // };


    $(document).ready(function() {
    $('.watchlist-btn').click(function() {
        var movieId = $(this).data('movie-id');
        var action = $(this).text() === 'Add to Watchlist' ? 'add' : 'remove';

        $.ajax({
            url: 'watchlistAjax.php',
            type: 'POST',
            data: { movie_id: movieId, action: action },
            success: function(response) {
                if (response.success) {
                    if (action === 'add') {
                        $('button[data-movie-id="' + movieId + '"]').text('Remove from Watchlist');
                    } else {
                        $('button[data-movie-id="' + movieId + '"]').text('Add to Watchlist');
                    }
                }
            }
        });
    });
});
</script>

</body>

</html>

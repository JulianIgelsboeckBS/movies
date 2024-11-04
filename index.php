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
    <title>Filmbewertungen und Streaming-Anbieter finden - Wer streamt es? | Movie Review</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <meta name="description"
        content="Finde heraus, welcher Anbieter deine Lieblingsfilme streamt. Durchstöbere Bewertungen, Watchlists und mehr. Dein Guide für Online-Streaming und Filmempfehlungen.">
    <meta name="keywords" content="Filmbewertung, Streaming-Anbieter, Lieblingsfilme streamen, Watchlist, Filmgenres">








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
                
                    <h1 class="text-center">Entdecke die neuesten Filme</h1>

                    <!-- <p id="watchlists"></p> -->
                    <?php //include __DIR__ . '/searchFilterCollaps.php'; ?>
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
                                                    <div class="card-img-wrapper">
                                                        <img src="<?= $result['posterlink'] ?>" alt="<?= $result['title'] ?> Poster"
                                                            title="<?= $result['title'] ?> Poster" class="card-img-top"
                                                            data-image-id="<?= $result['id'] ?>">
                                                    </div>
                                                    <div class="card-body p-3">
                                                        <h3 class="card-title">
                                                            <a href="movie_details.php?id=<?= $result['id'] ?>">
                                                                <?= $result['title'] ?>
                                                            </a>
                                                        </h3>
                                                        <p class="card-text">

                                                            <strong>Genre:</strong> <?= $result['genre'] ?><br>
                                                            <strong>Release Year:</strong> <?= $result['releaseYear'] ?><br>
                                                            <strong>Rating:</strong> <?= $result['rating'] ?><br>

                                                            <?php
                                                            $onList = false; // Initialize the variable
                                                            $output = '';    // Initialize the output variable
                                                            if ($status == 1): ?>
                                                                <?php foreach ($offers as $offer): ?>
                                                                    <?php
                                                                    if ($offer['id'] === $result['id']) {
                                                                        $onList = true; // Set the flag directly
                                                                        $output = "Remove from Watchlist";
                                                                        break; // No need to continue looping once you found a match
                                                                    }
                                                                    ?>
                                                                <?php endforeach; ?>


                                                                <?php if ($onList): ?>
                                                                    <button class="watchlist-btn btn btn-warning btn-sm"
                                                                        data-movie-id="<?= $result['id'] ?>"
                                                                        value="<?= $result['id'] ?>"><?= $output ?></button>
                                                                <?php else: ?>
                                                                    <button class="watchlist-btn btn btn-warning btn-sm"
                                                                        data-movie-id="<?= $result['id'] ?>"
                                                                        value="<?= $result['id'] ?>">Add to Watchlist</button>
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
    $(document).ready(function () {
        $('.movie-card-img').dblclick(function () {
            var movieId = $(this).data('image-id'); // Get the movie ID from data attribute

            // Make an AJAX request to fetch movie details
            $.ajax({
                url: 'movieDetailsAjax.php',
                type: 'POST',
                data: { movie_id: movieId },
                dataType: 'json',
                success: function (data) {
                    // Populate modal or tooltip with the movie details
                    $('#movieModal .modal-title').text(data.title);
                    $('#movieModal .modal-body').html(`
                    <p><strong>Description:</strong> ${data.description}</p>
                    <p><strong>Genre:</strong> ${data.genre}</p>
                    <p><strong>Release Year:</strong> ${data.releaseYear}</p>
                    <p><strong>Rating:</strong> ${data.rating}</p>
                    <p><strong>Providers:</strong> ${data.providers}</p>
                `);

                    // Show the modal (you can also use a custom popover if you don't want a modal)
                    $('#movieModal').modal('show');
                },
                error: function () {
                    alert('Failed to fetch movie details.');
                }
            });
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


    $(document).ready(function () {
        $('.watchlist-btn').click(function () {
            var movieId = $(this).data('movie-id');
            var action = $(this).text() === 'Add to Watchlist' ? 'add' : 'remove';

            $.ajax({
                url: 'watchlistAjax.php',
                type: 'POST',
                data: { movie_id: movieId, action: action },
                success: function (response) {
                    if (response) {
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

<!-- Modal -->
<div class="modal fade" id="movieModal" tabindex="-1" aria-labelledby="movieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="movieModalLabel">Movie Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Movie details will be loaded here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>
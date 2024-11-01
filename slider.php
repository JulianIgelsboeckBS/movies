
<?php require_once("models/movie.php");
$movie = new Movie();
$results = $movie->getAllMovies();
?>
<div id="owl-demo" class="owl-carousel owl-theme">
<?php foreach ($results as $result): ?>
    <div class="item">
        <div class="card mb-4 mx-2 shadow-sm">
            <div class="card-img-wrapper-slider">
                <img src="<?= $result['posterlink'] ?>"
                     class="card-img-top" alt="<?= $result['title'] ?> Poster" title="<?= $result['title'] ?> Poster">
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
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>


    <!-- <div class="item">
        <div class="card mb-4 mx-2 shadow-sm">
            <img src=""
                 class="card-img-top" alt="Movie 1">
            <div class="card-body p-3">
                <h3 class="card-title">
                    <a href="movie_details.php?id=100">
                        Godfather
                    </a>
                </h3>
                <p class="card-text">
                
                    <strong>Genre:</strong> Comedy<br>
                    <strong>Release Year:</strong> 1995
                    <br>
                    <strong>Rating:</strong> 7.7<br>

                </p>
            </div>
        </div>
    </div> -->


</div>

<script src="js/plugins.js"></script>
<script src="js/owlCarousel.js"></script>





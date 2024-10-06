<?php require_once("movie.php");
$movie = new Movie();
$results = $movie->getAllMovies();
?>
<div id="owl-demo" class="owl-carousel owl-theme">
    <?php foreach ($results as $result): ?>
        <div class="item">
            <div class="card mb-4 mx-2 shadow-sm">
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

                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="item">
        <div class="card mb-4 mx-2 shadow-sm">
            <img src="https://i.ebayimg.com/images/g/bUQAAOSwC19ixpi2/s-l1600.webp"
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
    </div>

    <!--
    <div class="item">
        <img src="images/m6.jpg" title="Movies Pro"
             class="img-responsive" alt=" "/>
    </div>
    <div class="item">
        <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
            <a href="single.html" class="hvr-sweep-to-bottom"><img src="images/m6.jpg" title="Movies Pro"
                                                                   class="img-responsive" alt=" "/>
                <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
            </a>
            <div class="mid-1 agileits_w3layouts_mid_1_home">
                <div class="w3l-movie-text">
                    <h6><a href="single.html">Hopeless</a></h6>
                </div>
                <div class="mid-2 agile_mid_2_home">
                    <p>2016</p>
                    <div class="block-stars">
                        <ul class="w3l-ratings">
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="clearfix">
                        <div class="ribben one">
                            <p>NEW</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->

</div>



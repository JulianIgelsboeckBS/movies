<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review</title>
    <?php require_once("movie.php");
    $movie = new Movie();
    $results = $movie->getAllMovies();
    ?>

    <?php include __DIR__ . '/head.php'; ?>

</head>


<body>


<div id="site-content">
    <?php include __DIR__ . '/nav.php'; ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="row">
                    <?php include __DIR__ . '/searchFilterCollaps.php'; ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="slider">
                                <ul class="slides">
                                    <li><a href="#"><img src="dummy/slide-1.jpg" alt="Slide 1"></a></li>
                                    <li><a href="#"><img src="dummy/slide-2.jpg" alt="Slide 2"></a></li>
                                    <li><a href="#"><img src="dummy/slide-3.jpg" alt="Slide 3"></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <div class="latest-movie">
                                        <a href="#"><img src="dummy/thumb-1.jpg" alt="Movie 1"></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-12">
                                    <div class="latest-movie">
                                        <a href="#"><img src="dummy/thumb-2.jpg" alt="Movie 2"></a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div> <!-- .row -->

                    <?php if (isset($results)): ?>
                        <div class="search-results">

                            <?php if (empty($results)): ?>
                                <p class="text-muted">No movies found.</p>
                            <?php else: ?>
                                <div class="row">
                                    <?php foreach ($results as $result): ?>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card mb-4 shadow-sm">
                                                <img src="dummy/thumb-1.jpg" class="card-img-top" alt="Movie 1">
                                                <div class="card-body p-3">
                                                    <h5 class="card-title">
                                                        <a href="movie_details.php?id=<?= $result['id'] ?>">
                                                            <?= $result['title'] ?>
                                                        </a>
                                                    </h5>
                                                    <p class="card-text">
                                                        <strong>Description:</strong> <?= $result['description'] ?><br>
                                                        <strong>Genre:</strong> <?= $result['genre'] ?><br>
                                                        <strong>Release Year:</strong> <?= $result['releaseYear'] ?><br>
                                                        <strong>Rating:</strong> <?= $result['rating'] ?><br>
                                                        <strong>Providers:</strong> <?= $result['providers'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>


                    <!--                        <div class="row">-->
                    <!--                        <div class="col-sm-6 col-md-3">-->
                    <!--                                <div class="card mb-4 shadow-sm">-->
                    <!--                                    <a href="#">-->
                    <!--                                        <img src="dummy/thumb-1.jpg" class="card-img-top" alt="Movie 1">-->
                    <!--                                    </a>-->
                    <!--                                    <div class="card-body p-3">-->
                    <!--                                        <p class="card-text"><strong>Filmtitel: </strong>Movie 1</p>-->
                    <!--                                        <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                        <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-sm-6 col-md-3">-->
                    <!--                                <div class="card mb-4 shadow-sm">-->
                    <!--                                    <a href="#">-->
                    <!--                                        <img src="dummy/thumb-2.jpg" class="card-img-top" alt="Movie 2">-->
                    <!--                                    </a>-->
                    <!--                                    <div class="card-body p-3">-->
                    <!--                                        <p class="card-text"><strong>Filmtitel: </strong>Movie 2</p>-->
                    <!--                                        <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                        <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-sm-6 col-md-3">-->
                    <!--                                <div class="card mb-4 shadow-sm">-->
                    <!--                                    <a href="#">-->
                    <!--                                        <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">-->
                    <!--                                    </a>-->
                    <!--                                    <div class="card-body p-3">-->
                    <!--                                        <p class="card-text"><strong>Filmtitel: </strong>Movie 3</p>-->
                    <!--                                        <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                        <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!---->
                    <!--                                <div class="col-sm-6 col-md-3">-->
                    <!--                                    <div class="card mb-4 shadow-sm">-->
                    <!--                                        <a href="#">-->
                    <!--                                            <img src="dummy/thumb-4.jpg" class="card-img-top" alt="Movie 4">-->
                    <!--                                        </a>-->
                    <!--                                        <div class="card-body p-3">-->
                    <!--                                            <p class="card-text"><strong>Filmtitel: </strong>Movie 4</p>-->
                    <!--                                            <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                            <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                    <!---->
                    <!--                                    <div class="col-sm-6 col-md-3">-->
                    <!--                                        <div class="card mb-4 shadow-sm">-->
                    <!--                                            <a href="#">-->
                    <!--                                                <img src="dummy/thumb-5.jpg" class="card-img-top" alt="Movie 5">-->
                    <!--                                            </a>-->
                    <!--                                            <div class="card-body p-3">-->
                    <!--                                                <p class="card-text"><strong>Filmtitel: </strong>Movie 5</p>-->
                    <!--                                                <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                                <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!---->
                    <!--                                        <div class="col-sm-6 col-md-3">-->
                    <!--                                            <div class="card mb-4 shadow-sm">-->
                    <!--                                                <a href="#">-->
                    <!--                                                    <img src="dummy/thumb-6.jpg" class="card-img-top" alt="Movie 6">-->
                    <!--                                                </a>-->
                    <!--                                                <div class="card-body p-3">-->
                    <!--                                                    <p class="card-text"><strong>Filmtitel: </strong>Movie 6</p>-->
                    <!--                                                    <p class="card-text"><strong>Genre: </strong>Action</p>-->
                    <!--                                                    <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                </div>
            </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</div>
<!-- Default snippet for navigation -->


<script src="disableFilter.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>
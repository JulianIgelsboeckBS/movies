<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review</title>
    <?php require_once("DbConn.php");
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
                            <div class="col-md-9">
                                <div class="slider">
                                    <ul class="slides">
                                        <li><a href="#"><img src="dummy/slide-1.jpg" alt="Slide 1"></a></li>
                                        <li><a href="#"><img src="dummy/slide-2.jpg" alt="Slide 2"></a></li>
                                        <li><a href="#"><img src="dummy/slide-3.jpg" alt="Slide 3"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            </div>
                        </div> <!-- .row -->

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-3.jpg" alt="Movie 3"></a>
                                    <div class="movie-details">
                                        <p><strong>Filmname:</strong> Movie 3</p>
                                        <p><strong>Genre:</strong> Action</p>
                                        <p><strong>Erscheinungsjahr:</strong> 2023</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-4.jpg" alt="Movie 4"></a>
                                    <div class="movie-details">
                                        <p><strong>Filmname:</strong> Movie 4</p>
                                        <p><strong>Genre:</strong> Drama</p>
                                        <p><strong>Erscheinungsjahr:</strong> 2022</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-5.jpg" alt="Movie 5"></a>
                                    <div class="movie-details">
                                        <p><strong>Filmname:</strong> Movie 5</p>
                                        <p><strong>Genre:</strong> Comedy</p>
                                        <p><strong>Erscheinungsjahr:</strong> 2024</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-6.jpg" alt="Movie 6"></a>
                                    <div class="movie-details">
                                        <p><strong>Filmname:</strong> Movie 6</p>
                                        <p><strong>Genre:</strong> Sci-Fi</p>
                                        <p><strong>Erscheinungsjahr:</strong> 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="card mb-4 shadow-sm">
                                    <a href="#">
                                        <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">
                                    </a>
                                    <div class="card-body text-center p-3">
                                        <h5 class="card-title mt-2">Movie 3</h5>
                                        <p class="card-text"><strong>Genre:</strong> Action</p>
                                        <p class="card-text"><strong>Erscheinungsjahr:</strong> 2023</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="card mb-4 shadow-sm">
                                    <a href="#">
                                        <img src="dummy/thumb-4.jpg" class="card-img-top" alt="Movie 4">
                                    </a>
                                    <div class="card-body text-center p-3">
                                        <h5 class="card-title mt-2">Movie 4</h5>
                                        <p class="card-text"><strong>Genre:</strong> Drama</p>
                                        <p class="card-text"><strong>Erscheinungsjahr:</strong> 2022</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="card mb-4 shadow-sm">
                                    <a href="#">
                                        <img src="dummy/thumb-5.jpg" class="card-img-top" alt="Movie 5">
                                    </a>
                                    <div class="card-body text-center p-3">
                                        <h5 class="card-title mt-2">Movie 5</h5>
                                        <p class="card-text"><strong>Genre:</strong> Comedy</p>
                                        <p class="card-text"><strong>Erscheinungsjahr:</strong> 2024</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="card mb-4 shadow-sm">
                                    <a href="#">
                                        <img src="dummy/thumb-6.jpg" class="card-img-top" alt="Movie 6">
                                    </a>
                                    <div class="card-body text-center p-3">
                                        <h5 class="card-title mt-2">Movie 6</h5>
                                        <p class="card-text"><strong>Genre:</strong> Sci-Fi</p>
                                        <p class="card-text"><strong>Erscheinungsjahr:</strong> 2021</p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-3.jpg" alt="Movie 3"></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-4.jpg" alt="Movie 4"></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-5.jpg" alt="Movie 5"></a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="latest-movie">
                                    <a href="#"><img src="dummy/thumb-6.jpg" alt="Movie 6"></a>
                                </div>
                            </div>
                        </div> <!-- .row -->


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
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
                                <div class="card mb-4 shadow-sm">
                                    <a href="#">
                                        <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">
                                    </a>
                                    <div class="card-body p-3">
                                        <p class="card-text"><strong>Filmtitel: </strong>Movie 3</p>
                                        <p class="card-text"><strong>Genre: </strong>Action</p>
                                        <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>
                                    </div>
                                </div>
                            </div>

                                <div class="col-sm-6 col-md-3">
                                    <div class="card mb-4 shadow-sm">
                                        <a href="#">
                                            <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">
                                        </a>
                                        <div class="card-body p-3">
                                            <p class="card-text"><strong>Filmtitel: </strong>Movie 3</p>
                                            <p class="card-text"><strong>Genre: </strong>Action</p>
                                            <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-sm-6 col-md-3">
                                        <div class="card mb-4 shadow-sm">
                                            <a href="#">
                                                <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">
                                            </a>
                                            <div class="card-body p-3">
                                                <p class="card-text"><strong>Filmtitel: </strong>Movie 3</p>
                                                <p class="card-text"><strong>Genre: </strong>Action</p>
                                                <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-sm-6 col-md-3">
                                            <div class="card mb-4 shadow-sm">
                                                <a href="#">
                                                    <img src="dummy/thumb-3.jpg" class="card-img-top" alt="Movie 3">
                                                </a>
                                                <div class="card-body p-3">
                                                    <p class="card-text"><strong>Filmtitel: </strong>Movie 3</p>
                                                    <p class="card-text"><strong>Genre: </strong>Action</p>
                                                    <p class="card-text"><strong>Erscheinungsjahr: </strong>2023</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
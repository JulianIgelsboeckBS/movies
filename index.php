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
                    <?php include __DIR__ . '/searchFilter.php'; ?>

                    <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-bs-toggle="collapse" href="#collapse1">Filter anzeigen</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse">
                            <ul class="list-group">
                                <li class="list-group-item"><select class="col-md-auto" id="select">
                                        <option value="" selected>Kategorie</option>
                                        <option value="Action">Action</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Fantasy">Fantasy</option>

                                    </select></li>
                                <li class="list-group-item">Two</li>
                                <li class="list-group-item">Three</li>
                            </ul>
                            <div class="panel-footer">Footer</div>
                        </div>
                    </div>
                </div>
                </div>
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

                <div class="row">
                    <div class="col-md-4">
                        <h2 class="section-title">December premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
                    </div>
                    <div class="col-md-4">
                        <h2 class="section-title">November premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
                    </div>
                    <div class="col-md-4">
                        <h2 class="section-title">October premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
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
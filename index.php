
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review </title>
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
        <div class="page">
            <div class="container">
                <div class="row">
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


                    </div>
                </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>
</div>
<!-- Default snippet for navigation -->

<link href="owlCarousel.css" rel="stylesheet" type="text/css" media="all">

<script src="disableFilter.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>
<script src="owlCarousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds
            autoPlay: true,
            navigation: false,

            items: 5,
            itemsDesktop: [640, 4],
            itemsDesktopSmall: [414, 3]

        });

    });
</script>

</body>

</html>
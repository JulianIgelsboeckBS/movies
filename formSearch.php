<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review | Add Movie</title>
    <!-- Latest compiled and minified CSS -->
    <?php include __DIR__ . '/head.php'; ?>

</head>


<body>
<div id="site-content">
    <?php include __DIR__ . '/nav.php'; ?>
    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>Join Us</span>
                </div>

                <?php include __DIR__ . '/form_search.php'; ?>
                <!-- <div class="container mt-5"> -->
<!--                <form action="/add_movie" method="post" enctype="multipart/form-data">-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="title" class="form-label">Titel:</label>-->
<!--                        <input type="text" class="form-control" id="title" name="title" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="original_title" class="form-label">Originaltitel:</label>-->
<!--                        <input type="text" class="form-control" id="original_title" name="original_title">-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="genre" class="form-label">Genre:</label>-->
<!--                        <input type="text" class="form-control" id="genre" name="genre" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="release_year" class="form-label">Erscheinungsjahr:</label>-->
<!--                        <input type="number" class="form-control" id="release_year" name="release_year" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="duration" class="form-label">Dauer (in Minuten):</label>-->
<!--                        <input type="number" class="form-control" id="duration" name="duration" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="plot" class="form-label">Handlung:</label>-->
<!--                        <textarea class="form-control" id="plot" name="plot" rows="4" required></textarea>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="cast" class="form-label">Besetzung:</label>-->
<!--                        <textarea class="form-control" id="cast" name="cast" rows="2" required></textarea>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="director" class="form-label">Regie:</label>-->
<!--                        <input type="text" class="form-control" id="director" name="director" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="poster" class="form-label">Poster hochladen:</label>-->
<!--                        <input type="file" class="form-control" id="poster" name="poster" accept="image/*" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="trailer" class="form-label">Trailer-Link (YouTube o.ä.):</label>-->
<!--                        <input type="url" class="form-control" id="trailer" name="trailer" required>-->
<!--                    </div>-->
<!---->
<!--                    <div class="mb-3">-->
<!--                        <label for="availability" class="form-label">Verfügbarkeit auf Streaming-Diensten:</label>-->
<!--                        <textarea class="form-control" id="availability" name="availability" rows="2"-->
<!--                                  placeholder="z.B. Netflix, Amazon Prime" required></textarea>-->
<!--                    </div>-->
<!---->
<!--                    <button type="submit" class="btn btn-primary">Film anlegen</button>-->
<!--                </form>-->
                <!-- </div> -->

            </div>
        </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>

</div>
<!-- Default snippet for navigation -->



<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>

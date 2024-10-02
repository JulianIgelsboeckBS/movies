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

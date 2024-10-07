<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review | Add Movie</title>
    <!-- Latest compiled and minified CSS -->
    <?php include __DIR__ . '/head.php'; ?>
    <?php include __DIR__ . '/movie.php';
    $instance = new Movie();
    $movies = $instance->getAllMovies()?>

</head>


<body>
<div id="site-content">
    <?php include __DIR__ . '/nav.php'; ?>
    <main class="main-content">
        <div class="page">
            <div class="container">
                <div class="breadcrumbs">
                    <a href="index.php">Home</a>
                    <span>Filme</span>
                </div>
                    <h2 class="text-center">Movies List</h2>
                    <table class="table  table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Release Year</th>
                            <th>Providers</th>
                            <th>Genre</th>
                            <th>Poster</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($movies as $movie): ?>
                            <tr>
                                <td><?= htmlspecialchars($movie['title']) ?></td>
                                <td><?= htmlspecialchars($movie['description']) ?></td>
                                <td><?= htmlspecialchars($movie['rating']) ?></td>
                                <td><?= htmlspecialchars($movie['releaseYear']) ?></td>
                                <td><?= htmlspecialchars($movie['providers']) ?></td>
                                <td><?= htmlspecialchars($movie['genre']) ?></td>
                                <td><img src="<?= htmlspecialchars($movie['posterlink']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>" width="100"></td>
                                <td>
                                    <!-- Update and Delete buttons with the movie ID passed as query params -->
                                    <a href="updateMovie.php?id=<?= $movie['id'] ?>" class="btn btn-primary btn-sm">Update</a>
                                    <button class="btn btn-danger btn-sm mt-2" onclick="confirmDelete(<?= $movie['id'] ?>)">Delete</button>


                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>



                <!-- </div> -->

            </div>
        </div> <!-- .container -->
    </main>
    <?php include __DIR__ . '/footer.php'; ?>

</div>
<!-- Default snippet for navigation -->


<script>
    function confirmDelete(movieId) {
        if (confirm("Are you sure you want to delete this movie?")) {
            window.location.href = 'deleteMovie.php?id=' + movieId;
        }
    }
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

</body>

</html>

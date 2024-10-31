<?php
//require_once("models/DbConn.php");
require_once("models/filterQueries.php");
$db = new DbConn();
$pdo = $db->connect();

$filter = new filterQueries();
$genres = $filter->getGenre();

//$genreQuery = "SELECT DISTINCT g.name AS genre FROM genres g JOIN offersHasGenres og ON g.id = og.genres_id";
$releaseYearQuery = "SELECT DISTINCT m.releaseYear FROM movie m";
$ratingQuery = "SELECT DISTINCT o.rating FROM offers o";
$providerQuery = "SELECT DISTINCT p.name AS provider FROM providers p JOIN offersHasProviders op ON p.id = op.provider_id";

//$genres = $pdo->query($genreQuery)->fetchAll(PDO::FETCH_ASSOC);
$releaseYears = $pdo->query($releaseYearQuery)->fetchAll(PDO::FETCH_ASSOC);
$ratings = $pdo->query($ratingQuery)->fetchAll(PDO::FETCH_ASSOC);
$providers = $pdo->query($providerQuery)->fetchAll(PDO::FETCH_ASSOC);

// Initialize variables
$searchQuery = "";
$results = [];

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedGenre = $_POST['genre'];
    $selectedReleaseYear = $_POST['releaseYear'];
    $selectedRating = $_POST['rating'];
    $selectedProvider = $_POST['provider'];

    $searchQuery = "
        SELECT o.id, o.title, o.description, o.posterlink, o.rating, m.releaseYear, GROUP_CONCAT(p.name SEPARATOR ', ') AS providers, g.name AS genre
        FROM offers o
        JOIN movie m ON o.id = m.offers_id
        JOIN offersHasGenres og ON o.id = og.offers_id
        JOIN genres g ON og.genres_id = g.id
        JOIN offersHasProviders op ON o.id = op.offers_id
        JOIN providers p ON op.provider_id = p.id
        WHERE 1=1";  // Ensures the WHERE clause always has a base condition

    // Add conditions dynamically based on user input
    if ($selectedGenre !== 'all') {
        $searchQuery .= " AND g.name = :genre";
    }

    if ($selectedReleaseYear !== 'all') {
        $searchQuery .= " AND m.releaseYear = :releaseYear";
    }
    if ($selectedRating !== 'all') {
        $searchQuery .= " AND o.rating = :rating";
    }
    if ($selectedProvider !== 'all') {
        $searchQuery .= " AND p.name = :provider";
    }

    // Group by movie title to avoid duplicates, while concatenating providers
    $searchQuery .= " GROUP BY o.title";

    // Prepare and bind parameters
    $stmt = $pdo->prepare($searchQuery);
    if ($selectedGenre !== 'all') {
        $stmt->bindParam(':genre', $selectedGenre);
    }
    if ($selectedReleaseYear !== 'all') {
        $stmt->bindParam(':releaseYear', $selectedReleaseYear);
    }
    if ($selectedRating !== 'all') {
        $stmt->bindParam(':rating', $selectedRating);
    }
    if ($selectedProvider !== 'all') {
        $stmt->bindParam(':provider', $selectedProvider);
    }

    // Execute the query
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


}

?>

<!-- Bootstrap-based Filter Search Form -->
<form method="post" action="" class="mb-5">
    <div class="row">
        <div class="col-md-3">
            <label for="genre" class="form-label">Genre:</label>
            <select name="genre" id="genre" class="form-select">
                <option value="all">All</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?= $genre['genre'] ?>"><?= $genre['genre'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="releaseYear" class="form-label">Release Year:</label>
            <select name="releaseYear" id="releaseYear" class="form-select">
                <option value="all">All</option>
                <?php foreach ($releaseYears as $year): ?>
                    <option value="<?= $year['releaseYear'] ?>"><?= $year['releaseYear'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="rating" class="form-label">Rating:</label>
            <select name="rating" id="rating" class="form-select">
                <option value="all">All</option>
                <?php foreach ($ratings as $rating): ?>
                    <option value="<?= $rating['rating'] ?>"><?= $rating['rating'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="provider" class="form-label">Provider:</label>
            <select name="provider" id="provider" class="form-select">
                <option value="all">All</option>
                <?php foreach ($providers as $provider): ?>
                    <option value="<?= $provider['provider'] ?>"><?= $provider['provider'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-warning mt-4">Search</button>
</form>


<div class="row">
    <?php if (isset($results)): ?>
        <div class="search-results">

            <?php if (empty($results)): ?>
                <p class="text">No movies found.</p>


            <?php else: ?>
                <div class="row">
                    <?php foreach ($results as $result): ?>
                        <div class="col-sm-6 col-md-3">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-img-wrapper">
                                    <img src="<?= $result['posterlink'] ?>" alt="<?= $result['title'] ?> Poster"
                                        title="<?= $result['title'] ?> Poster" class="card-img-top"
                                        data-image-id="<?= $result['id'] ?>">
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

                                        <?php
                                        $onList = false; // Initialize the variable
                                        $output = '';    // Initialize the output variable
                                        if ($status == 1): ?>
                                            <?php foreach ($offers as $offer): ?>
                                                <?php
                                                if ($offer['id'] === $result['id']) {
                                                    $onList = true; // Set the flag directly
                                                    $output = "Remove from Watchlist";
                                                    break; // No need to continue looping once you found a match
                                                }
                                                ?>
                                            <?php endforeach; ?>


                                            <?php if ($onList): ?>
                                                <button class="watchlist-btn btn btn-warning btn-sm" data-movie-id="<?= $result['id'] ?>"
                                                    value="<?= $result['id'] ?>"><?= $output ?></button>
                                            <?php else: ?>
                                                <button class="watchlist-btn btn btn-warning btn-sm" data-movie-id="<?= $result['id'] ?>"
                                                    value="<?= $result['id'] ?>">Add to Watchlist</button>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</div>
<?php
include('models/DbConn.php');
$dbConn = new DbConn();
$pdo = $dbConn->connectAdmin();
session_start();
$user_id = $_SESSION['userId'];



// Get POST data
$movie_id = $_POST['movie_id'];
$action = $_POST['action'];

$response = ['success' => false];

if ($action == 'add') {

    // Check if the movie is already in the watchlist
    $stmt = $pdo->prepare('SELECT * FROM watchlists WHERE user_id = ? AND offers_id = ?');
    $stmt->execute([$user_id, $movie_id]);
    if ($stmt->rowCount() === 0) {
        // Add to watchlist
        $stmt = $pdo->prepare('INSERT INTO watchlists (user_id, offers_id) VALUES (?, ?)');
        if ($stmt->execute([$user_id, $movie_id])) {
            $response['success'] = true;
        }
    }
} elseif ($action == 'remove') {
    // Remove from watchlist
    $stmt = $pdo->prepare('DELETE FROM watchlists WHERE user_id = ? AND offers_id = ?');
    if ($stmt->execute([$user_id, $movie_id])) {
        $response['success'] = true;
    }
}

// Return response as JSON
echo json_encode($response);



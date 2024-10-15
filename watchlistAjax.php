<?php
// $message = "Hallo, i bims....da Ajax ;)";
// echo $message; 

session_start();
$user_id = $_SESSION['userId']; // Assuming user authentication

// Database connection (replace with your own connection details)
$host = 'localhost';
$db = 'streamingportal';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

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



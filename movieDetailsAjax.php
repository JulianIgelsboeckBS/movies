<?php
include('models/movie.php');
// movie_details_ajax.php
if (isset($_POST['movie_id'])) {
    $movie_id = $_POST['movie_id'];
    $instance = new Movie();

    $movie = $instance->fetchMovieById($movie_id);
    
    if ($movie) {
       
        
        // Send the details as a JSON response
        echo json_encode([
            'title' => $movie['title'],
            'description' => $movie['description'],
            'genre' => $movie['genre'],
            'releaseYear' => $movie['releaseYear'],
            'rating' => $movie['rating'],
            'providers' => $movie['providers']
        ]);
    }
}


<?php
 include __DIR__.'/models/movie.php';
 $instance = new Movie();

 $instance->deleteMovie($_GET['id']);
header("Location: cms_movies_list.php");

<?php
require_once("DbConn.php");
class filterQueries extends DbConn
{
    private $pdo ;

    
    public function __construct()
    {
        $this->pdo = DbConn::connect(); 
    }

    public function getGenre()
    {
        $genreQuery = "SELECT DISTINCT g.name AS genre FROM genres g JOIN offersHasGenres og ON g.id = og.genres_id";
        $genres = $this->pdo->query($genreQuery)->fetchAll(PDO::FETCH_ASSOC);
        return $genres;
    }
}

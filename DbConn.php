<?php

class DbConn
{

    static function connect()
    {

        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "streamingportal";

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch
        (PDOException $e) {
            die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
        }

    }

     public function SelectAllOffers()
    {
        $pdo = $this->connect();
        $offersQuery = "SELECT * FROM offers";
        $stmtOffers = $pdo->query($offersQuery);
        $offers = $stmtOffers->fetchAll(PDO::FETCH_ASSOC);
        return $offers;
    }
    public function SelectFilters()
    {
        $pdo = $this->connect();
        $filtersQuery = "SELECT DISTINCT 
    g.name AS genre,
    m.releaseYear,
    o.rating,
    p.name AS provider
FROM 
    streamingPortal.offers o
    JOIN streamingPortal.movie m ON o.id = m.offers_id
    JOIN streamingPortal.offersHasGenres og ON o.id = og.offers_id
    JOIN streamingPortal.genres g ON og.genres_id = g.id
    JOIN streamingPortal.offersHasProviders op ON o.id = op.offers_id
    JOIN streamingPortal.providers p ON op.provider_id = p.id
ORDER BY g.name, m.releaseYear, o.rating, p.name;";
        $stmtFilters = $pdo->query($filtersQuery);
        $filters = $stmtFilters->fetchAll(PDO::FETCH_ASSOC);
        return $filters;
    }



}












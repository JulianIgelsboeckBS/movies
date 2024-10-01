<?php

class DbConn
{
    public $pdo;
    function connect()
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

}












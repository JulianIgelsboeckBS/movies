<?php
class offers extends DbConn{
    public function offerQuery(){
        $pdo = DbConn::connect();
        $offersQuery = "SELECT * FROM offers";
        $stmtOffers = $pdo->query($offersQuery);
        $offers = $stmtOffers->fetchAll(PDO::FETCH_ASSOC);
        return $offers;

    }
}
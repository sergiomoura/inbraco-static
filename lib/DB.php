<?php

require_once(__DIR__.'/../database/.env.php');

class DB extends PDO {

    function __construct(){

        $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

        try {
            parent::__construct($dsn, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        
    }
}
<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'dev-php');

function DB() {
    try {
       $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        return $db;
    } catch (PDOException $ex) {
        return "Error!: " . $ex->getMessage();
        die('11');
    }
}

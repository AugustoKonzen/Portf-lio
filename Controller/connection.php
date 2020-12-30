<?php
include_once "../config.php";

try {
    $pdo = new PDO('mysql:host=' . HOST . '; dbname='.DBNAME.'', USERMANE, PASSWORD);
    return $pdo;
} catch (PDOException $ex) {
    echo 'Erro: ' . $ex->getMessage();
}
<?php
include './connection.php';

$h = $_GET['h'];

if (isset($h) && !empty($h)) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE usuarios SET status = 1 WHERE MD5(id) = :h");
    $stmt->bindValue(":h",$h);
    if ($stmt->execute()) {
        header("Location: ../Views/login.php");
    }
}
<?php

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "bdsah";

global $pdo;

try {
    //PDO
    $pdo = new PDO("mysql:dbname=".$banco.";host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "ERRO: ".$e->get_message();
    exit;
}



?>
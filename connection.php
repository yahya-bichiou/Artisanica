<?php
try {
    $database = "projetweb";
    $host = "localhost";
    $user = "Yahya Bichiou";
    $password = "Bichiou2003";
    $connection = new PDO("mysql:dbname=$database; host=$host", $user, $password);
    $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(PDOException $error) {
    echo "Connection Failed: " . $error -> getMessage();
}
?>
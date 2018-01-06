<?php
$servername = "localhost";
$username = "root";
$password = "";



try {
    $pdo = new PDO("mysql:host=$servername;dbname=photos", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("set names utf8");
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

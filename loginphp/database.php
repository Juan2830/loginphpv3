<?php
$server   = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'loginphp';

try {
    $connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>

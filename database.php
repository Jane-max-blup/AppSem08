<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'sistema_relaciones';

try {
  $MySQLiconn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
<?php
$database_host = "localhost";
$database_name = "manage";
$database_user = "root";
try {
    $db = new PDO("mysql:host=$database_host;dbname=$database_name;charset=utf8", $database_user);
} catch (Exception $e) {
    die('Cannot connect to database');
}

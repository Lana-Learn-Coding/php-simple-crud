<?php
$database_host = "localhost";
$database_name = "manage";
$database_user = "root";
try {
    $db = new PDO("mysql:host=$database_host;dbname=$database_name;charset=utf8", $database_user);
} catch (Exception $e) {
    die('Cannot connect to database');
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

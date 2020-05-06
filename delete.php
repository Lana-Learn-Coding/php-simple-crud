<?php
include 'database/connection.php';
if (isset($_GET["id"]) && isset($_GET["type"])) {
    try {
        $db->prepare('DELETE FROM ' . $_GET["type"] . ' WHERE id = ' . $_GET["id"])->execute();
    } catch (Exception $e) {
        // not found
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

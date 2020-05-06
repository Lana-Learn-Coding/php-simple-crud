<?php
include 'database/connection.php';
if (isset($_GET["id"])) {
    try {
        $db->prepare('DELETE FROM category WHERE id = ' . $_GET["id"])->execute();
    } catch (Exception $e) {
        // not found
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

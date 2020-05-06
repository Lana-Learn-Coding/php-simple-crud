<?php
include 'database/connection.php';
include 'upload_file.php';

if (isset($_GET["id"]) && isset($_GET["type"])) {
        if ($_GET["type"] === 'product') {
            $image = $db->query('SELECT * FROM product WHERE id = ' . $_GET["id"])->fetch()['image'];
            delete_uploaded_file($image);
        }
        $db->prepare('DELETE FROM ' . $_GET["type"] . ' WHERE id = ' . $_GET["id"])->execute();
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

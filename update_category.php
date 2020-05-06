<?php
ob_start();
session_start();
include 'database/connection.php';
if (!isset($_GET["id"])) {
    die("invalid");
}
$category = $db->query("SELECT * FROM category WHERE id = " . $_GET["id"])->fetch();
if (!$category) {
    die("not found");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = (isset($_POST["status"]) && $_POST["status"]) ? 1 : 0;
    $created_at = date("Y-m-d");
    try {
        $db
            ->prepare("INSERT INTO category(name, status, created_at) VALUES('$name', $status, '$created_at')")
            ->execute();
    } catch (Exception $e) {
        $error = 'update failed';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/styles.css">
    <title>Update category</title>
</head>

<body>
    <section>
        <a href="index.php">go back</a>
        <h4>update existing category</h4>
        <?php include 'template/category_form.php'; ?>
    </section>
</body>

</html>
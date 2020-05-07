<?php
include 'database/connection.php';
if (!isset($_GET["id"])) {
    die("invalid");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $status = (isset($_POST["status"]) && $_POST["status"]) ? 1 : 0;
    $created_at = date("Y-m-d H:i:s");
    try {
        $db
            ->prepare("UPDATE category SET name = '$name', status = $status, created_at = '$created_at' WHERE id = " . $_GET["id"])
            ->execute();
    } catch (Exception $e) {
        $error = 'update failed';
    }
}
$category = $db->query("SELECT * FROM category WHERE id = " . $_GET["id"])->fetch();
if (!$category) {
    die("not found");
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
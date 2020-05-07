<?php
include 'database/connection.php';
include 'upload_file.php';

if (!isset($_GET["id"])) {
    die("invalid");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $category_id = $_POST["category"] ? $_POST["category"] : "NULL";
    $description = $_POST["description"];
    $status = (isset($_POST["status"]) && $_POST["status"]) ? 1 : 0;
    $created_at = date("Y-m-d H:i:s");
    try {
        if (isset($_POST["image_link"])) {
            $image = upload_file('image');
            if (!$image) {
                $image = $_POST["image_link"];
            } else {
                delete_uploaded_file($_POST["image_link"]);
            }
        }
        $db
            ->prepare("UPDATE product SET "
                . "name = '$name', status = $status, created_at = '$created_at', image = '$image', "
                . "price = $price, description = '$description', category_id = $category_id"
                . " WHERE id = " . $_GET["id"])
            ->execute();
    } catch (Exception $e) {
        $error = 'update failed';
    }
}
$categories = $db->query("SELECT * FROM category WHERE status = 1");
$product = $db->query("SELECT * FROM product WHERE id = " . $_GET["id"])->fetch();
if (!$product) {
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
    <title>Update product</title>
</head>

<body>
    <section>
        <a href="index.php">go back</a>
        <h4>update existing product</h4>
        <?php include 'template/product_form.php'; ?>
    </section>
</body>

</html>
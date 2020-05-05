<?php
include 'database/connection.php';
$categories = $db->prepare('SELECT * FROM category;')->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/styles.css">
    <title>Home</title>
</head>
<body>
<section>
    <a href="create_category.php">add new category</a>
    <table border="1">
        <caption>Category List</caption>
        <tr>
            <th>#</th>
            <th>id</th>
            <th>name</th>
            <th>status</th>
            <th>created at</th>
            <th>action</th>
        </tr>
        <?php foreach ($categories as $index => $category) { ?>
            <tr>
                <td><?php echo strval($index + 1) ?></td>
                <td><?php echo $categories['id'] ?></td>
                <td><?php echo $categories['name'] ?></td>
                <td><?php echo $categories['status'] ? 'show' : 'hide' ?></td>
                <td><?php echo $categories['created_at'] ?></td>
                <td>
                    <a href="update_category.php?id=<?php $categories['id'] ?>"></a>
                    <a href="delete_category.php" onclick="return confirm('are you sure')"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</section>
</body>
</html>

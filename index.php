<?php
include 'database/connection.php';
ob_start();
session_start();
$categories = $db->query('SELECT * FROM category;')->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                    <td><?php echo $category['id'] ?></td>
                    <td><?php echo $category['name'] ?></td>
                    <td><?php echo $category['status'] ? 'show' : 'hide' ?></td>
                    <td><?php echo $category['created_at'] ?></td>
                    <td>
                        <a href="update_category.php?id=<?php echo $category['id'] ?>">edit</a>
                        <a href="delete_category.php?id=<?php echo $category['id'] ?>" onclick="return confirm('are you sure')">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</body>

</html>
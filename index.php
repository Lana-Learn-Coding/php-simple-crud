<?php
include 'database/connection.php';
$categories = $db->query('SELECT * FROM category;')->fetchAll();
$products = $db->query(
    'SELECT product.id, product.name, price, product.status, description, image, category.name as category, product.created_at '
        . 'FROM product LEFT JOIN category '
        . 'ON product.category_id = category.id'
)->fetchAll();
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
        <a href="create_product.php">add new product</a>
        <table border="1">
            <caption>Product List</caption>
            <tr>
                <th>#</th>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>category</th>
                <th>description</th>
                <th>image</th>
                <th>status</th>
                <th>created at</th>
                <th>action</th>
            </tr>
            <?php foreach ($products as $index => $product) { ?>
                <tr>
                    <td><?php echo strval($index + 1) ?></td>
                    <td><?php echo $product['id'] ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['category'] ? $product['category'] : 'uncategorized' ?></td>
                    <td><?php echo $product['description'] ?></td>
                    <td><?php echo $product['image'] ?></td>
                    <td><?php echo $product['status'] ? 'show' : 'hide' ?></td>
                    <td><?php echo $product['created_at'] ?></td>
                    <td>
                        <a href="update_product.php?id=<?php echo $product['id'] ?>">edit</a>
                        <a href="delete.php?type=product&id=<?php echo $product['id'] ?>" onclick="return confirm('are you sure')">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <br>
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
                        <a href="delete.php?type=category&id=<?php echo $category['id'] ?>" onclick="return confirm('are you sure')">delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </section>
</body>

</html>
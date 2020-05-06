<form method="POST" enctype="multipart/form-data">
    <table>
        <?php if (isset($product)) { ?>
            <tr>
                <td><label for="id">id</label></td>
                <td>
                    <input type="text" id="id" name="id" readonly required value="<?php echo $product['id'] ?>">
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td><label for="name">name</label></td>
            <td>
                <input type="text" id="name" name="name" required value="<?php echo isset($product) ? $product['name'] : '' ?>">
            </td>
        </tr>
        <tr>
            <td><label for="price">price</label></td>
            <td>
                <input type="number" id="price" name="price" required value="<?php echo isset($product) ? $product['price'] : '' ?>">
            </td>
        </tr>
        <tr>
            <td><label for="category">category</label></td>
            <td>
                <select name="category" id="category">
                    <option value="">--select category--</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id'] ?>" <?php if (isset($product['category_id']) && $product['category_id'] === $category['id']) echo 'selected' ?>>
                            <?php echo $category['name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="status">show</label></td>
            <td>
                <input type="checkbox" id="status" name="status" <?php echo isset($product) ? ($product['status'] ? 'checked' : '') : 'checked' ?>>
            </td>
        </tr>
        <tr>
            <td><label for="image">image</label></td>
            <td>
                <input type="file" id="image" name="image" accept="image/*">
                <?php $image = $product['image']; if (isset($product) && $product['image']) echo "<input type=\"hidden\" name=\"image_link\" value=\"$image\">" ?>
            </td>
        </tr>
        <tr>
            <td><label for="description">description</label></td>
            <td>
                <textarea rows="4" type="text" id="description" name="description" value="<?php echo isset($product) ? $product['description'] : '' ?>"></textarea>
            </td>
        </tr>
        <?php if (isset($error))
            echo "<tr><td colspan=\"2\" style=\"color: red\">$error</td></tr>"
        ?>
        <tr>
            <td>
                <input type="submit" name="submit" value="submit">
            </td>
        </tr>
    </table>
</form>
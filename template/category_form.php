<form method="POST">
    <table>
        <?php if (isset($category)) { ?>
            <tr>
                <td><label for="id">id</label></td>
                <td>
                    <input type="text" id="id" name="id" readonly required
                           value="<?php echo $category['id'] ?>">
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td><label for="name">name</label></td>
            <td>
                <input type="text" id="name" name="name" required
                       value="<?php echo isset($category) ? $category['name'] : '' ?>">
            </td>
        </tr>
        <tr>
            <td><label for="status">show</label></td>
            <td>
                <input type="checkbox" id="status" name="status"
                    <?php
                    if (isset($category)) {
                        echo $category['status'] ? 'checked' : '';
                    } else {
                        echo 'checked';
                    }
                    ?>
                >
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

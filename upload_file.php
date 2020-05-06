<?php
function upload_file($field, $dir = 'public/')
{
    if (isset($_FILES[$field]) && $_FILES[$field]["name"]) {
        $file = $_FILES[$field];
        $target_file = $dir .  uniqid($file["name"] . "_", true);
        if ($file['size'] > 10000000) throw new Exception("File too large", 1);
        if (!preg_match("/^image\/.+/", $file['type'])) throw new Exception("Not a image!", 1);

        $is_uploaded = move_uploaded_file($file["tmp_name"], $target_file);
        if (!$is_uploaded) throw new Exception("Upload failed");
        return $target_file;
    }
    return '';
}

function delete_uploaded_file($file_full_path)
{
    unlink($file_full_path);
}

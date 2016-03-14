<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
echo "File is valid, and was successfully uploaded.\n HEEEI";
} else {
echo "Possible file upload attack!\n";
}

echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);

echo "</pre>";

?>

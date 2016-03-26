<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */

$var1 = $_POST["firstname"];
$var2 = $_POST["lastname"];

echo "Var1  = $var1 <br> Var 2 = $var2 <br>";

/*$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n HEEEI";
} else {
    echo "Possible file uploads attack!\n";
}

echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);

echo "</pre>";*/

?>

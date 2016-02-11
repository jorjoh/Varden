<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */

/*$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';

if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          //3

    $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4

    $targetFile = $targetPath . $_FILES['file']['name'];  //5

    move_uploaded_file($tempFile, $targetFile); //6
    echo "uploaded";
}*/

$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

echo 'Here is some more debugging info:';
print_r($_FILES);

print "</pre>";

/*$upload_dir = 'uploads';
if (!empty($_FILES))
{
    $tempFile = $_FILES['photos']['tmp_name'];//this is temporary server location

    // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
    $uploadPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;

    // Adding timestamp with image's name so that files with same name can be uploaded easily.
    $mainFile = $uploadPath.time().'-'. $_FILES['photos']['name'];

    move_uploaded_file($tempFile,$mainFile);
}*/

?>

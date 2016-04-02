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
    echo "Possible file uploads attack!\n";
}

echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    echo "RECEIVED ON SERVER: \n";
    echo "FILES: \n";

    print_r($_FILES);
    echo "\$_POST: \n";
    print_r($_POST);
}

$beskrivelse = isset($_POST['beskrivelse']) ? $_POST['beskrivelse'] : '';

print("Følgende beskrivelse: " . $beskrivelse . " er registrert");


echo "</pre>";


?>

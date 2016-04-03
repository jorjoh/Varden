<?php

/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */




if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n HEEEI";
    } else {
        echo "Possible file uploads attack!\n";
    }

    echo "<pre>RECEIVED ON SERVER: \n";
    echo "FILES: \n";

    print_r($_FILES);
    echo "</pre><br><pre>";
    echo "\$_POST: fra php filen \n";
    print_r($_POST);
    echo "</pre>";
}


$beskrivelse = $_POST['beskrivelse'];
$photographer = $_POST['photographer'];

echo ("Fotograf er: ".$photographer. "\n");
echo "Beskrivelse er: ".$beskrivelse. "\n";

//print("Følgende beskrivelse: " . $beskrivelse . " er registrert");

?>
<?php

    //Gyldige filformater på bildene som lastes opp. Brukes til validering ved opplasting av bilder
    $validImageType = array(
        "IMAGETYPE_GIF",
        "IMAGETYPE_JPEG",
        "IMAGETYPE_PNG",
        "IMAGETYPE_PSD",
        "IMAGETYPE_BMP",
    );

    include('functions/dbcon.php');
    include('functions/sqlfunctions.php');

    $columns = array("Test1", "Test2", "Test3", "Test4");

    insert($connect, null, $columns);

?>
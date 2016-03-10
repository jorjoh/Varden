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

    insert($connect, $image);

?>
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

    $columns = array("filename", "picturetext", "thumb_w", "thumb_h", "place_id", "url");
    $values = array("test.jpg", "bilde her er tøft", 120, 120, 1141, "http://bilder2.varden.no/img/test.jpg");

    insert($connect, "images", $columns, $values);

?>
<?php

    //Gyldige filformater på bildene som lastes opp. Brukes til validering ved opplasting av bilder
    $validImageType = array(
        "IMAGETYPE_GIF",
        "IMAGETYPE_JPEG",
        "IMAGETYPE_PNG",
        "IMAGETYPE_PSD",
        "IMAGETYPE_BMP",
    );

$image = "IMG_2016.jpg";
$exif = exif_read_data($image, 0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        if($key == "IFD0"){
            echo "$key.$name: $val\n";
        }
    }
}

?>
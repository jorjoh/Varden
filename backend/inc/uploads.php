<?php

/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */
include "../../test/exif-readouttodb.php";


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
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

//Viser url-stien til det aktuelle bilde
$urlforimage = "inc/" . $uploadfile;

$beskrivelse = $_POST['beskrivelse'];
$photographer = $_POST['photographer'];

echo("Fotograf er: " . $photographer . "\n");
echo("Beskrivelse er: " . $beskrivelse . "\n");
echo("URL for bilde er: <a href = '$urlforimage'> Trykk her for å se bilde </a>");

$insdatatocamera = array(
    'cameramaker' => $camera['make'],
    'cameramodel' => $camera['model'],
);

$insdatatocategory = array(
    'name' => "Valgt kategori", // her kan vi har noen checkbokser vel?
);

$insdatatoimagedesgin = array(  //Motiv
    'name' => "Bildets motiv",
);

$insDataToImages = array(
    'filename' => $uploadfile,
    'picturetext' => $beskrivelse,
    'thumb_w' => "120",
    'thumb_h' => "120",
    'url' => $urlforimage
);
$insdatatometainfo = array(
    "capturedate" => $exifinfo["DateTimeOriginal"],
    "w_original" => $exifcomputed['COMPUTED']['Width'],
	"h_original" => $exifcomputed['COMPUTED']['Height'],
	"imagetype" => $exif_file['MimeType'],
	"resolution" => $exif_ifd0['XResolution'],
	"bit_dept" => "Null", // hmm denne veriden ser ikke ut til å være her
	"uploaded" => "var date = new Date; getDate",
	"exposure_time" => $exifinfo['ExposureTime'],
	"focal_length" => $exifinfo['FocalLength'],
	"white_balance" => $exifinfo['WhiteBalance'],
	"orientation" => $exif_ifdo['Orientation'],
	"iso_speed" => $exifinfo['ISOSpeedRatings'],
	"flash_state" => "True/false", //Akkurat det tror jeg ikke vi her
	"tags" => "illustrasjonsbilde",
);
$insdatattophotographers = array(
    "firstname" => $photographer,
    "lastname" =>$photographerlastname,
);
$insdatatophysicallocation = array(
    "room" => "The archive",
    "drawer" => "3",
    "folder" => "34",
    "physicallocationcol" => "Vardens arkiv",
);

insert($connect, "camera", $insdatatocamera);
insert($connect, "cateory", $insdatatocategory);
insert($connect, "design", $insdatatoimagedesgin);
insert($connect, "images", $insDataToImages);
insert($connect, "metainfo", $insdatatometainfo);
insert($connect, "photographers", $insdatattophotographers);
insert($connect, "physicallocation", $insdatatophysicallocation);
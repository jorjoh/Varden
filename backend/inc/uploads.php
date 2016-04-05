<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */
include ("../inc/exif-readouttodb.php");

$cur_image = $_FILES['file']['name'];

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

/*------informasjon som skal inni arrayer i databasen*/
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
    "capturedate" => $exifexifinfo["DateTimeOriginal"],
    "w_original" => $exifcomputed['COMPUTED']['Width'],
	"h_original" => $exifcomputed['COMPUTED']['Height'],
	"imagetype" => $exiffile['MimeType'],
	"resolution" =>$exifcomputed['XResolution'],
	"bit_dept" => "Null", // hmm denne veriden ser ikke ut til å være her
	"uploaded" => "var date = new Date; getDate",
	"exposure_time" => $exifexifinfo['ExposureTime'],
	"focal_length" => $exifexifinfo['FocalLength'],
	"white_balance" => $exifexifinfo['WhiteBalance'],
	"orientation" => $exifcomputed['Orientation'],
	"iso_speed" => $exifexifinfo['ISOSpeedRatings'],
	"flash_state" => "True/false", //Akkurat det tror jeg ikke vi her
	"tags" => "illustrasjonsbilde",
);
$insdatattophotographers = array(
    "firstname" => $photographer,
    "lastname" =>$photographer, //Her burde vi legge tilrette for etternavn
);
$insdatatophysicallocation = array(
    "room" => "The archive",
    "drawer" => "3",
    "folder" => "34",
    "physicallocationcol" => "Vardens arkiv",
);

for($i = 0; $i <count($insdatatometainfo); $i++){
    echo $insdatatometainfo[$i];
    echo "dette er en melding fra foor-lopen";
}

/*------------ Slutt på funkjsonen */

/*insert($connect, "camera", $insdatatocamera);
insert($connect, "cateory", $insdatatocategory);
insert($connect, "design", $insdatatoimagedesgin);
insert($connect, "images", $insDataToImages);
insert($connect, "metainfo", $insdatatometainfo);
insert($connect, "photographers", $insdatattophotographers);
insert($connect, "physicallocation", $insdatatophysicallocation);*/
<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 09.02.2016
 * Time: 12:24
 */


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $uploaddir = '../../frontend/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
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

    $cur_image = $uploadfile;

}
include("exif-infofrompicture.php");

//echo "Dette er bilde som er i uploads.php:".$cur_image;

//Viser url-stien til det aktuelle bilde
$urlforimage = "varden/" . $uploadfile;

$beskrivelse = $_POST['beskrivelse'];
$photographer = explode(" ", $_POST['photographer']);
$filename = basename($_FILES['file']['name']);
$curtime = new DateTime();
$size = exif_thumbnail($cur_image, $width, $height, $type);

echo("Fotograf er: " . $photographer[0] . "<br/>");
echo("Beskrivelse er: " . $beskrivelse . "<br/>");
echo("URL for bilde er: <a href = '$urlforimage'> Trykk her for å se bilde </a><br/>");
echo("<pre>
        Dette er en test: <br>
        Width: = $width <br>
        Height = $height <br>
    </pre>
");



/*------informasjon som skal inni arrayer i databasen*/

$insdatatocamera = array(
    'cameramaker' => $exif['Make'],
    'cameramodel' => $exif['Model'],
);
print_r($insdatatocamera);
/*echo "<br/>   array uploads ".$insdatatocamera['cameramaker']."<br/>";    //Debug linjer
echo "<br/>   array uploads ".$insdatatocamera['cameramodel']."<br/>";*/

$insdatatocategory = array(
    'name' => "Valgt kategori", // her kan vi har noen checkbokser vel?
);

$insdatatoimagedesgin = array(  //Motiv
    'name' => "Bildets motiv",
);

$insDataToImages = array(
    'filename' => $filename,
    'picturetext' => $beskrivelse,
    'thumb_w' => "120",
    'thumb_h' => "120",
    'url' => $urlforimage
);

$insdatatometainfo = array(
    "capturedate" => $exif["DateTimeOriginal"],
    "w_original" => $exif['COMPUTED']['Width'],
	"h_original" => $exif['COMPUTED']['Height'],
    "imagetype" => $exif['MimeType'],
	"resolution" =>$exif['XResolution'],
	"bit_depth" => 0, // hmm denne veriden ser ikke ut til å være her
	"uploaded" => $curtime->format("Y-m-d H:i:s"),
	"exposure_time" => $exif['ExposureTime'],
    "focal_length" => $exif['FocalLength'],
	"white_balance" => $exif['WhiteBalance'],
	"orientation" => $exif['Orientation'],
	"iso_speed" => $exif['ISOSpeedRatings'],
	"flash_state" => $exif['Flash'], //Akkurat det tror jeg ikke vi her
	"tags" => "illustrasjonsbilde",
);
print_r($insdatatometainfo);

$insdatattophotographers = array(
    "firstname" => $photographer[0],
    "lastname" =>$photographer[1], //Her burde vi legge tilrette for etternavn
);
print_r($insdatattophotographers);
$insdatatophysicallocation = array(
    "room" => 0,
    "drawers" => 3,
    "folder" => 34
);

$insdatalog = array(
  "uploaded_time" => $curtime->format('Y-m-d H:i:s')
);

/*------------ Slutt på funkjsonen */
include ("functions/sqlfunctions.php");
insert($connect, "camera", $insdatatocamera);
insert($connect, "category", $insdatatocategory);
insert($connect, "imagedesign", $insdatatoimagedesgin);
insert($connect, "images", $insDataToImages);
insert($connect, "photographers", $insdatattophotographers);
insert($connect, "metainfo", $insdatatometainfo);
insert($connect, "physicallocation", $insdatatophysicallocation);
insert($connect, "log", $insdatalog);
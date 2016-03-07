<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 01.03.2016
 * Time: 12:42
 */


$image = "DSC_8962.JPG";
/*
    $exif = exif_read_data($image, IFD0, true);
    foreach ($exif as $key => $section) {
        foreach ($section as $name => $val) {
            echo "$key.$name: $val\n";
            echo "<br/>";

        }
    }
*/

$divStyle = ' background-color:#E8E8E3;
            padding:10px;
            color:#000;
            font-size:16px;
            width:100%;
            overflow:hidden;';

function cameraUsed($image){

    if((isset($image)) and (file_exists($image))){
        $exif_ifd0 = exif_read_data($image,'IFD0',0);

    }
    $notFound = "Unavalilable";

    //Make
    if(array_key_exists('Make',$exif_ifd0)){
        $camMake = $exif_ifd0['Make'];

    }
    else{
        $camMake = $notFound;
    }
    //Model
    if(array_key_exists('Model',$exif_ifd0)){
        $camModel = $exif_ifd0['Model'];
    }
    else $camModel = $notFound;
    //Orientation
    if(array_key_exists('Orientation',$exif_ifd0)){
        $imgOrentation = $exif_ifd0['Orientation'];
    }
    else $imgOrentation = $notFound;
    //XResolution
    if(array_key_exists('XResolution',$exif_ifd0)){
        $XResolution = $exif_ifd0['XResolution'];
    }
    else{
        $XResolution = $notFound;
    }
    //YResolution
    if(array_key_exists('YResolution',$exif_ifd0)){
        $YResolution = $exif_ifd0['YResolution'];
    }
    else{
        $YResolution = $notFound;
    }
    //ResolutionUnit
    if(array_key_exists('ResolutionUnit',$exif_ifd0)){
        $resolutionUnit = $exif_ifd0['ResolutionUnit'];
    }
    else{
        $resolutionUnit =  $notFound;
    }
    //Software
    if(array_key_exists('Software',$exif_ifd0)){
        $software = $exif_ifd0['Software'];
    }
    else{
        $software = $notFound;
    }
    //DateTime
    if(array_key_exists('DateTime',$exif_ifd0)){
        $dateTime = $exif_ifd0['DateTime'];
    }
    else{
        $dateTime = $notFound;
    }
    //YCbCrPositioning
    if(array_key_exists('YCbCrPositioning',$exif_ifd0)){
        $yCbCrPositioning = $exif_ifd0['YCbCrPositioning'];
    }
    else{
        $yCbCrPositioning = $notFound;
    }
    //Exif_IFD_Pointer
    if(array_key_exists('Exif_IFD_Pointer', $exif_ifd0)){
        $exif_IFD_Pointer = $exif_ifd0['Exif_IFD_Pointer'];
    }
    else{
        $exif_IFD_Pointer= $notFound;
    }

    //Returns arrays
    $return = array();
    $return['Make'] = $camMake;
    $return['Model'] = $camModel;
    $return['Orientation'] = $imgOrentation;
    $return['Xresolution'] = $XResolution;
    $return['Yresolution'] = $YResolution;
    $return['ResolutionUnit'] = $resolutionUnit;
    $return['Software'] = $software;
    $return['DateTime'] = $dateTime;
    $return['YCbCrPositioning'] = $yCbCrPositioning;
    $return['Exif_IFD_Pointer'] = $exif_IFD_Pointer;
    return $return;
}
function imageDetails($image){

    if((isset($image)) and (file_exists($image))){
        $exifComputed = exif_read_data($image,'COMPUTED',0);
    }
    $notFound = "Unavalilable";

    if(array_key_exists('html',$exifComputed)){
        $html = $exifComputed['html'];
    }
    else{
        $html = $notFound;
    }
    if(array_key_exists('Height',$exifComputed)){
        $height = $exifComputed['COMPUTED']['Height'];
    }
    else{
        $height = $exifComputed;
    }
    if(array_key_exists('Width',$exifComputed)){
        $width = $exifComputed['Width'];
    }
    else{
        $width = $notFound;
    }

    //Returns arrays
    $return = array();
    $return['html'] = $html;
    $return['COMPUTED']['Height'] = $height;
    $return['Width'] = $width;
    return $return;
}

$camera = cameraUsed($image);
$exifDetail = imageDetails($image);
echo '<div style = "' . $divStyle . '">
    Info returned by <b>exif_read_data('.$image.', Exif-information)</b>
    <br /><br />
        <pre>';
print_r("COMPUTED:"."<br/>");
print_r("HTML:".$exifDetail['html']."<br/>");
print_r("Height:".$exifDetail['COMPUTED']['Height']."<br/>");
print_r("Width:".$exifDetail['Width']."<br/>");

print_r("IFD0:". "<br/>");
print_r("Camera Used:".$camera['Make'] . " Model:" .$camera['Model'] . "<br />");
print_r("Image orentation:".$camera['Orientation']."<br/>");
print_r("XResotution:".$camera['Xresolution']."<br/>");
print_r("YResotution:".$camera['Yresolution']."<br/>");
print_r("ResolutionUnit:".$camera['ResolutionUnit']."<br/>");
print_r("Software:".$camera['Software']."<br/>");
print_r("DateTime:".$camera['DateTime']."<br/>");
print_r("YCbCrPositioning:".$camera['YCbCrPositioning']."<br/>");
print_r("Exif_IFD_Pointer:".$camera['Exif_IFD_Pointer']."<br/>");



echo '</pre>
        </div>';
//echo "Camera Used:".$camera['Make'];




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Online Bildearkiv - adminpanel</title>
    <link rel="icon" type="image/png" href="../frontend/img/VA-fav-icon-152.png">

<body>





<div class="row">
    <div class="col-3">
        <img src="img/vardenlogo.PNG">
    </div>
</div>
<div class="row">
    <div class="col-8">
        <h1 class="intro">Velkommen til administreringssiden til Onlinebildearkiv</h1>
    </div>
    <div class="col-4">
        <img src="img/userPicture.JPG" width="35px" height="30px"/>
        <h2>$fullName</h2>
    </div>

</div>
<div class="row">
    <div class="col-10">

    </div>
</div>
<article>
</article>
</body>
<footer>
</footer>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 01.03.2016
 * Time: 12:42
 */


$image = "IMG_3646.JPG";
$notFound = "null";
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

function cameraUsed($image)
{

    if ((isset($image)) and (file_exists($image))) {
        $exif_ifd0 = exif_read_data($image, 'IFD0', 0);

        global $notfound;

        //Make
        if (array_key_exists('Make', $exif_ifd0)) {
            $camMake = $exif_ifd0['Make'];
        } else {
            $camMake = $notfound;
        }
        //Model
        if (array_key_exists('Model', $exif_ifd0)) {
            $camModel = $exif_ifd0['Model'];
        } else $camModel = $notfound;
        //Orientation
        if (array_key_exists('Orientation', $exif_ifd0)) {
            $imgOrentation = $exif_ifd0['Orientation'];
        } else $imgOrentation = $notfound;
        //XResolution
        if (array_key_exists('XResolution', $exif_ifd0)) {
            $XResolution = $exif_ifd0['XResolution'];
        } else {
            $XResolution = $notfound;
        }
        //YResolution
        if (array_key_exists('YResolution', $exif_ifd0)) {
            $YResolution = $exif_ifd0['YResolution'];
        } else {
            $YResolution = $notfound;
        }
        //ResolutionUnit
        if (array_key_exists('ResolutionUnit', $exif_ifd0)) {
            $resolutionUnit = $exif_ifd0['ResolutionUnit'];
        } else {
            $resolutionUnit = $notfound;
        }
        //Software
        if (array_key_exists('Software', $exif_ifd0)) {
            $software = $exif_ifd0['Software'];
        } else {
            $software = $notfound;
        }
        //DateTime
        if (array_key_exists('DateTime', $exif_ifd0)) {
            $dateTime = $exif_ifd0['DateTime'];
        } else {
            $dateTime = $notfound;
        }
        //YCbCrPositioning
        if (array_key_exists('YCbCrPositioning', $exif_ifd0)) {
            $yCbCrPositioning = $exif_ifd0['YCbCrPositioning'];
        } else {
            $yCbCrPositioning = $notfound;
        }
        //Exif_IFD_Pointer
        if (array_key_exists('Exif_IFD_Pointer', $exif_ifd0)) {
            $exif_IFD_Pointer = $exif_ifd0['Exif_IFD_Pointer'];
        } else {
            $exif_IFD_Pointer = $notfound;
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
    else {
        echo "Bilde finnes ikke";
    }
}

function imageDetails($image)
{

    if ((isset($image)) and (file_exists($image))) {
        $exifComputed = exif_read_data($image, 'IFD0', 0);
        global $notfound;

        if (array_key_exists('html', $exifComputed['COMPUTED'])) {
            $html = $exifComputed['COMPUTED']['html'];
        } else {
            $html = $notfound;
        }
        if (array_key_exists('Height', $exifComputed['COMPUTED'])) {
            $height = $exifComputed['COMPUTED']['Height'];
        } else {
            $height = $exifComputed;
        }
        if (array_key_exists('Width', $exifComputed['COMPUTED'])) {
            $width = $exifComputed['COMPUTED']['Width'];
        } else {
            $width = $notfound;
        }
        if (array_key_exists('IsColor', $exifComputed['COMPUTED'])) {
            $isColor = $exifComputed['COMPUTED']['IsColor'];
        } else {
            $isColor = $notfound;
        }
        if (array_key_exists('ByteOrderMotorola', $exifComputed['COMPUTED'])) {
            $byteOrderMotorola = $exifComputed['COMPUTED']['ByteOrderMotorola'];
        } else {
            $byteOrderMotorola = $notfound;
        }
        if (array_key_exists('ApertureFNumber', $exifComputed['COMPUTED'])) {
            $apertureFNumber = $exifComputed['COMPUTED']['ApertureFNumber'];
        } else {
            $apertureFNumber = $notfound;
        }

        //Returns arrays
        $return = array();
        $return['html'] = $html;
        $return['COMPUTED']['Height'] = $height;
        $return['Width'] = $width;
        $return['IsColor'] = $isColor;
        $return['ByteOrderMotorola'] = $byteOrderMotorola;
        $return['ApertureFNumber'] = $apertureFNumber;
        return $return;
    }
    else {
        echo "Bilde finnes ikke";
    }
}

function exifDetails($image)
{
    if ((isset($image)) and (file_exists($image))) {
        $exifInfo = exif_read_data($image, 'EXIF', 0);
        global $notfound;

        if (array_key_exists('ExposureTime', $exifInfo)) {
            $exposureTime = $exifInfo['ExposureTime'];
        } else {
            $exposureTime = $notfound;
        }
        if (array_key_exists('FNumber', $exifInfo)) {
            $fNumber = $exifInfo['FNumber'];
        } else {
            $fNumber = $notfound;
        }
        if (array_key_exists('ExposureProgram', $exifInfo)) {
            $exposureProgram = $exifInfo['ExposureProgram'];
        } else {
            $exposureProgram = $notfound;
        }
        if(array_key_exists('ISOSpeedRatings',$exifInfo)){
            $iSOSpeedRatings = $exifInfo['ISOSpeedRatings'];
        }
        else {
            $iSOSpeedRatings = $notfound;
        }
        if(array_key_exists('ExifVersion',$exifInfo)){
            $exifVersion = $exifInfo['ExifVersion'];
        }
        else{
            $exifVersion = $notfound;
        }
        if(array_key_exists('DateTimeOriginal',$exifInfo)){
            $dateTimeOriginal = $exifInfo['DateTimeOriginal'];
        }
        else{
            $dateTimeOriginal = $notfound;
        }
        if(array_key_exists('DateTimeDigitized',$exifInfo)){
            $dateTimeDigitized = $exifInfo['DateTimeDigitized'];
        }
        else{
            $dateTimeDigitized = $notfound;
        }
        if(array_key_exists('ComponentsConfiguration',$exifInfo)){
            $componentsConfiguration = $exifInfo['ComponentsConfiguration'];
        }
        else{
            $componentsConfiguration = $notfound;
        }
        if(array_key_exists('CompressedBitsPerPixel',$exifInfo)){
            $compressedBitsPerPixel = $exifInfo['CompressedBitsPerPixel'];
        }
        else{
            $compressedBitsPerPixel = $notfound;
        }
        if(array_key_exists('ExposureBiasValue',$exifInfo)){
            $exposureBiasValue = $exifInfo['ExposureBiasValue'];
        }
        else{
            $exposureBiasValue = $notfound;
        }
        if(array_key_exists('MaxApertureValue',$exifInfo)){
            $maxApertureValue = $exifInfo['MaxApertureValue'];
        }
        else{
            $maxApertureValue = $exifInfo;
        }
        if(array_key_exists('MeteringMode',$exifInfo)){
            $meteringMode = $exifInfo['MeteringMode'];
        }
        else{
            $meteringMode = $notfound;
        }
        if(array_key_exists('LightSource',$exifInfo)){
            $lightSource = $exifInfo['LightSource'];
        }
        else{
            $lightSource = $notfound;
        }
        if(array_key_exists('Flash',$exifInfo)){
            $flash = $exifInfo['Flash'];
        }
        else{
            $flash = $notfound;
        }
        if(array_key_exists('FocalLength',$exifInfo)){
            $focalLength = $exifInfo['FocalLength'];
        }
        else{
            $focalLength = $notfound;
        }
        if(array_key_exists('UserComment',$exifInfo)){
            $userComment = $exifInfo['UserComment'];
        }
        else{
            $userComment = $notfound;
        }
        if(array_key_exists('SubSecTime',$exifInfo)){
            $subSecTime = $exifInfo['SubSecTime'];
        }
        else{
            $subSecTime = $notfound;
        }
        if(array_key_exists('SubSecTimeOriginal',$exifInfo)){
            $subSecTimeOriginal = $exifInfo['SubSecTimeOriginal'];
        }
        else{
            $subSecTimeOriginal = $notfound;
        }
        if(array_key_exists('SubSecTimeDigitized',$exifInfo)){
            $subSecTimeDigitized = $exifInfo['SubSecTimeDigitized'];
        }
        else{
            $subSecTimeDigitized = $notfound;
        }
        if(array_key_exists('FlashPixVersion',$exifInfo)){
            $flashPixVersion = $exifInfo['FlashPixVersion'];
        }
        else{
            $flashPixVersion = $notfound;
        }
        if(array_key_exists('ColorSpace',$exifInfo)){
            $colorSpace = $exifInfo['ColorSpace'];
        }
        else{
            $colorSpace = $notfound;
        }
        if(array_key_exists('ExifImageWidth',$exifInfo)){
            $exifImageWidth = $exifInfo['ExifImageWidth'];
        }
        else{
            $exifImageWidth = $notfound;
        }
        if(array_key_exists('ExifImageLength', $exifInfo)){
            $exifImageLength = $exifInfo['ExifImageLength'];
        }
        else{
            $exifImageLength = $notfound;
        }
        if(array_key_exists('InteroperabilityOffset',$exifInfo)){
            $interoperabilityOffset = $exifInfo['InteroperabilityOffset'];
        }
        else{
            $interoperabilityOffset = $notfound;
        }
        if(array_key_exists('SensingMethod',$exifInfo)){
            $sensingMethod = $exifInfo['SensingMethod'];
        }
        else{
            $sensingMethod = $notfound;
        }
        if(array_key_exists('FileSource',$exifInfo)){
            $fileSource = $exifInfo['FileSource'];
        }
        else{
            $fileSource = $notfound;
        }
        if(array_key_exists('SceneType',$exifInfo)){
            $sceneType = $exifInfo['SceneType'];
        }
        else{
            $sceneType = $notfound;
        }
        if(array_key_exists('CFAPattern',$exifInfo)){
            $cFAPattern = $exifInfo['CFAPattern'];
        }
        else{
            $cFAPattern = $notfound['CFAPattern'];
        }
        if(array_key_exists('CustomRendered',$exifInfo)){
            $customRendered = $exifInfo['CustomRendered'];
        }
        else{
            $customRendered = $notfound;
        }
        if(array_key_exists('ExposureMode',$exifInfo)){
            $exposureMode = $exifInfo['ExposureMode'];
        }
        else{
            $exposureMode = $notfound;
        }
        if(array_key_exists('WhiteBalance',$exifInfo)){
            $whiteBalance = $exifInfo['WhiteBalance'];
        }
        else{
            $whiteBalance =  $notfound;
        }
        if(array_key_exists('DigitalZoomRatio',$exifInfo)){
            $digitalZoomRatio = $exifInfo['DigitalZoomRatio'];
        }
        else {
            $digitalZoomRatio = $exifInfo['DigitalZoomRatio'];
        }
        if(array_key_exists('FocalLengthIn35mmFilm',$exifInfo)){
            $focalLengthIn35mmFilm = $exifInfo['FocalLengthIn35mmFilm'];
        }
        else{
            $focalLengthIn35mmFilm = $notfound;
        }
        if(array_key_exists('SceneCaptureType',$exifInfo)){
            $sceneCaptureType = $exifInfo['SceneCaptureType'];
        }
        else{
            $sceneCaptureType = $notfound;
        }
        if(array_key_exists('GainControl',$exifInfo)){
            $gainControl = $exifInfo['GainControl'];
        }
        else{
            $gainControl = $notfound;
        }
        if(array_key_exists('Contrast',$exifInfo)){
            $contrast = $exifInfo['Contrast'];
        }
        else{
            $contrast = $notfound;
        }
        if(array_key_exists('Saturation',$exifInfo)){
            $saturation = $exifInfo['Saturation'];
        }
        else{
            $saturation = $notfound;
        }
        if(array_key_exists('Sharpness',$exifInfo)){
            $sharpness = $exifInfo['Sharpness'];
        }
        else{
            $sharpness = $notfound;
        }
        if(array_key_exists('SubjectDistanceRange',$exifInfo)){
            $subjectDistanceRange = $exifInfo['SubjectDistanceRange'];
        }
        else{
            $subjectDistanceRange = $notfound;
        }
        //Returns arrays
        $return = array();
        $return['ExposureTime'] = $exposureTime;
        $return['FNumber'] = $fNumber;
        $return['ExposureProgram'] = $exposureProgram;
        $return['ISOSpeedRatings'] = $iSOSpeedRatings;
        $return['ExifVersion'] = $exifVersion;
        $return['DateTimeOriginal'] = $dateTimeOriginal;
        $return['DateTimeDigitized'] = $dateTimeDigitized;
        $return['ComponentsConfiguration'] = $componentsConfiguration;
        $return['CompressedBitsPerPixel'] = $compressedBitsPerPixel;
        $return['ExposureBiasValue'] = $exposureBiasValue;
        $return['MaxApertureValue'] = $maxApertureValue;
        $return['MeteringMode'] = $meteringMode;
        $return['LightSource'] = $lightSource;
        $return['Flash'] = $flash;
        $return['FocalLength'] = $focalLength;
        $return['UserComment'] = $userComment;
        $return['SubSecTime'] = $subSecTime;
        $return['SubSecTimeOriginal'] = $subSecTimeOriginal;
        $return['SubSecTimeDigitized'] = $subSecTimeDigitized;
        $return['FlashPixVersion'] = $flashPixVersion;
        $return['ColorSpace'] = $colorSpace;
        $return['ExifImageWidth'] = $exifImageWidth;
        $return['ExifImageLength'] = $exifImageLength;
        $return['InteroperabilityOffset'] = $interoperabilityOffset;
        $return['SensingMethod'] = $sensingMethod;
        $return['FileSource'] = $fileSource;
        $return['SceneType'] = $sceneType;
        $return['CFAPattern'] = $cFAPattern;
        $return['CustomRendered'] = $customRendered;
        $return['ExposureMode'] = $exposureMode;
        $return['WhiteBalance'] = $whiteBalance;
        $return['DigitalZoomRatio'] = $digitalZoomRatio;
        $return['FocalLengthIn35mmFilm'] = $focalLengthIn35mmFilm;
        $return['SceneCaptureType'] = $sceneCaptureType;
        $return['GainControl'] = $gainControl;
        $return['Contrast'] = $contrast;
        $return['Saturation'] = $saturation;
        $return['Sharpness'] = $sharpness;
        $return['SubjectDistanceRange'] = $subjectDistanceRange;
        return $return;

    }
    else {
        echo "Bilde finnes ikke";
    }

}

$camera = cameraUsed($image);
$exifComputed = imageDetails($image);
$exifExifinfo = exifDetails($image);
if($camera != false && $exifComputed != false && $exifExifinfo != false) {
echo '<div style = "' . $divStyle . '">
    Info returned by <b>exif_read_data(' . $image . ', Exif-information)</b>
    <br /><br />
        <pre>';
print_r("----------------------------------------"."<br/>");
print_r("COMPUTED:" . "<br/>");
print_r("HTML: " . $exifComputed['html'] . "<br/>");
print_r("Height: " . $exifComputed['COMPUTED']['Height'] . "<br/>");
print_r("Width: " . $exifComputed['Width'] . "<br/>");
print_r("IsColor: " . $exifComputed['IsColor'] . "<br/>");
print_r("ByteOrderMotorola: " . $exifComputed['ByteOrderMotorola'] . "<br/>");
print_r("ApertureFNumber: " . $exifComputed['ApertureFNumber'] . "<br/>");

print_r("----------------------------------------"."<br/>");
print_r("IFD0:" . "<br/>");
print_r("Camera Used:" . $camera['Make'] . " Model:" . $camera['Model'] . "<br />");
print_r("Image orentation:" . $camera['Orientation'] . "<br/>");
print_r("XResotution:" . $camera['Xresolution'] . "<br/>");
print_r("YResotution:" . $camera['Yresolution'] . "<br/>");
print_r("ResolutionUnit:" . $camera['ResolutionUnit'] . "<br/>");
print_r("Software:" . $camera['Software'] . "<br/>");
print_r("DateTime:" . $camera['DateTime'] . "<br/>");
print_r("YCbCrPositioning:" . $camera['YCbCrPositioning'] . "<br/>");
print_r("Exif_IFD_Pointer:" . $camera['Exif_IFD_Pointer'] . "<br/>");

print_r("----------------------------------------"."<br/>");
print_r("EXIF-Info:" . "<br/>");
print_r("ExposureTime:" . $exifExifinfo['ExposureTime'] . "<br/>");
print_r("FNumber:" . $exifExifinfo['FNumber'] . "<br/>");
print_r("ExposureProgram:" . $exifExifinfo['ExposureProgram'] . "<br/>");
print_r("ISOSpeedRatings:" . $exifExifinfo['ISOSpeedRatings'] . "<br/>");
print_r("ExifVersion:".$exifExifinfo['ExifVersion']. "<br/>");
print_r("DateTimeOriginal:".$exifExifinfo['DateTimeOriginal']. "<br/>");
print_r("ExifVersion:".$exifExifinfo['ExifVersion']. "<br/>");
print_r("DateTimeOriginal:".$exifExifinfo['DateTimeOriginal']. "<br/>");
print_r("DateTimeDigitized:".$exifExifinfo['DateTimeDigitized']. "<br/>");
print_r("ComponentsConfiguration:".$exifExifinfo['ComponentsConfiguration']. "<br/>");
print_r("CompressedBitsPerPixel:".$exifExifinfo['CompressedBitsPerPixel']. "<br/>");
print_r("ExposureBiasValue:".$exifExifinfo['ExposureBiasValue']. "<br/>");
print_r("MaxApertureValue:".$exifExifinfo['MaxApertureValue']. "<br/>");
print_r("MeteringMode:".$exifExifinfo['MeteringMode']. "<br/>");
print_r("LightSource:".$exifExifinfo['LightSource']. "<br/>");
print_r("Flash:".$exifExifinfo['Flash']. "<br/>");
print_r("FocalLength:".$exifExifinfo['FocalLength']. "<br/>");
print_r("UserComment:".$exifExifinfo['UserComment']. "<br/>");
print_r("SubSecTime:".$exifExifinfo['SubSecTime']. "<br/>");
print_r("SubSecTimeOriginal:".$exifExifinfo['SubSecTimeOriginal']. "<br/>");
print_r("SubSecTimeDigitized:".$exifExifinfo['SubSecTimeDigitized']. "<br/>");
print_r("FlashPixVersion:".$exifExifinfo['FlashPixVersion']. "<br/>");
print_r("ColorSpace:".$exifExifinfo['ColorSpace']. "<br/>");
print_r("ExifImageWidth:".$exifExifinfo['ExifImageWidth']. "<br/>");
print_r("ExifImageLength:".$exifExifinfo['ExifImageLength']. "<br/>");
print_r("InteroperabilityOffset:".$exifExifinfo['InteroperabilityOffset']. "<br/>");
print_r("SensingMethod:".$exifExifinfo['SensingMethod']. "<br/>");
print_r("FileSource:".$exifExifinfo['FileSource']. "<br/>");
print_r("SceneType:".$exifExifinfo['SceneType']. "<br/>");
print_r("CFAPattern:".$exifExifinfo['CFAPattern']. "<br/>");
print_r("CustomRendered:".$exifExifinfo['CustomRendered']. "<br/>");
print_r("ExposureMode:".$exifExifinfo['ExposureMode']. "<br/>");
print_r("WhiteBalance:".$exifExifinfo['WhiteBalance']. "<br/>");
print_r("DigitalZoomRatio:".$exifExifinfo['DigitalZoomRatio']. "<br/>");
print_r("FocalLengthIn35mmFilm:".$exifExifinfo['FocalLengthIn35mmFilm']. "<br/>");
print_r("SceneCaptureType:".$exifExifinfo['SceneCaptureType']. "<br/>");
print_r("GainControl:".$exifExifinfo['GainControl']. "<br/>");
print_r("Contrast:".$exifExifinfo['Contrast']. "<br/>");
print_r("Saturation:".$exifExifinfo['Saturation']. "<br/>");
print_r("Sharpness:".$exifExifinfo['Sharpness']. "<br/>");
print_r("SubjectDistanceRange:".$exifExifinfo['SubjectDistanceRange']. "<br/>");

echo '</pre>
        </div>';
//echo "Camera Used:".$camera['Make'];
}

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


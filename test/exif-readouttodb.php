<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 01.03.2016
 * Time: 12:42
 */


$image = "IMG_3646.JPG";
$notfound = "null";

$divStyle = ' background-color:#E8E8E3;
            padding:10px;
            color:#000;
            font-size:16px;
            width:100%;
            overflow:hidden;';

function imageFile($image){
    if((isset($image)) and file_exists($image)){
        $exif_file = exif_read_data($image,'FILE',0);

        global $notfound;

        //FileName
        if(array_key_exists('FileName',$exif_file)){
            $filename = $exif_file['FileName'];
        }
        else{
            $filename = $notfound;
        }
        //FileDateTime
        if(array_key_exists('FileDatTime',$exif_file)){
            $filedatetime = $exif_file['FileDateTime'];
        }
        else{
            $filedatetime = $notfound;
        }
        //FileSize
        if(array_key_exists('FileSize',$exif_file)){
            $filesize = $exif_file['FileSize'];
        }
        else{
            $filesize = $notfound;
        }
        //FileType
        if(array_key_exists('FileType',$exif_file)){
            $filetype = $exif_file['FileType'];
        }
        else{
            $filetype = $notfound;
        }
        //MimeType
        if(array_key_exists('MimeType', $exif_file)){
            $minmetype = $exif_file['MimeType'];
        }
        else{
            $minmetype = $notfound;
        }

    }
    //Returns arrays -- se på udefined variabel
    $return = array();
    $return['FileName'] = $filename;
    $return['FileDateTime'] = $filedatetime;
    $return['FileSize'] = $filesize;
    $return['FileType'] = $filetype;
    $return['MimeType'] = $minmetype;
    return $return;
}

function cameraUsed($image)
{

    if ((isset($image)) and (file_exists($image))) {
        $exif_ifd0 = exif_read_data($image, 'IFD0', 0);

        global $notfound;

        //Make
        if (array_key_exists('Make', $exif_ifd0)) {
            $cammake = $exif_ifd0['Make'];
        } else {
            $cammake = $notfound;
        }
        //Model
        if (array_key_exists('Model', $exif_ifd0)) {
            $cammodel = $exif_ifd0['Model'];
        } else $cammodel = $notfound;
        //Orientation
        if (array_key_exists('Orientation', $exif_ifd0)) {
            $imgorentation = $exif_ifd0['Orientation'];
        } else $imgorentation = $notfound;
        //XResolution
        if (array_key_exists('XResolution', $exif_ifd0)) {
            $xresolution = $exif_ifd0['XResolution'];
        } else {
            $xresolution = $notfound;
        }
        //YResolution
        if (array_key_exists('YResolution', $exif_ifd0)) {
            $yresolution = $exif_ifd0['YResolution'];
        } else {
            $yresolution = $notfound;
        }
        //ResolutionUnit
        if (array_key_exists('ResolutionUnit', $exif_ifd0)) {
            $resolutionunit = $exif_ifd0['ResolutionUnit'];
        } else {
            $resolutionunit = $notfound;
        }
        //Software
        if (array_key_exists('Software', $exif_ifd0)) {
            $software = $exif_ifd0['Software'];
        } else {
            $software = $notfound;
        }
        //DateTime
        if (array_key_exists('DateTime', $exif_ifd0)) {
            $datetime = $exif_ifd0['DateTime'];
        } else {
            $datetime = $notfound;
        }
        //YCbCrPositioning
        if (array_key_exists('YCbCrPositioning', $exif_ifd0)) {
            $ycbcrpositioning = $exif_ifd0['YCbCrPositioning'];
        } else {
            $ycbcrpositioning = $notfound;
        }
        //Exif_IFD_Pointer
        if (array_key_exists('Exif_IFD_Pointer', $exif_ifd0)) {
            $exif_ifd_pointer = $exif_ifd0['Exif_IFD_Pointer'];
        } else {
            $exif_ifd_pointer = $notfound;
        }

        //Returns arrays
        $return = array();
        $return['Make'] = $cammake;
        $return['Model'] = $cammodel;
        $return['Orientation'] = $imgorentation;
        $return['Xresolution'] = $xresolution;
        $return['Yresolution'] = $yresolution;
        $return['ResolutionUnit'] = $resolutionunit;
        $return['Software'] = $software;
        $return['DateTime'] = $datetime;
        $return['YCbCrPositioning'] = $ycbcrpositioning;
        $return['Exif_IFD_Pointer'] = $exif_ifd_pointer;
        return $return;
    }
    else {
        echo "Bilde finnes ikke";
    }
}

function imageDetails($image)
{

    if ((isset($image)) and (file_exists($image))) {
        $exifcomputed = exif_read_data($image, 'IFD0', 0);
        global $notfound;

        if (array_key_exists('html', $exifcomputed['COMPUTED'])) {
            $html = $exifcomputed['COMPUTED']['html'];
        } else {
            $html = $notfound;
        }
        if (array_key_exists('Height', $exifcomputed['COMPUTED'])) {
            $height = $exifcomputed['COMPUTED']['Height'];
        } else {
            $height = $exifcomputed;
        }
        if (array_key_exists('Width', $exifcomputed['COMPUTED'])) {
            $width = $exifcomputed['COMPUTED']['Width'];
        } else {
            $width = $notfound;
        }
        if (array_key_exists('IsColor', $exifcomputed['COMPUTED'])) {
            $iscolor = $exifcomputed['COMPUTED']['IsColor'];
        } else {
            $iscolor = $notfound;
        }
        if (array_key_exists('ByteOrderMotorola', $exifcomputed['COMPUTED'])) {
            $byteordermotorola = $exifcomputed['COMPUTED']['ByteOrderMotorola'];
        } else {
            $byteordermotorola = $notfound;
        }
        if (array_key_exists('ApertureFNumber', $exifcomputed['COMPUTED'])) {
            $aperturefnumber = $exifcomputed['COMPUTED']['ApertureFNumber'];
        } else {
            $aperturefnumber = $notfound;
        }

        //Returns arrays
        $return = array();
        $return['html'] = $html;
        $return['COMPUTED']['Height'] = $height;
        $return['Width'] = $width;
        $return['IsColor'] = $iscolor;
        $return['ByteOrderMotorola'] = $byteordermotorola;
        $return['ApertureFNumber'] = $aperturefnumber;
        return $return;
    }
    else {
        echo "Bilde finnes ikke";
    }
}

function exifDetails($image)
{
    if ((isset($image)) and (file_exists($image))) {
        $exifinfo = exif_read_data($image, 'EXIF', 0);
        global $notfound;

        if (array_key_exists('ExposureTime', $exifinfo)) {
            $exposuretime = $exifinfo['ExposureTime'];
        } else {
            $exposuretime = $notfound;
        }
        if (array_key_exists('FNumber', $exifinfo)) {
            $fnumber = $exifinfo['FNumber'];
        } else {
            $fnumber = $notfound;
        }
        if (array_key_exists('ExposureProgram', $exifinfo)) {
            $exposureprogram = $exifinfo['ExposureProgram'];
        } else {
            $exposureprogram = $notfound;
        }
        if(array_key_exists('ISOSpeedRatings',$exifinfo)){
            $isospeedratings = $exifinfo['ISOSpeedRatings'];
        }
        else {
            $isospeedratings = $notfound;
        }
        if(array_key_exists('ExifVersion',$exifinfo)){
            $exifversion = $exifinfo['ExifVersion'];
        }
        else{
            $exifversion = $notfound;
        }
        if(array_key_exists('DateTimeOriginal',$exifinfo)){
            $datetimeoriginal = $exifinfo['DateTimeOriginal'];
        }
        else{
            $datetimeoriginal = $notfound;
        }
        if(array_key_exists('DateTimeDigitized',$exifinfo)){
            $datetimedigitized = $exifinfo['DateTimeDigitized'];
        }
        else{
            $datetimedigitized = $notfound;
        }
        if(array_key_exists('ComponentsConfiguration',$exifinfo)){
            $componentsconfiguration = $exifinfo['ComponentsConfiguration'];
        }
        else{
            $componentsconfiguration = $notfound;
        }
        if(array_key_exists('CompressedBitsPerPixel',$exifinfo)){
            $compressedbitsperpixel = $exifinfo['CompressedBitsPerPixel'];
        }
        else{
            $compressedbitsperpixel = $notfound;
        }
        if(array_key_exists('ExposureBiasValue',$exifinfo)){
            $exposurebiasvalue = $exifinfo['ExposureBiasValue'];
        }
        else{
            $exposurebiasvalue = $notfound;
        }
        if(array_key_exists('MaxApertureValue',$exifinfo)){
            $maxaperturevalue = $exifinfo['MaxApertureValue'];
        }
        else{
            $maxaperturevalue = $exifinfo;
        }
        if(array_key_exists('MeteringMode',$exifinfo)){
            $meteringmode = $exifinfo['MeteringMode'];
        }
        else{
            $meteringmode = $notfound;
        }
        if(array_key_exists('LightSource',$exifinfo)){
            $lightsource = $exifinfo['LightSource'];
        }
        else{
            $lightsource = $notfound;
        }
        if(array_key_exists('Flash',$exifinfo)){
            $flash = $exifinfo['Flash'];
        }
        else{
            $flash = $notfound;
        }
        if(array_key_exists('FocalLength',$exifinfo)){
            $focallength = $exifinfo['FocalLength'];
        }
        else{
            $focallength = $notfound;
        }
        if(array_key_exists('UserComment',$exifinfo)){
            $usercomment = $exifinfo['UserComment'];
        }
        else{
            $usercomment = $notfound;
        }
        if(array_key_exists('SubSecTime',$exifinfo)){
            $subsectime = $exifinfo['SubSecTime'];
        }
        else{
            $subsectime = $notfound;
        }
        if(array_key_exists('SubSecTimeOriginal',$exifinfo)){
            $subsectimeoriginal = $exifinfo['SubSecTimeOriginal'];
        }
        else{
            $subsectimeoriginal = $notfound;
        }
        if(array_key_exists('SubSecTimeDigitized',$exifinfo)){
            $subsectimedigitized = $exifinfo['SubSecTimeDigitized'];
        }
        else{
            $subsectimedigitized = $notfound;
        }
        if(array_key_exists('FlashPixVersion',$exifinfo)){
            $flashpixversion = $exifinfo['FlashPixVersion'];
        }
        else{
            $flashpixversion = $notfound;
        }
        if(array_key_exists('ColorSpace',$exifinfo)){
            $colorspace = $exifinfo['ColorSpace'];
        }
        else{
            $colorspace = $notfound;
        }
        if(array_key_exists('ExifImageWidth',$exifinfo)){
            $exifimagewidth = $exifinfo['ExifImageWidth'];
        }
        else{
            $exifimagewidth = $notfound;
        }
        if(array_key_exists('ExifImageLength', $exifinfo)){
            $exifimagelength = $exifinfo['ExifImageLength'];
        }
        else{
            $exifimagelength = $notfound;
        }
        if(array_key_exists('InteroperabilityOffset',$exifinfo)){
            $interoperabilityoffset = $exifinfo['InteroperabilityOffset'];
        }
        else{
            $interoperabilityoffset = $notfound;
        }
        if(array_key_exists('SensingMethod',$exifinfo)){
            $sensingmethod = $exifinfo['SensingMethod'];
        }
        else{
            $sensingmethod = $notfound;
        }
        if(array_key_exists('FileSource',$exifinfo)){
            $filesource = $exifinfo['FileSource'];
        }
        else{
            $filesource = $notfound;
        }
        if(array_key_exists('SceneType',$exifinfo)){
            $scenetype = $exifinfo['SceneType'];
        }
        else{
            $scenetype = $notfound;
        }
        if(array_key_exists('CFAPattern',$exifinfo)){
            $cFAPattern = $exifinfo['CFAPattern'];
        }
        else{
            $cFAPattern = $notfound['CFAPattern'];
        }
        if(array_key_exists('CustomRendered',$exifinfo)){
            $customrendered = $exifinfo['CustomRendered'];
        }
        else{
            $customrendered = $notfound;
        }
        if(array_key_exists('ExposureMode',$exifinfo)){
            $exposuremode = $exifinfo['ExposureMode'];
        }
        else{
            $exposuremode = $notfound;
        }
        if(array_key_exists('WhiteBalance',$exifinfo)){
            $whitebalance = $exifinfo['WhiteBalance'];
        }
        else{
            $whitebalance =  $notfound;
        }
        if(array_key_exists('DigitalZoomRatio',$exifinfo)){
            $digitalzoomratio = $exifinfo['DigitalZoomRatio'];
        }
        else {
            $digitalzoomratio = $exifinfo['DigitalZoomRatio'];
        }
        if(array_key_exists('FocalLengthIn35mmFilm',$exifinfo)){
            $focallengthin35mmfilm = $exifinfo['FocalLengthIn35mmFilm'];
        }
        else{
            $focallengthin35mmfilm = $notfound;
        }
        if(array_key_exists('SceneCaptureType',$exifinfo)){
            $scenecapturetype = $exifinfo['SceneCaptureType'];
        }
        else{
            $scenecapturetype = $notfound;
        }
        if(array_key_exists('GainControl',$exifinfo)){
            $gaincontrol = $exifinfo['GainControl'];
        }
        else{
            $gaincontrol = $notfound;
        }
        if(array_key_exists('Contrast',$exifinfo)){
            $contrast = $exifinfo['Contrast'];
        }
        else{
            $contrast = $notfound;
        }
        if(array_key_exists('Saturation',$exifinfo)){
            $saturation = $exifinfo['Saturation'];
        }
        else{
            $saturation = $notfound;
        }
        if(array_key_exists('Sharpness',$exifinfo)){
            $sharpness = $exifinfo['Sharpness'];
        }
        else{
            $sharpness = $notfound;
        }
        if(array_key_exists('SubjectDistanceRange',$exifinfo)){
            $subjectdistancerange = $exifinfo['SubjectDistanceRange'];
        }
        else{
            $subjectdistancerange = $notfound;
        }
        //Returns arrays
        $return = array();
        $return['ExposureTime'] = $exposuretime;
        $return['FNumber'] = $fnumber;
        $return['ExposureProgram'] = $exposureprogram;
        $return['ISOSpeedRatings'] = $isospeedratings;
        $return['ExifVersion'] = $exifversion;
        $return['DateTimeOriginal'] = $datetimeoriginal;
        $return['DateTimeDigitized'] = $datetimedigitized;
        $return['ComponentsConfiguration'] = $componentsconfiguration;
        $return['CompressedBitsPerPixel'] = $compressedbitsperpixel;
        $return['ExposureBiasValue'] = $exposurebiasvalue;
        $return['MaxApertureValue'] = $maxaperturevalue;
        $return['MeteringMode'] = $meteringmode;
        $return['LightSource'] = $lightsource;
        $return['Flash'] = $flash;
        $return['FocalLength'] = $focallength;
        $return['UserComment'] = $usercomment;
        $return['SubSecTime'] = $subsectime;
        $return['SubSecTimeOriginal'] = $subsectimeoriginal;
        $return['SubSecTimeDigitized'] = $subsectimedigitized;
        $return['FlashPixVersion'] = $flashpixversion;
        $return['ColorSpace'] = $colorspace;
        $return['ExifImageWidth'] = $exifimagewidth;
        $return['ExifImageLength'] = $exifimagelength;
        $return['InteroperabilityOffset'] = $interoperabilityoffset;
        $return['SensingMethod'] = $sensingmethod;
        $return['FileSource'] = $filesource;
        $return['SceneType'] = $scenetype;
        $return['CFAPattern'] = $cFAPattern;
        $return['CustomRendered'] = $customrendered;
        $return['ExposureMode'] = $exposuremode;
        $return['WhiteBalance'] = $whitebalance;
        $return['DigitalZoomRatio'] = $digitalzoomratio;
        $return['FocalLengthIn35mmFilm'] = $focallengthin35mmfilm;
        $return['SceneCaptureType'] = $scenecapturetype;
        $return['GainControl'] = $gaincontrol;
        $return['Contrast'] = $contrast;
        $return['Saturation'] = $saturation;
        $return['Sharpness'] = $sharpness;
        $return['SubjectDistanceRange'] = $subjectdistancerange;
        return $return;

    }
    else {
        echo "Bilde finnes ikke";
    }

}

$exiffile = imageFile($image);
$camera = cameraUsed($image);
$exifcomputed = imageDetails($image);
$exifexifinfo = exifDetails($image);
if($camera != false && $exifcomputed != false && $exifexifinfo != false) {
echo '<div style = "' . $divStyle . '">
    Info returned by <b>exif_read_data(' . $image . ', Exif-information)</b>
    <br /><br />
        <pre>';

print_r("----------------------------------------"."<br/>");
print_r("FILE:" . "<br/>");
print_r("FileName: ".$exiffile['FileName']."<br/>");
print_r("FileDateTime: ".$exiffile['FileDateTime']."<br/>");
print_r("FileSize: ".$exiffile['FileSize']."<br/>");
print_r("FileType: ".$exiffile['FileType']."<br/>");
print_r("MimeType: ".$exiffile['MimeType']."<br/>");

print_r("----------------------------------------"."<br/>");
print_r("COMPUTED:" . "<br/>");
print_r("HTML: " . $exifcomputed['html'] . "<br/>");
print_r("Height: " . $exifcomputed['COMPUTED']['Height'] . "<br/>");
print_r("Width: " . $exifcomputed['Width'] . "<br/>");
print_r("IsColor: " . $exifcomputed['IsColor'] . "<br/>");
print_r("ByteOrderMotorola: " . $exifcomputed['ByteOrderMotorola'] . "<br/>");
print_r("ApertureFNumber: " . $exifcomputed['ApertureFNumber'] . "<br/>");

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
print_r("ExposureTime:" . $exifexifinfo['ExposureTime'] . "<br/>");
print_r("FNumber:" . $exifexifinfo['FNumber'] . "<br/>");
print_r("ExposureProgram:" . $exifexifinfo['ExposureProgram'] . "<br/>");
print_r("ISOSpeedRatings:" . $exifexifinfo['ISOSpeedRatings'] . "<br/>");
print_r("ExifVersion:".$exifexifinfo['ExifVersion']. "<br/>");
print_r("DateTimeOriginal:".$exifexifinfo['DateTimeOriginal']. "<br/>");
print_r("ExifVersion:".$exifexifinfo['ExifVersion']. "<br/>");
print_r("DateTimeOriginal:".$exifexifinfo['DateTimeOriginal']. "<br/>");
print_r("DateTimeDigitized:".$exifexifinfo['DateTimeDigitized']. "<br/>");
print_r("ComponentsConfiguration:".$exifexifinfo['ComponentsConfiguration']. "<br/>");
print_r("CompressedBitsPerPixel:".$exifexifinfo['CompressedBitsPerPixel']. "<br/>");
print_r("ExposureBiasValue:".$exifexifinfo['ExposureBiasValue']. "<br/>");
print_r("MaxApertureValue:".$exifexifinfo['MaxApertureValue']. "<br/>");
print_r("MeteringMode:".$exifexifinfo['MeteringMode']. "<br/>");
print_r("LightSource:".$exifexifinfo['LightSource']. "<br/>");
print_r("Flash:".$exifexifinfo['Flash']. "<br/>");
print_r("FocalLength:".$exifexifinfo['FocalLength']. "<br/>");
print_r("UserComment:".$exifexifinfo['UserComment']. "<br/>");
print_r("SubSecTime:".$exifexifinfo['SubSecTime']. "<br/>");
print_r("SubSecTimeOriginal:".$exifexifinfo['SubSecTimeOriginal']. "<br/>");
print_r("SubSecTimeDigitized:".$exifexifinfo['SubSecTimeDigitized']. "<br/>");
print_r("FlashPixVersion:".$exifexifinfo['FlashPixVersion']. "<br/>");
print_r("ColorSpace:".$exifexifinfo['ColorSpace']. "<br/>");
print_r("ExifImageWidth:".$exifexifinfo['ExifImageWidth']. "<br/>");
print_r("ExifImageLength:".$exifexifinfo['ExifImageLength']. "<br/>");
print_r("InteroperabilityOffset:".$exifexifinfo['InteroperabilityOffset']. "<br/>");
print_r("SensingMethod:".$exifexifinfo['SensingMethod']. "<br/>");
print_r("FileSource:".$exifexifinfo['FileSource']. "<br/>");
print_r("SceneType:".$exifexifinfo['SceneType']. "<br/>");
print_r("CFAPattern:".$exifexifinfo['CFAPattern']. "<br/>");
print_r("CustomRendered:".$exifexifinfo['CustomRendered']. "<br/>");
print_r("ExposureMode:".$exifexifinfo['ExposureMode']. "<br/>");
print_r("WhiteBalance:".$exifexifinfo['WhiteBalance']. "<br/>");
print_r("DigitalZoomRatio:".$exifexifinfo['DigitalZoomRatio']. "<br/>");
print_r("FocalLengthIn35mmFilm:".$exifexifinfo['FocalLengthIn35mmFilm']. "<br/>");
print_r("SceneCaptureType:".$exifexifinfo['SceneCaptureType']. "<br/>");
print_r("GainControl:".$exifexifinfo['GainControl']. "<br/>");
print_r("Contrast:".$exifexifinfo['Contrast']. "<br/>");
print_r("Saturation:".$exifexifinfo['Saturation']. "<br/>");
print_r("Sharpness:".$exifexifinfo['Sharpness']. "<br/>");
print_r("SubjectDistanceRange:".$exifexifinfo['SubjectDistanceRange']. "<br/>");

echo '</pre>
        </div>';
//echo "Camera Used:".$camera['Make'];
}

?>




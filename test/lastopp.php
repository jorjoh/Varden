<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 01.03.2016
 * Time: 12:42
 */


$image = "IMG_3646.JPG";

    /*$exif = exif_read_data($image, IFD0, true);
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
        $exif_ifd0 = read_exif_data($image,'IFD0',0);
        $exif_exif = read_exif_data($image,'EXIF',0);


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

    //Returns arrays
    $return = array();
    $return['Make'] = $camMake;
    $return['Model'] = $camModel;
    return $return;
}

$camera = cameraUsed($image);
echo '<div style = "' . $divStyle . '">
    Info returned by <b>exif_read_data('.$image.', Exif-information)</b>
    <br /><br />
        <pre>';
print_r("Camera Used:".$camera['Make'] . " " .$camera['Model']);
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


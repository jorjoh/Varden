<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 07.03.2016
 * Time: 09:57
 */
//$cur_image = $cur_image;
echo "Bilde ligger i mappen :".$cur_image."<br/>";
$divStyle = 'background-color:#E8E8E3;
            padding:10px;
            color:#000;
            font-size:16px;
            width:100%;
            overflow:hidden;';
$image = "IMG_3646.JPG";

echo "test1.jpg:<br />\n";
$exif = exif_read_data($cur_image, 'IFD0');
echo $exif===false ? "No header data found.<br />\n" : "Image contains headers<br />\n";



echo "test1.jpg:<br />\n";
function readoutexifinfo($cur_image){
    $exif = exif_read_data($cur_image, 0, true);
    foreach ($exif as $key => $section) {   // $key IFD0; COMPUTED, ANY TAG, EXIF etc.
        foreach ($section as $name => $val) {
            if($key == "ANY_TAG"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
            if($key == "FILE"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
            if($key == "COMPUTED"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
            if($key == "IFD0"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
            if($key == "EXIF"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
            if($key == "INTEROP"){
                echo $key.':'.$name.': '.$val."<br/>";
            }
        }
    }
    echo "Camera maker: ".$exif['IFD0']['maker'];
}

echo '<div style = "' . $divStyle . '">
    Info returned by <b>exif_read_data(' . $cur_image . ', Exif-information)</b>
    <br /><br />
        <pre>';
readoutexifinfo($cur_image);
//echo "Camera maker: ".$exif['IFD0']['make'];


echo '</pre>
        </div>';

//echo "$key.$name: $val<br />\n";
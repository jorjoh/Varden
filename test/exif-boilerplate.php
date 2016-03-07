<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 07.03.2016
 * Time: 09:57
 */
$image = "DSC_8962.JPG";

$exif = exif_read_data($image, IFD0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val\n";
        echo "<br/>";

    }
}
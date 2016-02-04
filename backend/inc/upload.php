<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 02.02.2016
 * Time: 09:46
 */
if($_POST['image_form_submit'] == 1) {
    $images_arr = array();

    /*
    foreach ($_FILES['images']['name'] as $key => $val) {
        //upload and stored images
        $target_dir = "C:/wamp/www/Varden/backend/inc/uploads/";
        $target_file = $target_dir . $_FILES['images']['name'][$key];
        if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
            $images_arr[] = $target_file;
        }
    }
    */

    /* Hvis bildene skal vises men ikke lastes opp*/

    $images_arr = array();
    foreach ($_FILES['images']['name'] as $key => $val) {
        //Viser bilder uten å lagre dem --->
        $extra_info = getimagesize($_FILES['images']['tmp_name'][$key]);
        $images_arr[] = "data:" . $extra_info["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['images']['tmp_name'][$key]));
    }


    {
        if (!empty($images_arr)) {
            //echo ("Dette er images_arr" + $images_arr);
            $count = 0;
            foreach ($images_arr as $image_src) {
                $count++ ?>
                <ul class="">
                <li id="image_li_<?php echo $count;
            } ?>" class="">
            <a href="javascript:void(0);" style="float:none;" class=""><img src="<?php echo $image_src; ?>" alt=""></a>
            </li>
            </ul>
            <?php

        }
        echo("Antall bilder lastet opp:" . $count);

    }
}
function countPicture($conut)
{
    echo $conut;
}

?>


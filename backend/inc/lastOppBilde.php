<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 02.02.2016
 * Time: 08:51
 */

?>
<script type="text/javascript" src="script/backgroundResources/jquery.min.js"></script>
<script type="text/javascript" src="script/backgroundResources/jquery.form.js"></script>
<script type="text/javascript"src="script/uplodedImages.js"></script>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-5">
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="inc/upload.php">
            <input type="hidden" name="image_form_submit" value="1">
            <label>Choose Image</label>
            <input type="file" name="images[]" id="images" multiple >
            <div class="uploading none">
                <label>&nbsp;</label>
                <img src="inc/uploading.gif" alt="uploading......"/>
            </div>
        </form>
        <div id="images_preview">Her kommer bilder</div>
    </div>
</div>

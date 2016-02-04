<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 02.02.2016
 * Time: 08:51
 */
include "/functions/datePicker.php";
include "inc/upload.php";
?>
<script type="text/javascript" src="script/backgroundResources/jquery.min.js"></script>
<script type="text/javascript" src="script/backgroundResources/jquery.form.js"></script>
<script type="text/javascript"src="script/uplodedImages.js"></script>

<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-5">
        <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="inc/upload.php">
            <input type="hidden" name="image_form_submit" value="1">
            <label>Choose Image</label>

            <div class="image-upload">
                <label for="images">
                    <img src="http://goo.gl/pB9rpQ"/>
                </label>
                <input type="file" name="images[]" id="images" style="border: dashed 5px; 10px; height: 200px; width: 300px; text-align: center;" multiple>
            </div>

            <div class="uploading none">
                <label>&nbsp;</label>
                <img src="inc/uploading.gif" alt="uploading......"/>
            </div>
        </form>

    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php for($i=0; $i<5; $i++){
          ?>  <table>
            <tr>
                <th>Bilde</th>
                <th>Tittel</th>
                <th>Fotograf</th>
                <th>Dato</th>
                <th>Sted</th>
            </tr>
            <tr>
                <td><div id="images_preview" style="width: 30px; height: 30px;"></div></td>
                <td>Fint bilde</td>
                <td> Erik</td>
                <td><?php getdateTime(); ?></td>
                <td>Borre,Horten</td>
            </tr>
        </table> <?php
        } ?>



    </div>
    <input type="button" name="avbryt" id="avbryt" value="Avbryt" style="padding: 5px 5px; border-radius: 10px"/>
    <input type="button" name="godkjenn" id="godkjenn" value="Godkjenn" style="padding: 5px 5px; border-radius: 10px"/>
</div>

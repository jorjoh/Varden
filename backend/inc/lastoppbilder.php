<?php
    if(empty($_GET["action"])) {
        include('action/upload.php');
    }
    else {
        include('action/pictureinfo.php');
    }
?>
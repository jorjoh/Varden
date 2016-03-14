<?php
    $title = $_POST["picturetitle"];
    $photographer = $_POST["photographer"];
    $picturetext = $_POST["description"];

    if(isset($_POST["submit"])) {
        echo "Title = $title<br>";
        echo "Photographer = $photographer<br>";
        echo "Picturetext = $picturetext<br>";
        echo "Samme fotograf = $photographer<br>";
    }
?>
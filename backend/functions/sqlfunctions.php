<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */

function insert($dbconnect, $image) {
    $targetDir = '../inc/uploads/';
    $fileName = $_FILES['file']['name'];
    $targetfile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
        //insert file information into db table
        $sqlSetning = ("INSERT INTO images (filename, picturetext) VALUES ('".$fileName . "','". 'testdescription' ."')") or die("Bilde er sendt inn!");
        mysqli_query($dbconnect, $sqlSetning) or die(mysqli_errno($dbconnect));
        mysqli_close($dbconnect);
        echo "tilkobling fungerer hurra";
    }
}

function update($image) {

}

function delete($image) {

}

?>
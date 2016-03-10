<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */

function select($dbconnect, $table, $columns) {

}

function insert($table, $dbconnect, $columns) {
    for($i = 0; $i < count($columns); $i++) {
        echo "Column = ".$columns[$i]."<br>";
    }

    $targetDir = '../inc/uploads/';
    $fileName = $_FILES['file']['name'];
    $targetfile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
        //insert file information into db table
        $sqlSetning = ("INSERT INTO $table (filename, picturetext) VALUES ('".$fileName . "','". 'testdescription' ."')") or die("Bilde er sendt inn!");
        mysqli_query($dbconnect, $sqlSetning) or die(mysqli_errno($dbconnect));
        mysqli_close($dbconnect);
        echo "tilkobling fungerer hurra";
    }

}

function update($dbconnect, $table) {

}

function delete($dbconnect, $table) {

}

?>
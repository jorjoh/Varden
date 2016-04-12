<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */
include ("dbcon.php");
function select($connect, $table, $columnsArray) {

}

function insert($connect, $table, $insertData) {

    $columns = implode(", ",array_keys($insertData));
    $escaped_values = array_map(array($connect, 'real_escape_string'), array_values($insertData));
    $values  = "'" . implode("', '", array_values($escaped_values)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values);";
    echo "<br/>$sql"."<br/>";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));
    echo "<br/> Vellykket <br/>";
    
/*    $targetDir = '../inc/uploads/';
    $fileName = $_FILES['file']['name'];
    $targetfile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
        //insert file information into db table
        $sqlSetning = ("INSERT INTO $table (filename, picturetext) VALUES ('".$fileName . "','". 'testdescription' ."')") or die("Bilde er sendt inn!");
        mysqli_query($dbconnect, $sqlSetning) or die(mysqli_errno($dbconnect));
        mysqli_close($dbconnect);
        echo "tilkobling fungerer hurra";
    }
*/

}

function update($connect, $table, $columnsArray) {

}

function delete($connect, $table, $columnsArray) {

}

?>
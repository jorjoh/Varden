<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */

function select($dbconnect, $table, $columnsArray) {

}

function insert($dbconnect, $table, $valueArray) {

    $columnsql = "DESCRIBE $table";
    $columnsquery = mysqli_query($dbconnect, $columnsql);
    $columns = mysqli_num_rows($columnsquery);
    if($columns < 1) {
        echo "Tabellen $table har ingen kolonner";
    }
    else {
        for($i = 0; $i < $columns; $i++) {
            $columnName = mysqli_fetch_array($columnsquery);
            echo $columnName['Field']."<br>";
        }
    }
    //$sql = "INSERT INTO '$table' ($columnsArray) VALUES ($valueArray);";


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

function update($dbconnect, $table, $columnsArray) {

}

function delete($dbconnect, $table, $columnsArray) {

}

?>
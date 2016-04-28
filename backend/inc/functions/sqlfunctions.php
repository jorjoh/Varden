<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */
include ("dbcon.php");
function select($dbconnect, $table, $columnsArray) {

}

function insert($dbconnect, $table, $insertData) { //Dynamisk insert funksjon - setter inn med hensyn på hvilken tabell og verdi som skal inn i databasen
    $columns = implode(", ",array_keys($insertData));
    $escaped_values = array_map(array($dbconnect, 'real_escape_string'), array_values($insertData));
    $values  = "'" . implode("', '", array_values($escaped_values)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values);";
    echo "<br/>$sql"."<br/>";
    mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect));
    echo "<br/> Vellykket <br/>";

}

function update($dbconnect, $table, $columnsArray) {

}

function delete($dbconnect, $table, $columnsArray) {

}

?>
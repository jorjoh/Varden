<?php

$host = "localhost";
$db = "varden";
$user = "root";
$password = "0DfTAZ";

$connect = mysqli_connect($host,$user,$password,$db) or die("Fikk ikke tilkobling til databasen!!");

mysqli_set_charset($connect, "utf8");

?>

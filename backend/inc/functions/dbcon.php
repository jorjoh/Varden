<?php

$host = "mysqldb";
$db = "varden";
$user = "root";
$password = "password";

$connect = mysqli_connect($host,$user,$password,$db) or die("Fikk ikke tilkobling til databasen!!");

mysqli_set_charset($connect, "utf8");

?>

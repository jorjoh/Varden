<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 10.03.2016
 * Time: 10:26
 */

$host = getenv("DBHOST") || "localhost";
$db = getenv("DB") || "varden";
$user = getenv("DBUSER") || "root";
$password = getenv("DBPASS") || "0DfTAZ";

echo $connect;
$connect = mysqli_connect($host,$user,$password,$db) or die("Fikk ikke tilkobling til databasen!!" + mysqli_error());

mysqli_set_charset($connect, "utf8");

?>

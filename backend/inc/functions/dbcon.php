<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 10.03.2016
 * Time: 10:26
 */

$host = "localhost";
$db = "varden";
$user = "root";
$password = "0DfTAZ";

$connect = mysqli_connect($host,$user,$password,$db) or die("Fikk ikke tilkobling til databasen!!");
mysqli_set_charset($connect, "UTF-8");

?>
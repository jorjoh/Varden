<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 10.03.2016
 * Time: 10:26
 */

$host = "localhost";
$db = "mysqldb";
$user = "root";
$password = "password";

$connect = mysqli_connect($host,$user,$password,$db) or die("Fikk ikke tilkobling til databasen!!");

mysqli_set_charset($connect, "utf8");

?>

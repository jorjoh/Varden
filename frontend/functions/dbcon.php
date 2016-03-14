<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/10/2016
 * Time: 7:43 PM
 */

    $host = "test";
    $user = "test";
    $pass = "test";
    $database = "test";

    $connect = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_errno());
?>
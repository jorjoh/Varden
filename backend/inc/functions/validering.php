<?php
//Gyldige filformater på bildene som lastes opp. Brukes til validering ved opplasting av bilder
/*$validImageType = array(
    "IMAGETYPE_GIF",
    "IMAGETYPE_JPEG",
    "IMAGETYPE_PNG",
    "IMAGETYPE_PSD",
    "IMAGETYPE_BMP",
);
*/

function validatelogon($username, $pass){
    include_once ("dbcon.php");

    $sql ="SELECT username, password FROM user WHERE username = '$username';";
    $result = mysqli_query($connect, $sql) or die("Fant ikke bruker");
    $row = mysqli_fetch_array($result);
  
    if (mysqli_num_rows($result) < 1){
        return false;
    }
    else if(empty($pass)){
            return false;
    }
    else{
        if($pass == $row['password'] ){
            return true;
        }
    }

    return null;
}
?>
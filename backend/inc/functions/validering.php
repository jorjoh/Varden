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
include_once ("dbcon.php");

function validatelogon($username, $password){
  $sql ="SELECT username, password FORM user WHERE username = '$username';";
  $result = mysqli_query($connect, $sql) or die("Fant ikke bruker");
  $row= mysqli_fetch_array($result);
  
  if (mysqli_num_rows($result) < 1){
      return false;
  }
    else{
        if(empty($password)){
            return false;
        }
        else{
            if($password == $row['password'] ){
                return true;
            }
        }
    }

}
?>
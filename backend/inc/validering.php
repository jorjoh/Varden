<html>
<head>

</head>
<body>

<form action="" id="sqlform" name="sqlform" method="post">
    <input type="submit" name="execute" id="execute" value="Push me!"/>

</form>

</body>
</html>

<?php

$execute = $_POST["execute"];

//Gyldige filformater på bildene som lastes opp. Brukes til validering ved opplasting av bilder
/*$validImageType = array(
    "IMAGETYPE_GIF",
    "IMAGETYPE_JPEG",
    "IMAGETYPE_PNG",
    "IMAGETYPE_PSD",
    "IMAGETYPE_BMP",
);*/

include('../functions/dbcon.php');
include('functions/sqlfunctions.php');

$table = "images";
$columns = array("filename", "picturetext", "thumb_w", "thumb_h", "place_id", "url");
$values = array("test.jpg", "bilde her er tøft", 120, 120, 1141, "http://bilder2.varden.no/img/test.jpg");

// insert($connect, $table, $columns, $values);

//$sql = 'insert($connect,$table,$columns,$values)';
// mysqli_query($connect,$sql);
//echo $sql;

// ------------------------------
// Jeg synes nå dette var en grei nok løsning. Uten at jeg har kikket driit mye på det må det vel gå an å bruke de arrayene også
//-------------------------------
if ($execute) {
    if ($connect->connect_error) {
        die("Connection failed");
    } else {
        $stmt = $connect->prepare("INSERT INTO images (filename,picturetext,thumb_w, thumb_h,place_id,url) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssiiis", $filename, $picturetext, $thumb_w, $thumb_h, $place_id, $url);


        //Definer parametere
        $filename = 'filename5';
        $picturetext = 'picturetexttilbilde4';
        $thumb_w = 120;
        $thumb_h = 120;
        $place_id = 1146;
        $url = 'http://bilder2.varden.no/img/test.jpg';

       // echo $filename, $picturetext, $thumb_w, $thumb_h, $place_id, $url;

        //'Henretter'(kjører) SQL-spørringen
        $stmt->execute();
        // Gir passende 'sucsess'-melding
        echo "New parameters created";

        // Stenger spørringen
        $stmt->close();
        // Stenger databasetilkoblingen
        $connect->close();
    }
}







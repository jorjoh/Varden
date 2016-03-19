<?php
//Gyldige filformater på bildene som lastes opp. Brukes til validering ved opplasting av bilder
/*$validImageType = array(
    "IMAGETYPE_GIF",
    "IMAGETYPE_JPEG",
    "IMAGETYPE_PNG",
    "IMAGETYPE_PSD",
    "IMAGETYPE_BMP",
);*/


include('sqlfunctions.php');

$table = 'images';
$filename = "jorgenstest.jpg";
$picturetext = "JØRGEN ER BEST";
$url = "http://bilder.varden.no/bilder/jorgenerbest.jpg";

$insData = array(
    'filename' => $filename,
    'picturetext' => $picturetext,
    'url' => $url,

);

insert($connect, $table, $insData);

//$sql = 'insert($connect,$table,$columns,$values)';
// mysqli_query($connect,$sql);
//echo $sql;

// ------------------------------
// Jeg synes nå dette var en grei nok løsning. Uten at jeg har kikket driit mye på det må det vel gå an å bruke de arrayene også
//-------------------------------
/*if ($execute) {
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
}*/
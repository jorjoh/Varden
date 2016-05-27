<?php
    $sqlexitingpicture = "SELECT title, picturetext FROM images WHERE id = $id;";
    $sqlrequesttext = "SELECT requesttext FROM request WHERE id = $id";
    //Slutt på SQL-spørringer
    $queryforexistingpicturetext = mysqli_query($connect, $sqlexitingpicture);
    $queryforrequestpicturetext = mysqli_query($connect, $sqlrequesttext);

    if(mysqli_num_rows($queryforexistingpicturetext) < 1) {
        header("Location: ?side=endrebilder");
    }

    else {
        /*IMAGES-tabellen*/
        $rowforexistingpicture = mysqli_fetch_array($queryforexistingpicturetext);
        $tittel = $rowforexistingpicture['title'];
        $picturetext= $rowforexistingpicture['picturetext'];
        /*IMAGES-tabellen-slutt*/

        /*REQUEST-tabellen*/
        $rowforrequestpicturetext = mysqli_fetch_array($queryforrequestpicturetext);
        $picturetextformrequest = $rowforrequestpicturetext['requesttext'];
        /*Slutt på REQUEST-tabellen*/


    echo "
        <h2>Endre bildetekst eller tittel til bilde id: $id</h2>
        
        <form method='post' action='' name='requestpicturetextchange' id='requestpicturetextchange'>
            <textarea>$tittel</textarea><br>
            <textarea style='height: 200px; width: 450px;' name='forcededit'>$picturetext</textarea><br>
            <input type='submit' id='submit' name='submit' value='Lagre endringer' class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored'>
        </form>
        
        ";
    }

    $sqlrequesttable = "SELECT image_id, requesttext, processed FROM request WHERE image_id = $id AND processed = 0;";    // velger alt fra tabellen images
    $sqlrequestresult = mysqli_query($connect, $sqlrequesttable) or die ("Ikke mulig å hente data");
    $numberofrows = mysqli_num_rows($sqlrequestresult);

    if(mysqli_num_rows($sqlrequestresult) > 0){
        include_once ("forslagbildetekst.php");
    }
    else{
        echo "<br><div style='background: #c0c0c0; padding: 20px; border-radius: 5px; width: 500px; height: 60px; font-size: 16pt; text-align: center;'>Ingen forslag til dette bilde!<br></div>";
    }


if(isset($_POST["submit"])){
    $changedtext= $_POST['forcededit'];
    $updaterows = "UPDATE images SET picturetext = '$changedtext' WHERE id = $id";
    $setstatusprossed = "UPDATE request SET processed = 1 WHERE image_id = $id";
    echo $updaterows."<br>";
    echo $setstatusprossed."<br>";
    mysqli_query($connect,$updaterows) or die ("Fikk ikke kontakt med databasen, bildetekst ikke oppdatert");
    mysqli_query($connect,$setstatusprossed) or die ("Fikk ikke kontakt med databasen, processed ikke endret ".mysqli_errno($connect));
}

?>
<?php
    $sqlexitingpicture = "SELECT * FROM images WHERE id = $id;";
    $sqlrequesttext = "SELECT * FROM request WHERE id = $id";
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
            <textarea style='height: 200px; width: 450px;' readonly>$picturetext</textarea><br>
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
        echo "Ingen forslag motatt!, kom tilbake senere";
    }
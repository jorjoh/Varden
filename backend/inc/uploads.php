<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $uploaddir = '../../frontend/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    $cur_image = $uploadfile;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        include("exif-infofrompicture.php");

        //Viser url-stien til det aktuelle bilde
        $urlforimage = "varden/" . $uploadfile;

        $beskrivelse = $_POST['beskrivelse'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $filename = basename($_FILES['file']['name']);
        $curtime = new DateTime();

        echo("Tittel er: " . $title . "<br/>");
        echo("Beskrivelse er: " . $beskrivelse . "<br/>");
        echo("Kategori er: " . $category . "<br/>");
        echo("URL for bilde er: <a href = '$urlforimage'> Trykk her for å se bilde </a><br/>");

        /*------informasjon som skal inni arrayer i databasen*/

        $insdatatocamera = array(
            'cameramaker' => $exif['Make'],
            'cameramodel' => $exif['Model'],
        );
        print_r($insdatatocamera);
        /*echo "<br/>   array uploads ".$insdatatocamera['cameramaker']."<br/>";    //Debug linjer
        echo "<br/>   array uploads ".$insdatatocamera['cameramodel']."<br/>";*/

        $insdatatocategory = array(
            'name' => $category, // her kan vi har noen checkbokser vel? er ikke så lett å putte checkbokser inni her. Er nok bedre å ha dem på siden! :)
        );

        $insdatatoimagedesgin = array(  //Motiv
            'name' => "Bildets motiv",
        );

        $insDataToImages = array(
            'filename' => $filename,
            'title' => $title,
            'picturetext' => $beskrivelse,
            'thumb_w' => 150,
            'thumb_h' => 150,
            'url' => $urlforimage
        );

        if(empty($exif['DateTimeOriginal'])) {
            $exif['DateTimeOriginal'] = "1970-01-01 13:37:00";
        }
        if(empty($exif['COMPUTED']['Width'])) {
            $exif['COMPUTED']['Width'] = 150;
        }
        if(empty($exif['COMPUTED']['Height'])) {
            $exif['COMPUTED']['Height'] = 150;
        }
        if(empty($exif['MimeType'])) {
            $exif['MimeType'] = 'image/jpeg';
        }
        if(empty($exif['XResolution'])) {
            $exif['XResolution'] = 0;
        }
        if(empty($exif['ExposureTime'])) {
            $exif['ExposureTime'] = 0;
        }
        if(empty($exif['FocalLength'])) {
            $exif['FocalLength'] = 'null';
        }
        if(empty($exif['WhiteBalance'])) {
            $exif['WhiteBalance'] = 'null';
        }
        if(empty($exif['Orientation'])) {
            $exif['Orientation'] = 'null';
        }
        if(empty($exif['ISOSpeedRatings'])) {
            $exif['ISOSpeedRatings'] = 0;
        }
        if(empty($exif['Flash'])) {
            $exif['Flash'] = 0;
        }

        $insdatatometainfo = array(
            "capturedate" => $exif["DateTimeOriginal"],
            "w_original" => $exif['COMPUTED']['Width'],
            "h_original" => $exif['COMPUTED']['Height'],
            "imagetype" => $exif['MimeType'],
            "resolution" =>$exif['XResolution'],
            "bit_depth" => 0, // hmm denne veriden ser ikke ut til å være her. Ser ut som den er satt til 0!
            "uploaded" => $curtime->format("Y-m-d H:i:s"),
            "exposure_time" => $exif['ExposureTime'],
            "focal_length" => $exif['FocalLength'],
            "white_balance" => $exif['WhiteBalance'],
            "orientation" => $exif['Orientation'],
            "iso_speed" => $exif['ISOSpeedRatings'],
            "flash_state" => $exif['Flash'],
            "tags" => "Sport, Varden, Bilder, Kultur, Arkiv",
        );
        print_r($insdatatometainfo);

        $insdatattophotographers = array(
            "firstname" => 'Varden',
            "lastname" => 'null', //Her burde vi legge tilrette for etternavn, og etternavn er tilrettelagt her, men ikke i input boksene
        );
        print_r($insdatattophotographers);
        $insdatatophysicallocation = array(
            "room" => 0,
            "drawers" => 3,
            "folder" => 34
        );

        $insdatalog = array(
            "uploaded_time" => $curtime->format('Y-m-d H:i:s')
        );

        /*------------ Slutt på funkjsonen */
        include ("functions/sqlfunctions.php");
        insert($connect, "camera", $insdatatocamera);
        insert($connect, "category", $insdatatocategory);
        insert($connect, "imagedesign", $insdatatoimagedesgin);
        insert($connect, "images", $insDataToImages);
        insert($connect, "photographers", $insdatattophotographers);
        insert($connect, "metainfo", $insdatatometainfo);
        insert($connect, "physicallocation", $insdatatophysicallocation);
        //insert($connect, "log", $insdatalog); // Kan brukes for å loggføre det som blir gjort

        $idsql = "SELECT id FROM images ORDER BY id DESC LIMIT 1;";
        echo $idsql;
        $idquery = mysqli_query($connect, $idsql) or die(mysqli_error($connect));
        $idrow = mysqli_fetch_array($idquery);
        $latestid = $idrow['id'];

        $newid = ($latestid + 1);

        require_once('app/init.php');

        $indexed = $es->index([
            'index' => 'images',
            'type' => 'image',
            'id' => $newid,
            'body' => [
                'title' => $title,
                'category' => $category,
                'photographer' => 'Varden',
                'time_taken' => $exif["DateTimeOriginal"],
                'place' => 'Porsgrunn',
                'width' => 150,
                'url' => $urlforimage,
                'tags' => ['Sport', 'Varden', 'Bildearkiv', 'Avis']
            ]
        ]);

        if($indexed) {
            print_r($indexed);
        }
    }
    else {
        echo "Her skjedde det en feil! Kunne ikke flytte filen!\n";
    }
}
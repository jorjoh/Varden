<?php

$id = intval($_GET['id']); // Variabel som fanger opp ID nummeret til bilde og brukes i SQL spørringen - Må være et tall
// SQL spørring som henter all relevant informasjonen til bilde i databasen
$sql = "
    SELECT images.id, images.filename, images.picturetext, images.count, images.url, place.name, metainfo.capturedate, photographers.firstname, photographers.lastname
    FROM images
    JOIN metainfo
    ON images.id = metainfo.id
    JOIN photographers
    ON images.id = photographers.id
    JOIN place
    ON images.place_id = place.id
    WHERE images.id = $id;
";
$result = mysqli_query($connect, $sql) or die('Kunne ikke hente bildet fra DB'); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet
$row = mysqli_fetch_array($result); // Henter kolonnene inn i egne array
$count = $row['count']; // Henter antall visninger bilde har
$url = $row['url']; // Henter URL'en til bilde
$filename = $row['filename'];
$picturetext = $row['picturetext'];
$place = $row['name'];
$date = $row['capturedate'];
$photographer = $row['firstname']." ".$row['lastname'];

// Hvis ikke ID'en er definert i URL eller det ikke finnes noen bilder med ID'en som er definert i URL'en
if(empty($id) || $rows < 1) {
    header("Location: ?side=forside"); // Send brukeren tilbake til forsiden
}
else {
    // Øker $count / visning på bilde med 1 når bildet vises
    $count++;
    // Oppdaterer count i databasen, for å kunne bruke den informasjonen til å vise frem mest viste bilder på forsiden
    $hitSQL = "UPDATE images SET count = $count WHERE id=$id;";
    // Kjører spørringen til databasen og returnerer feilmelding hvis det ikke blir vellykket
    $updatehits = mysqli_query($connect, $hitSQL) or die('Kunne ikke oppdatere antall visninger på bildet');
    // Inkluderer søkefeltet
    include('searchfield.php');
    echo "<br>
    <div class='row'>
            <div style='width: 100%; min-height: 800px; background: #FFF;'>
                <br>
                <br>
                <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
                   her som vises uansett om du har adblock eller ikke
                </div>
                <br>
                <br>
                <div style='width: 60%; height: 350px; margin: 0 auto; background: #e6eef1;'>
                    <img class='lazy' style='float: left; margin-left: 30px; margin-top: 20px; width: 38%;' data-original='$url'>
                    <p style='clear: right;'>Test</p>
                    <div style='float: left; margin-left: 30px; margin-top: 20px; width: 1px; height: 300px; background-color: #CCCCCC;'></div>
                    <div style='float: left; width: 45%; margin-left: 25px; margin-top: 20px;'>
                        <h2>Bildeinfo - $filename</h2>
                        <p style='text-align: left;'>$picturetext</p>
                        <div id='keywords' style='background-color: #ccc; padding: 20px; margin-top: 40px; text-align: left;'>
                            <strong>Nøkkelord</strong>
                            <p>Sted: $place</p>
                            <p>Blinkskuddet ble tatt: $date</p>
                            <p>Blinkskuddet ble tatt av: $photographer</p>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    ";
}
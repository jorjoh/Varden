<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBcTYUrPeY0gc7yupyDrETlmhNI2KEQ5Mo"></script>
<script>
    $(document).ready(function() {
        FB.ui({
            method: 'feed',
            link: 'https://developers.facebook.com/docs/',
            caption: 'An example caption',
        }, function(response){});
    });
</script>

<style>
    td:nth-of-type(even) {
        position: relative;
        left: 25px;
    }
</style>

<?php

$id = intval($_GET['id']); // Variabel som fanger opp ID nummeret til bilde og brukes i SQL spørringen - Må være et tall
// SQL spørring som henter all relevant informasjonen til bilde i databasen fra respektive tabeller
$sql = "
    SELECT 
      images.id, images.filename, images.title, images.picturetext, images.count, images.url, 
      place.name, place.longitude, place.latitude,
      metainfo.w_original, metainfo.h_original, metainfo.imagetype, metainfo.resolution, metainfo.bit_depth, metainfo.exposure_time, metainfo.white_balance, metainfo.orientation, metainfo.iso_speed, metainfo.flash_state, metainfo.capturedate, 
      photographers.firstname, photographers.lastname
    FROM images
    JOIN metainfo
    ON images.id = metainfo.id
    JOIN photographers
    ON images.id = photographers.id
    JOIN place
    ON images.place_id = place.id
    WHERE images.id = $id;
";
$result = mysqli_query($connect, $sql) or die('Kunne ikke hente bildet fra DB - '.mysqli_error($connect)); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet

// Hvis ikke ID'en er definert i URL eller det ikke finnes noen bilder med ID'en som er definert i URL'en
if(empty($id) || $rows < 1) {
    echo "<div class='row'>
            <p style='background: #ffffcc; position: relative; top: 200px; color: #FF0000; padding: 20px;'>
                Kunne ikke finne ønsket bilde. Vennligst prøv igjen
                <br>
                Du vil bli sendt tilbake i løpet av 3 sekunder eller <a href='?side=forside'>trykk her for å gå til forsiden</a>!
            </p>
        </div>
    ";
    header("Refresh: 3; url=?side=forside");
}
else {
    $row = mysqli_fetch_array($result); // Henter kolonnene inn i egne array
    $count = $row['count']; // Henter antall visninger bilde har
    $url = $row['url']; // Henter URL'en til bilde
    $filename = $row['filename']; // Henter bildenavnet til filen
    $title = $row['title']; // Henter tittelen til bilde
    $picturetext = $row['picturetext']; // Henter bildeteksten
    $place = ucfirst($row['name']); // Henter stedsnavnet bilde er tatt
    $date = $row['capturedate']; // Henter datoen bilde er tatt
    $photographer = $row['firstname']." ".$row['lastname']; // Henter navnet på fotografen
    $w_original = $row["w_original"]; // Henter orginale bredden
    $h_original = $row["h_original"]; // Henter orginale høyde
    $imagetype = $row["imagetype"]; // Henter bildetype
    $resolution = $row["resolution"]; // Henter oppløsning
    $bit_depth = $row["bit_depth"]; // Henter antall bit
    $exposure_time = $row["exposure_time"]; // Henter eksponeringstiden
    $white_balance = $row["white_balance"]; // Henter hvitebalansen
    $orientation = $row["orientation"]; // Henter retning på bilde
    $iso_speed = $row["iso_speed"]; // Henter ISO verdien
    $flash_state = $row["flash_state"]; // Henter statusen til blitsen
    $longitude = $row['longitude']; // Henter longitude delen til GPS koordinatene for Google Maps
    $latitude = $row['latitude']; // Henter latitude delen til GPS koordinatene for Google Maps


// Sjekker om blitsen er utløst eller ikke og gir riktig tekst til blitsens innstillinger
    switch ($flash_state) {
        case 9:
            $flashtext = "På, utløst";
            break;
        case 16:
            $flashtext = "Av, ikke utløst";
            break;
        case 24:
            $flashtext = "Auto, ikke utløst";
            break;
        case 25:
            $flashtext = "Auto, utløst";
            break;
        case 32:
            $flashtext = "Av";
            break;
        default:
            $flashtext = "Kamera har ikke blits muligheter";
    }
?>

<?php

    // Øker $count / visning på bilde med 1 når bildet vises
    $count++;
    // Oppdaterer count i databasen, for å kunne bruke den informasjonen til å vise frem mest viste bilder på forsiden
    $hitSQL = "UPDATE images SET count = $count WHERE id=$id;";
    // Kjører spørringen til databasen og returnerer feilmelding hvis det ikke blir vellykket
    $updatehits = mysqli_query($connect, $hitSQL) or die('Kunne ikke oppdatere antall visninger på bildet');
    // Inkluderer søkefeltet
    include('searchfield.php');
    echo "<br>
        <div style='width: 100%; min-height: 800px; padding: 20px; background: #FFF;'>
            <!-- <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
               her som vises uansett om du har adblock eller ikke
            </div> -->
            <br>
            <div id='detail' style='background: #e6eef1; width: 80%; margin: 0 auto;'>
                <img class='lazy' style='float: left; width: 60%;' data-original='$url'>
                <div id='bildeinfo' style='float: left; text-align: left; margin: 20px 0 0 20px; width: 38%;'>
                    <h2>$title</h2>
                    <p>$picturetext</p>
                    <p>(FOTO: $photographer)</p>
                </div>
                <br style='clear: both;'>
            </div>
        </div>
    ";
}

?>
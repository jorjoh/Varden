<div id="fb-root"></div>
<script>
    !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id))
        {
            js=d.createElement(s);
            js.id=id;
            js.src=p+'://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js,fjs);
        }
    }(document, 'script', 'twitter-wjs');
</script>
<script src="../js/modernizr.js"></script>

<style>
    .frame { width: 100%; height: 160px; padding: 0; }
    .frame .slidee { margin: 0; padding: 0; height: 100%; list-style: none; }
    .frame .slidee li { float: left; margin: 0 5px 0 0; padding: 0; width: 120px; height: 100%; }

    .scrollbar { width: 100%; height: 10px; }
    .scrollbar .handle {
        width: 100px; /* overriden if dynamicHandle: 1 */
        height: 100%;
        background: #222;
    }
</style>

<?php
$page = $_SESSION['page'];
$searchquery = $_SESSION['searchtxt'];
if($page == 0) {
    $page = 1;
}
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
        <div id='subpage-bg'>
            <!-- <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
               her som vises uansett om du har adblock eller ikke
            </div> -->
            <br>
            <div id='details'>
                <img class='lazy' id='picture' data-original='$url'>
                <div id='bildeinfo'>
                    <h2>$title</h2>
                    <p>$picturetext</p>
                    <p>(FOTO: $photographer)</p>
                    <br><br>
<!--                    <p>
                       <a title=\"send to Facebook\" 
                          href=\"http://www.facebook.com/sharer.php?s=100&p[title]=tittelenkommerher&p[summary]=etfintbildesomduikkefårtilgangtil&p[url]=erikroed.no&p[images][0]=YOUR_IMAGE_TO_SHARE_OBJECT\"
                          target=\"_blank\">
                          <span style='background: #00598c; padding: 20px; color: #FFF; border-radius: 3%;'>
                            <img width=\"14\" height=\"14\" src=\"'icons/fb.gif\" alt=\"Facebook\" /> Del med venner på Facebook! 
                          </span>
                        </a>
                    </p>
                    <br><br>
                    <p>
                        <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-dnt=\"true\">Del på Twitter</a>
                    </p>-->
                    </div>
                <br style='clear: both;'>
            </div>
            <br>
            <div class=\"wrap\">
                <h2 style='color: #929292;'>Andre bilder fra samme resultat: </h2>
                <p>Ikke klikkbar for øyeblikket</p>
                <div class=\"frame\" id=\"centered\">
                    <ul class=\"clearfix\">
            
            ";

            $sql = "SELECT id, thumb_url FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' LIMIT 0, 15;";
            $result = mysqli_query($connect, $sql);

            while($nextrow = mysqli_fetch_array($result)) {
                $nextid = $nextrow['id'];
                $nexturl = $nextrow['thumb_url'];
                echo "<img src='$nexturl'>";
            }

            echo "
                   </ul>
                </div>
                <br>
                <div class=\"scrollbar\">
                    <div class=\"handle\">
                        <div class=\"mousearea\"></div>
                    </div>
                </div>
            
                <div class=\"controls center\">
                    <button id='paginationbtn' class=\"btn prev\"> &lt; </button>
                    <button id='paginationbtn' class=\"btn next\"> &gt; </button>
                </div>
            </div>
            <br><br>
            <a href='?side=resultat&query=$searchquery&page=$page'><button id='orderButton'>Tilbake til søkeresultat</button></a>
        </div>
    ";
}

?>
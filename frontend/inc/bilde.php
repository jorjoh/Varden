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

    .left {
        margin-top: 10%;
        margin-left: 12.3%;
    }

    .right {
        margin-top: 10%;
        margin-right: 12.3%;
    }

    @media(max-width: 580px) {
        #paginationbtn {
            display: none;
        }
    }
</style>

<?php
$searchquery = $_SESSION['searchtxt'];
$id = intval($_GET['id']); // Variabel som fanger opp ID nummeret til bilde og brukes i SQL spørringen - Må være et tall
// SQL spørring som henter all relevant informasjonen til bilde i databasen fra respektive tabeller
$sql = "
    SELECT 
      images.id, images.filename, images.title, images.picturetext, images.count, images.url, 
      place.name, place.longitude, place.latitude,
      metainfo.w_original, metainfo.h_original, metainfo.imagetype, metainfo.resolution, metainfo.bit_depth, metainfo.exposure_time, metainfo.white_balance, metainfo.orientation, metainfo.iso_speed, metainfo.flash_state, metainfo.capturedate, 
      photographers.firstname, photographers.lastname,
      category.name AS titlename
    FROM images
    JOIN metainfo
    ON images.id = metainfo.id
    JOIN photographers
    ON images.id = photographers.id
    JOIN place
    ON images.place_id = place.id
    JOIN category
    ON images.id = category.id
    WHERE images.id = $id;
";
$result = mysqli_query($connect, $sql) or die('Kunne ikke hente bildet fra DB - '.mysqli_error($connect)); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet

// Hvis ikke ID'en er definert i URL eller det ikke finnes noen bilder med ID'en som er definert i URL'en
if(empty($id) || $rows < 1) {
    echo "
        <p style='background: #ffffcc; position: relative; top: 200px; color: #FF0000; padding: 20px;'>
            Kunne ikke finne ønsket bilde. Vennligst prøv igjen
            <br>
            Du vil bli sendt tilbake i løpet av 3 sekunder eller <a href='?side=forside'>trykk her for å gå til forsiden</a>!
        </p>
    ";
    header("Refresh: 3; url=?side=forside");
}
else {
    $row = mysqli_fetch_array($result); // Henter kolonnene inn i egne array
    $count = $row['count']; // Henter antall visninger bilde har
    $url = $row['url']; // Henter URL'en til bilde
    $filename = $row['filename']; // Henter bildenavnet til filen
    $title = $row['titlename']; // Henter tittelen til bilde
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


    $sqlnext = "SELECT id FROM images WHERE picturetext LIKE '%$searchquery%' OR filename LIKE '%$searchquery%' ORDER BY RAND() LIMIT 1;";
    $resultnext = mysqli_query($connect, $sqlnext);
    $nextpicture = mysqli_fetch_array($resultnext);
    $next = $nextpicture['id'];

    echo "<div style='padding-top: 7%;'>";
    include('searchfield.php');
    echo "<br>
        <div id='subpage-bg' style='padding-top: 40px;'>
             <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC; color: #666666;'>
                <br><br><br>
                Banner 950x150
            </div>
            <br>
            <!-- start paginering -->
            <a onclick='window.history.back()'>
                <div id='paginationbtn' class='left' style='float: left;'>
                    <p style='margin-top: 15px;'>&lt;</p>
                </div>
            </a>
            <a href='?side=bilde&id=$next'>
                <div id='paginationbtn' class='right' style='float: right;'>
                    <p style='margin-top: 15px;'>&gt;</p>
                </div>
            </a>
            <!-- slutt paginering -->
            <div id='details'>
                <img class='lazy' id='picture' data-original='$url'>
                <div id='bildeinfo'>
                    <p id='pictureinfo' style='color: #0000FF; float: right; margin-right: 20px; text-decoration: underline; cursor:pointer;'>[bilde her]</p>
                    <h2>$title</h2>
                    <br>
                    <p>$picturetext</p>
                    <p>(FOTO: $photographer)</p>
                    <br><br>
                    <p>
                       <a title=\"send to Facebook\" 
                          href=\"http://www.facebook.com/sharer.php?s=100&p[title]=tittelenkommerher&p[summary]=etfintbilde&p[url]=http%3A//134.213.218.27/frontend/?side=bilde%26id=$id&p[images][0]=YOUR_IMAGE_TO_SHARE_OBJECT\"
                          target=\"_blank\">
                          <span style='background: #00598c; padding: 20px 95px 20px 20px; color: #FFF; border-radius: 3%;'>
                            <img src=\"img/facebook-logo.png\" alt=\"Facebook\" /> &nbsp; Del med venner på Facebook 
                          </span>
                        </a>
                    </p>
                    <br>
                    <p style='margin-top: 30px;'>
                        <a style='color: #fff; text-decoration: none;' href='https://twitter.com/intent/tweet?original_referer=http%3A%2F%2F134.213.218.27%2Ffrontend%2F?side=bilde%26id=$id&amp;ref_src=twsrc%5Etfw&amp;related=varden&amp;text=Se%20på%20bilde%20jeg%20fant%20i%20arkivet%20til%20varden&amp;tw_p=tweetbutton&amp;url=http%3A%2F%2Fwww.varden.no%2F?side=bilde%26id=$id&amp;via=varden'>
			                 <span class=\"button-dropdown-text\" style='background: #15abff; padding: 20px 180px 20px 20px; border-radius: 3%;'>
			                 <img src='img/twitter-logo.png' alt='twitter' /> &nbsp; Del på Twitter</span>
                        </a>
                    </p>
                    <br>
                    <div style='background-color: #ccc; width: 96%; padding: 10px; margin-top: 10px; text-align: left;'>
                        <strong>Nøkkelord</strong>
                        <p>Sted: $place</p>
                        <p>Bilde ble tatt: $date</p>
                        <p>Bilde ble tatt av: $photographer</p>
                    </div>
                </div>
                <br style='clear: both;'>
                <div id='box'>
                <div style='float: left;'>
                    <strong>Exif-info</strong> <br>
                        <table>
                            <tr>
                                <td>Bredde: </td>
                                <td>$w_original</td>
                            </tr>
                            <tr>
                                <td>Høyde: </td>
                                <td>$h_original</td>
                            </tr>
                            <tr>
                                <td>Filformat: </td>
                                <td>$imagetype</td>
                            </tr>
                            <tr>
                                <td>Oppløsning:</td>
                                <td>$resolution</td>
                            </tr>
                            <tr>
                                <td>Bit: </td>
                                <td>$bit_depth</td>
                            </tr>
                            <tr>
                                <td>Eksponeringstid: </td>
                                <td>$exposure_time</td>
                            </tr>
                            <tr>
                                <td>Hvitbalanse: </td>
                                <td>$white_balance</td>
                            </tr>
                            <tr>
                                <td>Retning: </td>
                                <td>$orientation</td>
                            </tr>
                            <tr>
                                <td>ISO verdi: </td>
                                <td>$iso_speed</td>
                            </tr>
                            <tr>
                                <td>Blits: </td>
                                <td>$flashtext</td>
                            </tr>
                        </table>
                    </div>
                    <div style='float: right; width: 36.6%; margin-right: 1%;'>
                        <strong>Kontakt oss</strong>
                        <p>Benytt feltet under for å sende oss din informasjon om bilde</p>
                        <form method='post' name='pictureinfoschema' id='pictureinfoschema'>
                            <textarea name='comment' placeholder='Fyll inn din informasjon om bilde her...' style='width: 100%; height: 150px;'></textarea>
                            <br>
                            <input type='submit' style='clear: right; float: left;' id='submitrequest' name='submitrequest' value='Send inn ditt forslag'>
                        </form>
                    </div>
                    <br style='clear: both;'>
                </div>
            </div>
            <br>
            <br>
            <br>
            <a href='?side=resultat&q=$searchquery' id='btn' style='padding: 0 20px;'>Tilbake til søkeresultat</a>
        </div>
    ";

    if(isset($_POST['submitrequest'])) {
        $comment = mysqli_real_escape_string($connect, $_POST['comment']);
        if(empty($comment)) {
            echo "Det er ikke skrevet noen kommentar";
        }
        else {
            $sql = "INSERT INTO request(image_id, requesttext) VALUES ($id, '$comment');";
            mysqli_query($connect, $sql) or die('Beklager det skjedde en feil! Ta kontakt med webutvikler'.mysqli_error($connect));
            echo "<p id='msg' style='background: #f7ecb5; margin-top: 10px; padding: 15px; border: 1px solid black;'>Ditt forslag ble vellykket sendt inn til behandling!</p>";
        }
    }
}

?>

<script>
    $(window).keydown(function(e) {
        if(e.keyCode == 39) {
            window.location.href = "?side=bilde&id=<?php echo $next;?>";
        }
        if(e.keyCode == 37) {
            window.history.back();
        }
    });

    $(document).ready(function() {
        $('#pictureinfo').click(function () {
            $('#box').slideToggle('slow', function() {});
        });
    });

</script>
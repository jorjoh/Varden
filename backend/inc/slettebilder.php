<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>

<?php
require_once('app/init.php');
//$id = $_GET['id'];
if(empty($id)) {
    $page = $_GET['page'];
    if (empty($page) || $page = 0) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $per_page = 10; // Antall bilder per side
    $start_from = ($page - 1) * $per_page; // Regner ut hvor den skal starte limiten i LIMIT delen i SQL setningen

    echo "<h1 class='page-header'> Slett bilder </h1>";

    //SELECT spørring som henter ut thumb_url, filename, bilbetekst, url og 'count' fra images med en LIMIT
    include("functions/dbcon.php");    // kobler til databasen

    $sqlsetning = "SELECT thumb_url, thumb_w, filename, picturetext, url, id, count FROM images LIMIT $start_from, $per_page;";    // velger alt fra tabellen images
    $query = "SELECT count(id) AS nbr FROM images;";    // Ny spørring i forhold til side pagnering
    $sqlresultat = mysqli_query($connect, $sqlsetning) or die ("Ikke mulig å hente data");
    $nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff' . mysqli_error($connect));
    $antallRader = mysqli_num_rows($sqlresultat);

    echo("<form method='post'>
            <table id='tableSelect' class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp\" style='width: 200px;'>");   // Material design tabell som brukes til å få en oversikt av bildene i DB
    echo("<thead>");
    echo(" <tr>
            <th class=\\'mdl-data-table__cell--non-numeric\\'>Bilder(filename)</th> <!--//Table headers-->
            <th>Beskrivelse</th>
            <th>Thumbnail</th>
            <th style='text-align: right'>Antall ganger vist</th>
           </tr>");                                                                    //End of table headers
    for ($r = 1; $r <= $antallRader; $r++) {  // For-loop som kjører gjennom arrayet og skriver ut informasjonen til alle bilder i tabellen
        $rad = mysqli_fetch_array($sqlresultat);

        $filnavn = $rad["filename"];
        $beskrivelse = substr($rad["picturetext"], 0, 47)."...";
        $tumburl = $rad["thumb_url"];
        $count = $rad["count"];
        $imagesid = $rad["id"];
        $url = $rad['url'];

        echo("
        </thead>
        <tbody>
        <tr data-mdl-data-table-selectable-name=\"materials[]\" data-mdl-data-table-selectable-value=\"acrylic\">   <!-- fyller op rader med informasjon fra databasen-->
            <td class=\\'mdl-data-table__cell--non-numeric\\'>$filnavn</td>
            <td>$beskrivelse</td>
            <td><img src='$tumburl' style='height: 60px; width: 60px;'></a></td>
            <td style='text-align: right;'>$count</td>
            <td><input type='checkbox' name='checkbox[]' id='checkbox' value='$imagesid'></td>
        </tr>
        </tbody>");
    }
    echo("</table><br>");
    // Slutt på tabell
    echo("
            <input type='submit' id='slettbilde' class='mdl-button mdl-button--raised mdl-button--accent' name='slettbilde' value='Slett bilder' style='position: relative; float: right; background: #FF0000; color: #FFFFFF; right: 80px;' /> </input>
            </form>");

    if (isset($_POST["slettbilde"])) {
        $checkboxer = $_POST['checkbox'];
        if(count($checkboxer) > 0) {
            for($i = 0; $i < count($checkboxer); $i++) {
                $deleterowmetainfo = "DELETE FROM metainfo WHERE id = $checkboxer[$i];";
                $deleterowrequest = "DELETE FROM request WHERE image_id = $checkboxer[$i];";
                $deleterowsimage = "DELETE FROM images WHERE id=$checkboxer[$i];";
                echo $deleterowsimage."<br>";

                mysqli_query($connect,$deleterowmetainfo) or die ("Kunne ikke slette fra database ".mysqli_error($connect));
                mysqli_query($connect,$deleterowrequest) or die ("Kunne ikke slette fra database ".mysqli_error($connect));
                mysqli_query($connect,$deleterowsimage) or die ("Kunne ikke slette fra database ".mysqli_error($connect));

                $deletedocument = [
                    'index' => 'images',
                    'type' => 'image',
                    'id' => $checkboxer[$i]
                ];

                $es->delete($deletedocument); // Fjerner dokumentet / indekseringen i elasticsearch
            }
        }
    }

    // Del av spørringen som går på sidepagnering
    $totalrows = mysqli_fetch_array($nbrresult);
    $nbrofrows = $totalrows['nbr'];
    $total_pages = ceil($nbrofrows / $per_page);

    // Hvis side = 1 og totalt antall sider er mindre en 1 vis kun den enen kanppen til å gå videre
    if($page == 1 && $total_pages > 1) {
        echo '<br><p style="text-align: center;">Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder
        <a href="?side=slettebilder&page='.($page + 1).'"><button style="position: relative;"> &gt; </button></a></p><br>';
    }
    else if($page == $total_pages && $total_pages > 1) {
        echo '<br><p style="text-align: center;">
            <a href="?side=slettebilder&page='.($page - 1).'"><button style="position: relative;"> &lt; </button></a>
            Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder
        </p>';
    }
    //Er antall sider mer enn en vis knappen som fører deg tilbake til forrige resultat. Altså 2 Knappen :)
    else {
        if($total_pages > 1) {
            echo '<br>
                <p style="text-align: center;">
                <a href="?side=slettebilder&page='.($page - 1).'"><button style="position: relative;">&lt;</button></a>  
                Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder 
                <a href="?side=slettebilder&page='.($page + 1).'"><button style="position: relative;"> &gt; </button></a>
                </p>
            ';
        }
    }
    // MULIGHET FOR Å SKRIVE INN SIDEN DU ØNKSER Å GÅ TIL !
}
?>
<script>
    $('#tableSelect tr').click(function() {
        /*var ele = $(this).find(':checkbox');
        if ($(':checked').length) {
            ele.prop('checked', false);
            $(this).removeClass('admin_checked');
        } else {
            ele.prop('checked', true);
            $(this).addClass('admin_checked');
        }*/
       // document.querySelector('.mdl-js-checkbox').MaterialCheckbox.check()

    })
</script>
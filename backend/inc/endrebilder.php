<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 12.04.2016
 * Time: 20:29
 */

$id = $_GET['id'];
if(empty($id)) {
$page = $_GET['page'];
if(empty($page) || $page = 0) {
    $page = 1;
}
else {
    $page = $_GET['page'];
}
$per_page = 10; // Antall bilder per side
$start_from = ($page - 1) * $per_page; // Regner ut hvor den skal starte limiten i LIMIT delen i SQL setningen

echo "<h1> Oversikt over bilder som er tilgjengelig </h1>";

//SELECT spørring som henter ut thumb_url, filename, bilbetekst, url og 'count' fra images med en LIMIT
include("functions/dbcon.php");    // kobler til databasen
$sqlsetning = "SELECT thumb_url, thumb_w, filename, picturetext, url, count FROM images LIMIT $start_from, $per_page;";    // velger alt fra tabellen images
$query = "SELECT count(id) AS nbr FROM images;";    // Ny spørring i forhold til side pagnering
$sqlresultat = mysqli_query($connect, $sqlsetning) or die ("Ikke mulig å hente data");
$nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff'. mysqli_error($connect));
$antallRader = mysqli_num_rows($sqlresultat);

echo("<table class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\" style='width: 200px;'>");   // Material design tabell som brukes til å få en oversikt av bildene i DB
echo("<thead>");
echo(" <tr>
        <th class=\\'mdl-data-table__cell--non-numeric\\'>Bilder(filename)</th> <!--//Table headers-->
        <th>Beskrivelse</th>
        <th>URL</th>
        <th style='text-align: right'>Antall ganger vist</th>
    </tr>");                                                                    //End of table headers
for ($r = 1; $r <= $antallRader; $r++) {  // For-loop som kjører gjennom arrayet og skriver ut informasjonen til alle bilder i tabellen
    $rad = mysqli_fetch_array($sqlresultat);
    $filnavn = $rad["filename"];
    $beskrivelse = $rad["picturetext"];
    $tumburl = $rad["thumb_url"];
    $count = $rad["count"];

    echo("
    </thead>
    <tbody>
    <tr data-mdl-data-table-selectable-name=\"materials[]\" data-mdl-data-table-selectable-value=\"acrylic\">   <!-- fyller op rader med informasjon fra databasen-->
        <a href='#'> <td class=\\'mdl-data-table__cell--non-numeric\\'>$filnavn</td>
        <td>$beskrivelse</td>
        <td><a href='$tumburl' class='slideshow_zoom'>Link til bilde</a> </td>
        <td style='text-align: right;'>$count</td> </a>
    </tr>
    </tbody>");

}
echo("</table>"); // SLutt på tabell
// Del av spørringen som går på sidepagnering
$totalrows = mysqli_fetch_array($nbrresult);
$nbrofrows = $totalrows['nbr'];
$total_pages = ceil($nbrofrows / $per_page);

// Hvis side = 1 og totalt antall sider er mindre en 1 vis kun den enen kanppen til å gå videre
if($page == 1 && $total_pages > 1) {
    echo '<a href="?side=endrebilder&page='.($page + 1).'"><button style="position: absolute; right: 25px; bottom: 5px;" id="paginationbtn"> &gt; </button></a>  
    Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>';
}
else if($page == $total_pages && $total_pages > 1) {
    echo '<a href="?side=endrebilder&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>';
}
//Er antall sider mer enn en vis knappen som fører deg tilbake til forrige resultat. Altså 2 Knappen :)
else {
    if($total_pages > 1) {
        echo '<a href="?side=endrebilder&page='.($page - 1).'"><button style="position: absolute; left: 400px; bottom: 5px;" id="paginationbtn">&lt;</button></a>  
        Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>
                                <a href="?side=endrebilder&page='.($page + 1).'"><button style="position: absolute; right: 700px; bottom:5px;" id="paginationbtn"> &gt; </button></a>
                                ';
    }
}
// MULIGHET FOR Å SKRIVE INN SIDEN DU ØNKSER Å GÅ TIL !
?>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Bibliotek for jquery funksjonalitet-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $('.slideshow_zoom').each(function() { // dialog boks for å åpne bilder i fra tabellen
            var $link = $(this);
            var $dialog = $('<img src="' + $link.attr('href') + '" style="height: 70px;!important; width: 150px;!important;"/>') // Tar "anchor-tagen" som img src og vier selve bilde
                .dialog({   // Attributter til dialogboksen
                    autoOpen: false,
                    resizeable: false,
                    modal: true,
                    width: 700,
                    height: 500,
                    closeOnEscape: true,
                    dialogClass: 'zoom'
                }); // Slutt på attributter
            $link.click(function() {
                $dialog.dialog('open'); // Åpner dialog boksen
                return false;
            });
        });
    </script>
    <script>
        $('tr').click( function() {
            window.location = $(this).find('a').attr('href');
        }).hover( function() {
            $(this).toggleClass('hover');
        });
    </script>

</html>


<!-- Bibliotek for jquery funksjonalitet-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>
<?php
}
else {
    //SQL-spørringer
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
        //$tittelforrequestpicture = $rowforrequestpicturetext['title'];
        $picturetextformrequest = $rowforrequestpicturetext['requesttext'];
        /*Slutt på REQUEST-tabellen*/

        echo "
        <form method='post' action='' name='requestpicturetextchange' id='requestpicturetextchange'>
       <!-- <input type='text' value='$tittel'> <br>-->
        <!--<input type='text' value='$picturetext'>-->
         <h2>Endre bildetekst eller tittel til bilde id: $id</h2>
        <textarea>$tittel</textarea><br>
        <textarea style='height: 200px; width: 450px;'>$picturetext</textarea>
        <h2>Forslag på bilde tekst som er kommet inn av brukeren</h2>
        <textarea>$tittel</textarea><br>
        <textarea style='height: 200px; width: 450px;'>$picturetextformrequest</textarea><br>
        <input type='submit' id='submit' name='submit' value='Utfør endring'/>
        </form>
        
        ";

        if(isset($_POST["submit"])){
            $updaterows = "UPDATE images SET picturetext = '$picturetextformrequest' WHERE id = $id";
            echo $updaterows."<br>";
            mysqli_query($connect,$updaterows) or die ("Fikk ikke kontakt med databasen, did not work");
        }
        else{
            echo "DidentWork";
        }
        //echo "Tittelen på bilde er: $tittel <br>";
        //echo "Bildetekst til bilde er: $picturetext";
    }
}
?>
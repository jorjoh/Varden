<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>
<?php
echo ("<h1>Oversikt over all innkommende forslag</h1>");

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

//SELECT spørring som henter ut thumb_url, filename, bilbetekst, url og 'count' fra images med en LIMIT
include("functions/dbcon.php");    // kobler til databasen

$sqlsetning = "SELECT image_id, requesttext, processed FROM request LIMIT $start_from, $per_page;";    // velger alt fra tabellen images
$query = "SELECT count(id) AS nbr FROM request;";    // Ny spørring i forhold til side pagnering
$sqlresultat = mysqli_query($connect, $sqlsetning) or die ("Ikke mulig å hente data");
$nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff'. mysqli_error($connect));
$antallRader = mysqli_num_rows($sqlresultat);

echo("<table class=\"mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp\" style='width: 200px;'>");   // Material design tabell som brukes til å få en oversikt av bildene i DB
echo("<thead>");
echo(" <tr>
            <th class=\\'mdl-data-table__cell--non-numeric\\'>Bilder(filename)</th> <!--//Table headers-->
            <th>Beskrivelse</th>
            <th>Behandlet</th>
        </tr>");                                                                    //End of table headers
for ($r = 1; $r <= $antallRader; $r++) {  // For-loop som kjører gjennom arrayet og skriver ut informasjonen til alle bilder i tabellen
    $rad = mysqli_fetch_array($sqlresultat);

    $imageid = $rad["image_id"];
    $beskrivelse = $rad["requesttext"];
    $behandlet = $rad["processed"];


    echo("
        </thead>
        <tbody>
        <tr data-mdl-data-table-selectable-name=\"materials[]\" data-mdl-data-table-selectable-value=\"acrylic\">   <!-- fyller op rader med informasjon fra databasen-->
            <td class=\\'mdl-data-table__cell--non-numeric\\'>$imageid</td>
            <td>$beskrivelse</td>
            <td>$behandlet</td>
            
        </tr>
        </tbody>");
}}
echo("</table>");
// Del av spørringen som går på sidepagnering
$totalrows = mysqli_fetch_array($nbrresult);
$nbrofrows = $totalrows['nbr'];
$total_pages = ceil($nbrofrows / $per_page);

// Hvis side = 1 og totalt antall sider er mindre en 1 vis kun den enen kanppen til å gå videre
if($page == 1 && $total_pages > 1) {
    echo '<a href="?side=setidligereforslag&page='.($page + 1).'"><button style="position: absolute; right: 25px; bottom: 5px;" id="paginationbtn"> &gt; </button></a>  
        Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>';
}
else if($page == $total_pages && $total_pages > 1) {
    echo '<a href="?side=setidligereforslag&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>';
}
//Er antall sider mer enn en vis knappen som fører deg tilbake til forrige resultat. Altså 2 Knappen :)
else {
    if($total_pages > 1) {
        echo '<a href="?side=setidligereforslag&page='.($page - 1).'"><button style="position: absolute; left: 400px; bottom: 5px;" id="paginationbtn">&lt;</button></a>  
            Viser resultat: '.($start_from + 1). " - ".$per_page * $page.'  av totalt '. $nbrofrows .' bilder<br>
                                    <a href="?side=setidligereforslag&page='.($page + 1).'"><button style="position: absolute; right: 700px; bottom:5px;" id="paginationbtn"> &gt; </button></a>
                                    ';
    }
}
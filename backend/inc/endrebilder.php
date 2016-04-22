<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 12.04.2016
 * Time: 20:29
 */

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

//URL for bilder
include("functions/dbcon.php");    // kobler til databasen
$sqlsetning = "SELECT * FROM images LIMIT $start_from, $per_page;";    // velger alt fra tabellen images
$query = "SELECT count(id) AS nbr FROM images;";
$sqlresultat = mysqli_query($connect, $sqlsetning) or die ("Ikke mulig å hente data");
$nbrresult = mysqli_query($connect, $query) or die ('Kunne ikke telle antall treff'. mysqli_error($connect));
$antallRader = mysqli_num_rows($sqlresultat);
echo ("<!-- MDL Spinner Component -->

<div class=\"mdl-spinner mdl-js-spinner is-active\" style='left:300px'></div>
");
echo("<table class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">");
echo("<thead>");
echo(" <tr>
        <th class=\\'mdl-data-table__cell--non-numeric\\'>Bilder(filename)</th>
        <th>Beskrivelse</th>
        <th>URL</th>
        <th style='text-align: right'>Antall ganger vist</th>
    </tr>");
for ($r = 1; $r <= $antallRader; $r++) {
    $rad = mysqli_fetch_array($sqlresultat);
    $filnavn = $rad["filename"];
    $beskrivelse = $rad["picturetext"];
    $url = $rad["url"];
    $count = $rad["count"];
    

    echo("
    </thead>
    <tbody>
    <tr>
        <td class=\\'mdl-data-table__cell--non-numeric\\'>$filnavn</td>
        <td>$beskrivelse</td>
        <td><a href='$url' class='slideshow_zoom'>Link til bilde</a> </td>
        <td style='text-align: right'>$count</td>
    </tr>
    </tbody>");

}
echo("</table>");
$totalrows = mysqli_fetch_array($nbrresult);
$nbrofrows = $totalrows['nbr'];
$total_pages = ceil($nbrofrows / $per_page);


if($page == 1 && $total_pages > 1) {
    echo '<a href="?side=endrebilder&page='.($page + 1).'"><button style="position: absolute; right: 25px; top: 40%;" id="paginationbtn"> &gt; </button></a>';
}
else if($page == $total_pages && $total_pages > 1) {
    echo '<a href="?side=endrebilder&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>';
}
else {
    if($total_pages > 1) {
        echo '<a href="?side=endrebilder&page='.($page - 1).'"><button style="position: absolute; left: 25px; top: 40%;" id="paginationbtn">&lt;</button></a>
                                <a href="?side=endrebilder&page='.($page + 1).'"><button style="position: absolute; right: 25px; top: 40%;" id="paginationbtn"> &gt; </button></a>
                                ';
    }
}

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>


<body>
<button type="button" class="mdl-button show-modal">Show Modal</button>
<dialog class="mdl-dialog">
    <div class="mdl-dialog__content">
        <p>
            Allow this site to collect usage data to improve your experience?
        </p>
    </div>
    <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
        <button type="button" class="mdl-button">Agree</button>
        <button type="button" class="mdl-button close">Disagree</button>
    </div>
</dialog>
<script>
    var dialog = document.querySelector('dialog');
    var showModalButton = document.querySelector('.show-modal');
    if (dialog.showModal) {


    }
    showModalButton.addEventListener('click', function() {
        dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
        dialog.close();
    });
</script>
</body>


    <script type="text/javascript">
        $('.slideshow_zoom').each(function() {
            var $link = $(this);

            var $dialog = $('<img src="' + $link.attr('href') + '" style="height: 170px;!important; width: 150px;!important;"/>')
                .dialog({
                    autoOpen: false,
                    resizeable: false,
                    modal: true,
                    width: 800,
                    height: 700,
                    closeOnEscape: true,
                    dialogClass: 'zoom'
                });
            $link.click(function() {
                $dialog.dialog('open');

                return false;
            });
        });

    </script>
</head>

</html>



<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>


<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>


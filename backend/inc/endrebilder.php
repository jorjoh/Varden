<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 12.04.2016
 * Time: 20:29
 */

echo "<h1> Oversikt over bilder som er tilgjengelig </h1>";

//URL for bilder
include("functions/dbcon.php");    // kobler til databasen
$sqlsetning = "SELECT * FROM images;";    // velger alt fra tabellen fag
$sqlresultat = mysqli_query($connect, $sqlsetning) or die ("Ikke mulig å hente data");
$antallRader = mysqli_num_rows($sqlresultat);

echo("<table class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">");
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

?>



<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>



    <script type="text/javascript">
        $('.slideshow_zoom').each(function() {
            var $link = $(this);

            var $dialog = $('<img src="' + $link.attr('href') + '" />')
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





<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>


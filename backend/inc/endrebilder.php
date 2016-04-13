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
        <th class=\\'mdl - data - table__cell--non - numeric\\'>Bilder(filename)</th>
        <th>Beskrivelse</th>
        <th>URL</th>
        <th>Antall ganger vist</th>
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
        <td class=\\'mdl - data - table__cell--non - numeric\\'>$filnavn</td>
        <td>$beskrivelse</td>
        <td><a href='$url'>Link til bilde</a> </td>
        <td>$count</td>
    </tr>
    </tbody>");


}
echo("</table>");

?>
<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>
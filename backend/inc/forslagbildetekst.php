<?php

//Tabell over innsendte forsalg til bilde id
$sqlrequesttable = "SELECT image_id, requesttext, processed FROM request WHERE image_id = $id AND processed = 0;";    // velger alt fra tabellen images

$sqlreqestresult = mysqli_query($connect, $sqlrequesttable) or die ("Ikke mulig å hente data");

$numberofrows = mysqli_num_rows($sqlreqestresult);

echo("<table class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\" style='width: 200px;'>");   // Material design tabell som brukes til å få en oversikt av bildene i DB
echo("<thead>");
echo(" <tr>
        <th class=\\'mdl-data-table__cell--non-numeric\\'>Bilder(filename)</th> <!--//Table headers-->
        <th>Beskrivelse</th>
        <th>Behandlet</th>
    </tr>");                                                                    //End of table headers
for ($r = 1; $r <= $numberofrows; $r++) {  // For-loop som kjører gjennom arrayet og skriver ut informasjonen til alle bilder i tabellen
    $rad = mysqli_fetch_array($sqlreqestresult);
    $imageid = $rad["image_id"];
    $requesttext = $rad["requesttext"];
    $processed = $rad["processed"];

    echo("
    </thead>
    <tbody>
    <tr data-mdl-data-table-selectable-name=\"materials[]\" data-mdl-data-table-selectable-value=\"acrylic\">   <!-- fyller op rader med informasjon fra databasen-->
        <a href='#'> <td class=\\'mdl-data-table__cell--non-numeric\\'>$imageid</td>
        <td>$requesttext</td>
        <td style='text-align: right;'>$processed</td> </a>
    </tr>
    </tbody>");
}
echo("</table>"); // SLutt på tabell
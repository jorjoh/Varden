<?php

//Tabell over innsendte forsalg til bilde id
$sqlrequesttable = "SELECT image_id, requesttext, processed FROM request WHERE image_id = $id AND processed = 0;";    // velger alt fra tabellen images

$sqlreqestresult = mysqli_query($connect, $sqlrequesttable) or die ("Ikke mulig å hente data");

$numberofrows = mysqli_num_rows($sqlreqestresult);

echo("<table id='mytable' class=\"mdl-data-table mdl-js-data-table mdl-data-table--mdl-shadow--2dp\" style='width: 200px;'>");   // Material design tabell som brukes til å få en oversikt av bildene i DB
echo("<thead>");
echo(" <tr>
        <th class=\\'mdl-data-table__cell--non-numeric\\'>Velg</th> <!--//Table headers-->
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
       <td><input type='radio' name='test' value='$requesttext'></td>
       <a href='#'> <td class=\\'mdl-data-table__cell--non-numeric\\'>$imageid</td>
        <a href='#'><td>$requesttext </td></a>
        
        <td style='text-align: right;'>$processed</td> </a>
    </tr>
    </tbody>
    "
    );
}
echo("</table>"); // SLutt på tabell
?>

<?php

echo" <form id='test'>
            <textarea name='editor1' id='editor1' rows='10' cols='80'>
            </textarea>
        </form>";

?>
<script>
    $('#mytable').find('input').click(function() {
        $('#editor1').text($('input[name=test]:checked').val());
    });
</script>

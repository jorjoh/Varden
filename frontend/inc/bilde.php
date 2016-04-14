<?php

$id = intval($_GET['id']); // Variabel som fanger opp ID nummeret til bilde og brukes i SQL spørringen - Må være et tall
$sql = "SELECT * FROM images WHERE id = $id;"; // SQL spørring som henter all informasjonen som ligger i image tabellen i databasen
$result = mysqli_query($connect, $sql) or die('Kunne ikke hente bildet fra DB'); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet
$row = mysqli_fetch_array($result); // Henter kolonnene inn i egne array
$count = $row['count']; // Henter antall visninger bilde har
$url = $row['url']; // Henter URL'en til bilde

// Hvis ikke ID'en er definert i URL eller det ikke finnes noen bilder med ID'en som er definert i URL'en
if(empty($id) || $rows < 1) {
    header("Location: ?side=forside"); // Send brukeren tilbake til forsiden
}
else {
    // Øker $count / visning på bilde med 1 når bildet vises
    $count++;
    // Oppdaterer count i databasen, for å kunne bruke den informasjonen til å vise frem mest viste bilder på forsiden
    $hitSQL = "UPDATE images SET count = $count WHERE id=$id;";
    // Kjører spørringen til databasen og returnerer feilmelding hvis det ikke blir vellykket
    $updatehits = mysqli_query($connect, $hitSQL) or die('Kunne ikke oppdatere antall visninger på bildet');
    // Inkluderer søkefeltet
    include('searchfield.php');
    echo "<br>
    <div class='row'>
            <div style='width: 100%; min-height: 800px; background: #FFF;'>
                <br>
                <br>
                <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
                    her som vises uansett om du har adblock eller ikke
                </div>
                <br>
                <br>
                <div style='width: 60%; height: 450px; margin: 0 auto; background: #e6eef1;'>
                    <img class='lazy' style='float: left; width: 50%;;' data-original='$url'>
                    <br>
                    <p style='float: right; margin-right: 100px;'>Her kommer bildeinfo</p>
                </div>
                <br>
            </div>
        </div>
    ";
}
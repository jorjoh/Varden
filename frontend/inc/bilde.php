<?php

$id = $_GET['id']; // Variabel som fanger opp ID nummeret til bilde og brukes i SQL spørringen
$sql = "SELECT * FROM images WHERE id = $id;"; // SQL spørring som henter all informasjonen som ligger i image tabellen i databasen
$result = mysqli_query($connect, $sql); // resultatet fra spørringen over
$rows = mysqli_num_rows($result); // Teller antall rader som returneres fra resultatet

// Hvis ikke ID'en er definert i URL eller det ikke finnes noen bilder med ID'en som er definert i URL'en
if(empty($id) || $rows < 1) {
    header("Location: ?side=forside"); // Send brukeren tilbake til forsiden
}
else {
    include('searchfield.php');
    echo "<br>
    <div class='row'>
            <div style='width: 100%; background: #FFF;'>
                <br>
                <br>
                <div style='width: 950px; height: 150px; text-align: center; margin: 0 auto; background: #CCC;'><br><br>Annonse
                    her som vises uansett om du har adblock eller ikke
                </div>
                <br>
                <br>
                <div style='width: 60%; height: 450px; margin: 0 auto; background: #e6eef1;'>
                    <img class='lazy' style='float: left;' data-original='http://placehold.it/450x450'>
                    <br>
                    <p style='float: right; margin-right: 100px;'>Her kommer bildeinfo</p>
                </div>
                <br>
            </div>
        </div>
    ";
}
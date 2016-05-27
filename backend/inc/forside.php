<h1 class="page-header">Oversikt - Administrator</h1>

<?php
// SQL setning for å hente forslag som ikke er behandlet
$sql = "SELECT id, image_id, requesttext FROM request WHERE processed = 0 ORDER BY image_id;";
$query = mysqli_query($connect, $sql) or die('Kunne ikke hente informasjon fra DB!');
$nbr = mysqli_num_rows($query);

$sqlmostviewed = "SELECT id, count FROM images ORDER BY count DESC LIMIT 0, 10";
$mostviewedquery = mysqli_query($connect, $sqlmostviewed) or die('Kunne ikke hente data fra DB'.mysqli_error($connect));

// SQL Spørring for å hente antall behandlede forslag
$sqlprocessed = "SELECT processed FROM request WHERE processed = 1;";
$processedquery = mysqli_query($connect, $sqlprocessed) or die('Kunne ikke hente data fra DB');
$processed = mysqli_num_rows($processedquery);

?>

<div class="row placeholders">
    <div class="col-xs-5 col-sm-5 placeholder">
        <canvas id="processedsugestions"></canvas>
        <h4>Behandlede forslag</h4>
        <span class="text-muted">Antall forslag behandlet denne uken</span>
    </div>
    <script>
        var ctx = document.getElementById("processedsugestions");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Behandlet", "Ikke behandlet"],
                datasets: [{
                    data: [<?php echo $processed; ?>, <?php echo $nbr; ?>],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB"
                    ],
                    hoverBackgroundColor: [
                        "#FFCE56",
                        "#FFCE56"
                    ]
                }]
            }
        });
    </script>
    <div class="col-xs-5 col-sm-5 placeholder">
        <canvas id="mostviewed"></canvas>
        <h4>Mest viste bilde</h4>
        <span class="text-muted">Totalt de 10 mest viste bildene</span>
    </div>
    <?php
    $mostviewedcount = array();
    $mostviewedid = array();
    for($i = 0; $i < mysqli_num_rows($mostviewedquery); $i++) {
        $viewedrow = mysqli_fetch_array($mostviewedquery);
        $mostviewedcount[] = $viewedrow['count'].",";
        $mostviewedid[] = $viewedrow['id'].",";
    }
    ?>
    <script>
        var ctx = document.getElementById("mostviewed");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "Bilde " + <?php echo "$mostviewedid[0] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[1] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[2] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[3] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[4] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[5] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[6] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[7] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[8] ,"; ?>
                    "Bilde " + <?php echo "$mostviewedid[9] ,"; ?>
                ],
                datasets: [{
                    label: "Antall ganger sett på",
                    data: [
                        <?php echo "$mostviewedcount[0] ,"; ?>
                        <?php echo "$mostviewedcount[1] ,"; ?>
                        <?php echo "$mostviewedcount[2] ,"; ?>
                        <?php echo "$mostviewedcount[3] ,"; ?>
                        <?php echo "$mostviewedcount[4] ,"; ?>
                        <?php echo "$mostviewedcount[5] ,"; ?>
                        <?php echo "$mostviewedcount[6] ,"; ?>
                        <?php echo "$mostviewedcount[7] ,"; ?>
                        <?php echo "$mostviewedcount[8] ,"; ?>
                        <?php echo "$mostviewedcount[9] "; ?>
                    ],
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#4BC0C0",
                        "#FFCE56",
                        "#FF9933",
                        "#FF6666",
                        "#FF99FF",
                        "#9999FF",
                        "#66FF99",
                        "#CCFF33",
                        "#CCCCFF",
                        "#654FFC",
                        "#CCFF66",
                        "#FF0000",
                        "#FFEE22",
                        "#66CCFF",
                        "#99FFCC",
                        "#FFCC66",
                        "#FFCC66"
                    ]
                }]
            }
        });
    </script>
</div>

<h2 class="sub-header">Ubehandlede forslag<span class="mdl-badge" data-badge="<?php echo $nbr; ?>"></span></h2>


<?php
if ($nbr <= 0){
    echo "<p style='font-size: 16pt; text-align: center; padding: 20px; background: #c0c0c0; border-radius: 5px;'> Det finnes ingen ubehandlede forslag </p>";
}
else{
echo '<div class="table-responsive">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table-- mdl-shadow--2dp" style="width:100%" >
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">#</th>
            <th>Bilde ID</th>
            <th>Forslag</th>
        </tr>
        </thead>
        <tbody>
        ';
        while($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $pictureid = $row['image_id'];
            $requesttext = $row['requesttext'];
            echo "
                        <tr>
                            <td>$id</td>
                            <td>$pictureid</td>
                            <td>$requesttext</td>
                        </tr>
                    ";
        }
    echo '
</tbody>
</table>
</div>';
}
?>


<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>
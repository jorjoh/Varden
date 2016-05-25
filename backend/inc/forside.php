<h1 class="page-header">Oversikt - Administrator</h1>

<?php
// SQL setning for å hente forslag som ikke er behandlet
$sql = "SELECT id, image_id, requesttext FROM request WHERE processed = 0 ORDER BY image_id;";
$query = mysqli_query($connect, $sql) or die('Kunne ikke hente informasjon fra DB!');
$nbr = mysqli_num_rows($query);

$sqlmostviewed = "SELECT count FROM images ORDER BY count DESC LIMIT 0, 10";
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
    <script>
        var ctx = document.getElementById("mostviewed");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Bilde 1", "Bilde 2", "Bilde 3", "Bilde 4", "Bilde 5", "Bilde 6", "Bilde 7", "Bilde 8", "Bilde 9", "Bilde 10"],
                datasets: [{
                    label: "Antall ganger sett på",
                    data: [
                        <?php
                            while($viewedrow = mysqli_fetch_array($mostviewedquery)) {
                                echo $viewedrow['count'].",";
                            }
                        ?>
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
                        "#CCFF33"
                    ]
                }]
            }
        });
    </script>
</div>

<h2 class="sub-header">Ubehandlede forslag</h2>
<!--<p>Det er <?php echo $nbr; ?> ubehandlede forslag</p>-->

<span class="mdl-badge" data-badge="<?php echo $nbr; ?>">Antall ubehandlede forslag</span>
<div class="table-responsive">
    <table class="mdl-data-table mdl-js-data-table mdl-data-table-- mdl-shadow--2dp" style="width:100%" >
        <thead>
        <tr>
            <th class="mdl-data-table__cell--non-numeric">#</th>
            <th>Bilde ID</th>
            <th>Forslag</th>
        </tr>
        </thead>
        <tbody>
        <?php
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
        ?>
        </tbody>
    </table>
</div>

<link rel="stylesheet" href="css/material.min.css"/>
<link rel="stylesheet" href="css/custom.css"/>
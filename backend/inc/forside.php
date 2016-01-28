<script src="script/Chart.js"></script>
<script src="script/chartScript.js"></script>
<script src="script/backroundResources/highcharts.js"></script>
<script src="script/backroundResources/exporting.js"></script>

<div class="row">
    <div class="col-4" id="contentIntro"></div>
    <div class="col-8">
        <div id="container" style="margin: 0 auto; padding: 0;"></div>
    </div>
</div>
<div class="row">
    <div class="col-4" id="contentGraph">
        <h2> Topp 10 forespørsler - behandlet denne uken <?php include("functions/datePicker.php"); ?></h2>
        <h3 id="userInfo">Brukernavn</h3>
        <ul>
            <li>Bruker 1</li>
            <li>Bruker 2</li>
            <li>Bruker 3</li>
        </ul>
        <h3 id="userInfo">Antall</h3>
        <ul>
            <li>50</li>
            <li>18</li>
            <li>4</li>
        </ul>
    </div>

    <div id="canvas-holder" style="width:50%">
        <canvas id="chart-area" width="600" height="600"> </canvas>
    </div>
</div>


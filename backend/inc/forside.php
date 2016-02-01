<script src="script/Chart.js"></script>
<script src="script/semiDounutChart.js"></script>
<script src="script/backroundResources/highcharts.js"></script>
<script src="script/backroundResources/exporting.js"></script>
<script src="script/chartGraph.js"></script>
<script src="script/backroundResources/canvasjs.min.js"></script>

<div class="row">
    <div class="col-4" id="contentIntro">
        <h2>Hei $user, velkommen til backend-administreringverktøy</h2>
        <h3>Her kommer det vel litt mer statestikk</h3>
    </div>
    <div class="col-8" style="  width:400px; margin-left: 450px ">
        <h2>Antall forespørsler behnadlet denne uken </h2>
        <div id="container" style="margin: 0 auto; padding: 0; border: solid black 2px; width:550px; height: 360px"> <h1>TEST</h1></div>
    </div>
</div>
<div class="row">
    <div class="col-4" id="contentGraph">
        <h2> Topp 10 forespørsler - behandlet uke <?php include("functions/datePicker.php"); ?></h2>
        <h3 id="userInfo">Brukernavn</h3>
        <ul>
            <li>Bruker 1</li>
            <li>Bruker 2</li>
            <li>Bruker 3</li>
        </ul>
        <!--Disse kulepunkmenyene skal egentlig ligge horsontalt ved siden av hverandre-->
        <h3 id="userInfo">Antall</h3>
        <ul>
            <li>50</li>
            <li>18</li>
            <li>4</li>
        </ul>
    </div>

    <h1 id="titleChartGraph">Endringer dager/uker</h1>
    <div class="col-8" style="border: solid black 1px; height: 360px; width: 550px; margin-left: 450px;r">
        <div id="chartContainer" style="height: 300px; width:100%;">
        </div>
    </div>
</div>
<div id="canvas-holder" style="width:20%">
    <canvas id="chart-area" width="600" height="600"> </canvas>
</div>


<script src="script/Chart.js"></script>
<body>
<div id="canvas-holder" style="width:30%">
    <canvas id="chart-area" width="300" height="300" style="border: solid black 1px"> </canvas>
</div>

<script>

    var polarData = [
        {
            value: 250,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Red"
        },
        {
            value: 50,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Green"
        },
        {
            value: 100,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Yellow"
        },
        {
            value: 40,
            color: "#949FB1",
            highlight: "#A8B3C5",
            label: "Grey"
        },
        {
            value: 120,
            color: "#4D5360",
            highlight: "#616774",
            label: "Dark Grey"
        }

    ];

    window.onload = function(){
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPolarArea = new Chart(ctx).PolarArea(polarData, {
            responsive:true
        });
    };

</script>
</body>


<div class="row">
    <div class="col-4" id="contentIntro"></div>
    <div class="col-8" id="statisticContent"></div>
</div>
<div class="row">

    <div class="col-4" id="contentGraph">

    </div>
</div>
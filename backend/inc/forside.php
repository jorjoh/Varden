
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="/backend/script/semiCricleDonut.js"></script>


<div class="row">
    <div class="col-4" id="contentIntro"></div>
    <div class="col-8" id="statisticContent"></div>
</div>
<div class="row">

    <div class="col-4" id="contentGraph">


    </div>
</div>


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; position:relative;  margin: 0 auto">heigit</div>
<script>
    $(function () {
        $("#container").highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: 'Browser<br>shares<br>2015',
                align: 'center',
                verticalAlign: 'middle',
                y: 40
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%']
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                innerSize: '50%',
                data: [
                    ['Firefox',   10.38],
                    ['IE',       56.33],
                    ['Chrome', 30.03],
                    ['Safari',    4.77],
                    ['Opera',     0.91],
                    {
                        name: 'Proprietary or Undetectable',
                        y: 0.2,
                        dataLabels: {
                            enabled: false
                        }
                    }
                ]
            }]
        });
    });</script>
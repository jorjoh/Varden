/**
 * Created by Jørgen Johansen on 27.01.2016.
 */
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


//SemiDonutCircle
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            marginTop: -50,
            marginLeft: -50,
            marginRight: 0
        },
        title: {
            text: 'Browser<br>shares',
            align: 'center',
            verticalAlign: 'middle',
            y: 50
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: 'black',
                    }
                },
                size: '100%',
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            size: '100%',
            name: 'Browser share',
            marginTop:0,
            marginLeft:-100,
            innerSize: '60%',
            data: [
                ['Firefox',   45.0],
                ['IE',       26.8],
                ['Chrome', 12.8],
                ['Safari',    8.5],
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});


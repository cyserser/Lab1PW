<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>

<script src="src/highcharts.js"></script>
<script src="src/modules/data.js"></script>
<script src="src/modules/exporting.js"></script>
<script src="src/modules/export-data.js"></script>



En laravel meterlo en public!!



<?php

$tituloLast ="Datos del sensor de temperatura";
$serie='Temperatura (ºC)';



?>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



		<script type="text/javascript">
Highcharts.getJSON(
    'get_temp_json.php',
    function (data) {

        Highcharts.chart('container', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: '<?= $tituloLast; ?>'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: '<?= $serie; ?>'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Temp',
                data: data
            }]
        });
    }
);
		</script>
	</body>
</html>

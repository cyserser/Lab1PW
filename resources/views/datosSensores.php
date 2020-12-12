<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plataforma Web para IoT</title>

    <link rel="stylesheet" href="CSS/index.css">

</head>
<body>

<?php
use App\Http\Controllers\channelController;
use App\Usuario;
$canales = session('canales'); // si utilizamos session se rompe, dado que no reconoce la sesion todavia.
$usuarios = session('usuarios');
$canalesAll = channelController::getChannels(); // se lo pasamos STATIC method de tal manera que no tengamos que logear primero..
?>

<?php if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>

<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/modules/export-data.js"></script>

<?php
$nombreCanal="";
foreach($canalesAll as $canal){
    if($canal->id == $idCanal){
        $nombreCanal = $canal->nombreCanal;
    }
}
$titulo ="Datos del sensor del ".$nombreCanal;
$serie='Datos';
?>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script id="graficaID" type="text/javascript">
    Highcharts.getJSON(
        '<?php echo "getDatosSensores".$idCanal ?>', //cambiar ruta para el controlador
        function (data) {

            Highcharts.chart('container', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: '<?= $titulo; ?>'
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
                    name: 'Value',
                    data: data
                }]
            });
        }
    );
</script>

<?php include 'footer.php';?>

</body>
</html>

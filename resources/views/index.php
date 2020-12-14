<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plataforma Web para IoT</title>

    <link rel="stylesheet" href="CSS/index.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        function get_time(){
            $("#numberofuser").load("ajaxUsers");
            $("#numberofchannel").load("ajaxChannels");
            $("#lastUser").load("ajaxLastUser");
            setTimeout(get_time,2000);
        }
    </script>

</head>
<body>

<script src="js/highcharts.js"></script>
<script src="js/modules/data.js"></script>
<script src="js/modules/exporting.js"></script>
<script src="js/modules/export-data.js"></script>

<?php
use App\Http\Controllers\channelController;
$canales = session('canales');
$usuarios = session('usuarios');
$canalesAll = channelController::getChannels();
$usuariosAll = channelController::getUsers(); // pasado como static method para que lo reconozca sin acceder a canales
$numberOfChannels = channelController::getNumberOfChannels();
if($numberOfChannels>=2){
    $lastChannel = channelController::getLastChannel();
    $secondLastChannel = channelController::getSecondLastChannel();

    // Para coger el nombre del canal (Se puede optimizar más)
    $nombreCanalLast="";
    $nombreCanalSecondLast="";
    foreach($canalesAll as $canal) {
        if ($canal->id == $secondLastChannel->id) {
            $nombreCanalSecondLast = $canal->nombreCanal;
        }

        if ($canal->id == $lastChannel->id) {
            $nombreCanalLast = $canal->nombreCanal;
        }
    }

    $tituloLast ="Datos del sensor del ".$nombreCanalLast;
    $tituloSecondLast ="Datos del sensor del ".$nombreCanalSecondLast;
    $serie='Datos';
}

$name = session('name'); // nombre de login para comprobar si esta logeado o no
?>


<?php if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>

<aside id="lateral">
    <blockquote>
        <table>
            <tr>
                <th>Número de usuarios: </th>
                <th><div id="numberofuser"></div></th>
            </tr>
            <tr>
                <th>Número de canales: </th>
                <th><div id="numberofchannel"></div></th>
            </tr>
            <tr>
                <th>Último user: </th>
                <th><div id="lastUser"></div></th>
            </tr>
        </table>
        <script>
            setTimeout(get_time,1000);
        </script>
    </blockquote>
</aside>

<section id="main">
    <article class="articulo">
        <hgroup>
            <h1>MyWebIot</h1>
        </hgroup>

        <p>
            Welcome to our page!!

            Register to create your own channel or simply check others channels.
        </p>

        <div class="centrarBoton">
            <?php
            if($name == null || $name == ""){ // Boton empezar YA, si no hemos logeado nos logeamos sino vamos a misCanales!!
            ?>
            <form method="get" name="empiezaYa" action=<?php echo "login"?>>
                <button class="boton" type="submit"> Empieza ya </button>
            </form>
            <?php
            } else {
            ?>
            <form method="get" name="empiezaYa" action=<?php echo "user"?>>
                <button class="boton" type="submit"> Empieza ya </button>
            </form>
            <?php
            }
            ?>
        </div>

    </article>

    <article class="articulo">

        <hgroup>
            <h1>Últimos canales</h1>
        </hgroup>
        <div class="row">
            <?php if($numberOfChannels<2) {
                echo "<p class='warning'>Se necesitan almenos dos canales para que se muestre la información en esta sección</p>";
                return 0;
            } else {
                ?>
            <div class="figura">
                <section class="section">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    <script id="graficaID" type="text/javascript">
                        Highcharts.getJSON(
                            '<?php echo "getDatosSensores".$secondLastChannel->id?>', //cambiar ruta para el controlador
                            function (data) {
                                Highcharts.chart('container', {
                                    chart: {
                                        zoomType: 'x'
                                    },
                                    title: {
                                        text: '<?= $tituloSecondLast; ?>'
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
                </section>
            </div>

            <hr>

                <div class="figura">
                    <section class="section">
                        <div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        <script id="graficaID" type="text/javascript">
                            Highcharts.getJSON(
                                '<?php echo "getDatosSensores".$lastChannel->id?>', //cambiar ruta para el controlador
                                function (data) {
                                    Highcharts.chart('container2', { // OJO cambiar container o se solapan!!!!!!!
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
                                            name: 'Value',
                                            data: data
                                        }]
                                    });
                                }
                            );
                        </script>
                    </section>
                </div>

                <?php

            } ?>
        </div>

    </article>

</section>

<script>
    setTimeout(get_time,1000);
</script>
<?php include 'footer.php';?>

</body>
</html>

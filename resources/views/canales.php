<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Canales</title>

    <link rel="stylesheet" href="CSS/canales.css">

</head>
<body>
<?php use App\Http\Controllers\channelController;
use App\Http\Controllers\socialController;
use App\Usuario;

$canalesAll = channelController::getAllChannels();
$usuariosAll = channelController::getUsers();

$usersAll = channelController::getUsers();
$friendAll = socialController::getAllFriend();
?>

<?php
include 'headerCanales.php';
?>
<hgroup>
    <h1>Listado de todos los canales dados de alta</h1>
</hgroup>

<section>
    <?php foreach ($canalesAll as $canal) {
        ?>
        <article class="canalArticulo">
            <p>Información sobre el canal de: <?php
                $idUsuario = $canal->id_user;
                foreach ($usuariosAll as $usuario) {
                    if ($usuario->id == $idUsuario) {
                        $nombreUsuario = $usuario->nombre;
                        break;
                    }
                }
                echo $nombreUsuario ?> </p>
            <p>Nombre del canal: <?php echo $canal->nombreCanal ?> </p>
            <p>Descripción: <?php echo $canal->descripcion ?></p>
            <p>Fecha: <?php echo $canal->fecha ?></p>
            <p>Longitud: <?php echo $canal->longitud ?></p>
            <a href=<?php echo "getDatosGrafica" . $canal->id ?>><img class="grafica" src="img/stats.png"></a>
            <p>Latitud: <?php echo $canal->latitud ?></p>
            <p>Nombre del sensor: <?php echo $canal->nombreSensor ?></p>
            <form method="get" name="getWebServiceRest" action=<?php echo "getWebServiceRest" . $canal->id ?>>
                <button class="boton2" type="submit"> Get Web Service Rest</button>
            </form>



        </article>
        <?php
    }
    ?>

</section>

<div id="nextPreviousButton">

    <a href="#" class="previous round">&#8249; </a>

    <span>1  2...</span>

    <a href="#" class="next round">&#8250;</a>
</div>

<?php include 'footer.php'; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis Canales</title>

    <link rel="stylesheet" href="CSS/misCanales.css">
</head>
<body>
<?php use App\Http\Controllers\channelController;
use App\Http\Controllers\socialController;
use App\Usuario;

$canales = session('canales');
$usuarios = session('usuarios');

$canalesAll = channelController::getChannels();

$usersAll = channelController::getUsers();
$friendAll = socialController::getAllFriend();
?>

<?php include 'headerLogged.php'; ?>


<button onclick="location.href = 'nuevoCanal' ">Nuevo Canal</button>

<hgroup>
    <h1>Listado de todos los Canales dados de alta del usuario</h1>
</hgroup>

<section>

    <?php foreach ($canales as $canal) {
//        if (session('user') == $canal->id) {
        ?>
        <article class="canalArticulo">
            <!--    <a href="deleteChannel/{--><?php //$canal->id
            ?><!--}"> <img class="papelera" src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></a>-->
            <a href= <?php echo "deleteChannel/" . $canal->id ?>> <img class="papelera"
                                                                       src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></a>
            <p>Información sobre el canal: <?php echo $usuarios ?> </p>
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
//        }
    }
    ?>

</section>

<hgroup>
    <h1>Listado de canales de tus amigos</h1>
</hgroup>

<section>
<!--    Nos aparecerá el canal si tenemos BOND!!-->
    <?php foreach ($canalesAll as $canal) {
        foreach ($friendAll as $friend) {
            if (socialController::meSiguen($friend->id_user) == true) {
                if (socialController::comprobarBond($friend->id_user) == true) {
                    if ($friend->id_user == $canal->id) {
                        ?>
                        <article class="canalArticulo">
                            <?php
                            foreach ($usersAll as $user) {
                                if ($canal->id == $user->id) {

                                    ?>
                                    <p>Información sobre el canal: <?php echo $user->nombre ?> </p>
                                    <?php
                                }
                            }
                            ?>
                            <p>Nombre del canal: <?php echo $canal->nombreCanal ?> </p>
                            <p>Descripción: <?php echo $canal->descripcion ?></p>
                            <p>Fecha: <?php echo $canal->fecha ?></p>
                            <p>Longitud: <?php echo $canal->longitud ?></p>
                            <a href=<?php echo "getDatosGrafica" . $canal->id ?>><img class="grafica"
                                                                                      src="img/stats.png"></a>
                            <p>Latitud: <?php echo $canal->latitud ?></p>
                            <p>Nombre del sensor: <?php echo $canal->nombreSensor ?></p>
                            <form method="get" name="getWebServiceRest"
                                  action=<?php echo "getWebServiceRest" . $canal->id ?>>
                                <button class="boton2" type="submit"> Get Web Service Rest</button>
                            </form>

                        </article>
                        <?php
                    }
                }
            }
        }
    }
    ?>

</section>

<?php include 'footer.php'; ?>


</body>
</html>

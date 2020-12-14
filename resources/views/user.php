<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis Canales</title>

    <link rel="stylesheet" href="CSS/misCanales.css">
</head>
<body>
<?php use App\Usuario;
$canales = session('canales');
$usuarios = session('usuarios');
?>

<?php include 'headerLogged.php';?>


<button onclick="location.href = 'nuevoCanal' " >Nuevo Canal</button>

<hgroup>
    <h1>Listado de todos los Canales dados de alta del usuario</h1>
</hgroup>

<section>

    <?php foreach ($canales as $canal){
        ?>
    <article class="canalArticulo">
<!--    <a href="deleteChannel/{--><?php //$canal->id ?><!--}"> <img class="papelera" src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></a>-->
        <a href= <?php echo "deleteChannel/".$canal->id ?>> <img class="papelera" src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></a>
        <p>Información sobre el canal: <?php echo $usuarios ?> </p>
        <p>Nombre del canal: <?php echo $canal->nombreCanal?> </p>
        <p>Descripción: <?php echo $canal->descripcion?></p>
        <p>Fecha: <?php echo $canal->fecha?></p>
        <p>Longitud: <?php echo $canal->longitud?></p>
        <a href=<?php echo "getDatosGrafica".$canal->id ?>><img class="grafica" src="img/stats.png"></a>
        <p>Latitud: <?php echo $canal->latitud?></p>
        <p>Nombre del sensor: <?php echo $canal->nombreSensor?></p>
        <form method="get" name="getWebServiceRest" action=<?php echo "getWebServiceRest".$canal->id ?>>
            <button class="boton2" type="submit"> Get Web Service Rest </button>
        </form>

    </article>
    <?php
    }
    ?>

</section>

<?php include 'footer.php';?>


</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Canal</title>

    <link rel="stylesheet" href="CSS/nuevoCanal.css">
    <script type="text/javascript" src="js/comprobarNewChannel.js"></script>

</head>
<body>

<?php
$canales = session('canales');
$usuarios = session('usuarios');

if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>

<form class="formulario" id="formularioNewChannel" method="get" action="newChannel">

    <div class="formularioDiv">

        <p><label>Nombre del canal</label> <input type="text" size="15" name="nombreCanal" id="nombreCanal"></p>

        <p><label>Descripción</label> <input type="text" size="15" name="descripcion" id="descripcion"></p>

        <p><label>Longitud</label> <input type="number" size="15" name="longitud" id="longitud"></p>

        <p><label>Latitud</label> <input type="number" size="15" name="latitud" id="latitud"></p>

        <p><label>Nombre del sensor</label> <input type="text" size="15" name="nombreSensor" id="nombreSensor"></p>

        <input class="boton" type="reset" value="Borrar">

        <input class="boton" type="button" value="Crear" onclick="comprobarDatosNewChannel();">

    </div>

</form>

</body>
</html>

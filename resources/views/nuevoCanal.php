<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Canal</title>

    <link rel="stylesheet" href="CSS/nuevoCanal.css">
    <?php include 'headerAndFooter.php';?>

</head>
<body>


<form class="formulario" method="get" action="">

    <div class="formularioDiv">


        <p><label>Nombre del canal</label> <input type="text" size="15" name="nombreCanal"></p>

        <p><label>Descripción</label> <input type="text" size="15" name="descripcion"></p>

        <p><label>Longitud</label> <input type="text" size="15" name="longitud"></p>

        <p><label>Latitud</label> <input type="text" size="15" name="latitud"></p>

        <p><label>Nombre del sensor</label> <input type="text" size="15" name="nombreSensor"></p>

        <input class="boton" type="reset" value="Borrar"> <input class="boton" type="submit" value="Crear">

    </div>


</form>



</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Canal</title>

    <link rel="stylesheet" href="CSS/nuevoCanal.css">
</head>
<body>

<header id="cabecero">

    <nav>
        <ul>
            <div class="listaNavegacion">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2996/2996929.svg">
                <a href="">MyWebIoT</a>
                <a href="">Canales</a>
                <a href="">Ayuda</a>
                <a href="">Contacto</a>
                <div class="listaNavegacion-derecha">


                    <a href="">Login</a>
                    <a href="">Register</a>

                </div>
            </div>
        </ul>
    </nav>

</header>

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


<div id="footer">
    <footer>
        <p>Autor: Cunwang Guo</p>
        <p>Copyright &copy; 2020</p>
    </footer>
</div>


</body>
</html>

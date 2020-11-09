<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ayuda</title>
    <link rel="stylesheet" href="CSS/ayuda.css">
    <link rel="stylesheet" href="CSS/contacto.css" class="caja">
</head>
<body>

<header id="cabecero">

    <nav>
        <ul>
            <div class="listaNavegacion">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2996/2996929.svg">
                <a href="index">MyWebIoT</a>
                <a href="canales">Canales</a>
                <a href="ayuda">Ayuda</a>
                <a href="contacto">Contacto</a>
                <div class="listaNavegacion-derecha">


                    <a href="login">Login</a>
                    <a href="register">Register</a>

                </div>
            </div>
        </ul>
    </nav>

</header>

<div class="caja">

<h1>Ayuda</h1>

<p>Selecciona en la lista la duda que necesites que te resolvamos</p>

<form class="formulario" method="get" action="">

    <div class="formularioDiv">

        <label for="motivo">Selecciona una opción</label>
        <select id="motivo" name="motivo">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="motivo1">La pagina web no se carga correctamente en mi explorador</option>
            <option value="motivo2">Existe problemas de login</option>
            <option value="motivo3">No encuentro la información requerida</option>
            <option value="motivo4">Otros</option>
        </select>

        <input class="boton2" type="submit" value="Submit">

    </div>

</form>

</div>



<div id="footer">
    <footer>
        <p>Autor: Cunwang Guo</p>
        <p>Copyright &copy; 2020</p>
    </footer>
</div>


</body>
</html>

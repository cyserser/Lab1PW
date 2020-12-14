<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <script type="text/javascript" src="js/comprobar.js"></script>
    <link rel="stylesheet" href="CSS/registro.css">

<!--    <script type="text/javascript" src="{{ URL::to('js/comprobar.js') }}"></script>-->
<!--    <script src="{{asset('js/comprobar.js')}}"></script>-->

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

<form class="formulario" id="formularioRegister" method="get" action="getDatos">

    <div class="formularioDiv">

        <p><label>Nombre</label> <input type="text" size="15" name="nombre" id="nombre"></p>

        <p><label>Fecha de nacimiento</label> <input type="date" size="15" id="date" name="date"></p>

        <p><label>Email</label> <input type="email" size="15" name="email" id="email"></p>

        <p><label>Contraseña</label> <input type="password" id="password1"  size="15" name="password" minlength="8" maxlength="14" pattern="[A-Za-z0-9]+" required></p> <!-- el + para se pueda introducir todos los caracteres-->

        <p><label>Repita contraseña</label> <input type="password" id="password2"  size="15" name="password2"></p>

        <input class="boton" type="reset" value="Borrar">
        <input class="boton" type="button" value="Enviar" onclick="comprobarDatos();">

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

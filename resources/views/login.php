<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/login.css">
</head>
<body>

<header id="cabecero">

    <nav>
        <ul>
            <div class="listaNavegacion">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2996/2996929.svg">
                <a href="index">MyWebIoT</a>
                <a href="canales">Canales</a>
                <a href="">Ayuda</a>
                <a href="">Contacto</a>
                <div class="listaNavegacion-derecha">


                    <a href="login">Login</a>
                    <a href="register">Register</a>

                </div>
            </div>
        </ul>
    </nav>

</header>

<form class="formulario" method="get" action="misCanales">

    <div class="formularioDiv">

        <p><input type="email" placeholder="Email" size="15" name="email"></p>

        <p><input type="password" placeholder="Password" size="15" name="password" minlength="8" maxlength="14" pattern="[A-Za-z0-9]+" required></p>

        <div class="rememberMe">
            <p><input type="checkbox" name="checkbox"><label>Remember me</label></p>
        </div>

        <input class="boton2" type="submit" value="Login">

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/login.css">
    <script type="text/javascript" src="js/rememberMe.js"></script>
    <script type="text/javascript" src="js/comprobarLogin.js"></script>
</head>

<?php include 'header.php';?>
<body>

<form class="formulario" method="get" id="formularioLogin" action="procesarLogin">

    <div class="formularioDiv">

        <p><input type="email" placeholder="Email" size="15" name="email" id="email"></p>

        <p><input type="password" value="1234567890" placeholder="Password" size="15" name="password" id="password" minlength="8" maxlength="14" pattern="[A-Za-z0-9]+"></p>

        <div class="rememberMe">
            <p><input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label></p>
        </div>

        <input class="boton2" type="button" value="Login" onclick="comprobarDatosLogin();">

    </div>


</form>

<?php include 'footer.php';?>

</body>
</html>

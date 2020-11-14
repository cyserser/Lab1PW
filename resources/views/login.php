<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/login.css">

    <?php include 'headerAndFooter.php';?>


</head>
<body>


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


</body>
</html>

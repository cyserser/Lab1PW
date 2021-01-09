<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plataforma Web para IoT</title>

    <link rel="stylesheet" href="CSS/index.css">

    <link rel="stylesheet" href="CSS/myIoTsocial.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

</head>
<body>

<?php
session_start();

use App\Http\Controllers\channelController;

$canales = session('canales');
$usuarios = session('usuarios');
$canalesAll = channelController::getChannels();
$usuariosAll = channelController::getUsers(); // pasado como static method para que lo reconozca sin acceder a canales
$numberOfChannels = channelController::getNumberOfChannels();
$name = session('name'); // nombre de login para comprobar si esta logeado o no

use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;

$productoAll = productController::getProducts();
?>

<?php if ($canales != null && $usuarios != null) {
    include 'headerLogged.php';
} else {
    include 'header.php';
}
?>

<?php
$email = session('email');
?>


<section>
    <article class="socialArticle">
        <hgroup>
            <h1>Welcome to the IoT social media!</h1>
        </hgroup>
        <p>
            A social network is a social structure made up of a set of social actors,
            sets of dyadic ties, and other social interactions between actors.
        </p>
    </article>

    <div class="grid-containerDos">
        <div class="grid-itemDos">
            <hgroup>
                <h1>Mi Perfil</h1>
            </hgroup>
            <section class="sectionTwo">
                <div class="grid-containerSocial">
                    <div class="grid-itemSocial">
                        <img class="profileImg" src="img/man.png" alt="imagen">
                    </div>
                    <div class="grid-itemSocial">
                        <h3>Mi estado</h3>
                        <p class="textJustify">A social network is a social structure made up of a set of social
                            actors,
                            sets of dyadic ties, and other social interactions between actors.</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="grid-itemDos">
            <hgroup>
                <h1>Opciones</h1>
            </hgroup>
            <section class="grid-itemSocial">
                <button onclick="location.href = 'miembros'" style="float: left" class="botonSocialOpcionesDos">Miembros</button>
                <button onclick="location.href = 'amigos'"style="float: right" class="botonSocialOpcionesDos">Amigos</button>
                <button onclick="location.href = 'mensajes'" class="botonSocialOpciones">Mensajes</button>
                <button onclick="location.href = 'canales'" class="botonSocialOpciones">Canales</button>
                <button onclick="location.href = 'perfil'" class="botonSocialOpciones">Perfil</button>
            </section>

        </div>
    </div>

    <article class="socialArticle">
        <hgroup>
            <h1>Muro de myWebIoT</h1>
        </hgroup>
        <p>Último mensaje</p>
        <p>Penúltimo mensaje</p>
    </article>


</section>


<?php include 'footer.php'; ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">
    <link rel="stylesheet" href="CSS/canales.css">
    <script type="text/javascript" src="js/mensajesHide.js"></script>

</head>

<?php

use App\Http\Controllers\channelController;
use App\Http\Controllers\socialController;

$canales = session('canales');
$usuarios = session('user');

if ($usuarios != null) {
    include 'headerLogged.php';
} else {
    include 'header.php';
}

$usersAll = channelController::getUsers();
$friendAll = socialController::getAllFriend();
$getFriendCount = socialController::getFriendCount();
$messagesAll = socialController::getAllMessages();

?>
<body>

<div class="grid-container">

    <div class="grid-itemDos">
        <button class="botonSocialOpcionesTres" onclick="location.href = '<?php echo "miembros" ?>'">Members</button>
        <button class="botonSocialOpcionesTres" onclick="location.href = '<?php echo "amigos" ?>'">Friends</button>
        <button class="botonSocialOpcionesTres" onclick="location.href = '<?php echo "mensajes" ?>'">Messages</button>
        <button class="botonSocialOpcionesTres" onclick="location.href = '<?php echo "perfil" ?>'">Edit profile</button>
        <button class="botonSocialOpcionesTres" onclick="location.href = '<?php echo "user" ?>'">Channels</button>
    </div>

</div>
<form method="get" name="seguirSocial" id="seguirSocial" action="<?php echo "sendMessage" ?>">
    <?php
    foreach ($friendAll as $friends) {
        if (socialController::comprobarBond($friends->id_friend) == true) {
            ?>
            <div class="center">
                <p>Write your message</p>
                <textarea name="textarea" id="textarea" placeholder="Escribe tu mensaje aqui"></textarea>
                <select name="selector" id="selector">
                    <?php
                    foreach ($usersAll as $user) {
                        if (socialController::comprobarBond($user->id) == true) {
                            ?>
                            <option name="option" id="option"> <?php echo $user->nombre ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <br>
                <input type="radio" name="radioButton" value="public" checked>
                <label>Public</label>
                <input type="radio" name="radioButton" value="private">
                <label>Private</label>

                <input class="boton2" id="sendMessage" type="submit" value="Send message">

            <script>
                mensajesHide();
            </script>

            </div>
            <?php
            break;
        } else {
            ?>
            <p id="mensajeHide" style="color: red;font-size: 2vw;text-align: center">Debes de seguir a una persona primero!!</p>
            <?php

        }

    }
    ?>
</form>

<div class="grid-containerTres">
    <h2 style="padding: 10px">Your messages</h2>
    <p style="color: cornflowerblue">Mensajes enviados azul</p>
    <p style="color: forestgreen">Mensajes recibidos verde </p>
    <p style="color:violet;">Mensajes susurrados violeta</p>
</div>

<?php
foreach ($messagesAll as $message) {
    if ($message->auth == session('user')) {
        foreach ($usersAll as $user) {
            if ($user->id == $message->recip) {
                if ($message->pm == "public") {
                    ?>
                    <div class="socialDivEnviado">
                        <p>Destinatario: <?php echo $user->nombre ?></p>
                        <p>Tipo: <?php echo $message->pm ?></p>
                        <p>Mensaje: <?php echo $message->message ?></p>
                        <p>Fecha: <?php echo $message->fecha ?></p>
                    </div>
                    <?php
                } else { // para whisper
                    ?>
                    <div class="socialDivWhisper">
                        <p>Destinatario: <?php echo $user->nombre ?></p>
                        <p>Tipo: <?php echo $message->pm ?></p>
                        <p>Mensaje: <?php echo $message->message ?></p>
                        <p>Fecha: <?php echo $message->fecha ?></p>
                    </div>
                    <?php
                }
            }
        }
    }
    // Mensajes que recibo yo en message de otros amigos
    if ($message->recip == session('user')) {
        foreach ($usersAll as $user) {
            if ($user->id == $message->auth) {
                ?>
                <div class="socialDivRecibido">
                    <p>Emisor: <?php echo $user->nombre ?></p>
                    <p>Tipo: <?php echo $message->pm ?></p>
                    <p>Mensaje: <?php echo $message->message ?></p>
                    <p>Fecha: <?php echo $message->fecha ?></p>
                </div>
                <?php
            }
        }
    }
}
?>

</body>
<?php include 'footer.php'; ?>
</html>


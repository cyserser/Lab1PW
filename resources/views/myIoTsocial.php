<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plataforma Web para IoT</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">


    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        function get_time() {
            $("#ajaxMessages").load("ajaxMessages");
            setTimeout(get_time, 2000);
        }
    </script>

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
use App\Http\Controllers\socialController;

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
$messagesAllReverse = socialController::getAllMessagesReverse();
$messagesAll = socialController::getAllMessages();
$usersAll = socialController::getAllUser();
$privateMessage = socialController::getPrivateMessages(session("user"));
$profilesAllReverse = socialController::getAllProfilesReverse();
$getTextCheck = socialController::getProfilesCount(session('user'));
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
                        <img class="profileImg" src=<?php if (file_exists("img/" . session('name') . ".jpg")) {
                            echo "img/" . session('name') . ".jpg";
                        } else {
                            echo "\"img/man.png\"";
                        } ?>>

                    </div>
                    <div class="grid-itemSocial">
                        <h1>Mi estado</h1>
                        <?php
                        if($getTextCheck == false){
                            ?>
                            <h1 style="color: red">No ha modificado su estado aun</h1>
                        <?php
                            } else {
                        foreach ($profilesAllReverse as $profile) {
                            if ($profile->id_user == session('user')) { // mostramos la ultimo modificacion
                                ?>
                                <p class="textJustify"> <?php echo $profile->text ?> </p>
                                <?php
                                break;
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <div class="grid-itemDos">
            <hgroup>
                <h1>Opciones</h1>
            </hgroup>
            <section class="grid-itemSocial">
                <?php
                if (session('user') != null) {
                    ?>
                    <button onclick="location.href = 'miembros'" style="float: left" class="botonSocialOpcionesDos">
                        Miembros
                    </button>
                    <button onclick="location.href = 'amigos'" style="float: right" class="botonSocialOpcionesDos">
                        Amigos
                    </button>
                    <button onclick="location.href = 'mensajes'" class="botonSocialOpciones">Mensajes</button>
                    <button onclick="location.href = 'user'" class="botonSocialOpciones">Canales</button>
                    <button onclick="location.href = 'perfil'" class="botonSocialOpciones">Perfil</button>
                    <?php
                } else {
                    ?>
                    <button onclick="location.href = 'login'" class="botonSocialOpciones">Login</button>
                    <?php
                }
                ?>
            </section>

        </div>
    </div>

    <article class="socialArticle">
        <hgroup>
            <h1>Muro de myWebIoT</h1>
        </hgroup>

        <?php
        if($messagesAllReverse->count()==0){
            ?>
            <h1 style="color: red">Nadie ha enviado nada todavia</h1>
            <?php

        } else {
        ?>
        <div class="" id="ajaxMessages">
            <script>
                setTimeout(get_time, 1000);
            </script>
        </div>
        <?php
        }
        ?>

        <!--        --><?php
        //        $contador = 5; // muestra los 5 últimos mensajes...
        //        foreach ($messagesAllReverse as $message) {
        //            foreach ($usersAll as $user) {
        //                if ($user->id == $message->recip) {
        //                    if ($message->pm == "public") {
        //                        ?>
        <!--                        <div class="socialDivEnviado">-->
        <!--                            --><?php
        //                            foreach ($usersAll as $userDos) {
        //                                if ($userDos->id == $message->auth) {
        //                                    ?>
        <!--                                    <p>Emisor: --><?php //echo $userDos->nombre ?><!--</p>-->
        <!--                                    --><?php
        //                                }
        //                            }
        //                            ?>
        <!--                            <p>Receptor: --><?php //echo $user->nombre ?><!--</p>-->
        <!--                            <p>Mensaje: --><?php //echo $message->message ?><!--</p>-->
        <!--                            <p>Fecha: --><?php //echo $message->fecha ?><!--</p>-->
        <!--                        </div>-->
        <!--                        --><?php
        //                    }
        //                    if ($message->auth == session('user') && $message->pm != "public") {
        //                        ?>
        <!--                        <div class="socialDivWhisper">-->
        <!--                            --><?php
        //                            foreach ($usersAll as $userDos) {
        //                                if ($userDos->id == session('user')) {
        //                                    ?>
        <!--                                    <p>Emisor: --><?php //echo $userDos->nombre ?><!--</p>-->
        <!--                                    --><?php
        //                                }
        //                            }
        //                            ?>
        <!--                            <p>Receptor: --><?php //echo $user->nombre ?><!--</p>-->
        <!--                            <p>Tipo: --><?php //echo $message->pm ?><!--</p>-->
        <!--                            <p>Mensaje: --><?php //echo $message->message ?><!--</p>-->
        <!--                            <p>Fecha: --><?php //echo $message->fecha ?><!--</p>-->
        <!--                        </div>-->
        <!--                        --><?php
        //                    }
        //                }
        //            }
        //
        //            if (--$contador == 0) break;
        //
        //            if ($message->recip == session('user')) {
        //                foreach ($usersAll as $user) {
        //                    if ($user->id == $message->auth) {
        //                        if ($message->pm == "private") {
        //                            ?>
        <!--                            <div class="socialDivWhisper">-->
        <!--                                <p>Emisor: --><?php //echo $user->nombre ?><!--</p>-->
        <!--                                --><?php
        //                                foreach ($usersAll as $userDos) {
        //                                    if ($userDos->id == session('user')) {
        //                                        ?>
        <!--                                        <p>Receptor: --><?php //echo $userDos->nombre ?><!--</p>-->
        <!--                                        --><?php
        //                                    }
        //                                }
        //                                ?>
        <!--                                <p>Tipo: --><?php //echo $message->pm ?><!--</p>-->
        <!--                                <p>Mensaje: --><?php //echo $message->message ?><!--</p>-->
        <!--                                <p>Fecha: --><?php //echo $message->fecha ?><!--</p>-->
        <!--                            </div>-->
        <!--                            --><?php
        //                        }
        //                    }
        //                }
        //            }
        //        }
        //
        //
        //        ?>
    </article>


</section>

<script>
    setTimeout(get_time, 1000);
</script>
<?php include 'footer.php'; ?>
</body>
</html>

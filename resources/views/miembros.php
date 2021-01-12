<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">
    <link rel="stylesheet" href="CSS/canales.css">

</head>

<?php use App\Http\Controllers\channelController;
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

?>
<body>

<div class="grid-container">

    <div class="grid-itemDos">
        <button class="botonSocialOpciones" onclick="location.href = '<?php echo "miembros" ?>'" >Members</button>
        <button class="botonSocialOpciones" onclick="location.href = '<?php echo "amigos" ?>'">Friends</button>
        <button class="botonSocialOpciones" onclick="location.href = '<?php echo "mensajes" ?>'">Messages</button>
        <button class="botonSocialOpciones" onclick="location.href = '<?php echo "perfil" ?>'">Edit profile</button>
    </div>

</div>
<h2 style="padding: 10px">Other members</h2>

<section>
    <?php foreach ($usersAll as $user) {
        if (session('email') != $user->email) {
            ?>
            <article class="canalArticulo">
                <?php echo $user->id ?>
                <p>Nombre: <?php echo $user->nombre ?> </p>
                <p>Email:<?php echo $user->email ?></p>
                <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?></p>
                <?php
                ?>
                <form method="get" name="seguirSocial" action="<?php echo "seguirSocial" . $user->id ?>">
                    <button class="boton2" type="submit">Follow</button>
                </form>
                <?php
                ?>
                <?php

                ?>
                <?php
                if (session('user') != null) {
                    foreach ($friendAll as $friend) {
                        if($friend->id_friend == $user->id ){
                            echo $user->nombre. " &larr; you are following";
                            echo $friend->id_friend;
                        }
                    }
                    ?>
                    <?php
                }
                ?>
<!--                --><?php
//                foreach ($friendAll as $friend) {
//                    if ($friend->id_user == session('user') && $user->email == session('email')) {
//                        ?>
<!--                        <form method="get" name="noSeguirSocial" action="--><?php //echo "noSeguirSocial" . $user->id ?><!--">-->
<!--                            <button class="boton2" type="submit">Unfollow</button>-->
<!--                        </form>-->
<!--                        --><?php
//                    } else {
//                        ?>
<!--                        --><?php
//                    }
//                }
//                ?>
            </article>
            <?php
        }
    }
    ?>

</section>
</body>
<?php include 'footer.php'; ?>
</html>

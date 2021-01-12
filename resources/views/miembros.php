<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">
    <link rel="stylesheet" href="CSS/canales.css">

    <script type="text/javascript" src="js/followHide.js"></script>

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

if (session()->has('popup')) {
    echo '<script type="text/javascript"> document.getElementById("hide").hidden = true;</script>';
//   echo '<script type="text/javascript">alert("Ya tenías dicho producto en la wishList!")</script>';
}
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
                if(session('email') != null){
                    if(socialController::comprobarBond($user->id) == true){
                ?>
                    <form method="get" name="noSeguirSocial" action="<?php echo "noSeguirSocial" . $user->id ?>">
                        <button class="boton2" type="submit">Unfollow</button>
                    </form>
                <?php
                    }else {
                        ?>
                        <div id="hide">
                            <form method="get" name="seguirSocial" id="seguirSocial" action="<?php echo "seguirSocial" . $user->id ?>">
                                <button class="boton2" id="follow" type="submit">Follow</button>
                                <!--                        <input class="boton2" type="button" value="Follow" onclick="comprobarFollow();">-->
                            </form>
                        </div>
                <?php
                    }
                }

                if(socialController::meSiguen($user->id) == true) {
                    echo $user->nombre." &rarr; is following you";
                    echo "<br>";
                    }
                ?>
                <?php

                if (session('user') != null) {
                    foreach ($friendAll as $friend) {
                        if($friend->id_friend == $user->id ){
                            echo $user->nombre. " &larr; you are following";
//                            echo $friend->id_friend;
                            ?>

                            <?php
                        }
                    }
                    ?>
                    <?php
                }
                ?>
            </article>
            <?php
        }
    }
    ?>

</section>
<script>
    const hello = (element) => {
        element.hidden = true;
    }
</script>

<script>
    function showHide(id){
        $("#"+id).hidden;
    }
</script>


</body>
<?php include 'footer.php'; ?>
</html>

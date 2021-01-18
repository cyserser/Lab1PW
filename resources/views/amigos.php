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
$getFriendCount = socialController::getFriendCount();

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

<script>

</script>

<h2 style="padding: 10px;color: #1f7199">These friends you are following</h2>
<h3 id="amigosHide" style="padding: 10px;color: red;margin-left: 10px">You aren't following anybody</h3>

<section>
    <?php
    foreach ($friendAll as $friend) {
        if ($friend->id_user == session('user')) {
            foreach ($usersAll as $user) {
                if ($friend->id_friend == $user->id) {
                    ?>
                    <article class="canalArticulo">
                        <p>Nombre: <?php echo $user->nombre ?> </p>
                        <p>Email:<?php echo $user->email ?></p>
                        <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?></p>
                    </article>

                    <script>
                        amigosHide();
                    </script>

                    <?php
                }
            }
        }
    }
    ?>
    <h2 style="padding: 10px;color: #0E9A00">These friends are following you</h2>
    <h3 id="amigosHideDos" style="padding: 10px;color: red;margin-left: 10px">Nobody is following you</h3>
    <?php
    foreach ($usersAll as $user) {
        if (socialController::meSiguen($user->id) == true) {
            ?>
            <article class="canalArticulo">
                <p>Nombre: <?php echo $user->nombre ?> </p>
                <p>Email:<?php echo $user->email ?></p>
                <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?></p>

                <script>
                    amigosHideDos();
                </script>

            </article>
            <?php
        }
    }
    ?>

</section>


</body>
<?php include 'footer.php'; ?>
</html>

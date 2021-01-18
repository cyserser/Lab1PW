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

<?php
if ($getFriendCount == 0) {
    ?>
    <h2 style="padding: 10px">You don't have any friends yet</h2>

    <?php
} else {
    ?>
    <h2 style="padding: 10px">These friends you are following</h2>
    <?php
}
?>

<section>
    <?php
    foreach ($friendAll as $friend) {
        if ($friend->id_user == session('user')) {
            foreach ($usersAll as $user) {
                if ($friend->id_friend == $user->id) {
                    ?>
                    <article class="canalArticulo">
                        <?php echo $user->id ?>
                        <p>Nombre: <?php echo $user->nombre ?> </p>
                        <p>Email:<?php echo $user->email ?></p>
                        <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?></p>
                    </article>
                    <?php

                }
            }
        }

    }
    ?>
    <h2 style="padding: 10px">These friends are following you</h2>
    <?php
    foreach ($usersAll as $user) {
        if (socialController::meSiguen($user->id) == true) {
            ?>
            <article class="canalArticulo">
                <?php echo $user->id ?>
                <p>Nombre: <?php echo $user->nombre ?> </p>
                <p>Email:<?php echo $user->email ?></p>
                <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?></p>
            </article>
            <?php
        }
    }
    ?>

</section>


</body>
<?php include 'footer.php'; ?>
</html>

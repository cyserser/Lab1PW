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
$friendAll = socialController::getAllFriend()
?>
<body>

<div class="grid-container">

    <div class="grid-itemDos">
        <button class="botonSocialOpciones">Members</button>
        <button class="botonSocialOpciones">Friends</button>
        <button class="botonSocialOpciones">Messages</button>
        <button class="botonSocialOpciones">Edit profile</button>
    </div>

</div>
<h2 style="padding: 10px">Other members</h2>

<section>
    <?php foreach ($usersAll as $user) {
        if (session('email') == $user->email) {
        } else {
            ?>
            <article class="canalArticulo">
                <p>Nombre: <?php echo $user->nombre ?> </p>
                <p>Email:<?php echo $user->email ?></p>
                <p>Fecha de nacimiento: <?php echo $user->fechaNacimiento ?> </p>
                <?php
                if (session('user') != null) {
                    foreach ($friendAll as $friend) {
                        if ($friend->id_user == session('user')) {
                            echo $user->nombre . " &larr; you are following";
                        } else {
                            ?>
                            <form method="get" name="seguirSocial" action="<?php echo "seguirSocial" . $user->id ?>">
                                <button class="boton2" type="submit"> Seguir</button>
                            </form>
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
</body>
<?php include 'footer.php'; ?>
</html>

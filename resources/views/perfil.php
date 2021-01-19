<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/myIoTsocial.css">
    <script type="text/javascript" src="js/comprobarEditarProfile.js"></script>

</head>

<?php
$canales = session('canales');
$usuarios = session('user');
if ($usuarios != null) {
    include 'headerLogged.php';
} else {
    include 'header.php';
}

if (session()->has('exito')) {
    echo '<script type="text/javascript">alert("Se ha actualizado correctamente tus datos")</script>';
}
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

    <div class="grid-itemDos">
        <hgroup>
            <h1>Mi Perfil</h1>
        </hgroup>
        <section class="sectionTwo">
            <form method="post" name="editarProfile" id="editarProfile" enctype="multipart/form-data" data-ajax='false'
                  action="<?php echo "procesarProfile" ?>">
                <?= csrf_field() ?>
                <div class="grid-containerSocial">
                    <div class="socialDivEnviado">
                        <div class="grid-itemSocial">
                            <img style="width: 10vw;height: auto;max-height: 10vw"
                                 src=<?php if (file_exists("img/" . session('name') . ".jpg")) {
                                echo "img/" . session('name') . ".jpg"; // si existe la imagen... la mostramos
                            } else {
                                echo "\"img/man.png\""; // si no existe ponemos la imagen por defecto
                            } ?>>
                            <input style="size: 2vw" type="file" name=image id="image">
                        </div>
                    </div>

                    <div class="socialDivEnviado">
                        <div class="grid-itemSocial">
                            <h3>Mi estado</h3>
                            <textarea style="width: 40vw;height: 10vw" id="descripcion" name="descripcion"
                                      class="textJustify"><?php if (session()->has('descripcion')) {
                                    echo session('descripcion');
                                } ?></textarea>
                        </div>
                    </div>
                </div>

                <div style="text-align: center"">
                    <input  class="botonSocialOpciones" type="button" value="Editar" onclick="comprobarEditarProfile();">
                </div>

            </form
        </section>
    </div>

</div>
</body>
<?php include 'footer.php'; ?>
</html>


<!--<div class="grid-itemDos">-->
<!--    <hgroup>-->
<!--        <h1>Mi Perfil</h1>-->
<!--    </hgroup>-->
<!--    <section class="sectionTwo">-->
<!--        <form method="post" name="editarProfile" id="editarProfile" enctype="multipart/form-data" data-ajax='false' action="--><?php //echo "procesarProfile" ?><!--">-->
<!--            --><? //= csrf_field() ?>
<!--            <div class="grid-containerSocial">-->
<!--                <div class="grid-itemSocial">-->
<!--                    <img class="profileImg" src="img/man.png" alt="imagen">-->
<!--                </div>-->
<!--                <div class="grid-itemSocial">-->
<!--                    <h3>Mi estado</h3>-->
<!--                    <textarea style="width: 40vw;height: 10vw" class="textJustify">A social network is a social structure made up of a set of social-->
<!--                        actors,-->
<!--                        sets of dyadic ties, and other social interactions between actors.</textarea>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </form-->
<!--    </section>-->
<!--</div>-->

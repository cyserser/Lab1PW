<?php use App\Usuario;
$canales = session('canales');
$usuarios = session('usuarios');
?>
<header id="cabecero">
    <nav>
        <ul>
            <div class="listaNavegacion">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2996/2996929.svg">
                <a href="index">MyWebIoT</a>
                <a href="channel">Canales</a>
                <a href="ayuda">Ayuda</a>
                <a href="contacto">Contacto</a>
                <div class="listaNavegacion-derecha">

                    <a href="myChannels"> Nombre de usuario: <?php echo $usuarios ?> </a>
                    <a href="cerrarSession"> Cerrar sesion</a>

                </div>
            </div>
        </ul>
    </nav>
</header>

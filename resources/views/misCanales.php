<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis Canales</title>

    <link rel="stylesheet" href="CSS/misCanales.css">

</head>
<body>

<header id="cabecero">
    <nav>
        <ul>
            <div class="listaNavegacion">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2996/2996929.svg">
                <a href="index">MyWebIoT</a>
                <a href="canales">Canales</a>
                <a href="ayuda">Ayuda</a>
                <a href="contacto">Contacto</a>
                <div class="listaNavegacion-derecha">

                    <a href="nombreUsuario">   nombre usuario   </a>

                </div>
            </div>
        </ul>
    </nav>
</header>


<button onclick="location.href = 'nuevoCanal'" >Nuevo Canal</button>

<hgroup>
    <h1>Listado de todos los Canales dados de alta del usuario</h1>
</hgroup>

<section>

    <aside><img src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></aside>
    <article class="canalArticulo">
        <p>Información sobre el canal A</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <p>Enlace URL</p>

    </article>

    <aside><img src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></aside>
    <article class="canalArticulo">
        <p>Información sobre el canal A</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <p>Enlace URL</p>

    </article>

    <aside><img src="https://maxcdn.icons8.com/Share/icon/p1em/Editing/trash1600.png"></aside>
    <article class="canalArticulo">
        <p>Información sobre el canal A</p>
        <p>Descripción</p>
        <p>Fecha</p>
        <p>Enlace URL</p>

    </article>


</section>

<?php include 'footer.php';?>


</body>
</html>

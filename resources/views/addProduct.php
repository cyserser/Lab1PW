<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Añadir producto</title>

    <link rel="stylesheet" href="CSS/nuevoCanal.css">
    <link rel="stylesheet" href="CSS/myIoTshop.css">
    <script type="text/javascript" src="js/comprobarDatosProducto.js"></script>

</head>
<body>

<?php
$canales = session('canales');
$usuarios = session('usuarios');

if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>


<h1 style="text-align: center" class="create">Create Product</h1>


<form class="formulario" id="formularioAddProduct" method="get" action="newProduct">

    <div class="formularioDiv">

        <p><label>Nombre del producto</label> <input type="text" size="15" name="nombreProducto" id="nombreProducto"></p>

        <p><label>Descripción</label> <input type="text" size="15" name="descripcion" id="descripcion"></p>

        <p><label>Stock</label> <input type="number" size="15" name="stock" id="stock"></p>

        <p><label>Precio</label> <input type="number" size="15" name="precio" id="precio"></p>

        <label>Imagen</label>
        <select style="width: 200px" name="imagen" id="imagen">
            <option value="axe">axe</option>
            <option value="horno1">horno1</option>
            <option value="stats">stats</option>
        </select>

        <p><label>Fecha</label> <input type="date" size="15" name="date" id="date"></p>

        <input class="boton" type="reset" value="Borrar">

        <input class="boton" type="button" value="Crear" onclick="comprobarDatosProducto();">

    </div>

</form>

</body>
</html>

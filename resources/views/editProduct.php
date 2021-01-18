<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>

    <link rel="stylesheet" href="CSS/nuevoCanal.css">
    <link rel="stylesheet" href="CSS/myIoTshop.css">
    <script type="text/javascript" src="js/comprobarDatosProducto.js"></script>

</head>
<body>

<?php

use App\Http\Controllers\productController;

$canales = session('canales');
$usuarios = session('usuarios');
//$idProduct = $idProducto;

session(['idProducto'=>$idProducto]);

$productoAll = productController::getProducts();

if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>

<h1 style="text-align: center" class="create">Editing product</h1>

<?php
    foreach ($productoAll as $product){
        if($product->id == $idProducto){
?>


<form class="formulario" id="formularioAddProduct" method="get" action="<?php echo "editProduct".$idProducto?>">

    <div class="formularioDiv">

        <p><label>Nuevo nombre del producto</label> <input value="<?php echo $product->nombre ?>" type="text" size="15" name="nombreProducto" id="nombreProducto"></p>

        <p><label>Nueva descripción</label> <input value="<?php echo $product->descripcion ?>" type="text" size="15" name="descripcion" id="descripcion"></p>

        <label>Nueva Imagen</label>
        <select style="width: 200px" name="imagen" id="imagen">
            <option value="axe">axe</option>
            <option value="horno1">horno1</option>
            <option value="stats">stats</option>
        </select>

        <p><label>Nuevo precio</label> <input value="<?php echo $product->precio ?>" type="number" size="15" name="precio" id="precio"></p>

        <p><label>Nuevo Stock</label> <input value="<?php echo $product->stock ?>" type="number" size="15" name="stock" id="stock"></p>

        <p><label>Nuevo fecha</label> <input type="date" size="15" name="date" id="date"></p>

        <input class="boton" type="reset" value="Borrar">

        <input class="boton" type="button" value="Editar" onclick="comprobarDatosProducto();">

    </div>

</form>

<?php
        }
    }
?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plataforma Web para IoT</title>

    <link rel="stylesheet" href="CSS/index.css">

    <link rel="stylesheet" href="CSS/myIoTshop.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        function openPage(pageName, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    <!--    AJAX    -->
<!--    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>-->
<!---->
<!--    <script>-->
<!--        function get_time() {-->
<!--            $("#numberOfItems").load("ajaxItems");-->
<!--            setTimeout(get_time, 2000);-->
<!--        }-->
<!--    </script>-->


</head>
<body>

<?php
session_start();

use App\Http\Controllers\channelController;

$canales = session('canales');
$usuarios = session('usuarios');
$canalesAll = channelController::getChannels();
$usuariosAll = channelController::getUsers(); // pasado como static method para que lo reconozca sin acceder a canales
$numberOfChannels = channelController::getNumberOfChannels();
$name = session('name'); // nombre de login para comprobar si esta logeado o no

use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;

$productoAll = productController::getProducts();

//$productAdd = session('productAdd');
//$productos = array();
//foreach ($productoAll as $product) {
//    array_push($productos, $product->nombre);
//}
//$productos = ['Básico', 'Pro', 'Premium', "Trash"];
//session(['getProduct'=>$getProduct]);
//$productoClicked = session('$productName');
//$productNombre = session('productNombre');
//$productPrecio = session('productPrecio');
?>

<?php if ($canales != null && $usuarios != null) {
    include 'headerLogged.php';
} else {
    include 'header.php';
}
?>

<?php
$email = session('email');
//if ($email == "admin") {
//    ?>
<!--    <button class="botonCard" onclick="location.href = 'addProduct'">Añadir producto</button>-->
<!--    --><?php
//}
?>

<aside id="lateral">

    <div style="padding: 20px" class="row">
        <?php
        //  Mostrar carrito
        echo "<table><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Borrar</th></tr>";
        $productPriceFinal = 0;
        $precioTotal = 0;
        $numProductos = 0;
        foreach ($productoAll as $product) {
            if (session()->has($product->nombre)) {
                $cantidad = session($product->nombre); // La cantidad se obtiene con session del nombre del producto
                $numProductos = $numProductos + $cantidad ;
                $precio = $cantidad*($product->precio);
                $precioTotal = $precioTotal+$precio;
//                $productIndex=session($product->nombre);
                echo "<tr><td> $product->nombre";
                echo "</td><td>$cantidad</td>";
                echo "<td>$precio</td>";
                echo "<td><form method='get' action=eliminarProduct>";
                echo "<input type='hidden' name='producto' value='$product->nombre'>";
                echo "<input class='botonEliminar' type='submit' name='Eliminar' value='Eliminar'>";
                echo "</form></td></tr>";
            }
        }
        echo "</table>";
        ?>
    </div>

    <?php  echo "<p style='text-align: center' class='ajaxP'>Total: $precioTotal €</p>"; ?>
    <div class="rowProduct">
        <img class="shoppingCartIcon" src="img/shoppingCart.png" alt="shoppingCart">
        <?php  echo "<p style='text-align: center' class='ajaxP'>Unidades: $numProductos</p>"; ?>
    </div>

    <div class="grid-container">

        <form  method='get' action='vaciarCarrito'>
            <div class="grid-item">
                <input class="botonCard" type='submit' name='Vaciar' value='Vaciar'>
            </div>
        </form>


        <?php
        if ($email == null){
        ?>
        <form name="pago" method='get' action="<?php echo "login" ?>">
            <?php
            } else {
            if ($precioTotal != 0){
            ?>
            <form name="pago" method='get' action="checkout">
                <?php
                }
                }
                ?>
                <div class="grid-item">
                    <input type="hidden" name="cantidadFinal" value="<?php echo $precioTotal ?>">
                    <input class="botonCard" type="submit" name="pay" value="Pagar">
                </div>
            </form>
    </div>
<!--        <form name="pago" method='get' action="checkout">-->
<!--            <input class="botonCard" type='submit' name='Checkout' value='Checkout'>-->
<!--            <input type="hidden" name="cantidadFinal" value="--><?php //echo $precioTotal ?><!--">-->
<!--            <input class="botonCard" type="submit" name="pay" value="Pagar">-->
<!--        </form>-->
        <?php
//        }
        ?>
    </div>
    </div>
</aside>

<section id="main">
    <article class="articulo">
        <hgroup>
            <h1>Welcome to the IoT Shop!</h1>
        </hgroup>

        <p>
            Here you can find different products such as an axe, katana, crowbar etc.
        </p>
    </article>

    <article class="articulo">

        <hgroup>
            <h1>Productos</h1>
        </hgroup>

        <section class="sectionTwo">
            <div class="rowProduct">
                <?php
                foreach ($productoAll as $producto) {
                    ?>
                    <div class="columnProduct">
                        <img src="<?php echo "img/".$producto->imagen.".png" ?>" alt="axe" style="width:100%">
                        <div class="container">

                            <h2 style="font-family: 'Comic Sans MS'" class="center"><?php echo $producto->nombre ?></h2>
                            <p class="center"><?php echo $producto->descripcion ?></p>
                            <p class="center"><?php echo $producto->precio . "€" ?></p>

                            <?php
                            if ($email == "admin") {
                                ?>
                                <div style="text-align: center">
                                    <form action="<?php echo "editProductVista" . $producto->id ?>">
                                        <input class="botonCard" type="submit" value="Editar"/>
                                    </form>
                                    <form name="productoDelete"
                                          action="<?php echo "deleteProduct" . $producto->id ?>">
                                        <input class="botonCard" type="submit" value="Borrar"/>
                                    </form>
                                </div>
                                <?php
                            } else {
                            ?>
                            <form name="formularioProducto" method="get" action="procesarCompra">
                                <input type="hidden" name="producto" value="<?php echo $producto->nombre ?>">
                                <div class="center">
                                    <select type="number" name="cantidad">
                                        <option>
                                            1
                                        </option>
                                        <option>
                                            2
                                        </option>
                                        <option>
                                            3
                                        </option>
                                        <option>
                                            4
                                        </option>
                                    </select>
                                </div>
<!--                                <input type="number" name="cantidad" value="1">-->
                                <input class="botonCard" type="submit" value="Añadir cesta"/>
                                <?php
                                }
                                ?>
                            </form>
                        </div>

                    </div>

                    <?php
                }
                if ($email == "admin") {
                ?>
                <button style="margin-left: 90px" class="botonCardAdd" onclick="location.href = 'addProduct'">Añadir producto</button>
                <?php
                }
                ?>
            </div>

        </section>

    </article>
</section>

<!--<script>-->
<!--    setTimeout(get_time, 1000);-->
<!--</script>-->
<?php include 'footer.php'; ?>

</body>
</html>


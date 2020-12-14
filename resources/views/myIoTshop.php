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
        function openPage(pageName,elmnt,color) {
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



</head>
<body>

<?php
use App\Http\Controllers\channelController;
$canales = session('canales');
$usuarios = session('usuarios');
$canalesAll = channelController::getChannels();
$usuariosAll = channelController::getUsers(); // pasado como static method para que lo reconozca sin acceder a canales
$numberOfChannels = channelController::getNumberOfChannels();
$name = session('name'); // nombre de login para comprobar si esta logeado o no
?>


<?php if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>

<?php
$email = session('email');
if($email=="admin"){
    ?>
    <button class="botonCard" onclick="'addProduct">Añadir producto</button>
    <button class="botonCard">Editar producto</button>
    <button class="botonCard">Borrar producto</button>

    <?php
}
?>


<aside id="lateral">
    <div class="row">
        <img class="shoppingCartIcon" src="img/shoppingCart.png" alt="shoppingCart">
        <p style="margin-left: 20px">Número de items: 0</p>
    </div>

    <button class="botonCard">Checkout</button>
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
            <div class="row">
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="containerDos">
                        <div class="card">
                            <img src="img/axe.png" alt="axe" style="width:100%">
                            <div class="container">
                                <p class="center">Producto 1</p>
                                <div class="row">
                                    <div class="column">
                                        <h3>389€</h3>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 20px"><strike>628€</strike></h4>
                                    </div>
                                    <div class="column">
                                        <h4 style="padding-left: 40px">38%</h4>
                                    </div>

                                    <div class="overlay">
                                        <div class="buttonHover">
                                            <button class="botonCard">Comprar</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <span class="headingDos">4.1</span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="headingTres">254 reviews.</>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </article>

</section>
<?php include 'footer.php';?>

</body>
</html>


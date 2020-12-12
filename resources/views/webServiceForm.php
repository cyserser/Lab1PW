<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Service</title>

    <script type="text/javascript" src="js/comprobarServicioWeb.js"></script>
    <link rel="stylesheet" href="CSS/webService.css">

    <!--    <script type="text/javascript" src="{{ URL::to('js/comprobar.js') }}"></script>-->
    <!--    <script src="{{asset('js/comprobar.js')}}"></script>-->

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

<p class="p1">Introduzca dos fechas para que se muestre los valores</p>

<form class="formulario" id="formularioWebService" method="get" action=<?php echo "requestWebServiceRest".$idCanalRest?>>

    <div class="formularioDiv">

        <p><label>Fecha 1: </label><input type="date" size="15" name="datetime" id="datetime"></p>
        <p><label>Fecha 2: </label><input type="date" size="15" name="datetime2" id="datetime2"></p>
        <button class="boton2" type="button" onclick="comprobarServicioWeb();"> Get Web Service Rest </button>

    </div>

</form>

<div id="footer">
    <footer>
        <p>Autor: Cunwang Guo</p>
        <p>Copyright &copy; 2020</p>
    </footer>
</div>


</body>
</html>

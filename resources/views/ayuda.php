<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ayuda</title>
    <link rel="stylesheet" href="CSS/ayuda.css">
    <link rel="stylesheet" href="CSS/contacto.css" class="caja">



</head>
<body>
<?php use App\Usuario;
$canales = session('canales');
$usuarios = session('usuarios');
?>

<?php if($canales != null && $usuarios != null){
    include 'headerLogged.php';
}else{
    include 'header.php';
}
?>
<div class="caja">


<h1>Ayuda</h1>

<p>Selecciona en la lista la duda que necesites que te resolvamos</p>

<form class="formulario" method="get" action="">

    <div class="formularioDiv">

        <label for="motivo">Selecciona una opción</label>
        <select id="motivo" name="motivo">
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="motivo1">La pagina web no se carga correctamente en mi explorador</option>
            <option value="motivo2">Existe problemas de login</option>
            <option value="motivo3">No encuentro la información requerida</option>
            <option value="motivo4">Otros</option>
        </select>

        <input class="boton2" type="submit" value="Submit">

    </div>

</form>

</div>

<?php include 'footer.php';?>

</body>
</html>

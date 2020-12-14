<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>

    <link rel="stylesheet" href="CSS/contacto.css">


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
    <article>
        <p>Teléfono: 1234567890</p>
        <p>E-mail: lelecucu@gmail.com</p>
        <p>Puede también visitarnos  en el edificio: 58C del Norte</p>
    </article>
</div>


<?php include 'footer.php';?>

</body>
</html>

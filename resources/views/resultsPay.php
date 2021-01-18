<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php

use App\Http\Controllers\productController;

if (session('status')!=null)
        echo "<h2>".session('status')."</h2>";
?>
<button class="botonCard" onclick="location.href = 'vaciarCarrito'">Volver a la tienda</button>

</body>
</html>

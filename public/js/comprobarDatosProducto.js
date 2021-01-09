function comprobarDatosProducto(){

    var nombreProducto = document.getElementById("nombreProducto").value;
    var descripcion = document.getElementById("descripcion").value;
    var precio = document.getElementById("precio").value;
    var imagen = document.getElementById('imagen').value;
    var fecha = document.getElementById("date").value;

    if(nombreProducto == null || nombreProducto === ""){
        window.alert("You have to enter a product name");
        return;
    }

    if(descripcion == null || descripcion === ""){
        window.alert("You have to enter a product description");
        return;
    }

    if(precio == null || precio === ""){
        window.alert("You have to enter a product price");
        return;
    }

    if(precio == null || precio === ""){
        window.alert("You have to enter an image");
        return;
    }

    if(fecha == null || fecha === ""){
        window.alert("You have to enter a product date");
        return;
    }

    document.getElementById("formularioAddProduct").submit();

}


function comprobarDatosNewChannel(){

    var nombreCanal = document.getElementById("nombreCanal").value;
    var descripcion = document.getElementById("descripcion").value;
    var longitud = document.getElementById("longitud").value;
    var latitud = document.getElementById("latitud").value;
    var sensor = document.getElementById("nombreSensor").value;

    if(nombreCanal == null || nombreCanal === ""){
        window.alert("Your channel does not have a name");
        return;
    }

    if(descripcion == null || descripcion === ""){
        window.alert("You have to enter a description for your channel");
        return;
    }

    if(longitud == null || longitud === ""){
        window.alert("You have to enter a longitude");
        return;
    }

    if(latitud == null || latitud === ""){
        window.alert("You have to enter a latitude");
        return;
    }

    if(sensor == null || sensor === ""){
        window.alert("You have to enter a sensor");
        return;
    }

    document.getElementById("formularioNewChannel").submit();

}

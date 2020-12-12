
function comprobarServicioWeb(){

    var fecha1 = document.getElementById("datetime").value;
    var fecha2 = document.getElementById("datetime2").value;


    if(fecha1 == null || fecha1 === "" && fecha2 == null || fecha2 === "" ){
        window.alert("Debe introducir las dos fechas");
        return;
    }

    document.getElementById("formularioWebService").submit();

}

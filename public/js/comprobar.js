

function comprobarDatos(){

    document.getElementById("formulario").onsubmit = function (e) {
        var fieldValue = document.getElementById("nombre").value;

        var passValue1 = document.getElementById("password1").value;
        var passValue2 = document.getElementById("password2").value;

        if(fieldValue == null || fieldValue == ""){

            e.preventDefault();
            window.alert("You have to enter a username");
        }

        if(passValue1!=passValue2){

            e.preventDefault();
            window.alert("The password doesn't match. Try again")
        }
    }
}




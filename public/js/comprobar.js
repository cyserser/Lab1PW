
function comprobarDatos(){

    //document.getElementById("formularioRegister").onsubmit = function (e) {
        var name = document.getElementById("nombre").value;
        var passValue1 = document.getElementById("password1").value;
        var passValue2 = document.getElementById("password2").value;
        var date = document.getElementById("date").value;
        var email = document.getElementById("email").value;


        if(name == null || name === ""){
            //e.preventDefault();
            window.alert("You have to enter a username");
            return;
        }

        if(email == null || email === ""){

            // e.preventDefault();
            window.alert("You have to enter an email");
            return;
        }

        if(passValue1 !== passValue2){

            // e.preventDefault();
            window.alert("The password doesn't match. Try again");
            return;
        }


        if(date === ""){
            // e.preventDefault();
            window.alert("You must pick a date");
            return;
        }

        document.getElementById("formularioRegister").submit();

  //  }

    // $("#formulario").onsubmit = function (e){
    //     //$("#nombre").valueOf();
    //     $("#password1").valueOf();
    //     $("#password2").valueOf();
    //
    //     if($("#nombre").valueOf()==null || $("#nombre").valueOf()==""){
    //         e.preventDefault();
    //         window.alert("You have to enter a username");
    //     }
    // }
}




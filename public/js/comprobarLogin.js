
function comprobarDatosLogin(){

    var passValue1 = document.getElementById("password").value;
    var email = document.getElementById("email").value;

    if(email == null || email === ""){
        window.alert("You have to enter an email");
        return;
    }

    if(passValue1 == null || passValue1 === ""){
        window.alert("You have to enter a password");
        return;
    }
    document.getElementById("formularioLogin").submit();

}

function comprobarEditarProfile(){

    var text = document.getElementById("descripcion").value;
    var img = document.getElementById("image").value;

    if(text == null || text === ""){
        window.alert("You have to enter a description");
        return;
    }

    if(img == null || img === ""){
        window.alert("You have to choose an image");
        return;
    }

    document.getElementById("editarProfile").submit();

}

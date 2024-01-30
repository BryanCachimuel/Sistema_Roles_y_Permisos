$(document).ready(function(){

    
});

$(document).on("click","#btnrecuperar", function(){

    var usu_correo = $('#usu_correo').val();

    if(usu_correo === ""){
        Swal.fire({
            title: "Recuperar",
            text: "El campo de correo electrónico está vacío, por favor validar",
            icon: "error",
            confirmButtonColor: "#5156be",
        });
        
    }else{

        $.post("../../controller/email.php?op=recuperar", {usu_correo : usu_correo}, function(datos){
            if(datos == 1){
                Swal.fire({
                    title: "Recuperar",
                    text: "Se cambio la contraseña y se envió a su correo electrónico",
                    icon: "success",
                    confirmButtonColor: "#5156be",
                });
            }else{
                Swal.fire({
                    title: "Recuperar",
                    text: "El correo electrónico no existe",
                    icon: "error",
                    confirmButtonColor: "#5156be",
                });
            }
        });
    }
});
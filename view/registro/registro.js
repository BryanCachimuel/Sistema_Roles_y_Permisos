function init(){
    /*TODO: programando el boton submit de registro de usuarios */
    $("#mnt_form").on("submit", function(e){
        registrar(e);
    });
}

function registrar(e){
    e.preventDefault();

    /*TODO: dentro del FormData se declara como parámetro el nombre del id dado al formulario y le decimos que nos traiga toda su información mediante [0]  esta expresión*/
    let formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
        }
    });
}

init();
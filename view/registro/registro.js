function init(){
    /*TODO: programando el boton submit de registro de usuarios del formulario*/
    $("#mnt_form").on("submit", function(e){
        /*TODO: Evita que el formulario se envíe automáticamente */
        e.preventDefault();

        /*TODO: Validar el formulario antes de enviarlo */
        if(isFormValid()){
            registrar(e);  /*TODO: si es válido el formulario, sen envian los datos */
        }
        else{
            displayValidationMessages(); /*TODO: si no es válido, muestra un mensaje de error  */
        }
    });
}

function isFormValid(){
    /*TODO: Usa Validator.js para validar cada campo del formulario */
    return validateEmail() && validateText("usu_nomape") && validatePassword() && validatePasswordMatch(); 
}

function validateEmail(){
    /*TODO: se captura el valor que se ingresa en el input del email */
    var email = $("#usu_correo").val();
    var isValid = validator.isEmail(email);

    /*TODO: Muestra el mensaje de error si la validación no es exitosa */
    displayErrorMessage("#usu_correo",isValid,"Ingrese Correo Electrónico");
    return isValid;
}

function validateText(fieldId){
    var value = $("#"+fieldId).val();
    var isValid = validator.isLength(value,{min:1});

    /*TODO: Muestra el mensaje de error si la validación no es exitosa */
    displayErrorMessage("#" + fieldId,isValid,"Este campo es obligatorio");

    return isValid;
}

function validatePassword(){
    var password = $("#usu_pass").val();
    var isValid = validator.isLength(password,{min:8}); /*TODO: la contraseña debe tener como minimo 8 caracteres */
    displayErrorMessage("#usu_pass",isValid,"La contraseña debe tener al menos 8 caracteres");

    return isValid;
}


function validatePasswordMatch(){
    var password = $("#usu_pass").val();
    var confirmpassword = $("#usu_pass_confirmar").val();
    var isValid = validator.equals(password,confirmpassword); /*TODO: comparación para ver que las contraseñas sean iguales */ 
    displayErrorMessage("#usu_pass_confirmar",isValid,"Las contraseñas no coinciden");

    return isValid;
}

function displayErrorMessage(fieldSelector, isValid, message){
    /*TODO: Busca el elemento de mensaje de error y actualiza su contenido */
    var errorField = $(fieldSelector).next(".validation-error");
    errorField.text(isValid ? "" : message);
    errorField.toggleClass("text-danger", !isValid);
}

/*TODO: Muestra el mensaje de error */
function displayValidationMessages(){
    /*TODO: Muestra mensajes de error cerca de los campos del formulario */
    validateEmail();
    validateText("usu_nomape");
    validatePassword();
    validatePasswordMatch();
}

function registrar(){
    /*TODO: dentro del FormData se declara como parámetro el nombre del id dado al formulario y le decimos que nos traiga toda su información mediante [0]  esta expresión*/
    let formData = new FormData($("#mnt_form")[0]);
    $.ajax({
        url: "../../controller/usuario.php?op=registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log("Guardado: "+datos);
        }
    });
}

init();
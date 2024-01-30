$(document).ready(function(){

    $.post("../../controller/email.php?op=recuperar", {usu_correo : "blcl@gmail.com"}, function(data){
    });

});
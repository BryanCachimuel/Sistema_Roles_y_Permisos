<?php

    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    require_once("../models/Email.php");

    $usuario = new Usuario();
    $email = new Email();

    /*TODO: Utiliza una estructura switch para determinar la operación a realizar segun el valor de $_GET["op"] */
    switch($_GET["op"]){

        case "recuperar":
            $correo = $_POST["usu_correo"];
 
            $datos = $usuario->get_usuario_correo($correo);

            if(is_array($datos) == true && count($datos) == 0){
                echo "0";
            }else{
                $email->recuperar($correo);
                echo "1";
            }  
            break;
    }
?>

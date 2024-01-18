<?php
    /*TODO: Incluye el archivo de configuración de la conexión a la bdd y la clase Usuario */
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");

    /*TODO: instancia de clase Usuario que se encuentra en la ruta models/Usuario.php  */
    $usuario = new Usuario();

    /*TODO: Utiliza una estructura switch para determinar la operación a realizar segun el valor de $_GET["op"] */
    switch($_GET["op"]){

        /*TODO: si la operación es "registrar" */
        case "registrar":
            /*TODO: datos que obtienen desde el formulario de registro */
            $nombre = $_POST["usu_nomape"];
            $correo = $_POST["usu_correo"];
            $contrasenia = $_POST["usu_pass"];

            $datos = $usuario->get_usuario_correo($correo);

            /*TODO: validando que el correo que se ingresa no exista en la base de datos para registrarlo */
            if(is_array($datos) == true && count($datos) == 0){
                 
                /*TODO: llamada a la función registrar_usuario y a sus respectivos parámetros los cuales se obtienen del formulario */
                $usuario->registrar_usuario($nombre,$correo,$contrasenia);
                echo "1";
            }
            else{
                echo "0";
            }
           
            break;

    }

?>
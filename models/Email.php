<?php 

/*TODO: para hacer uso de phpmailer que es una librería se debe hacer lo suguiente:
    1. En el terminal se debe ingresar hacia el directorio include -> C:\xampp\htdocs\roles_mvc\include>
    2. Dentro del directorio include se debe ingresar el script siguiente -> composer require phpmailer/phpmailer
    3. Se debe verificar que dentro del directorio include debe haber el directorio vender y dentro del mismo debe 
       tener los directorios composer y phpmailer y el archivo autoload.php
*/

require '../include/vendor/autoload.php';

/*TODO: librerias de phpmailer */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once("../config/conexion.php");
require_once("../models/Usuario.php");

?>
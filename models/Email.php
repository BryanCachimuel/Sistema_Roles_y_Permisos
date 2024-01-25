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

class Email extends PHPMailer{
    /*TODO: creamos dos variables con los datos del correo administrable y su contraseña */
    protected $gCorreo = 'info@rixlercode.net';
    protected $gContrasenia = 'nodeXdtesf*';

    /*TODO: proceso de encriptación del id del usuario registrado */
    private $key="MesaDePartesRixlerC";
    private $cipher="aes-256-cbc";

    /*TODO: para enviar un correo se debe enviar como parámetro el id para saber de que usuario es */
    public function registrar($usu_id){

        /*TODO: Instancia de la clase Conectar con la cual se obtendra la función ruta  */
        $conexion = new Conectar();

        $usuario = new Usuario();
        $datos = $usuario->get_usuario_id($usu_id);

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
        $cifrado = openssl_encrypt($usu_id, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
        $textoCifrado = base64_encode($iv . $cifrado);

        $this->isSMTP();
        $this->Host = 'smtp-relay.brevo.com'; // este es el host de hostinger
        $this->Port = 587;  // puerto que usa hostinger
        $this->SMTPAuth = true;
        $this->SMTPSecure = 'tls';

        $this->Username = $this->gCorreo;
        $this->Password = $this->gContrasenia;
        $this->setFrom($this->gCorreo,"Registro en Mesa de Partes del Sistema");// se setea el mensaje que aparece en el frontend
        
        $this->CharSet = 'UTF8';// se setea los caracteres en utf8
        $this->addAddress($datos[0]["usu_correo"]); // se envia a este correo una copia de lo que se mande del correo corporativo
        $this->isHTML(true); // se envia lo que es un html 
        $this->Subject = "Mesa de Partes";

        /*TODO: url de la ruta donde se encuentra la vista de confirmación de correo */
        $url = $conexion->ruta() . "view/confirmar/?id=".$textoCifrado;

        $cuerpo = file_get_contents("../assets/email/registrar.html");// variable en donde se va a enviar el cuerpo del correo 
        $cuerpo = str_replace("xlinkcorreourl",$url,$cuerpo); //xusuariocorreo es un código para reemplazar  ciertas partes del código del archivo de confirmación de correo
        
        $this->Body = $cuerpo;
        $this->AltBody = strip_tags("Confirmar Registro");// se agrega una etiqueta al cuerpo

        try {
            $this->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>
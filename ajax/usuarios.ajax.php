<?php

require_once "../controlador/usuario.controlador.php";
require_once "../modelo/usuario.modelo.php";

class AjaxUsuarios {

    public $idUsuario;

    public function ajaxEditarUsuarios(){
        $item = "usuarios";
        $valor = $this->idUsuario;

        $respuesta = ctrlUsuarios::ctrlMostrarUsuarios();
        return $respuesta;
    }

}

/* proceso para editar usuarios */
if(isset($_POST["idUsuario"])){
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuarios();
}

?>
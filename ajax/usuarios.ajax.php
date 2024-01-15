<?php 

require_once "../controlador/usuarios.controlador.php";
require_once "../modelo/usuarios.modelo.php";

class AjaxUsuarios{

    public $idUsuario;

    public function ajaxEditarUsuarios(){
        $item = "id";
        $valor = $this->idUsuario;
        $respuesta = ctrUsuarios::ctrMostrarUsuarios1($item,$valor);

        echo json_encode($respuesta);
    }
}

//editar usuario

if(isset($_POST["idUsuario"])){

$editar = new AjaxUsuarios();
$editar->idUsuario = $_POST["idUsuario"];
$editar->ajaxEditarUsuarios();

}

?>
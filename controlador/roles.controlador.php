<?php 

class ctrRoles{

    static public function ctrMostrarRoles($item , $valor){

        $tabla="roles";
        $respuesta = mdlroles::mdlMostrarRoles($tabla,$item ,$valor);

        return $respuesta;
    }
}

?>
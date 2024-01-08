<?php

class ctrlRoles{

    static public function ctrMostrarRoles($item, $valor){
        $tabla = "roles";
        $respuesta = mdlRoles::mdlMostrarRoles($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrMostrarRoles2($item, $valor){
        $tabla = "roles";
        $respuesta = mdlRoles::mdlMostrarRoles($tabla, $item, $valor);
        return $respuesta;
    }
    

}

?>
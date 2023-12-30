<?php

class ctrlUsuarios {

    static public function ctrlMostrarUsuarios(){
        $tabla = "usuarios";
        $respuesta = mdlUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;
    }

}

?>
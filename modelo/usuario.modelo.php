<?php

require_once "conexion.php";

class mdlUsuarios {

    static public function mdlMostrarUsuarios($tabla){
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

    static public function mdlguardarUsuarios($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERTO INTO $tabla(usuario,password,nombre,foto,rol) VALUES (:USUARIO, :PASS, :NOMBRE, :FOTO, :ROL)");
        $stmt->bindParam(":NOMBRE",$datos["nom_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":USUARIO",$datos["nom_user"], PDO::PARAM_STR);
        $stmt->bindParam(":PASS",$datos["pass_user"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL",$datos["rol_user"], PDO::PARAM_INT);
        $stmt->bindParam(":FOTO",$datos["foto"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            echo "error";
        }

        $stmt->close();
        $stmt = null;
    }

    
}

?>
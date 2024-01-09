<?php

require_once "conexion.php";

class mdlUsuarios {

    static function mdlMostrarUsuarios1($tabla, $item, $valor){
        $stmt= Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt -> fetch();
    }

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

    static public function mdlEditarUsuarios($tabla,$datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:NOM_E, password=:PASSUSER_E, nombre=:NOMUSER_E, foto=:IMG_E, rol=:ROL_E WHERE id=:IDE");
        $stmt->bindParam(":IDE", $datos["idE"], PDO::PARAM_INT);
        $stmt->bindParam(":NOM_E", $datos["nom_usuarioE"], PDO::PARAM_STR);
        $stmt->bindParam(":NOMUSER_E", $datos["nom_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":PASSUSER_E", $datos["passE"], PDO::PARAM_STR);
        $stmt->bindParam(":ROL_E", $datos["rol_userE"], PDO::PARAM_STR);
        $stmt->bindParam(":IMG_E", $datos["img"], PDO::PARAM_STR);

        if($stmt -> execute()){
            return "ok";
        }else{
            echo "error";
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlEliminarUsuarios($tabla , $id){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id =:id");
        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        if($stmt -> execute()){
			return "ok";
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}
		$stmt -> close();
		$stmt = null;
    }

    
}

?>
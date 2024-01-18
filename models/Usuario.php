<?php

    /*TODO: Clase Usuario que extiende de la clase Conectar que se encuentra en el directorio condif/conexion.php */
    class Usuario extends Conectar {

        /*TODO: función para registrar un nuevo usuario en la bdd */
        public function registrar_usuario($usu_nomape,$usu_correo,$usu_pass){

            /*TODO: Obtener la conexión a la bdd utilizando la función de la clase padre(Conectar) */
            $conectar = parent::conexion();

            /*TODO: llamando a la función que permite hacere uso del juego de caracteres de tipo utf8 */
            parent::set_names();
            
            /*TODO: Consulta SQL para insertar un nuevo usuario en la tabla tm_usuario*/
            $sql = "INSERT INTO tm_usuario
                    (usu_nomape,usu_correo,usu_pass) 
                    VALUES(?,?,?)";

            /*TODO: Prepaar la consulta SQL */
            $sql = $conectar->prepare($sql);

            /*TODO: Vincular los valores a los parámetros de la consulta */
            $sql->bindValue(1,$usu_nomape);
            $sql->bindValue(2,$usu_correo);
            $sql->bindValue(3,$usu_pass);

            /*TODO: Ejecutar la consulta SQL */
            $sql->execute();
        }

        /*TODO: función para obtener un correo específico de acuerdo al parámetro de busqueda */
        public function get_usuario_correo($usu_correo){      
             $conectar = parent::conexion();
             parent::set_names();
             
             $sql = "SELECT * FROM tm_usuario
                     WHERE usu_correo = ?";
 
             $sql = $conectar->prepare($sql);
             $sql->bindValue(1,$usu_correo);

             $sql->execute();
             return $sql->fetchAll();
        }

    }

?>
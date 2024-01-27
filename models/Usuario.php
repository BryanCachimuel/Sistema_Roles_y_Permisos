<?php

    /*TODO: Clase Usuario que extiende de la clase Conectar que se encuentra en el directorio condif/conexion.php */
    class Usuario extends Conectar {

         /*TODO: proceso de encriptación del id del usuario registrado */
        private $key="MesaDePartesRixlerC";
        private $cipher="aes-256-cbc";

        /*TODO: función para registrar un nuevo usuario en la bdd */
        public function registrar_usuario($usu_nomape,$usu_correo,$usu_pass){

           /* proceos para encriptar la contraseña */
           $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cipher));
           $cifrado = openssl_encrypt($usu_pass, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv);
           $textoCifrado = base64_encode($iv . $cifrado);

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
            $sql->bindValue(3,$textoCifrado);

            /*TODO: Ejecutar la consulta SQL */
            $sql->execute();

            /*TODO: captura el ultimo id donde hayamos ejecutado en el insert lo que implica que captura el id del ultimo registro realizado*/
            $sql1 = "SELECT last_insert_id() as 'usu_id'";
            $sql1 = $conectar->prepare($sql1);

            return $sql1->fetchAll();
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

         /*TODO: función para obtener un id específico de acuerdo al parámetro de busqueda */
         public function get_usuario_id($usu_id){      
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "SELECT * FROM tm_usuario
                    WHERE usu_id = ?";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);

            $sql->execute();
            return $sql->fetchAll();
       }

       /*TODO: función para activar un usuario registrado y confirmado mediante correo electrónico */
       public function activar_usuario($usu_id){    
           
           /* cifrado del usu_id */
           $iv_dec = substr(base64_decode($usu_id), 0, openssl_cipher_iv_length($this->cipher));
           $cifradoSinIV = substr(base64_decode($usu_id), 0, openssl_cipher_iv_length($this->cipher));
           
           /* decifrado del usu_id */
           $textoDecifrado = openssl_decrypt($cifradoSinIV, $this->cipher, $this->key, OPENSSL_RAW_DATA, $iv_dec);

            $conectar = parent::conexion();
            parent::set_names();
        
            $sql = "UPDATE tm_usuario
                   SET estado=1,
                       fecha_activacion=NOW()
                   WHERE usu_id = ?";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$textoDecifrado);

            $sql->execute();
        }

    }

?>
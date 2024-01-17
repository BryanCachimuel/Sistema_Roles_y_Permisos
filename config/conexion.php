<?php
    /* TODO:Inicia la sesión (si no esta iniciada) */
    session_start();

    class Conectar {

        /*TODO: Propiedad protegida para almacenar la conexión a la base de datos */
        protected $dbh;

        /*TODO: función para establecer la conexión a la base de datos */
        protected function conexion(){
            try {
                /*TODO: Intenta establecer la conexión utilizando PDO */
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=mesadepartes","root","");
                return $conectar;
            } catch (Exception $e) {
                /*TODO: En caso de error , imprime un mensaje y termina el script */
                print "Error en la conexión hacia la BDD: " . $e->getMessage() . "<br>";
                die();
            }
        }

        /*TODO: función para que todo lo que se ingrese a la base de datos lo haga con el formato utf8 (para no tener problemas con las mayusculas y minusculas) */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /*TODO: función estática que devuelve la ruta base del proyecto  */
        public static function ruta(){
            return "http://localhost/roles_mvc/";
        }

        /* 
            para mandar a imprimir los comentarios realizados se debe dar click 
            sobre el icono del arbol e ir al nombre del proyecto nombre del proyecto 
            y por último dar click en la opción Export Tree
        */

    }

?>
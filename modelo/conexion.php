<?php

class Conexion {

    static public function conectar() {
        $link = new PDO("mysql:host=localhost;dbname=roles_mvc","root","");

        /* esta nomenclatura permite ingresar a la base de datos diferentes tipos de caracteres como emogis */
        $link->exec("set names utf8mb4");
    }

}

?>
<?php

/*
    El archivo .htaccess -> sirve para ordenar de mejor manera las urls y tengan una mejor presentación,
                            
    RewriteRule ^([-a-zA-Z0-9/]+)$ index.php?pagina=$1 -> esta parte hace que ya no aparezca en la utl esta sección index.php?pagina 
                                                          y solo aparezca las rutas de los nombres de las paginas a visitar
*/

/* llamando al controlador */
include "controlador/plantilla.controlador.php";
include "controlador/usuario.controlador.php";

include "modelo/usuario.modelo.php";

/* utilizamos POO para poder llamar a la clase creada en el archivo plantilla.controlador.php*/
$plantilla = new ControladorPlantilla();

$plantilla->ctrlPlantilla();

?>
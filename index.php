<?php

/* llamando al controlador */
include "controlador/plantilla.controlador.php";

/* utilizamos POO para poder llamar a la clase creada en el archivo plantilla.controlador.php*/
$plantilla = new ControladorPlantilla();

$plantilla->ctrlPlantilla();

?>
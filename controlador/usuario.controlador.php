<?php

class ctrlUsuarios
{

    static public function ctrlMostrarUsuarios()
    {
        $tabla = "usuarios";
        $respuesta = mdlUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;
    }

    static public function ctrGuardarusuarios()
    {
        if (isset($_POST["nom_usuarios"])) {
            if (isset($_FILES["subirImgusuarios"]["tmp_name"]) && !empty($_FILES["subirImgusuarios"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["subirImgusuarios"]["tmp_name"]);
                $nuevoAncho = 480;
                $nuevoAlto = 382;

                /* se crea el directorio donde se va a guardar la foto del usuario */
                $directorio = "vista/imagenes/usuarios";

                /* de acuerdo al tipo de imagen aplicamos las funciones por defecto de php */
                if ($_FILES["subirImgusuarios"]["type"] == "image/jpeg") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = $directorio . "/" . $aleatorio . ".jpg";
                    $origen = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                } else if ($_FILES["subirImgusuariosE"]["type"] == "image/png") {
                    $aleatorio = mt_rand(100, 999);
                    $rutas = $directorio . "/" . $aleatorio . ".png";
                    $origen = imagecreatefrompng($_FILES["subirImgusuariosE"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagealphablending($destino, FALSE);
                    imagesavealpha($destino, TRUE);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagepng($destino, $rutas);
                } else {
                    echo '<script>
							swal({
									type:"error",
								  	title: "¡CORREGIR!",
								  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
								  	showConfirmButton: true,
									confirmButtonText: "Cerrar"		  
							}).then(function(result){

									if(result.value){   
									    history.back();
									  } 
							});
						</script>';

                        return;
                }
            }
        }
    }
}

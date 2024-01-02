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

                /* se encripa la contraseña */
                $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "nom_usuario" => $_POST["nom_usuarios"],
                    "nom_user" => $_POST["nom_user"],
                    "pass_user" => $encriptarPassword,
                    "rol_user" => $_POST["rol_user"],
                    "foto" => $ruta
                );

                //echo "</pre>";  print_r($datos); echo "</pre>";
                $tabla = "usuarios";
                $respuesta = mdlUsuarios::mdlguardarUsuarios($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                            type:"success",
                              title: "¡CORRECTO!",
                              text: "El usuario ha sido creado correctamente",
                              showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                          
                    }).then(function(result){

                            if(result.value){   
                                history.back();
                              } 
                    });
                </script>';
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>registro fallido</div>";
                }
            }
        }
    }
}

<?php 

class ctrUsuarios{

	static public function ctrMostrarUsuarios1($item, $valor){
		$tabla = "usuarios";
		$respuesta = mdlUsuarios::MdlMostrarUsuarios1($tabla, $item, $valor);

		return $respuesta;
	}


    static public function ctrMostrarUsuarios(){
		$tabla="usuarios";
		$respuesta=mdlUsuarios::mdlMostrarUsuarios($tabla);

		return $respuesta;	 
    }

	static public function ctrEditarusuarios(){

		if(isset($_POST["idPerfilE"])){
			if(isset($_FILES["subirImgusuariosE"]["tmp_name"]) && !empty($_FILES["subirImgusuariosE"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["subirImgusuariosE"]["tmp_name"]);

					$nuevoAncho = 480;
					$nuevoAlto = 382;

				   /* CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL PLAN */
					$directorio = "vistas/imagenes/usuarios";
					
					/* PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD */
                    if(isset($_POST["fotoActualE"])){   
                        unlink($_POST["fotoActualE"]);
                    }

					/* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
					if($_FILES["subirImgusuariosE"]["type"] == "image/jpeg"){
						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgusuariosE"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $rutas);	
					}
					else if($_FILES["subirImgusuariosE"]["type"] == "image/png"){

						$aleatorio = mt_rand(100,999);
						$rutas = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgusuariosE"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $rutas);
					}else{
						echo'<script>
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
					if($rutas != ""){
                      $r= $rutas;
					}else{
					  $r = $_POST["fotoActualE"];
					}

					if($_POST["pass_userE"] != ""){
						$password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
					}else{
						$password = $_POST["pass_userActualE"];
					}

					$datos =array(  "idE" => $_POST["idPerfilE"],
									"nom_usuarioE" => $_POST["nom_usuariosE"],
									"nom_userE" => $_POST["nom_userE"],
									"passE" => $password,
									"rol_userE" => $_POST["rol_userE"],
									"img" => $r);

					$tabla="usuarios";

					$respuesta = mdlUsuarios::mdlEditarUsuarios($tabla,$datos);

					//	echo "<pre>"; print_r($datos); echo "<pre>";
						if($respuesta == "ok"){
						echo'<script>
							swal({
									type:"success",
									title: "¡CORRECTO!",
									text: "El usuario ha sido editado correctamente",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
							}).then(function(result){

									if(result.value){   
										history.back();
									} 
							});
					</script>';
				}else{
                    echo "<div class='alert alert-danger mt-3 small'>editada fallida</div>";
                }
		}
	}
	

    static public function ctrGuardarusuarios(){
        if(isset($_POST["nom_usuarios"])){

            if(isset($_FILES["subirImgusuarios"]["tmp_name"]) && !empty($_FILES["subirImgusuarios"]["tmp_name"])){
            list($ancho, $alto) = getimagesize($_FILES["subirImgusuarios"]["tmp_name"]);

            $nuevoAncho = 480;
			$nuevoAlto = 382;

            /* CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO */
			$directorio = "vistas/imagenes/usuarios";
            
            
            /* DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP */
					if($_FILES["subirImgusuarios"]["type"] == "image/jpeg"){

						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["subirImgusuarios"]["tmp_name"]);
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagejpeg($destino, $ruta);	
					}

                    	else if($_FILES["subirImgusuarios"]["type"] == "image/png"){
						$aleatorio = mt_rand(100,999);
						$ruta = $directorio."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["subirImgusuarios"]["tmp_name"]);						
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
						imagealphablending($destino, FALSE);
						imagesavealpha($destino, TRUE);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
						imagepng($destino, $ruta);
					}else{
	                    echo'<script>
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

                    $encriptarPassword = crypt($_POST["pass_user"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                    $datos =array("nom_usuario"=>$_POST["nom_usuarios"],
                                 "nom_user"=>$_POST["nom_user"],
                                  "pass_user"=> $encriptarPassword,
                                  "rol_user"=> $_POST["rol_user"],
                                    "foto"=>$ruta);
                            echo "</pre>";  print_r($datos); echo "</pre>";

                    $tabla="usuarios";
                    $respuesta=mdlUsuarios::mdlguardarUsuarios($tabla,$datos); 

                 if($respuesta == "ok"){
						echo'<script>
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
				}else{
                    echo "<div class='alert alert-danger mt-3 small'>registro fallido</div>";
                }
            }
        }
    }
}

?>
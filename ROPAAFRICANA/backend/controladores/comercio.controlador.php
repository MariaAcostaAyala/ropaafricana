<?php

require_once __DIR__ . "/../modelos/comercio.modelo.php";

class ControladorComercio{


    /*=============================================
	SELECCIONAR PLANTILLA
	=============================================*/

	static public function ctrSeleccionarPlantilla(){

		$tabla = "plantilla";

		$respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);

		return $respuesta;

	}


    /*=============================================
	ACTUALIZAR LOGO O ICONO
	=============================================*/

    static public function ctrActualizarLogoIcono($item, $valor){

        $tabla = "plantilla";
		$id = 1;

        $plantilla = ModeloComercio::mdlSeleccionarPlantilla($tabla);

        /*=============================================
		CAMBIANDO LOGOTIPO O ICONO
		=============================================*/	
        $valorNuevo = $valor;

        if(isset($valor["tmp_name"])){
            // Crear directorio si no existe
            $directorio = "../vistas/img/plantilla";
            if(!file_exists($directorio)){
                if(!mkdir($directorio, 0755, true)) {
                    return "error";
                }
            }

            // Verificar que el archivo sea una imagen válida
            $allowed = array('image/jpeg', 'image/png');
            if(!in_array($valor['type'], $allowed)) {
                return "error";
            }

            // Verificar tamaño máximo (2MB)
            if($valor['size'] > 2000000) {
                return "error";
            }

            list($ancho, $alto) = getimagesize($valor["tmp_name"]);

            /*=============================================
			CAMBIANDO LOGOTIPO
			=============================================*/	
            if($item == "logo"){
                // Eliminar logo anterior si existe
                if(isset($plantilla["logo"]) && file_exists("../".$plantilla["logo"])){
                    unlink("../".$plantilla["logo"]);
                }

                $nuevoAncho = 500;
				$nuevoAlto = 100;

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                if($valor["type"] == "image/jpeg"){
					$ruta = "../vistas/img/plantilla/logo.jpg";
					$origen = imagecreatefromjpeg($valor["tmp_name"]);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				}
                
				if($valor["type"] == "image/png"){
					$ruta = "../vistas/img/plantilla/logo.png";
					$origen = imagecreatefrompng($valor["tmp_name"]);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}

                // Liberar memoria
                imagedestroy($destino);
                imagedestroy($origen);

                // Verificar que el archivo se haya creado correctamente
                if(!file_exists($ruta)) {
                    return "error";
                }
            }

            /*=============================================
			CAMBIANDO ICONO
			=============================================*/	
            if($item == "icono"){
                // Eliminar icono anterior si existe
                if(isset($plantilla["icono"]) && file_exists("../".$plantilla["icono"])){
                    unlink("../".$plantilla["icono"]);
                }

				$nuevoAncho = 100;
				$nuevoAlto = 100;

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				if($valor["type"] == "image/jpeg"){
					$ruta = "../vistas/img/plantilla/icono.jpg";
					$origen = imagecreatefromjpeg($valor["tmp_name"]);					
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				}

                if($valor["type"] == "image/png"){
					$ruta = "../vistas/img/plantilla/icono.png";
					$origen = imagecreatefrompng($valor["tmp_name"]);
					imagealphablending($destino, FALSE);
        			imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				}

                // Liberar memoria
                imagedestroy($destino);
                imagedestroy($origen);

                // Verificar que el archivo se haya creado correctamente
                if(!file_exists($ruta)) {
                    return "error";
                }
            }

            // Guardar la ruta relativa en la base de datos
            $valorNuevo = substr($ruta, 3);
        }

        $respuesta = ModeloComercio::mdlActualizarLogoIcono($tabla, $id, $item, $valorNuevo);
        return $respuesta;
    }




    /*=============================================
	ACTUALIZAR COLORES
	=============================================*/
    static public function ctrActualizarColores($datos){

        $tabla = "plantilla";
		$id = 1;

        $respuesta = ModeloComercio::mdlActualizarColores($tabla, $id, $datos);

		return $respuesta;




    }


	
	/*=============================================
	ACTUALIZAR SCRIPT
	=============================================*/

	static public function ctrActualizarScript($datos){

		$tabla = "plantilla";
		$id = 1;

		$respuesta = ModeloComercio::mdlActualizarScript($tabla, $id, $datos);

		return $respuesta;


	}

	/*=============================================
	SELECCIONAR COMERCIO
	=============================================*/

	static public function ctrSeleccionarComercio(){

		$tabla = "comercio";

		$respuesta = ModeloComercio::mdlSeleccionarComercio($tabla);

		return $respuesta;

	}


	/*=============================================
	ACTUALIZAR INFORMACION
	=============================================*/

	static public function ctrActualizarInformacion($datos){

		$tabla = "comercio";
		$id = 1;

		$respuesta = ModeloComercio::mdlActualizarInformacion($tabla, $id, $datos);

		return $respuesta;


	}

    /*=============================================
    MOSTRAR LOGOTIPO
    =============================================*/
    static public function ctrMostrarLogotipo() {
        $tabla = "plantilla";
        $respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);
        return $respuesta;
    }

    /*=============================================
    MOSTRAR ICONOS
    =============================================*/
    static public function ctrMostrarIconos() {
        $tabla = "configuracion";
        $respuesta = ModeloComercio::mdlMostrarIconos($tabla);
        return $respuesta;
    }

    /*=============================================
    MOSTRAR COLORES
    =============================================*/
    static public function ctrMostrarColores() {
        $tabla = "plantilla";
        $respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);
        return $respuesta;
    }

    /*=============================================
    MOSTRAR REDES SOCIALES
    =============================================*/
    static public function ctrMostrarRedesSociales() {
        $tabla = "plantilla";
        $respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);
        return $respuesta;
    }

    /*=============================================
    MOSTRAR SCRIPT
    =============================================*/
    static public function ctrMostrarScript() {
        $tabla = "plantilla";
        $respuesta = ModeloComercio::mdlSeleccionarPlantilla($tabla);
        return $respuesta;
    }

    /*=============================================
    EDITAR LOGOTIPO
    =============================================*/
    static public function ctrEditarLogotipo() {
        if(isset($_POST["editarLogotipo"])) {
            if(isset($_FILES["editarImagen"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
                $nuevoAncho = 500;
                $nuevoAlto = 138;
                $directorio = "../vistas/img/plantilla/";
                if(!empty($_POST["imagenActual"])) {
                    unlink("../vistas/img/plantilla/".$_POST["imagenActual"]);
                } else {
                    mkdir($directorio, 0755);
                }
                if($_FILES["editarImagen"]["type"] == "image/jpeg") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "../vistas/img/plantilla/logo".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                }
                if($_FILES["editarImagen"]["type"] == "image/png") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "../vistas/img/plantilla/logo".$aleatorio.".png";
                    $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagealphablending($destino, FALSE);
                    imagesavealpha($destino, TRUE);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagepng($destino, $ruta);
                }
            } else {
                $ruta = $_POST["imagenActual"];
            }
            $tabla = "configuracion";
            $datos = array("id" => $_POST["id"],
                          "logo" => $ruta);
            $respuesta = ModeloComercio::mdlEditarLogotipo($tabla, $datos);
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡El logotipo ha sido editado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "comercio";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    EDITAR ICONOS
    =============================================*/
    static public function ctrEditarIconos() {
        if(isset($_POST["editarIconos"])) {
            if(isset($_FILES["editarImagen"]["tmp_name"])) {
                list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);
                $nuevoAncho = 100;
                $nuevoAlto = 100;
                $directorio = "../vistas/img/iconos/";
                if(!empty($_POST["imagenActual"])) {
                    unlink("../vistas/img/iconos/".$_POST["imagenActual"]);
                } else {
                    mkdir($directorio, 0755);
                }
                if($_FILES["editarImagen"]["type"] == "image/jpeg") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "../vistas/img/iconos/icono".$aleatorio.".jpg";
                    $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                }
                if($_FILES["editarImagen"]["type"] == "image/png") {
                    $aleatorio = mt_rand(100, 999);
                    $ruta = "../vistas/img/iconos/icono".$aleatorio.".png";
                    $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    imagealphablending($destino, FALSE);
                    imagesavealpha($destino, TRUE);
                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagepng($destino, $ruta);
                }
            } else {
                $ruta = $_POST["imagenActual"];
            }
            $tabla = "configuracion";
            $datos = array("id" => $_POST["id"],
                          "icono" => $ruta);
            $respuesta = ModeloComercio::mdlEditarIconos($tabla, $datos);
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡Los iconos han sido editados correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "comercio";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    EDITAR COLORES
    =============================================*/
    static public function ctrEditarColores() {
        if(isset($_POST["editarColores"])) {
            $tabla = "configuracion";
            $datos = array("id" => $_POST["id"],
                          "barraSuperior" => $_POST["barraSuperior"],
                          "textoSuperior" => $_POST["textoSuperior"],
                          "colorFondo" => $_POST["colorFondo"],
                          "colorTexto" => $_POST["colorTexto"]);
            $respuesta = ModeloComercio::mdlEditarColores($tabla, $datos);
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡Los colores han sido editados correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "comercio";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    EDITAR REDES SOCIALES
    =============================================*/
    static public function ctrEditarRedesSociales() {
        if(isset($_POST["editarRedesSociales"])) {
            $tabla = "configuracion";
            $datos = array("id" => $_POST["id"],
                          "redesSociales" => $_POST["redesSociales"]);
            $respuesta = ModeloComercio::mdlEditarRedesSociales($tabla, $datos);
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡Las redes sociales han sido editadas correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "comercio";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    EDITAR SCRIPT
    =============================================*/
    static public function ctrEditarScript() {
        if(isset($_POST["editarScript"])) {
            $tabla = "configuracion";
            $datos = array("id" => $_POST["id"],
                          "apiFacebook" => $_POST["apiFacebook"],
                          "pixelFacebook" => $_POST["pixelFacebook"],
                          "googleAnalytics" => $_POST["googleAnalytics"]);
            $respuesta = ModeloComercio::mdlEditarScript($tabla, $datos);
            if($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "¡Los scripts han sido editados correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "comercio";
                        }
                    });
                </script>';
            }
        }
    }

    /*=============================================
    ACTUALIZAR REDES SOCIALES
    =============================================*/
    static public function ctrActualizarRedesSociales($datos){

        $tabla = "plantilla";
        $id = 1;

        $respuesta = ModeloComercio::mdlActualizarRedesSociales($tabla, $id, $datos["redesSociales"]);

        return $respuesta;

    }

}
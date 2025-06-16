<?php

class ControladorPlantilla{

	/*=============================================
	LLAMAMOS LA PLANTILLA
	=============================================*/

	public function plantilla(){

		try {
			$plantilla = self::ctrEstiloPlantilla();
			
			// Si no hay datos, crear un array con valores por defecto
			if(!$plantilla) {
				$plantilla = array(
					"pixelFacebook" => "",
					"apiFacebook" => "",
					"googleAnalytics" => ""
				);
			}
			
			include "vistas/plantilla.php";
		} catch (Exception $e) {
			// En caso de error, crear un array con valores por defecto
			$plantilla = array(
				"pixelFacebook" => "",
				"apiFacebook" => "",
				"googleAnalytics" => ""
			);
			include "vistas/plantilla.php";
		}
	}

	/*=============================================
	TRAEMOS LOS ESTILOS DINÁMICOS DE LA PLANTILLA
	=============================================*/

	static public function ctrEstiloPlantilla(){

		$tabla = "plantilla";

		$respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);

		return $respuesta;
	}

	/*=============================================
	TRAEMOS LAS CABECERAS
	=============================================*/

	static public function ctrTraerCabeceras($ruta){

		$tabla = "cabeceras";

		$respuesta = ModeloPlantilla::mdlTraerCabeceras($tabla, $ruta);

		return $respuesta;	

	}

}
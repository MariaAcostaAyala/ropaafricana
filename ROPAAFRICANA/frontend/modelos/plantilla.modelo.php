<?php

require_once "conexion.php";

class ModeloPlantilla{

	static public function mdlEstiloPlantilla($tabla){

		try {
			$conexion = Conexion::conectar();
			if(!$conexion) {
				return array(
					"pixelFacebook" => "",
					"apiFacebook" => "",
					"googleAnalytics" => "",
					"icono" => "",
					"logo" => "",
					"barraSuperior" => "",
					"textoSuperior" => "",
					"colorFondo" => "",
					"colorTexto" => "",
					"redesSociales" => "[]"
				);
			}

			$stmt = $conexion->prepare("SELECT * FROM $tabla");
			if(!$stmt) {
				return array(
					"pixelFacebook" => "",
					"apiFacebook" => "",
					"googleAnalytics" => "",
					"icono" => "",
					"logo" => "",
					"barraSuperior" => "",
					"textoSuperior" => "",
					"colorFondo" => "",
					"colorTexto" => "",
					"redesSociales" => "[]"
				);
			}

			$stmt->execute();
			$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt->closeCursor();

			if(!$resultado) {
				return array(
					"pixelFacebook" => "",
					"apiFacebook" => "",
					"googleAnalytics" => "",
					"icono" => "",
					"logo" => "",
					"barraSuperior" => "",
					"textoSuperior" => "",
					"colorFondo" => "",
					"colorTexto" => "",
					"redesSociales" => "[]"
				);
			}

			// Asegurarnos de que los campos críticos no sean null
			$resultado["pixelFacebook"] = $resultado["pixelFacebook"] ?? "";
			$resultado["apiFacebook"] = $resultado["apiFacebook"] ?? "";
			$resultado["googleAnalytics"] = $resultado["googleAnalytics"] ?? "";
			$resultado["icono"] = $resultado["icono"] ?? "";
			$resultado["logo"] = $resultado["logo"] ?? "";
			$resultado["barraSuperior"] = $resultado["barraSuperior"] ?? "";
			$resultado["textoSuperior"] = $resultado["textoSuperior"] ?? "";
			$resultado["colorFondo"] = $resultado["colorFondo"] ?? "";
			$resultado["colorTexto"] = $resultado["colorTexto"] ?? "";
			$resultado["redesSociales"] = $resultado["redesSociales"] ?? "[]";

			return $resultado;

		} catch (PDOException $e) {
			return array(
				"pixelFacebook" => "",
				"apiFacebook" => "",
				"googleAnalytics" => "",
				"icono" => "",
				"logo" => "",
				"barraSuperior" => "",
				"textoSuperior" => "",
				"colorFondo" => "",
				"colorTexto" => "",
				"redesSociales" => "[]"
			);
		}

	}

	/*=============================================
	TRAEMOS LAS CABECERAS
	=============================================*/

	static public function mdlTraerCabeceras($tabla, $ruta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
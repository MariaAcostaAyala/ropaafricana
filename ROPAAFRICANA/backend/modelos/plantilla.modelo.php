<?php

class ModeloPlantilla {

    /*=============================================
    MOSTRAR PLANTILLA
    =============================================*/
    static public function mdlEstiloPlantilla($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR CABECERAS, REDES SOCIALES Y LOGOS
    =============================================*/
    static public function mdlMostrarCabeceras($tabla, $ruta) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");
        $stmt->bindParam(":ruta", $ruta, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    MOSTRAR CABECERAS, REDES SOCIALES Y LOGOS
    =============================================*/
    static public function mdlMostrarRedesSociales($tabla) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt = null;
    }
} 
<?php

class ModeloConfiguracion {
    
    /*=============================================
    MOSTRAR CONFIGURACIÓN
    =============================================*/
    static public function mdlConfiguracion($tabla) {
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        } finally {
            $stmt = null;
        }
    }

    /*=============================================
    ACTUALIZAR CONFIGURACIÓN
    =============================================*/
    static public function mdlActualizarConfiguracion($tabla, $item1, $valor1, $item2, $valor2) {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :valor1 WHERE $item2 = :valor2");
            $stmt->bindParam(":valor1", $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":valor2", $valor2, PDO::PARAM_STR);
            
            if($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error";
        } finally {
            $stmt = null;
        }
    }
} 
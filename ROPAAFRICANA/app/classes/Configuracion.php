<?php
require_once __DIR__ . "/../models/Configuracion.php";

class Configuracion {
    public static $empresa;
    public static $contacto;
    public static $mapa;
    public static $configuracion;
    public static $email = [
        'nombre_remitente' => 'Administrador',
        'email_remitente' => 'admin@example.com',
        'email_copia' => 'copia@example.com'
    ];

    static public function ctrConfiguracion() {
        $tabla = "configuracion";
        $respuesta = ModeloConfiguracion::mdlConfiguracion($tabla);
        
        if ($respuesta) {
            self::$empresa = json_decode($respuesta['empresa'] ?? '{}', true);
            self::$contacto = json_decode($respuesta['contacto'] ?? '{}', true);
            self::$mapa = json_decode($respuesta['mapa'] ?? '{}', true);
            self::$configuracion = json_decode($respuesta['configuracion'] ?? '{}', true);
            
            // Si existe la clave email en la respuesta, actualizar los valores
            if (isset($respuesta['email'])) {
                self::$email = json_decode($respuesta['email'], true);
            }
        }
        
        return $respuesta;
    }
} 
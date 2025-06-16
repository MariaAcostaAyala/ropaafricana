<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'ropafricana');
define('DB_USER', 'root');
define('DB_PASS', '');

// Configuración de la aplicación
define('APP_NAME', 'Tienda Virtual');
define('APP_URL', 'http://localhost/ROPAAFRICANA/frontend/');
define('APP_SERVER', 'http://localhost/ROPAAFRICANA/backend/');

// Configuración de sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de zona horaria
date_default_timezone_set('Europe/Madrid');

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Configuracion {
    // Datos de contacto
    public static $contacto = array(
        'telefono' => '(968) 99 99 99',
        'email' => 'soporte@tiendamurciana.es',
        'direccion' => 'Calle No Indicada, Murcia, España',
        'ciudad' => 'Murcia',
        'pais' => 'España'
    );

    // Datos de la empresa
    public static $empresa = array(
        'nombre' => 'Tienda Murciana',
        'descripcion' => 'Tu tienda de Murcia de confianza',
        'slogan' => 'Contáctenos en:',
        'compania' => 'Compañía Murciana S.L.',
        'cif' => 'B12345678'
    );

    // Configuración de correo electrónico
    public static $email = array(
        'nombre_remitente' => 'Administrador',
        'email_remitente' => 'info@tutiendamurciana.com',
        'nombre_respuesta' => 'Administrador',
        'email_respuesta' => 'info@tutiendamurciana.com'
    );

    // Datos de redes sociales
    public static $redesSociales = array(
        'facebook' => 'https://facebook.com/tutiendamurciana',
        'twitter' => 'https://twitter.com/tutiendamurciana',
        'instagram' => 'https://instagram.com/tutiendamurciana',
        'youtube' => 'https://youtube.com/tutiendamurciana'
    );

    // Datos de ubicación para el mapa
    // 37.99907904732925, -1.13808485117462
    public static $mapa = array(
        'latitud' => '37.99907904732925',
        'longitud' => '-1.13808485117462',
        'zoom' => '15',
        'ancho' => '100%',
        'alto' => '200',
        'estilo' => 'border:0',
        'titulo' => 'Nuestra ubicación',
        'direccion_completa' => 'Calle No Indicada, Murcia, España',
        'place_id' => 'ChIJXXXXXXXXXXXXXXXXXXXXXX', // ID del lugar en Google Maps
        'tipo_mapa' => 'roadmap', // roadmap, satellite, hybrid, terrain
        'idioma' => 'es',
        'region' => 'es'
    );

    public static $configuracion = array(
        // Información de contacto
        'contacto' => array(
            'telefono' => '+34 123 456 789',
            'email' => 'info@tiendamurciana.com',
            'direccion' => 'Calle No Indicada, Murcia, España'
        ),
        // Información de la empresa
        'empresa' => array(
            'nombre' => 'Tienda Murciana',
            'descripcion' => 'Tu tienda online de confianza',
            'compania' => 'Compañía Murciana S.L.',
            'cif' => 'B12345678'
        ),
    );
} 
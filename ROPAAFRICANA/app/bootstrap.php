<?php
// Cargar configuración
$app = require_once __DIR__ . '/config/app.php';

// Cargar constantes
require_once __DIR__ . '/config/constants.php';

// Cargar configuración de base de datos
require_once __DIR__ . '/config/database.php';

// Configurar zona horaria
date_default_timezone_set(APP_TIMEZONE);

// Configurar manejo de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configurar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configurar cabeceras
header('Content-Type: text/html; charset=utf-8');

// Definir la ruta base de la aplicación
define('BASE_PATH', dirname(__DIR__));

// Función para cargar clases automáticamente
spl_autoload_register(function ($class) {
    // Convertir el namespace a ruta de archivo
    $file = BASE_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    
    // Si el archivo existe, cargarlo
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    // Si no se encuentra, buscar en el directorio de servicios
    $file = BASE_PATH . '/app/services/' . basename(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    // Si no se encuentra, buscar en el directorio de clases
    $file = BASE_PATH . '/app/classes/' . basename(str_replace('\\', '/', $class)) . '.php';
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    return false;
}); 
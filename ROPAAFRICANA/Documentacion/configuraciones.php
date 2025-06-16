<?php
/**
 * Configuraciones - Tienda Murciana
 * 
 * Este documento contiene la guía de configuración de la aplicación web de la Tienda Murciana.
 * Última actualización: <?php echo date('d/m/Y'); ?>
 */

// Incluir verificación de sesión
require_once "verificar_sesion.php";

// Incluir configuración
$config = require "../app/config/app.php";
$nombreTienda = $config['company']['name'] ?? 'Tienda Murciana';

// Cargar configuraciones reales
$dbConfig = require "../app/config/database.php";
$appConfig = require "../app/config/app.php";

// Definir la ruta base
$baseUrl = "http://localhost/ROPAAFRICANA/";

// Función helper para obtener valores de configuración de forma segura
function getConfigValue($array, $key, $default = 'No configurado') {
    return isset($array[$key]) ? $array[$key] : $default;
}

// Función helper para obtener valores anidados de forma segura
function getNestedConfigValue($array, $keys, $default = 'No configurado') {
    $current = $array;
    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            return $default;
        }
        $current = $current[$key];
    }
    return $current;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones - <?php echo $nombreTienda; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/documentacion.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="../backend/inicio"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
            <a href="<?php echo $baseUrl; ?>documentacion/"><i class="fas fa-book"></i> Documentación Principal</a>
        </div>
        
        <header>
            <h1>Guía de Configuraciones - <?php echo $nombreTienda; ?></h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <div class="section">
            <h2>Estructura de Configuraciones</h2>
            <p>La aplicación utiliza un sistema de configuración distribuido en varios archivos para mantener una organización clara y modular.</p>
            
            <div class="data-card">
                <h3>1. Configuración Principal (app/config/)</h3>
                <ul class="data-list">
                    <li><strong>app.php</strong>: Configuración general de la aplicación</li>
                    <li><strong>constants.php</strong>: Constantes del sistema</li>
                    <li><strong>database.php</strong>: Configuración de la base de datos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>2. Configuración de Base de Datos</h3>
                <p>Archivo: <code>app/config/database.php</code></p>
                <pre>
return [
    'host' => '<?php echo getConfigValue($dbConfig, 'host', 'localhost'); ?>',
    'database' => '<?php echo getConfigValue($dbConfig, 'database', 'ecomerce'); ?>',
    'username' => '<?php echo getConfigValue($dbConfig, 'username', 'root'); ?>',
    'password' => '<?php echo str_repeat('*', strlen(getConfigValue($dbConfig, 'password', ''))); ?>',
    'charset' => '<?php echo getConfigValue($dbConfig, 'charset', 'utf8'); ?>',
    'collation' => '<?php echo getConfigValue($dbConfig, 'collation', 'utf8_spanish_ci'); ?>',
    'prefix' => '<?php echo getConfigValue($dbConfig, 'prefix', ''); ?>'
];</pre>
            </div>

            <div class="data-card">
                <h3>3. Configuración de la Aplicación</h3>
                <p>Archivo: <code>app/config/app.php</code></p>
                <pre>
return [
    'company' => [
        'name' => '<?php echo getNestedConfigValue($appConfig, ['company', 'name'], 'Tienda Murciana'); ?>',
        'description' => '<?php echo getNestedConfigValue($appConfig, ['company', 'description'], 'Tu tienda de confianza'); ?>',
        'email' => '<?php echo getNestedConfigValue($appConfig, ['company', 'email'], 'No configurado'); ?>',
        'phone' => '<?php echo getNestedConfigValue($appConfig, ['company', 'phone'], 'No configurado'); ?>',
        'address' => '<?php echo getNestedConfigValue($appConfig, ['company', 'address'], 'No configurado'); ?>'
    ],
    'app' => [
        'url' => '<?php echo getNestedConfigValue($appConfig, ['app', 'url'], $baseUrl); ?>',
        'debug' => <?php echo getNestedConfigValue($appConfig, ['app', 'debug'], false) ? 'true' : 'false'; ?>,
        'timezone' => '<?php echo getNestedConfigValue($appConfig, ['app', 'timezone'], 'Europe/Madrid'); ?>',
        'locale' => '<?php echo getNestedConfigValue($appConfig, ['app', 'locale'], 'es'); ?>'
    ],
    'mail' => [
        'host' => '<?php echo getNestedConfigValue($appConfig, ['mail', 'host'], 'No configurado'); ?>',
        'port' => <?php echo getNestedConfigValue($appConfig, ['mail', 'port'], 587); ?>,
        'username' => '<?php echo getNestedConfigValue($appConfig, ['mail', 'username'], 'No configurado'); ?>',
        'password' => '<?php echo str_repeat('*', strlen(getNestedConfigValue($appConfig, ['mail', 'password'], ''))); ?>',
        'encryption' => '<?php echo getNestedConfigValue($appConfig, ['mail', 'encryption'], 'tls'); ?>'
    ]
];</pre>
            </div>

            <div class="data-card">
                <h3>4. Configuración de Pagos</h3>
                <p>Archivo: <code>app/config/payments.php</code></p>
                <pre>
return [
    'paypal' => [
        'client_id' => '<?php echo getNestedConfigValue($appConfig, ['payments', 'paypal', 'client_id'], 'No configurado'); ?>',
        'client_secret' => '<?php echo str_repeat('*', strlen(getNestedConfigValue($appConfig, ['payments', 'paypal', 'client_secret'], ''))); ?>',
        'mode' => '<?php echo getNestedConfigValue($appConfig, ['payments', 'paypal', 'mode'], 'sandbox'); ?>'
    ],
    'payu' => [
        'merchant_id' => '<?php echo getNestedConfigValue($appConfig, ['payments', 'payu', 'merchant_id'], 'No configurado'); ?>',
        'api_key' => '<?php echo str_repeat('*', strlen(getNestedConfigValue($appConfig, ['payments', 'payu', 'api_key'], ''))); ?>',
        'api_login' => '<?php echo getNestedConfigValue($appConfig, ['payments', 'payu', 'api_login'], 'No configurado'); ?>'
    ]
];</pre>
            </div>

            <div class="alert alert-warning">
                <strong>Nota importante:</strong> Las contraseñas y claves secretas se muestran ocultas por seguridad. 
                Asegúrese de mantener estos valores seguros y no compartirlos.
            </div>
        </div>
    </div>
</body>
</html> 
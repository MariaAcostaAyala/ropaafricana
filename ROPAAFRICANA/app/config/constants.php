<?php
// Cargar configuraciones
$app = require __DIR__ . '/app.php';
$db = require __DIR__ . '/database.php';

// Configuración de zona horaria
date_default_timezone_set($app['timezone']);

// Configuración de sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Definir constantes de la aplicación
define('APP_NAME', 'Ropa africana');
define('APP_URL', 'http://localhost/ROPAAFRICANA/');
define('FRONTEND_URL', 'http://localhost/ROPAAFRICANA/frontend/');
define('BACKEND_URL', 'http://localhost/ROPAAFRICANA/backend/');

// Definir constantes de la base de datos
define('DB_HOST', $db['host']);
define('DB_NAME', $db['database']);
define('DB_USER', $db['username']);
define('DB_PASS', $db['password']);
define('DB_CHARSET', $db['charset']);
define('DB_COLLATION', $db['collation']);
define('DB_PREFIX', $db['prefix']);

// Definir constantes de la empresa
define('COMPANY_NAME', 'Ropa africana');
define('COMPANY_DESCRIPTION', 'Tu tienda de Murcia de confianza');
define('COMPANY_SLOGAN', 'Contáctenos en:');
define('COMPANY_LEGAL', $app['company']['company']);
define('COMPANY_CIF', $app['company']['cif']);
define('COMPANY_PHONE', '(968) 99 99 99');
define('COMPANY_EMAIL', 'soporte@tiendamurciana.es');
define('COMPANY_ADDRESS', 'Calle No Indicada, Murcia, España');
define('COMPANY_CITY', 'Murcia');
define('COMPANY_COUNTRY', 'España');

// Definir constantes de contacto
define('CONTACT_PHONE', $app['company']['contact']['phone']);
define('CONTACT_EMAIL', $app['company']['contact']['email']);
define('CONTACT_ADDRESS', $app['company']['contact']['address']);
define('CONTACT_CITY', $app['company']['contact']['city']);
define('CONTACT_COUNTRY', $app['company']['contact']['country']);

// Definir constantes de redes sociales
define('APP_SOCIAL_FACEBOOK', 'https://facebook.com/tutiendamurciana');
define('APP_SOCIAL_TWITTER', 'https://twitter.com/tutiendamurciana');
define('APP_SOCIAL_INSTAGRAM', 'https://instagram.com/tutiendamurciana');
define('APP_SOCIAL_YOUTUBE', 'https://youtube.com/tutiendamurciana');

// Definir constantes de correo electrónico
define('MAIL_FROM_NAME', 'Administrador');
define('MAIL_FROM_ADDRESS', 'info@tutiendamurciana.com');
define('MAIL_REPLY_TO_NAME', 'Administrador');
define('MAIL_REPLY_TO_ADDRESS', 'info@tutiendamurciana.com');

// Definir constantes de zona horaria
define('APP_TIMEZONE', 'Europe/Madrid'); 
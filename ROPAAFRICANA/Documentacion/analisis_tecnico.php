<?php
/**
 * Análisis Técnico - Tienda Murciana
 * 
 * Este documento contiene el análisis técnico de la aplicación web de la Tienda Murciana.
 * Última actualización: <?php echo date('d/m/Y'); ?>
 */

// Incluir verificación de sesión
require_once "verificar_sesion.php";

// Incluir configuración
$config = require "../app/config/app.php";
$nombreTienda = $config['company']['name'];

// Definir la ruta base
$baseUrl = "http://localhost/ROPAAFRICANA/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis Técnico - <?php echo $nombreTienda; ?></title>
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
            <h1>Análisis Técnico</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <main>
            <div class="section">
                <h2>Requisitos del Sistema</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Servidor</h3>
                        <ul class="data-list">
                            <li>PHP 7.4 o superior</li>
                            <li>MySQL 5.7 o superior</li>
                            <li>Apache/Nginx</li>
                            <li>SSL (recomendado)</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Cliente</h3>
                        <ul class="data-list">
                            <li>Navegador moderno</li>
                            <li>JavaScript habilitado</li>
                            <li>Conexión a Internet</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Arquitectura</h2>
                <p>El sistema está construido siguiendo el patrón MVC (Modelo-Vista-Controlador):</p>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Modelo</h3>
                        <ul class="data-list">
                            <li>Gestión de datos</li>
                            <li>Lógica de negocio</li>
                            <li>Validaciones</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Vista</h3>
                        <ul class="data-list">
                            <li>Interfaz de usuario</li>
                            <li>Templates</li>
                            <li>Presentación</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Controlador</h3>
                        <ul class="data-list">
                            <li>Gestión de peticiones</li>
                            <li>Coordinación</li>
                            <li>Flujo de datos</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Base de Datos</h2>
                <p>Estructura principal de la base de datos:</p>
                <pre>
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    rol ENUM('admin', 'usuario'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    descripcion TEXT,
    precio DECIMAL(10,2),
    stock INT,
    categoria_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
                </pre>
            </div>

            <div class="section">
                <h2>APIs y Servicios</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Pagos</h3>
                        <ul class="data-list">
                            <li>PayPal</li>
                            <li>PayU</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Divisas</h3>
                        <ul class="data-list">
                            <li>API de conversión</li>
                            <li>Actualización automática</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Seguridad</h2>
                <ul class="data-list">
                    <li>Autenticación mediante sesiones</li>
                    <li>Encriptación de contraseñas con bcrypt</li>
                    <li>Protección contra XSS y CSRF</li>
                    <li>Validación de datos en servidor</li>
                    <li>HTTPS para transmisión segura</li>
                </ul>
            </div>
        </main>
    </div>
</body>
</html> 
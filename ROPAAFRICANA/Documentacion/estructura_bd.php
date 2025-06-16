<?php
/**
 * Estructura de Base de Datos - Tienda Murciana
 * 
 * Este documento contiene la estructura completa de la base de datos.
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
    <title>Estructura de Base de Datos - <?php echo $nombreTienda; ?></title>
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
            <h1>Estructura de Base de Datos</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <main>
            <div class="section">
                <h2>Tablas Principales</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>usuarios</h3>
                        <pre>
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'usuario') DEFAULT 'usuario',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
                        </pre>
                    </div>
                    <div class="data-card">
                        <h3>productos</h3>
                        <pre>
CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    categoria_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
                        </pre>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Tablas de Relación</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>pedidos</h3>
                        <pre>
CREATE TABLE pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente', 'procesando', 'enviado', 'entregado', 'cancelado') DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
                        </pre>
                    </div>
                    <div class="data-card">
                        <h3>detalles_pedido</h3>
                        <pre>
CREATE TABLE detalles_pedido (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);
                        </pre>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Tablas de Configuración</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>categorias</h3>
                        <pre>
CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
                        </pre>
                    </div>
                    <div class="data-card">
                        <h3>configuracion</h3>
                        <pre>
CREATE TABLE configuracion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    clave VARCHAR(50) NOT NULL,
    valor TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
                        </pre>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> 
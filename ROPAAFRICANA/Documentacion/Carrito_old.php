<?php
/**
 * Documentación del Carrito de Compras - Tienda Murciana
 * 
 * Este documento contiene la documentación detallada del sistema de carrito de compras.
 * Última actualización: <?php echo date('d/m/Y'); ?>
 */

// Incluir verificación de sesión
require_once "verificar_sesion.php";

// Incluir configuración
$config = require "../app/config/app.php";
$nombreTienda = $config['company']['name'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - <?php echo $nombreTienda; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --text-color: #333;
            --light-bg: #f5f6fa;
            --border-color: #dcdde1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-bg);
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        h2 {
            color: var(--secondary-color);
            font-size: 1.8em;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--border-color);
        }

        h3 {
            color: var(--secondary-color);
            font-size: 1.4em;
            margin: 25px 0 15px;
        }

        .section {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .data-card {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            border-left: 4px solid var(--secondary-color);
        }

        .data-list {
            list-style: none;
            padding-left: 20px;
        }

        .data-list li {
            margin-bottom: 10px;
            position: relative;
        }

        .data-list li:before {
            content: "•";
            color: var(--secondary-color);
            font-weight: bold;
            position: absolute;
            left: -20px;
        }

        .code-block {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            font-family: monospace;
            margin: 15px 0;
            overflow-x: auto;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-left: 4px solid #ffc107;
            color: #856404;
        }

        .alert-info {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            color: #0c5460;
        }

        .back-to-index {
            display: inline-block;
            padding: 10px 20px;
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .back-to-index:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .update-date {
            color: #666;
            font-size: 0.9em;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2em;
            }

            h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-to-index"><i class="fas fa-arrow-left"></i> Volver al Índice</a>
        
        <header>
            <h1>Sistema de Carrito de Compras</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <div class="section">
            <h2>Descripción General</h2>
            <p>El sistema de carrito de compras es una funcionalidad esencial que permite a los usuarios seleccionar productos, gestionar cantidades y proceder al pago de manera segura y eficiente.</p>
        </div>

        <div class="section">
            <h2>Funcionalidades Principales</h2>
            
            <div class="data-card">
                <h3>Rutas de Acceso</h3>
                <ul class="data-list">
                    <li><strong>Carrito de Prueba:</strong> <a href="http://localhost/ROPAAFRICANA/frontend/vistas/paginas/carrito_test.php" target="_blank">http://localhost/ROPAAFRICANA/frontend/vistas/paginas/carrito_test.php</a></li>
                </ul>
            </div>

            <div class="data-card">
                <h3>1. Gestión de Productos</h3>
                <ul class="data-list">
                    <li>Agregar productos al carrito</li>
                    <li>Modificar cantidades</li>
                    <li>Eliminar productos</li>
                    <li>Actualizar precios en tiempo real</li>
                    <li>Calcular subtotales y totales</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>2. Persistencia de Datos</h3>
                <ul class="data-list">
                    <li>Almacenamiento en sesión de usuario</li>
                    <li>Guardado temporal en base de datos</li>
                    <li>Recuperación de carritos abandonados</li>
                    <li>Sincronización entre dispositivos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>3. Proceso de Compra</h3>
                <ul class="data-list">
                    <li>Verificación de stock</li>
                    <li>Validación de precios</li>
                    <li>Cálculo de impuestos</li>
                    <li>Aplicación de descuentos</li>
                    <li>Integración con pasarelas de pago</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Flujo de Compra</h2>
            
            <div class="data-card">
                <h3>1. Selección de Productos</h3>
                <ul class="data-list">
                    <li>El usuario navega por el catálogo de productos</li>
                    <li>Selecciona productos y cantidades</li>
                    <li>Los productos se agregan al carrito</li>
                    <li>Se actualiza el total automáticamente</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>2. Gestión del Carrito</h3>
                <ul class="data-list">
                    <li>Modificación de cantidades</li>
                    <li>Eliminación de productos</li>
                    <li>Vaciado del carrito</li>
                    <li>Guardado para más tarde</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>3. Proceso de Pago</h3>
                <ul class="data-list">
                    <li>Verificación de datos de envío</li>
                    <li>Selección de método de pago</li>
                    <li>Procesamiento del pago</li>
                    <li>Confirmación de la compra</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Consideraciones Técnicas</h2>
            
            <div class="data-card">
                <h3>1. Seguridad</h3>
                <ul class="data-list">
                    <li>Validación de sesiones</li>
                    <li>Protección contra CSRF</li>
                    <li>Encriptación de datos sensibles</li>
                    <li>Validación de transacciones</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>2. Rendimiento</h3>
                <ul class="data-list">
                    <li>Optimización de consultas</li>
                    <li>Caché de productos</li>
                    <li>Actualización asíncrona de precios</li>
                    <li>Manejo eficiente de sesiones</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>3. Integración</h3>
                <ul class="data-list">
                    <li>APIs de pasarelas de pago</li>
                    <li>Sistemas de inventario</li>
                    <li>Plataformas de envío</li>
                    <li>Sistemas de notificación</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Manejo de Errores</h2>
            
            <div class="alert alert-warning">
                <strong>Stock Insuficiente:</strong> El sistema verifica la disponibilidad de productos antes de permitir la compra.
            </div>

            <div class="alert alert-info">
                <strong>Precios Actualizados:</strong> Los precios se actualizan automáticamente para reflejar cambios en tiempo real.
            </div>

            <div class="data-card">
                <h3>Casos de Error Comunes</h3>
                <ul class="data-list">
                    <li>Producto no disponible</li>
                    <li>Error en el procesamiento del pago</li>
                    <li>Problemas de conexión</li>
                    <li>Sesión expirada</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Mejores Prácticas</h2>
            
            <div class="data-card">
                <h3>1. Para Usuarios</h3>
                <ul class="data-list">
                    <li>Verificar cantidades antes de comprar</li>
                    <li>Revisar los términos y condiciones</li>
                    <li>Guardar carritos para compras futuras</li>
                    <li>Utilizar cupones de descuento cuando estén disponibles</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>2. Para Administradores</h3>
                <ul class="data-list">
                    <li>Monitorear carritos abandonados</li>
                    <li>Actualizar precios y stock regularmente</li>
                    <li>Revisar transacciones fallidas</li>
                    <li>Mantener actualizada la información de productos</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html> 
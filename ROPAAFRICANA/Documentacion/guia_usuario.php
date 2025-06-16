<?php
/**
 * Guía de Usuario - Tienda Murciana
 * 
 * Este documento contiene la guía de usuario detallada de la aplicación web de la Tienda Murciana.
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
    <title>Guía de Usuario - <?php echo $nombreTienda; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            color: var(--primary-color);
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

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .feature-card {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid var(--secondary-color);
        }

        .feature-card h4 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-size: 1.2em;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .feature-card h4 i {
            color: var(--accent-color);
        }

        .feature-card p {
            margin-bottom: 15px;
        }

        .steps-list {
            list-style: none;
            counter-reset: step-counter;
        }

        .steps-list li {
            margin-bottom: 15px;
            padding-left: 35px;
            position: relative;
        }

        .steps-list li:before {
            counter-increment: step-counter;
            content: counter(step-counter);
            position: absolute;
            left: 0;
            top: 0;
            width: 25px;
            height: 25px;
            background: var(--secondary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9em;
        }

        .note {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .tip {
            background: #d4edda;
            border-left: 4px solid #28a745;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .warning {
            background: #f8d7da;
            border-left: 4px solid #dc3545;
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
        }

        .update-date {
            color: #666;
            font-size: 0.9em;
            font-style: italic;
        }

        .back-to-index {
            display: inline-block;
            padding: 10px 20px;
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: background 0.3s ease;
        }

        .back-to-index:hover {
            background: var(--primary-color);
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

            .feature-grid {
                grid-template-columns: 1fr;
            }
        }

        .nav-links {
            margin-bottom: 20px;
            padding: 10px;
            background: var(--light-bg);
            border-radius: 8px;
        }

        .nav-links a {
            color: var(--secondary-color);
            text-decoration: none;
            margin-right: 15px;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="../backend/inicio"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
            <a href="<?php echo $baseUrl; ?>documentacion/"><i class="fas fa-book"></i> Documentación Principal</a>
        </div>
        
        <header>
            <h1>Guía de Usuario - <?php echo $nombreTienda; ?></h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
            <p>Bienvenido a la guía de usuario de <?php echo $nombreTienda; ?>. Este documento le ayudará a entender y utilizar todas las funcionalidades disponibles en nuestra plataforma de comercio electrónico.</p>
        </header>

        <section>
            <h2>Introducción</h2>
            <p>Bienvenido a la guía de usuario de la Tienda Murciana. Este documento le ayudará a entender y utilizar todas las funcionalidades disponibles en nuestra plataforma de comercio electrónico.</p>
        </section>

        <section>
            <h2>Funcionalidades Principales</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <h4><i class="fas fa-shopping-cart"></i> Carrito de Compras</h4>
                    <p>Gestión completa del carrito de compras, incluyendo:</p>
                    <ul class="steps-list">
                        <li>Agregar productos al carrito</li>
                        <li>Modificar cantidades</li>
                        <li>Eliminar productos</li>
                        <li>Ver totales y resumen</li>
                    </ul>
                </div>

                <div class="feature-card">
                    <h4><i class="fas fa-user"></i> Cuenta de Usuario</h4>
                    <p>Gestión de la cuenta de usuario:</p>
                    <ul class="steps-list">
                        <li>Registro de cuenta</li>
                        <li>Inicio de sesión</li>
                        <li>Recuperación de contraseña</li>
                        <li>Edición de perfil</li>
                    </ul>
                </div>

                <div class="feature-card">
                    <h4><i class="fas fa-box"></i> Pedidos</h4>
                    <p>Gestión de pedidos:</p>
                    <ul class="steps-list">
                        <li>Realizar pedidos</li>
                        <li>Seguimiento de envíos</li>
                        <li>Historial de compras</li>
                        <li>Devoluciones</li>
                    </ul>
                </div>
            </div>
        </section>

        <section>
            <h2>Proceso de Compra</h2>
            <ol class="steps-list">
                <li>
                    <strong>Navegación y Búsqueda</strong>
                    <p>Utilice el menú de categorías o la barra de búsqueda para encontrar productos.</p>
                </li>
                <li>
                    <strong>Selección de Productos</strong>
                    <p>Haga clic en "Agregar al Carrito" para incluir productos en su compra.</p>
                </li>
                <li>
                    <strong>Revisión del Carrito</strong>
                    <p>Verifique los productos seleccionados y sus cantidades.</p>
                </li>
                <li>
                    <strong>Proceso de Pago</strong>
                    <p>Seleccione el método de pago y complete la información requerida.</p>
                </li>
                <li>
                    <strong>Confirmación</strong>
                    <p>Reciba la confirmación de su pedido por correo electrónico.</p>
                </li>
            </ol>
        </section>

        <section>
            <h2>Consejos y Recomendaciones</h2>
            <div class="tip">
                <h4><i class="fas fa-lightbulb"></i> Consejos Útiles</h4>
                <ul>
                    <li>Mantenga su información de contacto actualizada</li>
                    <li>Revise regularmente su bandeja de entrada para notificaciones</li>
                    <li>Guarde sus datos de pago para compras futuras</li>
                </ul>
            </div>

            <div class="warning">
                <h4><i class="fas fa-exclamation-triangle"></i> Precauciones</h4>
                <ul>
                    <li>Nunca comparta sus credenciales de acceso</li>
                    <li>Verifique siempre los detalles de su pedido antes de confirmar</li>
                    <li>Mantenga un registro de sus transacciones</li>
                </ul>
            </div>
        </section>

        <section>
            <h2>Soporte y Ayuda</h2>
            <p>Si necesita ayuda adicional, puede contactarnos a través de:</p>
            <ul>
                <li>Correo electrónico: soporte@tiendamurciana.com</li>
                <li>Teléfono: 900-123-456</li>
                <li>Chat en vivo: Disponible en horario comercial</li>
            </ul>
        </section>
    </div>
</body>
</html> 
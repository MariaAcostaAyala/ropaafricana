<?php
/**
 * Documentación AdminLTE - Tienda Murciana
 * 
 * Este documento explica el uso del framework AdminLTE en el proyecto.
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
    <title>AdminLTE - <?php echo $nombreTienda; ?></title>
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
            color: var(--primary-color);
            font-size: 1.5em;
            margin: 25px 0 15px;
        }

        h4 {
            color: var(--secondary-color);
            font-size: 1.2em;
            margin: 20px 0 10px;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .alert-info {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
        }

        .alert-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px;
            border: 1px solid var(--border-color);
        }

        .table th {
            background-color: var(--light-bg);
            color: var(--primary-color);
        }

        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--secondary-color);
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
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

            .table {
                display: block;
                overflow-x: auto;
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
            <h1>Documentación AdminLTE</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <section>
            <h2>¿Qué es AdminLTE?</h2>
            <p>AdminLTE es un framework de administración de código abierto basado en Bootstrap 4 que proporciona una interfaz de usuario moderna y responsiva para aplicaciones web. Esta tienda en línea está construida utilizando AdminLTE 3, lo que nos permite ofrecer una experiencia de usuario consistente y profesional.</p>
            
            <h3>Características principales de AdminLTE utilizadas en este proyecto:</h3>
            <ul>
                <li>Panel de administración responsivo</li>
                <li>Sistema de navegación intuitivo</li>
                <li>Componentes UI modernos y reutilizables</li>
                <li>Integración con Bootstrap 4</li>
                <li>Soporte para múltiples dispositivos</li>
            </ul>

            <h3>Componentes específicos implementados:</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Componente</th>
                            <th>Descripción</th>
                            <th>Uso en el proyecto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Navbar</td>
                            <td>Barra de navegación superior</td>
                            <td>Menú principal y controles de usuario</td>
                        </tr>
                        <tr>
                            <td>Sidebar</td>
                            <td>Menú lateral</td>
                            <td>Navegación entre secciones</td>
                        </tr>
                        <tr>
                            <td>Cards</td>
                            <td>Tarjetas de contenido</td>
                            <td>Visualización de productos y categorías</td>
                        </tr>
                        <tr>
                            <td>Tables</td>
                            <td>Tablas de datos</td>
                            <td>Listados de productos y pedidos</td>
                        </tr>
                        <tr>
                            <td>Forms</td>
                            <td>Formularios</td>
                            <td>Registro, login y gestión de datos</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3>Personalizaciones realizadas:</h3>
            <ul>
                <li>Adaptación del tema para la tienda en línea</li>
                <li>Implementación de carrito de compras</li>
                <li>Sistema de gestión de productos</li>
                <li>Panel de administración personalizado</li>
                <li>Integración con sistema de pagos</li>
            </ul>

            <h3>Recursos y documentación:</h3>
            <p>Para más información sobre AdminLTE, puedes visitar:</p>
            <ul>
                <li><a href="https://adminlte.io/themes/v3/" target="_blank">Sitio oficial de AdminLTE</a></li>
                <li><a href="https://adminlte.io/docs/3.1/" target="_blank">Documentación oficial</a></li>
                <li><a href="https://github.com/ColorlibHQ/AdminLTE" target="_blank">Repositorio en GitHub</a></li>
            </ul>

            <h3>Versión utilizada:</h3>
            <p>Este proyecto utiliza AdminLTE 3.2.0, que incluye todas las últimas características y mejoras de seguridad.</p>

            <h3>Requisitos técnicos:</h3>
            <ul>
                <li>PHP 7.4 o superior</li>
                <li>MySQL 5.7 o superior</li>
                <li>Navegador web moderno con soporte para HTML5 y CSS3</li>
                <li>JavaScript habilitado</li>
            </ul>

            <h3>Características de seguridad implementadas:</h3>
            <ul>
                <li>Autenticación segura de usuarios</li>
                <li>Protección contra XSS</li>
                <li>Validación de formularios</li>
                <li>Control de acceso basado en roles</li>
                <li>Cifrado de datos sensibles</li>
            </ul>

            <div class="alert alert-info">
                <h4><i class="icon fas fa-info"></i> Nota:</h4>
                <p>La implementación de AdminLTE en este proyecto ha sido personalizada para adaptarse a las necesidades específicas de nuestra tienda en línea, manteniendo la consistencia visual y la usabilidad que caracteriza a este framework.</p>
            </div>

            <div class="alert alert-warning">
                <h4><i class="icon fas fa-exclamation-triangle"></i> Importante:</h4>
                <p>Para mantener la seguridad y el rendimiento óptimo del sistema, se recomienda mantener actualizada la versión de AdminLTE y realizar copias de seguridad regulares de la base de datos.</p>
            </div>
        </section>
    </div>
</body>
</html> 
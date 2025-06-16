<?php
/**
 * Documentación - Inicialización del Sistema
 * 
 * Este documento explica el proceso de inicialización de la base de datos y configuración inicial del sistema.
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
    <title>Inicialización del Sistema - <?php echo $nombreTienda; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
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

        .panel {
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
        }

        .panel-heading {
            padding: 15px;
            background-color: var(--light-bg);
            border-bottom: 1px solid var(--border-color);
        }

        .panel-body {
            padding: 15px;
        }

        .well {
            background-color: var(--light-bg);
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }

        code {
            background-color: var(--light-bg);
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }

        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 12px;
            border: 1px solid var(--border-color);
        }

        .table th {
            background-color: var(--light-bg);
            font-weight: 500;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0,0,0,.05);
        }

        .update-date {
            color: #666;
            font-size: 0.9em;
            font-style: italic;
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
        <div class="nav-links">
            <a href="../backend/inicio"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
            <a href="<?php echo $baseUrl; ?>documentacion/"><i class="fas fa-book"></i> Documentación Principal</a>
        </div>
        
        <header>
            <h1>Inicialización del Sistema</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <div class="alert alert-info">
            <strong>Nota:</strong> Esta documentación explica el proceso de inicialización de la base de datos del sistema.
        </div>

        <h2>Acceso</h2>
        <p>Para acceder a la página de inicialización, utiliza la siguiente URL:</p>
        <div class="well">
            <code>http://localhost/ROPAAFRICANA/frontend/initialize</code>
        </div>

        <h2>Funcionalidades</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">1. Inicializar Base de Datos</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><strong>Propósito:</strong> Limpia completamente la base de datos</li>
                            <li><strong>Uso:</strong> Para empezar desde cero</li>
                            <li><strong>Precaución:</strong> Elimina todos los datos existentes</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">2. Crear Tablas sin datos</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><strong>Propósito:</strong> Crea la estructura de la base de datos</li>
                            <li><strong>Uso:</strong> Para instalaciones limpias</li>
                            <li><strong>Incluye:</strong> Todas las tablas necesarias</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">3. Crear Tablas y datos</h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li><strong>Propósito:</strong> Crea estructura y carga datos</li>
                            <li><strong>Uso:</strong> Para pruebas e instalaciones iniciales</li>
                            <li><strong>Incluye:</strong> Datos de ejemplo completos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h2>Proceso de Instalación Recomendado</h2>
        <div class="well">
            <ol>
                <li>
                    <strong>Paso 1: Inicializar Base de Datos</strong>
                    <ul>
                        <li>Hacer clic en "Inicializar Base de Datos"</li>
                        <li>Confirmar la acción</li>
                        <li>Esperar el mensaje de confirmación</li>
                    </ul>
                </li>
                <li>
                    <strong>Paso 2: Elegir una opción</strong>
                    <ul>
                        <li><strong>Opción A:</strong> "Crear Tablas sin datos" para instalación limpia</li>
                        <li><strong>Opción B:</strong> "Crear Tablas y datos" para instalación con datos de ejemplo</li>
                    </ul>
                </li>
            </ol>
        </div>

        <h2>Estructura de la Base de Datos</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>administradores</td><td>Gestión de administradores del sistema</td></tr>
                    <tr><td>banner</td><td>Banners publicitarios</td></tr>
                    <tr><td>cabeceras</td><td>Configuración de cabeceras</td></tr>
                    <tr><td>categorias</td><td>Categorías de productos</td></tr>
                    <tr><td>comercio</td><td>Configuración general del comercio</td></tr>
                    <tr><td>comentarios</td><td>Comentarios de usuarios</td></tr>
                    <tr><td>compras</td><td>Registro de compras</td></tr>
                    <tr><td>deseos</td><td>Lista de deseos de usuarios</td></tr>
                    <tr><td>plantilla</td><td>Configuración de la plantilla</td></tr>
                    <tr><td>productos</td><td>Catálogo de productos</td></tr>
                    <tr><td>slide</td><td>Slides publicitarios</td></tr>
                    <tr><td>subcategorias</td><td>Subcategorías de productos</td></tr>
                    <tr><td>usuarios</td><td>Registro de usuarios</td></tr>
                    <tr><td>visitaspaises</td><td>Estadísticas de visitas por país</td></tr>
                    <tr><td>visitaspersonas</td><td>Estadísticas de visitas individuales</td></tr>
                </tbody>
            </table>
        </div>

        <h2>Notas Importantes</h2>
        <div class="alert alert-warning">
            <ol>
                <li><strong>Respaldo:</strong> Siempre hacer respaldo antes de inicializar</li>
                <li><strong>Orden:</strong> Seguir el orden correcto de los pasos</li>
                <li><strong>Datos:</strong> Reemplazar datos de ejemplo en producción</li>
                <li><strong>Permisos:</strong> Verificar permisos de la base de datos</li>
            </ol>
        </div>

        <h2>Solución de Problemas</h2>
        <div class="well">
            <ol>
                <li>Verificar que existe el archivo <code>ecomerce.sql</code> en la carpeta <code>Initialize</code></li>
                <li>Comprobar los permisos de la base de datos</li>
                <li>Revisar los mensajes de error en el panel de resultados</li>
                <li>Asegurar que la base de datos está accesible</li>
            </ol>
        </div>
    </div>

    <script src="../frontend/vistas/js/plugins/jquery.min.js"></script>
    <script src="../frontend/vistas/js/plugins/bootstrap.min.js"></script>
</body>
</html> 
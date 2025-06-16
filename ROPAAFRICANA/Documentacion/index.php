<?php
/**
 * Página de Inicio - Documentación Tienda Murciana
 * 
 * Este documento sirve como índice para acceder a todos los análisis e informes del proyecto.
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
    <title>Documentación - <?php echo $nombreTienda; ?></title>
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

        .section {
            background: white;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .document-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .document-card {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid var(--secondary-color);
            transition: transform 0.3s ease;
        }

        .document-card:hover {
            transform: translateY(-5px);
        }

        .document-card h3 {
            color: var(--secondary-color);
            margin-bottom: 15px;
            font-size: 1.3em;
        }

        .document-card p {
            margin-bottom: 15px;
            color: var(--text-color);
        }

        .document-card .meta {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 15px;
        }

        .document-card .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 15px 0;
        }

        .tag {
            background: var(--secondary-color);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8em;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: var(--secondary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            margin-top: 15px;
            font-weight: 500;
            text-align: center;
            width: 100%;
        }

        .btn:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
            transition: all 0.3s ease;
        }

        .back-to-index:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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

            .document-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
            <a href="../backend/inicio" class="back-to-index"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
        </div>
        
        <header>
            <h1>Documentación - <?php echo $nombreTienda; ?></h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <?php
        class Documentacion {
            /**
             * Documentos Disponibles
             */
            public static $documentos = array(
                'configuraciones.php' => array(
                    'titulo' => 'Guía de Configuraciones',
                    'descripcion' => 'Documento detallado que explica todas las configuraciones del sistema, incluyendo base de datos, rutas, correo y configuraciones específicas del frontend y backend.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Configuración', 'Sistema', 'Desarrollo'),
                    'categoria' => 'Guías'
                ),
                'initialize.php' => array(
                    'titulo' => 'Inicialización del Sistema',
                    'descripcion' => 'Guía completa sobre el proceso de inicialización de la base de datos y configuración inicial del sistema, incluyendo la creación de tablas y carga de datos de ejemplo.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Inicialización', 'Base de Datos', 'Configuración'),
                    'categoria' => 'Guías'
                ),
                'analisis_tecnico.php' => array(
                    'titulo' => 'Análisis Técnico',
                    'descripcion' => 'Documento detallado que describe la estructura técnica del proyecto, incluyendo arquitectura, tecnologías utilizadas y componentes del sistema.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Técnico', 'Arquitectura', 'Desarrollo'),
                    'categoria' => 'Análisis'
                ),
                'analisis_funcional.php' => array(
                    'titulo' => 'Análisis Funcional',
                    'descripcion' => 'Documento que describe las funcionalidades del sistema, casos de uso y requerimientos del proyecto.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Funcional', 'Requerimientos', 'Casos de Uso'),
                    'categoria' => 'Análisis'
                ),
                'estructura_bd.php' => array(
                    'titulo' => 'Estructura de Base de Datos',
                    'descripcion' => 'Documento que detalla el esquema de la base de datos, tablas, relaciones y diagramas ER.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Base de Datos', 'Esquema', 'Diagramas'),
                    'categoria' => 'Base de Datos'
                ),
                'guia_usuario.php' => array(
                    'titulo' => 'Guía de Usuario',
                    'descripcion' => 'Manual de usuario que explica cómo utilizar todas las funcionalidades del sistema.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Usuario', 'Manual', 'Guía'),
                    'categoria' => 'Guías'
                ),
                'adminlte.php' => array(
                    'titulo' => 'Documentación AdminLTE',
                    'descripcion' => 'Documento que explica el uso del framework AdminLTE en el proyecto, incluyendo componentes, personalizaciones y características implementadas.',
                    'fecha' => '2024-03-20',
                    'tags' => array('AdminLTE', 'Framework', 'Frontend'),
                    'categoria' => 'Desarrollo'
                ),
                'diagrama_relacional.php' => array(
                    'titulo' => 'Diagrama Relacional',
                    'descripcion' => 'Documento que muestra el diagrama relacional de la base de datos y sus relaciones.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Base de Datos', 'Diagrama', 'Relaciones'),
                    'categoria' => 'Base de Datos'
                ),
                'Carrito.php' => array(
                    'titulo' => 'Sistema de Carrito de Compras',
                    'descripcion' => 'Documentación detallada del sistema de carrito de compras, incluyendo funcionalidades, flujo de compra y gestión de productos.',
                    'fecha' => '2024-03-20',
                    'tags' => array('Carrito', 'Compras', 'E-commerce'),
                    'categoria' => 'Funcionalidades'
                )
            );

            /**
             * Categorías de Documentación
             */
            public static $categorias = array(
                'Análisis' => 'Documentos de análisis y diseño del sistema',
                'Desarrollo' => 'Documentación técnica y de desarrollo',
                'Guías' => 'Manuales y guías de usuario',
                'Base de Datos' => 'Documentación relacionada con la base de datos',
                'Funcionalidades' => 'Documentación de funcionalidades específicas'
            );
        }

        function mostrarIndice() {
            // Mostrar categorías
            echo '<div class="section">';
            echo '<h2>Documentos Disponibles</h2>';
            echo '<div class="document-grid">';
            
            foreach (Documentacion::$documentos as $archivo => $doc) {
                echo '<div class="document-card">';
                echo '<h3>' . $doc['titulo'] . '</h3>';
                echo '<p>' . $doc['descripcion'] . '</p>';
                echo '<div class="meta">Categoría: ' . $doc['categoria'] . '</div>';
                echo '<div class="tags">';
                foreach ($doc['tags'] as $tag) {
                    echo '<span class="tag">' . $tag . '</span>';
                }
                echo '</div>';
                echo '<a href="' . $archivo . '" class="btn">Ver Documento</a>';
                echo '</div>';
            }
            
            echo '</div>';
            echo '</div>';
        }

        // Mostrar el índice
        mostrarIndice();
        ?>
    </div>
</body>
</html> 
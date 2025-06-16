<?php
/**
 * Diagrama Relacional - Tienda Murciana
 * 
 * Este documento muestra el diagrama relacional de la base de datos del sistema.
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
    <title>Diagrama Relacional - <?php echo $nombreTienda; ?></title>
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

        .update-date {
            color: #666;
            font-size: 0.9em;
            font-style: italic;
        }

        .diagram {
            margin: 20px 0;
            padding: 20px;
            background: var(--light-bg);
            border-radius: 8px;
        }

        .diagram img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="../backend/inicio" class="back-to-index"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
            <a href="<?php echo $baseUrl; ?>documentacion/"><i class="fas fa-book"></i> Documentación Principal</a>
        </div>
        
        <header>
            <h1>Diagrama Relacional - <?php echo $nombreTienda; ?></h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <div class="section">
            <h2>Diagrama Relacional de la Base de Datos</h2>
            
            <div class="config-block">
                <h3>¿Qué es un Diagrama Relacional?</h3>
                <p>Un diagrama relacional es una representación visual de la estructura de una base de datos que muestra las tablas, sus atributos y las relaciones entre ellas. Este diagrama es fundamental para entender cómo se organizan y conectan los datos en nuestra aplicación.</p>
            </div>

            <div class="config-block">
                <h3>Diagrama Visual</h3>
                <div class="diagram">
                    <img src="../Documentacion/img/Diagrama_Tablas_Principales.png" 
                         alt="Diagrama Relacional de la Base de Datos" 
                         title="Diagrama Relacional de la Base de Datos">
                </div>
            </div>

            <div class="config-block">
                <h3>Principales Entidades y sus Relaciones</h3>
                
                <h4>1. Gestión de Usuarios y Administradores</h4>
                <ul>
                    <li><strong>usuarios</strong>: Tabla principal de usuarios
                        <ul>
                            <li>Relacionada con <code>comentarios</code> (1:N)</li>
                            <li>Relacionada con <code>compras</code> (1:N)</li>
                            <li>Relacionada con <code>deseos</code> (1:N)</li>
                        </ul>
                    </li>
                    <li><strong>administradores</strong>: Gestión de administradores
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                </ul>

                <h4>2. Gestión de Productos</h4>
                <ul>
                    <li><strong>productos</strong>: Catálogo de productos
                        <ul>
                            <li>Relacionada con <code>categorias</code> (N:1)</li>
                            <li>Relacionada con <code>subcategorias</code> (N:1)</li>
                            <li>Relacionada con <code>comentarios</code> (1:N)</li>
                            <li>Relacionada con <code>compras</code> (1:N)</li>
                            <li>Relacionada con <code>deseos</code> (1:N)</li>
                        </ul>
                    </li>
                    <li><strong>categorias</strong>: Categorías principales
                        <ul>
                            <li>Relacionada con <code>productos</code> (1:N)</li>
                            <li>Relacionada con <code>subcategorias</code> (1:N)</li>
                        </ul>
                    </li>
                    <li><strong>subcategorias</strong>: Subcategorías de productos
                        <ul>
                            <li>Relacionada con <code>categorias</code> (N:1)</li>
                            <li>Relacionada con <code>productos</code> (1:N)</li>
                        </ul>
                    </li>
                </ul>

                <h4>3. Gestión de Compras y Comentarios</h4>
                <ul>
                    <li><strong>compras</strong>: Registro de compras
                        <ul>
                            <li>Relacionada con <code>usuarios</code> (N:1)</li>
                            <li>Relacionada con <code>productos</code> (N:1)</li>
                        </ul>
                    </li>
                    <li><strong>comentarios</strong>: Comentarios de productos
                        <ul>
                            <li>Relacionada con <code>usuarios</code> (N:1)</li>
                            <li>Relacionada con <code>productos</code> (N:1)</li>
                        </ul>
                    </li>
                    <li><strong>deseos</strong>: Lista de deseos
                        <ul>
                            <li>Relacionada con <code>usuarios</code> (N:1)</li>
                            <li>Relacionada con <code>productos</code> (N:1)</li>
                        </ul>
                    </li>
                </ul>

                <h4>4. Gestión de Contenido y Configuración</h4>
                <ul>
                    <li><strong>banner</strong>: Banners publicitarios
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                    <li><strong>cabeceras</strong>: Cabeceras de páginas
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                    <li><strong>plantilla</strong>: Configuración de la plantilla
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                    <li><strong>configuracion</strong>: Configuración general
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                    <li><strong>comercio</strong>: Configuración de comercio
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                    <li><strong>slide</strong>: Slides de la página principal
                        <ul>
                            <li>Sin relaciones directas</li>
                        </ul>
                    </li>
                </ul>

                <h4>5. Gestión de Visitas</h4>
                <ul>
                    <li><strong>visitaspersonas</strong>: Registro de visitantes
                        <ul>
                            <li>Relacionada con <code>visitaspaises</code> (N:1)</li>
                        </ul>
                    </li>
                    <li><strong>visitaspaises</strong>: Estadísticas por país
                        <ul>
                            <li>Relacionada con <code>visitaspersonas</code> (1:N)</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="config-block">
                <h3>Tipos de Relaciones</h3>
                <ul>
                    <li><strong>1:N (Uno a Muchos):</strong> Un registro puede estar relacionado con varios registros en otra tabla
                        <ul>
                            <li>Ejemplo: Un usuario puede tener múltiples compras</li>
                            <li>Ejemplo: Una categoría puede tener múltiples productos</li>
                        </ul>
                    </li>
                    <li><strong>N:1 (Muchos a Uno):</strong> Varios registros pueden estar relacionados con un solo registro en otra tabla
                        <ul>
                            <li>Ejemplo: Varios productos pueden pertenecer a una categoría</li>
                            <li>Ejemplo: Varios comentarios pueden ser de un mismo usuario</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="config-block">
                <h3>Campos Clave</h3>
                <ul>
                    <li><strong>usuarios:</strong>
                        <ul>
                            <li>id (PK): Identificador único del usuario</li>
                            <li>email: Correo electrónico (único)</li>
                            <li>password: Contraseña encriptada</li>
                            <li>verificacion: Estado de verificación (0/1)</li>
                        </ul>
                    </li>
                    <li><strong>productos:</strong>
                        <ul>
                            <li>id (PK): Identificador único del producto</li>
                            <li>id_categoria (FK): Referencia a categoría</li>
                            <li>id_subcategoria (FK): Referencia a subcategoría</li>
                            <li>precio: Precio del producto</li>
                            <li>stock: Cantidad disponible</li>
                        </ul>
                    </li>
                    <li><strong>compras:</strong>
                        <ul>
                            <li>id (PK): Identificador único de la compra</li>
                            <li>id_usuario (FK): Referencia al usuario</li>
                            <li>id_producto (FK): Referencia al producto</li>
                            <li>cantidad: Cantidad comprada</li>
                            <li>fecha: Fecha de la compra</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="config-block">
                <h3>Índices y Optimización</h3>
                <ul>
                    <li><strong>Índices Principales:</strong>
                        <ul>
                            <li>usuarios: email (único)</li>
                            <li>productos: id_categoria, id_subcategoria</li>
                            <li>compras: id_usuario, fecha</li>
                            <li>comentarios: id_producto, fecha</li>
                        </ul>
                    </li>
                    <li><strong>Optimizaciones:</strong>
                        <ul>
                            <li>Uso de índices para búsquedas frecuentes</li>
                            <li>Relaciones con claves foráneas indexadas</li>
                            <li>Campos de fecha indexados para consultas temporales</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="config-block">
                <h3>Integridad Referencial</h3>
                <ul>
                    <li><strong>Restricciones:</strong>
                        <ul>
                            <li>ON DELETE CASCADE: Eliminación en cascada para compras y comentarios</li>
                            <li>ON UPDATE CASCADE: Actualización en cascada para categorías y subcategorías</li>
                        </ul>
                    </li>
                    <li><strong>Validaciones:</strong>
                        <ul>
                            <li>Verificación de existencia de registros relacionados</li>
                            <li>Control de valores nulos en campos requeridos</li>
                            <li>Validación de tipos de datos</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="important-note">
                <h3>Notas Importantes:</h3>
                <ul>
                    <li>Las relaciones están diseñadas para mantener la consistencia de los datos</li>
                    <li>Se utilizan índices para optimizar las consultas frecuentes</li>
                    <li>Las claves foráneas garantizan la integridad de los datos</li>
                    <li>La estructura permite escalar la aplicación fácilmente</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html> 
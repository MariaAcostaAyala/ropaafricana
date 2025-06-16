<?php
/**
 * Análisis Funcional - Tienda Murciana
 * 
 * Este documento contiene el análisis funcional de la aplicación web de la Tienda Murciana.
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
    <title>Análisis Funcional - <?php echo $nombreTienda; ?></title>
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
            <h1>Análisis Funcional</h1>
            <p class="update-date">Última actualización: <?php echo date('d/m/Y'); ?></p>
        </header>

        <main>
            <div class="section">
                <h2>Funcionalidades Principales</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Usuarios</h3>
                        <ul class="data-list">
                            <li>Registro y login</li>
                            <li>Perfil de usuario</li>
                            <li>Historial de compras</li>
                            <li>Gestión de direcciones</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Productos</h3>
                        <ul class="data-list">
                            <li>Catálogo de productos</li>
                            <li>Búsqueda y filtros</li>
                            <li>Detalles de producto</li>
                            <li>Valoraciones</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Carrito</h3>
                        <ul class="data-list">
                            <li>Agregar productos</li>
                            <li>Modificar cantidades</li>
                            <li>Eliminar productos</li>
                            <li>Calcular totales</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Proceso de Compra</h2>
                <ol class="data-list">
                    <li>Selección de productos</li>
                    <li>Revisión del carrito</li>
                    <li>Datos de envío</li>
                    <li>Método de pago</li>
                    <li>Confirmación</li>
                    <li>Recibo de compra</li>
                </ol>
            </div>

            <div class="section">
                <h2>Panel de Administración</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Gestión de Productos</h3>
                        <ul class="data-list">
                            <li>Crear productos</li>
                            <li>Modificar productos</li>
                            <li>Eliminar productos</li>
                            <li>Gestionar categorías</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Gestión de Pedidos</h3>
                        <ul class="data-list">
                            <li>Ver pedidos</li>
                            <li>Actualizar estado</li>
                            <li>Gestionar devoluciones</li>
                            <li>Generar facturas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Reportes y Estadísticas</h2>
                <ul class="data-list">
                    <li>Ventas por período</li>
                    <li>Productos más vendidos</li>
                    <li>Clientes frecuentes</li>
                    <li>Ingresos y ganancias</li>
                </ul>
            </div>
        </main>
    </div>
</body>
</html> 
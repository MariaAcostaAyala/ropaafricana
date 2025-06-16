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
            <h2>Almacenamiento en localStorage</h2>
            
            <div class="data-card">
                <h3>Ventajas</h3>
                <ul class="data-list">
                    <li><strong>Persistencia:</strong> Los datos persisten incluso después de cerrar el navegador</li>
                    <li><strong>Compatibilidad:</strong> Amplio soporte en todos los navegadores modernos</li>
                    <li><strong>Simplicidad:</strong> API fácil de usar y mantener</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Limitaciones</h3>
                <ul class="data-list">
                    <li><strong>Capacidad:</strong> Límite de almacenamiento de 5-10 MB dependiendo del navegador</li>
                    <li><strong>Seguridad:</strong> Los datos se almacenan en texto plano</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Implementación</h3>
                <div class="code-block">
                    <pre>
// Guardar en localStorage
localStorage.setItem('carrito', JSON.stringify({
    items: items,
    total: total,
    cantidad: cantidad
}));

// Recuperar de localStorage
const carrito = JSON.parse(localStorage.getItem('carrito'));</pre>
                </div>
            </div>

            <div class="data-card">
                <h3>Manejo de Errores</h3>
                <div class="code-block">
                    <pre>
try {
    localStorage.setItem('carrito', JSON.stringify(items));
} catch (error) {
    console.error('Error al guardar en localStorage:', error);
    // Notificar al usuario
    alert('Error al guardar los datos del carrito');
}</pre>
                </div>
            </div>

            <div class="data-card">
                <h3>Estructura de Datos en localStorage</h3>
                <div class="code-block">
                    <pre>
// Estructura del carrito en localStorage
{
    "listaProductos": [
        {
            "idProducto": "123",
            "imagen": "ruta/imagen.jpg",
            "titulo": "Nombre del Producto",
            "precio": "29.99",
            "tipo": "virtual",
            "peso": "1.5",
            "cantidad": "2"
        }
    ],
    "cantidadCesta": "2",
    "sumaCesta": "59.98"
}</pre>
                </div>
                <p>El carrito utiliza tres claves principales en localStorage:</p>
                <ul class="data-list">
                    <li><strong>listaProductos:</strong> Array de objetos con la información de cada producto</li>
                    <li><strong>cantidadCesta:</strong> Número total de productos en el carrito</li>
                    <li><strong>sumaCesta:</strong> Suma total del valor de todos los productos</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Funcionalidades Principales</h2>
            
            <div class="data-card">
                <h3>Gestión de Productos</h3>
                <ul class="data-list">
                    <li><strong>Agregar Productos:</strong> Añadir productos al carrito con cantidad específica</li>
                    <li><strong>Actualizar Cantidad:</strong> Modificar la cantidad de productos existentes</li>
                    <li><strong>Eliminar Productos:</strong> Remover productos del carrito</li>
                    <li><strong>Vaciar Carrito:</strong> Eliminar todos los productos del carrito</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Cálculos Automáticos</h3>
                <ul class="data-list">
                    <li><strong>Subtotales:</strong> Cálculo automático por producto (precio × cantidad)</li>
                    <li><strong>Total:</strong> Suma de todos los subtotales</li>
                    <li><strong>Cantidad Total:</strong> Suma de todas las cantidades de productos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Validaciones</h3>
                <ul class="data-list">
                    <li><strong>Stock:</strong> Verificación de disponibilidad de productos</li>
                    <li><strong>Cantidades:</strong> Validación de cantidades mínimas y máximas</li>
                    <li><strong>Precios:</strong> Verificación de precios actualizados</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Integración con el Sistema</h2>
            
            <div class="data-card">
                <h3>Servicios</h3>
                <ul class="data-list">
                    <li><strong>CarritoService:</strong> Manejo de operaciones del carrito</li>
                    <li><strong>ProductoService:</strong> Gestión de información de productos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Controladores</h3>
                <ul class="data-list">
                    <li><strong>ControladorCarrito:</strong> Lógica de negocio del carrito</li>
                    <li><strong>ControladorProductos:</strong> Gestión de productos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Vistas</h3>
                <ul class="data-list">
                    <li><strong>carrito-de-compras.php:</strong> Vista principal del carrito</li>
                    <li><strong>carrito-de-compras.js:</strong> Funcionalidades JavaScript del carrito</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Estructura del Carrito</h2>
            <div class="data-card">
                <h3>Elementos del Carrito</h3>
                <ul class="data-list">
                    <li><strong>ID del Producto:</strong> Identificador único del producto</li>
                    <li><strong>Cantidad:</strong> Número de unidades seleccionadas</li>
                    <li><strong>Talla:</strong> Talla seleccionada del producto</li>
                    <li><strong>Color:</strong> Color seleccionado del producto</li>
                    <li><strong>Precio:</strong> Precio unitario del producto</li>
                    <li><strong>Título:</strong> Nombre del producto</li>
                    <li><strong>Imagen:</strong> URL de la imagen del producto</li>
                    <li><strong>Ruta:</strong> URL para acceder al producto</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Servicios Principales</h2>
            <div class="data-card">
                <h3>CarritoService</h3>
                <ul class="data-list">
                    <li><strong>obtenerCarrito():</strong> Obtiene el carrito actual</li>
                    <li><strong>agregarProducto():</strong> Añade un producto al carrito</li>
                    <li><strong>actualizarCantidad():</strong> Actualiza la cantidad de un producto</li>
                    <li><strong>eliminarProducto():</strong> Elimina un producto del carrito</li>
                    <li><strong>vaciarCarrito():</strong> Limpia todo el carrito</li>
                    <li><strong>calcularTotal():</strong> Calcula el total del carrito</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Endpoints AJAX</h2>
            <div class="data-card">
                <h3>Acciones Disponibles</h3>
                <ul class="data-list">
                    <li><strong>agregar:</strong> Añade un producto al carrito</li>
                    <li><strong>actualizar:</strong> Actualiza la cantidad de un producto</li>
                    <li><strong>eliminar:</strong> Elimina un producto del carrito</li>
                    <li><strong>vaciar:</strong> Limpia todo el carrito</li>
                    <li><strong>obtenerTotal:</strong> Obtiene el total del carrito</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Interfaz de Usuario</h2>
            <div class="data-card">
                <h3>Componentes</h3>
                <ul class="data-list">
                    <li><strong>Lista de Productos:</strong> Muestra los productos en el carrito</li>
                    <li><strong>Contador de Items:</strong> Muestra el número total de productos</li>
                    <li><strong>Total:</strong> Muestra el monto total a pagar</li>
                    <li><strong>Botones de Acción:</strong> Para actualizar cantidades y eliminar productos</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Proceso de Pago</h2>
            <div class="data-card">
                <h3>Pasos</h3>
                <ul class="data-list">
                    <li><strong>Verificación:</strong> Validación de stock y precios</li>
                    <li><strong>Resumen:</strong> Muestra el detalle de la compra</li>
                    <li><strong>Pago:</strong> Integración con pasarela de pago</li>
                    <li><strong>Confirmación:</strong> Generación de orden y limpieza del carrito</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Consideraciones de Seguridad</h2>
            <div class="data-card">
                <h3>Medidas Implementadas</h3>
                <ul class="data-list">
                    <li><strong>Validación:</strong> Verificación de datos en servidor</li>
                    <li><strong>Sanitización:</strong> Limpieza de datos de entrada</li>
                    <li><strong>Autenticación:</strong> Verificación de usuario</li>
                    <li><strong>Autorización:</strong> Control de acceso a funciones</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Mantenimiento</h2>
            <div class="data-card">
                <h3>Tareas Recomendadas</h3>
                <ul class="data-list">
                    <li><strong>Limpieza:</strong> Eliminación de carritos abandonados</li>
                    <li><strong>Actualización:</strong> Mantenimiento de precios y stock</li>
                    <li><strong>Backup:</strong> Respaldo de datos importantes</li>
                    <li><strong>Monitoreo:</strong> Seguimiento de errores y rendimiento</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Mejores Prácticas</h2>
            <div class="data-card">
                <h3>Recomendaciones</h3>
                <ul class="data-list">
                    <li><strong>Validación:</strong> Verificar datos antes de procesar</li>
                    <li><strong>Feedback:</strong> Informar al usuario sobre acciones</li>
                    <li><strong>Optimización:</strong> Mantener el código limpio y eficiente</li>
                    <li><strong>Documentación:</strong> Mantener la documentación actualizada</li>
                </ul>
            </div>
        </div>

        <div class="section">
            <h2>Servicios Implementados</h2>
            
            <div class="data-card">
                <h3>CarritoService</h3>
                <ul class="data-list">
                    <li><strong>Gestión del Carrito:</strong> Manejo completo de operaciones CRUD del carrito</li>
                    <li><strong>Persistencia:</strong> Almacenamiento y recuperación de datos del carrito en localStorage</li>
                    <li><strong>Sincronización:</strong> Actualización en tiempo real de cantidades y totales</li>
                    <li><strong>Validaciones:</strong> Verificación de stock y límites de productos</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>ProductoService</h3>
                <ul class="data-list">
                    <li><strong>Información de Productos:</strong> Obtención de detalles, precios y disponibilidad</li>
                    <li><strong>Validación de Stock:</strong> Verificación de disponibilidad en tiempo real</li>
                    <li><strong>Actualización de Precios:</strong> Sincronización de precios actualizados</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>PedidoService</h3>
                <ul class="data-list">
                    <li><strong>Procesamiento de Pedidos:</strong> Gestión del proceso de compra</li>
                    <li><strong>Validación de Datos:</strong> Verificación de información del cliente</li>
                    <li><strong>Confirmación:</strong> Generación de confirmaciones de pedido</li>
                </ul>
            </div>

            <div class="data-card">
                <h3>Integración de Servicios</h3>
                <div class="code-block">
                    <pre>
// Ejemplo de integración de servicios
class CarritoController {
    private $carritoService;
    private $productoService;
    private $pedidoService;

    public function __construct() {
        $this->carritoService = new CarritoService();
        $this->productoService = new ProductoService();
        $this->pedidoService = new PedidoService();
    }

    public function agregarProducto($idProducto, $cantidad) {
        // Validar producto
        $producto = $this->productoService->obtenerProducto($idProducto);
        if (!$producto || !$this->productoService->validarStock($idProducto, $cantidad)) {
            return ['error' => 'Producto no disponible'];
        }

        // Agregar al carrito
        return $this->carritoService->agregarItem($producto, $cantidad);
    }
}</pre>
                </div>
            </div>

            <div class="data-card">
                <h3>Flujo de Trabajo</h3>
                <ol class="data-list">
                    <li>El usuario selecciona un producto</li>
                    <li>ProductoService valida disponibilidad</li>
                    <li>CarritoService actualiza el carrito</li>
                    <li>Los datos se persisten en localStorage</li>
                    <li>Al finalizar, PedidoService procesa la compra</li>
                </ol>
            </div>
        </div>
    </div>
</body>
</html> 
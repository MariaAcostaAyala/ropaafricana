<?php
session_start();
require_once __DIR__ . '/../../../app/config/database.php';
require_once __DIR__ . '/../../services/ProductoService.php';
require_once __DIR__ . '/../../services/CarritoService.php';

// Código de depuración
error_log("Estado de la sesión: " . print_r($_SESSION, true));

// Si es una petición AJAX, solo procesar la acción y devolver JSON
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    $carritoService = new CarritoService();
    
    try {
        if (isset($_POST['accion'])) {
            switch ($_POST['accion']) {
                case 'vaciar':
                    $resultado = $carritoService->vaciarCarrito();
                    echo json_encode([
                        'success' => $resultado,
                        'message' => $resultado ? 'Carrito vaciado correctamente' : 'Error al vaciar el carrito'
                    ]);
                    break;
                // ... otros casos ...
            }
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    exit;
}

// Si no es AJAX, mostrar la página normal
try {
    $config = require __DIR__ . '/../../../app/config/database.php';
    $db = new PDO(
        "mysql:host=" . $config['host'] . ";dbname=" . $config['database'] . ";charset=" . $config['charset'],
        $config['username'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $productoService = new ProductoService();
    $carritoService = new CarritoService();

    $mensaje = '';
    $error = '';

    // Procesar acciones del formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (isset($_POST['accion'])) {
                switch ($_POST['accion']) {
                    case 'agregar':
                        $carritoService->agregarProducto(
                            $_POST['producto_id'],
                            $_POST['cantidad'],
                            $_POST['talla'] ?? null,
                            $_POST['color'] ?? null
                        );
                        $mensaje = 'Producto agregado al carrito';
                        break;

                    case 'actualizar':
                        $carritoService->actualizarCantidad(
                            $_POST['clave'],
                            $_POST['cantidad']
                        );
                        $mensaje = 'Cantidad actualizada';
                        break;

                    case 'eliminar':
                        $carritoService->eliminarProducto($_POST['clave']);
                        $mensaje = 'Producto eliminado del carrito';
                        break;

                    case 'vaciar':
                        $carritoService->vaciarCarrito();
                        $mensaje = 'Carrito vaciado';
                        break;
                }
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    // Obtener productos para el formulario
    $productos = $productoService->obtenerProductos();
    $carrito = $carritoService->obtenerCarrito();
    $totalProductos = $carritoService->obtenerTotalProductos();
    $subtotal = $carritoService->calcularSubtotal();
    $total = $carritoService->calcularTotal();

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba del Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .producto-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .producto-imagen {
            max-width: 100px;
            height: auto;
        }
        .carrito-resumen {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .cantidad-input {
            width: 60px !important;
            text-align: center;
            padding: 0.375rem 0.5rem;
        }
        .precio-total {
            margin-right: 15px;
            white-space: nowrap;
        }
        .btn-eliminar {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4">Prueba del Carrito de Compras</h1>

        <?php if ($mensaje): ?>
            <div class="alert alert-success"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Formulario para agregar productos -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Agregar Producto</h2>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <input type="hidden" name="accion" value="agregar">
                    
                    <div class="col-md-4">
                        <label class="form-label">Producto</label>
                        <select name="producto_id" class="form-select" required>
                            <option value="">Seleccionar producto</option>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?php echo $producto['id']; ?>">
                                    <?php echo htmlspecialchars($producto['titulo']); ?> - 
                                    <?php echo number_format($producto['precio'], 2); ?>€
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" value="1" min="1" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Talla</label>
                        <select name="talla" class="form-select">
                            <option value="">Seleccionar talla</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Color</label>
                        <select name="color" class="form-select">
                            <option value="">Seleccionar color</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Azul">Azul</option>
                            <option value="Verde">Verde</option>
                            <option value="Negro">Negro</option>
                            <option value="Blanco">Blanco</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">Agregar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contenido del carrito -->
        <div class="row">
            <div class="col-md-8">
                <h2 class="h4 mb-3">Productos en el Carrito</h2>
                
                <?php if (empty($carrito)): ?>
                    <div class="alert alert-info">El carrito está vacío</div>
                <?php else: ?>
                    <?php foreach ($carrito as $clave => $item): ?>
                        <div class="producto-card">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="<?php echo htmlspecialchars($item['imagen']); ?>" 
                                         alt="<?php echo htmlspecialchars($item['nombre']); ?>"
                                         class="producto-imagen">
                                </div>
                                <div class="col-md-4">
                                    <h3 class="h6"><?php echo htmlspecialchars($item['nombre']); ?></h3>
                                    <?php if ($item['talla']): ?>
                                        <p class="mb-1">Talla: <?php echo htmlspecialchars($item['talla']); ?></p>
                                    <?php endif; ?>
                                    <?php if ($item['color']): ?>
                                        <p class="mb-1">Color: <?php echo htmlspecialchars($item['color']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                    <form method="POST" class="d-flex align-items-center">
                                        <input type="hidden" name="accion" value="actualizar">
                                        <input type="hidden" name="clave" value="<?php echo htmlspecialchars($clave); ?>">
                                        <input type="number" name="cantidad" class="form-control form-control-sm cantidad-input" 
                                               value="<?php echo $item['cantidad']; ?>" min="1">
                                        <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                            Actualizar
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="clave" value="<?php echo $clave; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger btn-eliminar">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-8 offset-md-4">
                                    <p class="mb-0 precio-total">
                                        <?php echo number_format($item['precio'], 2); ?>€ x 
                                        <?php echo $item['cantidad']; ?> = 
                                        <?php echo number_format($item['precio'] * $item['cantidad'], 2); ?>€
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Resumen del carrito -->
            <div class="col-md-4">
                <div class="carrito-resumen">
                    <h2 class="h4 mb-3">Resumen del Carrito</h2>
                    <p>Total de productos: <?php echo $totalProductos; ?></p>
                    <p>Subtotal: <?php echo number_format($subtotal, 2); ?>€</p>
                    <p>Total: <?php echo number_format($total, 2); ?>€</p>
                    
                    <?php if (!empty($carrito)): ?>
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="accion" value="vaciar">
                            <button type="submit" class="btn btn-danger w-100">
                                Vaciar Carrito
                            </button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
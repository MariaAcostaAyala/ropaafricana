<?php
session_start();
require_once "../services/CarritoService.php";
require_once "../controladores/carrito.controlador.php";
require_once "../modelos/carrito.modelo.php";

header('Content-Type: application/json');

class AjaxCarrito {
    public $accion;
    public $clave;
    public $cantidad;

    public function ajaxActualizarCantidad() {
        if (!isset($_POST['clave']) || !isset($_POST['cantidad'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Faltan parámetros requeridos'
            ]);
            return;
        }

        $clave = $_POST['clave'];
        $cantidad = intval($_POST['cantidad']);

        if ($cantidad < 1) {
            echo json_encode([
                'success' => false,
                'message' => 'La cantidad debe ser mayor a 0'
            ]);
            return;
        }

        try {
            $carritoService = new CarritoService();
            $resultado = $carritoService->actualizarCantidad($clave, $cantidad);
            
            if ($resultado) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Cantidad actualizada correctamente',
                    'carrito' => $_SESSION['carrito']
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Error al actualizar la cantidad'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carritoService = new CarritoService();

    if (!isset($_POST['accion'])) {
        echo json_encode([
            'success' => false,
            'message' => 'No se especificó la acción'
        ]);
        exit;
    }

    try {
        switch ($_POST['accion']) {
            case 'actualizar':
                if (!isset($_POST['clave']) || !isset($_POST['cantidad'])) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Faltan parámetros requeridos'
                    ]);
                    break;
                }

                $resultado = $carritoService->actualizarCantidad($_POST['clave'], intval($_POST['cantidad']));
                echo json_encode($resultado);
                break;

            case 'eliminar':
                if (!isset($_POST['clave'])) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Clave de producto no proporcionada'
                    ]);
                    break;
                }

                $resultado = $carritoService->eliminarProducto($_POST['clave']);
                echo json_encode($resultado);
                break;

            case 'vaciar':
                $resultado = $carritoService->vaciarCarrito();
                echo json_encode($resultado);
                break;

            case 'checkout':
                if (!isset($_SESSION['id'])) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Debe iniciar sesión para realizar el pago'
                    ]);
                    break;
                }

                $metodoPago = $_POST['metodoPago'] ?? '';
                $direccion = $_POST['direccion'] ?? '';
                $notas = $_POST['notas'] ?? '';
                $total = $_POST['total'] ?? 0;
                $impuesto = $_POST['impuesto'] ?? 0;
                $envio = $_POST['envio'] ?? 0;

                if (empty($metodoPago) || empty($direccion)) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Por favor complete todos los campos requeridos'
                    ]);
                    break;
                }

                // Aquí iría la lógica para procesar el pago según el método seleccionado
                if ($metodoPago === 'paypal') {
                    // Redirigir a PayPal
                    echo json_encode([
                        'success' => true,
                        'redirect' => 'https://www.paypal.com/checkout'
                    ]);
                } elseif ($metodoPago === 'stripe') {
                    // Redirigir a Stripe
                    echo json_encode([
                        'success' => true,
                        'redirect' => 'https://checkout.stripe.com'
                    ]);
                } else {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Método de pago no válido'
                    ]);
                }
                break;

            case 'actualizar':
                $ajaxCarrito = new AjaxCarrito();
                $ajaxCarrito->ajaxActualizarCantidad();
                break;

            default:
                echo json_encode([
                    'success' => false,
                    'message' => 'Acción no válida'
                ]);
                break;
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método no permitido'
    ]);
}
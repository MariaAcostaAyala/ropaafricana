<?php
/**
 * Servicio para gestionar el carrito de compras
 */
class CarritoService {
    private $db;
    private $productoService;
    private $cache;
    private const CACHE_TTL = 3600; // 1 hora

    public function __construct($db = null) {
        if ($db === null) {
            $config = require __DIR__ . '/../../app/config/database.php';
            $this->db = new PDO(
                "mysql:host=" . $config['host'] . ";dbname=" . $config['database'] . ";charset=" . $config['charset'],
                $config['username'],
                $config['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } else {
            $this->db = $db;
        }
        
        require_once __DIR__ . '/ProductoService.php';
        $this->productoService = new ProductoService($this->db);
        
        // Inicializar sesión si no existe
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Verifica si el usuario está logueado
     */
    private function verificarUsuarioLogueado() {
        // Temporalmente deshabilitamos la verificación
        return true;
    }

    /**
     * Obtiene el carrito actual
     */
    public function obtenerCarrito() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        return $_SESSION['carrito'];
    }

    /**
     * Agrega un producto al carrito
     */
    public function agregarProducto($id, $cantidad = 1, $talla = null, $color = null) {
        try {
            // Verificar si el usuario está logueado
            $this->verificarUsuarioLogueado();

            // Validar cantidad
            if ($cantidad <= 0) {
                throw new Exception('La cantidad debe ser mayor a 0');
            }

            // Obtener información del producto
            $producto = $this->productoService->obtenerProducto($id);
            
            if (!$producto) {
                throw new Exception('Producto no encontrado');
            }

            // Validar stock si existe
            if (isset($producto['stock']) && $producto['stock'] < $cantidad) {
                throw new Exception('Stock insuficiente');
            }

            $key = $id . ($talla ? '_' . $talla : '') . ($color ? '_' . $color : '');
            
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            // Si el producto ya existe en el carrito, actualizar cantidad
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] += $cantidad;
            } else {
                $_SESSION['carrito'][$key] = [
                    'id' => $id,
                    'cantidad' => $cantidad,
                    'precio' => $producto['precio'],
                    'talla' => $talla,
                    'color' => $color,
                    'nombre' => $producto['titulo'],
                    'imagen' => $producto['imagen']
                ];
            }

            // Actualizar localStorage
            $this->actualizarLocalStorage();

            return [
                'success' => true,
                'message' => 'Producto agregado al carrito',
                'carrito' => $_SESSION['carrito']
            ];

        } catch (Exception $e) {
            error_log("Error al agregar producto al carrito: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Elimina un producto del carrito
     */
    public function eliminarProducto($clave) {
        try {
            // Verificar si el usuario está logueado
            $this->verificarUsuarioLogueado();

            if (!isset($_SESSION['carrito'])) {
                throw new Exception('El carrito está vacío');
            }

            if (!isset($_SESSION['carrito'][$clave])) {
                throw new Exception('Producto no encontrado en el carrito');
            }

            unset($_SESSION['carrito'][$clave]);

            // Actualizar localStorage
            $this->actualizarLocalStorage();

            return [
                'success' => true,
                'message' => 'Producto eliminado del carrito',
                'carrito' => $_SESSION['carrito']
            ];

        } catch (Exception $e) {
            error_log("Error al eliminar producto del carrito: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Actualiza la cantidad de un producto en el carrito
     */
    public function actualizarCantidad($clave, $cantidad) {
        try {
            // Verificar si el usuario está logueado
            $this->verificarUsuarioLogueado();

            if (!isset($_SESSION['carrito'])) {
                throw new Exception('El carrito está vacío');
            }

            if (!isset($_SESSION['carrito'][$clave])) {
                throw new Exception('Producto no encontrado en el carrito');
            }

            // Validar cantidad
            if ($cantidad < 1) {
                throw new Exception('La cantidad debe ser mayor a 0');
            }

            // Obtener el ID del producto
            $id = $_SESSION['carrito'][$clave]['id'];

            // Validar stock
            $producto = $this->productoService->obtenerProducto($id);
            if (isset($producto['stock']) && $producto['stock'] < $cantidad) {
                throw new Exception('Stock insuficiente');
            }

            // Actualizar la cantidad
            $_SESSION['carrito'][$clave]['cantidad'] = $cantidad;

            // Actualizar localStorage
            $this->actualizarLocalStorage();

            return [
                'success' => true,
                'message' => 'Cantidad actualizada correctamente',
                'carrito' => $_SESSION['carrito']
            ];

        } catch (Exception $e) {
            error_log("Error al actualizar cantidad: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Vacía el carrito
     */
    public function vaciarCarrito() {
        try {
            // Verificar si el usuario está logueado
            $this->verificarUsuarioLogueado();

            $_SESSION['carrito'] = [];
            $this->actualizarLocalStorage();
            
            return [
                'success' => true,
                'message' => 'Carrito vaciado correctamente'
            ];
        } catch (Exception $e) {
            error_log("Error al vaciar el carrito: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Calcula el subtotal del carrito (sin impuestos)
     */
    public function calcularSubtotal() {
        $subtotal = 0;
        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $subtotal += $item['precio'] * $item['cantidad'];
            }
        }
        return $subtotal;
    }

    /**
     * Calcula el total del carrito (con impuestos)
     */
    public function calcularTotal() {
        $subtotal = $this->calcularSubtotal();
        $impuesto = $this->obtenerImpuesto();
        $envio = $this->obtenerEnvio();
        return $subtotal + $impuesto + $envio;
    }

    /**
     * Obtiene el total de productos en el carrito
     */
    public function obtenerTotalProductos() {
        $total = 0;
        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['cantidad'];
            }
        }
        return $total;
    }

    /**
     * Obtiene el impuesto aplicable
     */
    private function obtenerImpuesto() {
        // Por defecto, 21% de IVA
        return $this->calcularSubtotal() * 0.21;
    }

    /**
     * Obtiene el costo de envío
     */
    private function obtenerEnvio() {
        // Por defecto, envío gratuito
        return 0;
    }

    /**
     * Guarda el carrito para un usuario registrado
     */
    public function guardarCarrito($usuarioId) {
        try {
            $carrito = $this->obtenerCarrito();
            $stmt = $this->db->prepare("INSERT INTO carritos_guardados (usuario_id, datos) VALUES (?, ?)");
            $resultado = $stmt->execute([$usuarioId, json_encode($carrito)]);
            
            return [
                'success' => $resultado,
                'message' => $resultado ? 'Carrito guardado correctamente' : 'Error al guardar el carrito'
            ];
        } catch (Exception $e) {
            error_log("Error al guardar el carrito: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Carga el carrito guardado de un usuario
     */
    public function cargarCarritoGuardado($usuarioId) {
        try {
            $stmt = $this->db->prepare("SELECT datos FROM carritos_guardados WHERE usuario_id = ? ORDER BY id DESC LIMIT 1");
            $stmt->execute([$usuarioId]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($resultado) {
                $_SESSION['carrito'] = json_decode($resultado['datos'], true);
                $this->actualizarLocalStorage();
            }
            
            return [
                'success' => true,
                'message' => 'Carrito cargado correctamente',
                'carrito' => $_SESSION['carrito']
            ];
        } catch (Exception $e) {
            error_log("Error al cargar el carrito: " . $e->getMessage());
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Actualiza el localStorage con los datos del carrito
     */
    private function actualizarLocalStorage() {
        $total = $this->calcularTotal();
        $cantidad = $this->obtenerTotalProductos();
        
        echo "<script>
            localStorage.setItem('sumaCesta', '" . $total . "');
            localStorage.setItem('cantidadCesta', '" . $cantidad . "');
        </script>";
    }
} 
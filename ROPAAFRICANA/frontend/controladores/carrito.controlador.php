<?php

class ControladorCarrito {
	private $carritoService;
	private $productoService;

	public function __construct() {
		require_once __DIR__ . '/../services/CarritoService.php';
		require_once __DIR__ . '/../services/ProductoService.php';
		
		$this->carritoService = new CarritoService();
		$this->productoService = new ProductoService();
	}

	/**
	 * Muestra las tarifas de envío
	 */
	public function ctrMostrarTarifas() {
		try {
			$tabla = "comercio";
			$respuesta = ModeloCarrito::mdlMostrarTarifas($tabla);
			return [
				'success' => true,
				'data' => $respuesta
			];
		} catch (Exception $e) {
			error_log("Error al obtener tarifas: " . $e->getMessage());
			return [
				'success' => false,
				'message' => 'Error al obtener las tarifas'
			];
		}
	}

	/**
	 * Procesa una nueva compra
	 */
	public function ctrNuevasCompras($datos) {
		try {
			// Validar datos
			if (!isset($datos['idUsuario']) || !isset($datos['idProducto'])) {
				throw new Exception('Datos incompletos');
			}

			// Verificar stock
			$producto = $this->productoService->obtenerProducto($datos['idProducto']);
			if (!$producto || $producto['stock'] < $datos['cantidad']) {
				throw new Exception('Stock insuficiente');
			}

			// Procesar la compra
			$tabla = "compras";
			$respuesta = ModeloCarrito::mdlNuevasCompras($tabla, $datos);

			if ($respuesta == "ok") {
				// Registrar comentario si existe
				if (isset($datos['comentario'])) {
					$tabla = "comentarios";
					ModeloUsuarios::mdlIngresoComentarios($tabla, $datos);
				}

				// Actualizar stock
				$this->actualizarStock($datos['idProducto'], $datos['cantidad']);

				return [
					'success' => true,
					'message' => 'Compra realizada con éxito'
				];
			}

			return [
				'success' => false,
				'message' => 'Error al procesar la compra'
			];

		} catch (Exception $e) {
			error_log("Error en nueva compra: " . $e->getMessage());
			return [
				'success' => false,
				'message' => $e->getMessage()
			];
		}
	}

	/**
	 * Verifica si un producto ha sido comprado
	 */
	public function ctrVerificarProducto($datos) {
		try {
			if (!isset($datos['idUsuario']) || !isset($datos['idProducto'])) {
				throw new Exception('Datos incompletos');
			}

			$tabla = "compras";
			$respuesta = ModeloCarrito::mdlVerificarProducto($tabla, $datos);
			
			return [
				'success' => true,
				'data' => $respuesta
			];

		} catch (Exception $e) {
			error_log("Error al verificar producto: " . $e->getMessage());
			return [
				'success' => false,
				'message' => $e->getMessage()
			];
		}
	}

	/**
	 * Muestra el carrito
	 */
	public function ctrMostrarCarrito() {
		try {
			// Establecer la ruta actual
			$_GET["ruta"] = "carrito-de-compras";
			
			// Obtener datos del carrito
			$carrito = $this->carritoService->obtenerCarrito();
			$total = $this->carritoService->calcularTotal();
			
			// Incluir la vista
			include "vistas/plantilla.php";
			
			return [
				'success' => true,
				'data' => [
					'carrito' => $carrito,
					'total' => $total
				]
			];

		} catch (Exception $e) {
			error_log("Error al mostrar carrito: " . $e->getMessage());
			return [
				'success' => false,
				'message' => $e->getMessage()
			];
		}
	}

	/**
	 * Actualiza el stock de un producto
	 */
	private function actualizarStock($idProducto, $cantidad) {
		try {
			$item1 = "stock";
			$valor1 = $cantidad;
			$item2 = "id";
			$valor2 = $idProducto;

			return ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2);
		} catch (Exception $e) {
			error_log("Error al actualizar stock: " . $e->getMessage());
			return false;
		}
	}
}
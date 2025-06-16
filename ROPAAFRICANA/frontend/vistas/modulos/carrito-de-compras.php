<?php
    
    // Inicializar el servicio de carrito
    require_once __DIR__ . '/../../services/ProductoService.php';
    require_once __DIR__ . '/../../services/CarritoService.php';
    
    $carritoService = new CarritoService();
    
    // Obtener el carrito actual
    $carrito = $carritoService->obtenerCarrito();
    $total = $carritoService->calcularTotal();

    // Definir la URL base
    $url = "http://localhost/ROPAAFRICANA/";

 ?>

<!--=====================================
BREADCRUMB CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo $url; ?>frontend/">Inicio</a></li>
				<li class="active">Carrito de Compras</li>
			</ol>
		</div>
	</div>
</div>

<!--=====================================
TABLA CARRITO DE COMPRAS
======================================-->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="text-center" style="margin: 0;">
						<i class="fa fa-shopping-cart"></i> TU CESTA
						<small style="display: block; font-size: 16px; margin-top: 5px;">
							<i class="fa fa-eur"></i> EUR
						</small>
					</h1>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 text-right">
							<h4>Total Productos: <?php echo $carritoService->obtenerTotalProductos(); ?></h4>
							<h4>Importe Total: <span class="sumaSubTotal"><?php echo number_format($total, 2, ',', '.'); ?></span> €</h4>
						</div>
					</div>
					<hr>
					<?php if(empty($carrito)): ?>
						<div class="alert alert-info">
							<p>Tu carrito está vacío</p>
						</div>
					<?php else: ?>
						<div class="table-responsive">
							<table class="table table-striped tablaCarrito">
								<thead>
									<tr>
										<th>Producto</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>Subtotal</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($carrito as $key => $item): ?>
										<tr data-key="<?php echo $key; ?>">
											<td>
												<div class="row">
													<div class="col-xs-4">
														<a href="<?php echo $url; ?>frontend/<?php echo isset($item["ruta"]) ? $item["ruta"] : ''; ?>">
															<img class="img-thumbnail" src="<?php echo $item["imagen"]; ?>" width="100px">
														</a>
													</div>
													<div class="col-xs-8">
														<h4><?php echo $item["nombre"]; ?></h4>
														<?php if(isset($item["tipo"]) && $item["tipo"] == "virtual"): ?>
															<p>Producto Digital</p>
														<?php else: ?>
															<?php if(isset($item["talla"])): ?>
																<p>Talla: <?php echo $item["talla"]; ?></p>
															<?php endif; ?>
															<?php if(isset($item["color"])): ?>
																<p>Color: <?php echo $item["color"]; ?></p>
															<?php endif; ?>
														<?php endif; ?>
													</div>
												</div>
											</td>
											<td><?php echo number_format($item["precio"], 2, ',', '.'); ?> €</td>
											<td>
												<div class="input-group">
													<span class="input-group-btn">
														<button class="btn btn-default btn-sm btn-decrementar" type="button" data-key="<?php echo $key; ?>">
															<i class="fa fa-minus"></i>
														</button>
													</span>
													<input type="text" class="form-control input-sm text-center" value="<?php echo $item["cantidad"]; ?>" readonly data-key="<?php echo $key; ?>" data-precio="<?php echo $item["precio"]; ?>">
													<span class="input-group-btn">
														<button class="btn btn-default btn-sm btn-incrementar" type="button" data-key="<?php echo $key; ?>">
															<i class="fa fa-plus"></i>
														</button>
													</span>
												</div>
											</td>
											<td class="subtotal"><?php echo number_format($item["precio"] * $item["cantidad"], 2, ',', '.'); ?> €</td>
											<td>
												<button class="btn btn-danger btn-sm quitarItemCarrito" data-key="<?php echo $key; ?>">
													<i class="fa fa-times"></i>
												</button>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-xs-12 text-right">
								<button class="btn btn-default vaciarCarrito">
									<i class="fa fa-trash"></i> Vaciar Carrito
								</button>
								<?php if(isset($_SESSION["id"])): ?>
									<button class="btn btn-primary btnPagar" data-toggle="modal" data-target="#modalCheckout">
										<i class="fa fa-shopping-cart"></i> Proceder al Pago
									</button>
								<?php else: ?>
									<a href="<?php echo $url; ?>frontend/ingreso" class="btn btn-primary">
										<i class="fa fa-user"></i> Iniciar Sesión para Comprar
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!--=====================================
VENTANA MODAL PARA CHECKOUT
======================================-->

<?php if(isset($_SESSION["id"])): ?>
<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Proceder al Pago</h4>
			</div>
			<div class="modal-body">
				<form id="formCheckout">
					<input type="hidden" name="total" value="<?php echo $total; ?>">
					<?php 
					$tarifas = ControladorCarrito::ctrMostrarTarifas();
					$impuesto = isset($tarifas["impuesto"]) ? $tarifas["impuesto"] : 0;
					$envio = isset($tarifas["envio"]) ? $tarifas["envio"] : 0;
					?>
					<input type="hidden" name="impuesto" value="<?php echo $impuesto; ?>">
					<input type="hidden" name="envio" value="<?php echo $envio; ?>">
					
					<div class="form-group">
						<label>Método de Pago</label>
						<select class="form-control" name="metodoPago" required>
							<option value="">Seleccione un método de pago</option>
							<option value="paypal">PayPal</option>
							<option value="stripe">Stripe</option>
						</select>
					</div>
					
					<div class="form-group">
						<label>Dirección de Envío</label>
						<textarea class="form-control" name="direccion" rows="3" required></textarea>
					</div>
					
					<div class="form-group">
						<label>Notas Adicionales</label>
						<textarea class="form-control" name="notas" rows="2"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary btnPagar">Pagar Ahora</button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<script>
function actualizarCantidad(id, accion) {
    $.ajax({
        url: "<?php echo $url; ?>frontend/ajax/carrito.ajax.php",
        method: "POST",
        data: {
            id: id,
            accion: accion
        },
        success: function(respuesta) {
            if(respuesta) {
                location.reload();
            }
        }
    });
}

function eliminarProducto(id) {
    console.log("Eliminando producto ID:", id);
    $.ajax({
        url: "<?php echo $url; ?>frontend/ajax/carrito.ajax.php",
        method: "POST",
        data: {
            id: id,
            action: "eliminar"
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("Respuesta del servidor:", respuesta);
            if(respuesta && respuesta.success) {
                console.log("Producto eliminado correctamente");
                location.reload();
            } else {
                console.error("Error en la respuesta:", respuesta);
                alert("Error al eliminar el producto: " + (respuesta ? respuesta.message : "Error desconocido"));
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la petición AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText
            });
            alert("Error al eliminar el producto: " + error);
        }
    });
}

function vaciarCarrito() {
    console.log("Iniciando vaciado del carrito...");
    $.ajax({
        url: "<?php echo $url; ?>frontend/ajax/carrito.ajax.php",
        method: "POST",
        data: {
            action: "vaciar"
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("Respuesta del servidor:", respuesta);
            if(respuesta && respuesta.success) {
                console.log("Carrito vaciado correctamente");
                location.reload();
            } else {
                console.error("Error en la respuesta:", respuesta);
                alert("Error al vaciar el carrito: " + (respuesta ? respuesta.message : "Error desconocido"));
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la petición AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText
            });
            alert("Error al vaciar el carrito: " + error);
        }
    });
}

function procesarPago() {
    var formData = new FormData(document.getElementById("formCheckout"));
    formData.append("accion", "checkout");
    
    $.ajax({
        url: "<?php echo $url; ?>frontend/ajax/carrito.ajax.php",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log("Respuesta del servidor:", respuesta);
            if(respuesta.success) {
                if(respuesta.redirect) {
                    window.location.href = respuesta.redirect;
                } else {
                    location.reload();
                }
            } else {
                alert(respuesta.message || "Error al procesar el pago");
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la petición AJAX:", {
                status: status,
                error: error,
                response: xhr.responseText
            });
            alert("Error al procesar el pago: " + error);
        }
    });
}
</script>

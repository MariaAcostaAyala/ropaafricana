/**
 * Clase para manejar el carrito de compras
 */
class CarritoCompras {
	constructor() {
		this.initializeEventListeners();
		this.loadCarritoFromStorage();
	}

	/**
	 * Inicializa los event listeners
	 */
	initializeEventListeners() {
		// Evento para incrementar cantidad
		$(document).on("click", ".btn-incrementar", (e) => {
			e.preventDefault();
			const key = $(e.currentTarget).data('key');
			console.log('Incrementando cantidad para key:', key);
			this.actualizarCantidad(key, 1);
		});

		// Evento para decrementar cantidad
		$(document).on("click", ".btn-decrementar", (e) => {
			e.preventDefault();
			const key = $(e.currentTarget).data('key');
			console.log('Decrementando cantidad para key:', key);
			this.actualizarCantidad(key, -1);
		});

		// Evento para eliminar producto
		$(document).on("click", ".quitarItemCarrito", (e) => this.handleEliminarProducto(e));
		
		// Evento para vaciar carrito
		$(document).on("click", ".vaciarCarrito", () => this.handleVaciarCarrito());
		
		// Evento para proceder al pago
		$(document).on("click", ".btnPagar", (e) => this.handlePago(e));
	}

	/**
	 * Carga el carrito desde localStorage
	 */
	loadCarritoFromStorage() {
		const cantidadCesta = localStorage.getItem("cantidadCesta");
		const sumaCesta = localStorage.getItem("sumaCesta");

		if (cantidadCesta != null) {
			$(".cantidadCesta").html(cantidadCesta);
			$(".sumaCesta").html(sumaCesta);
		} else {
			$(".cantidadCesta").html("0");
			$(".sumaCesta").html("0");
		}

		// Si estamos en la página del carrito, cargar productos
		if (window.location.pathname.indexOf("carrito-de-compras") > -1) {
			this.cargarProductosCarrito();
		}
	}

	/**
	 * Maneja los errores de la aplicación
	 */
	handleError(error) {
		if (error.message.includes('Debe iniciar sesión')) {
			// Redirigir al login
			window.location.href = `${rutaOculta}ingreso`;
		} else {
			this.mostrarError(error.message);
		}
	}

	/**
	 * Actualiza la cantidad de un producto en el carrito
	 */
	async actualizarCantidad(key, cambio) {
		try {
			console.log('Actualizando cantidad:', { key, cambio });
			
			// Obtener el input correspondiente
			const input = $(`input[data-key="${key}"]`);
			if (!input.length) {
				throw new Error('No se encontró el producto en el carrito');
			}

			// Calcular la nueva cantidad
			const cantidadActual = parseInt(input.val());
			let nuevaCantidad = cantidadActual + cambio;
			
			// Validar que la cantidad no sea menor a 1
			if (nuevaCantidad < 1) {
				nuevaCantidad = 1;
			}

			console.log('Nueva cantidad calculada:', nuevaCantidad);

			// Realizar la petición al servidor
			const response = await fetch(`${rutaOculta}ajax/carrito.ajax.php`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: `accion=actualizar&clave=${encodeURIComponent(key)}&cantidad=${nuevaCantidad}`
			});

			if (!response.ok) {
				throw new Error('Error en la respuesta del servidor');
			}

			const data = await response.json();
			console.log('Respuesta del servidor:', data);
			
			if (!data.success) {
				throw new Error(data.message || 'Error al actualizar la cantidad');
			}

			// Actualizar la vista
			if (data.carrito) {
				// Actualizar el input
				input.val(nuevaCantidad);
				
				// Actualizar el subtotal
				const precio = parseFloat(input.data('precio'));
				const subtotal = precio * nuevaCantidad;
				
				// Buscar y actualizar el elemento del subtotal
				const row = input.closest('tr');
				const subtotalElement = row.find('.subtotal');
				if (subtotalElement.length) {
					subtotalElement.text(`${subtotal.toFixed(2)} €`);
				}

				// Actualizar el total general
				const total = data.carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
				$('.sumaSubTotal').text(`${total.toFixed(2)} €`);

				// Actualizar localStorage
				localStorage.setItem("sumaCesta", total.toFixed(2));
				localStorage.setItem("cantidadCesta", data.carrito.reduce((sum, item) => sum + item.cantidad, 0));
			}

		} catch (error) {
			console.error('Error al actualizar cantidad:', error);
			alert(error.message);
		}
	}

	/**
	 * Actualiza los totales del carrito
	 */
	actualizarTotales(carrito) {
		const total = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
		const cantidad = carrito.reduce((sum, item) => sum + item.cantidad, 0);

		// Actualizar elementos en la vista
		const totalElement = document.querySelector('.sumaSubTotal');
		if (totalElement) {
			totalElement.textContent = `$${total.toFixed(2)}`;
		}

		// Actualizar localStorage
		localStorage.setItem("sumaCesta", total.toFixed(2));
		localStorage.setItem("cantidadCesta", cantidad);
	}

	/**
	 * Elimina un producto del carrito
	 */
	async eliminarProducto(key) {
		try {
			const response = await fetch(`${rutaOculta}ajax/carrito.ajax.php`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: `accion=eliminar&clave=${encodeURIComponent(key)}`
			});

			if (!response.ok) {
				throw new Error('Error en la respuesta del servidor');
			}

			const data = await response.json();
			
			if (!data) {
				throw new Error('Respuesta inválida del servidor');
			}

			return data;
		} catch (error) {
			console.error('Error al eliminar producto:', error);
			throw new Error('Error al eliminar el producto del carrito');
		}
	}

	/**
	 * Maneja la eliminación de un producto del carrito
	 */
	async handleEliminarProducto(e) {
		e.preventDefault();
		const key = $(e.currentTarget).data('key');
		console.log('Eliminando producto con key:', key);
		
		if (!key) {
			alert('Error: No se pudo identificar el producto a eliminar');
			return;
		}

		try {
			const response = await fetch(`${rutaOculta}ajax/carrito.ajax.php`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: `accion=eliminar&clave=${encodeURIComponent(key)}`
			});

			const data = await response.json();
			console.log('Respuesta del servidor:', data);
			
			if (!data.success) {
				throw new Error(data.message || 'Error al eliminar el producto');
			}

			// Actualizar la vista
			if (data.carrito) {
				// Eliminar la fila del producto
				$(`tr[data-key="${key}"]`).fadeOut(400, function() {
					$(this).remove();
				});

				// Actualizar el total general
				const total = data.carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
				$('.sumaSubTotal').text(`${total.toFixed(2)} €`);

				// Actualizar localStorage
				localStorage.setItem("sumaCesta", total.toFixed(2));
				localStorage.setItem("cantidadCesta", data.carrito.reduce((sum, item) => sum + item.cantidad, 0));

				// Si el carrito está vacío, mostrar mensaje
				if (Object.keys(data.carrito).length === 0) {
					$('.tablaCarrito tbody').html('<tr><td colspan="6" class="text-center">El carrito está vacío</td></tr>');
				}
			}

		} catch (error) {
			console.error('Error al eliminar producto:', error);
			alert(error.message);
		}
	}

	/**
	 * Maneja el vaciado del carrito
	 */
	async handleVaciarCarrito() {
		if (!confirm('¿Está seguro de que desea vaciar el carrito?')) {
			return;
		}

		try {
			const response = await fetch(`${rutaOculta}ajax/carrito.ajax.php`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: 'accion=vaciar'
			});

			const data = await response.json();
			
			if (!data.success) {
				throw new Error(data.message || 'Error al vaciar el carrito');
			}

			// Actualizar la vista
			$('.tablaCarrito tbody').html('<tr><td colspan="6" class="text-center">El carrito está vacío</td></tr>');
			$('.sumaSubTotal').text('0.00 €');

			// Actualizar localStorage
			localStorage.setItem("sumaCesta", "0");
			localStorage.setItem("cantidadCesta", "0");

		} catch (error) {
			console.error('Error al vaciar carrito:', error);
			alert(error.message);
		}
	}

	/**
	 * Maneja el proceso de pago
	 */
	async handlePago(e) {
		e.preventDefault();
		
		try {
			const formData = new FormData(document.getElementById('formCheckout'));
			const data = Object.fromEntries(formData.entries());
			
			const response = await fetch(`${rutaOculta}ajax/carrito.ajax.php`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: `accion=checkout&${new URLSearchParams(data).toString()}`
			});

			const result = await response.json();
			
			if (!result.success) {
				throw new Error(result.message || 'Error al procesar el pago');
			}

			if (result.redirect) {
				window.location.href = result.redirect;
			}

		} catch (error) {
			console.error('Error al procesar pago:', error);
			alert(error.message);
		}
	}

	/**
	 * Actualiza la vista del carrito
	 */
	actualizarVistaCarrito(carrito) {
		$(".cuerpoCarrito").empty();
		
		if (carrito.length === 0) {
			$(".cuerpoCarrito").append('<div class="alert alert-info">Tu carrito está vacío</div>');
			return;
		}

		carrito.forEach((item, index) => {
			this.agregarProductoAVista(item, index);
		});

		this.actualizarTotales(carrito);
	}

	/**
	 * Agrega un producto a la vista
	 */
	agregarProductoAVista(item, index) {
		const html = `
			<div class="row itemCarrito">
				<div class="col-sm-1 col-xs-12">
					<br>
					<center>
						<button class="btn btn-default backColor quitarItemCarrito" 
								idProducto="${item.id}" 
								peso="${item.peso}">
							<i class="fa fa-times"></i>
						</button>
					</center>
				</div>
				<div class="col-sm-1 col-xs-12">
					<figure>
						<img src="${item.imagen}" class="img-thumbnail">
					</figure>
				</div>
				<div class="col-sm-4 col-xs-12">
					<br>
					<p class="tituloCarritoCompra text-left">${item.nombre}</p>
				</div>
				<div class="col-md-2 col-sm-1 col-xs-12">
					<br>
					<p class="precioCarritoCompra text-center">EUR €<span>${item.precio}</span></p>
				</div>
				<div class="col-md-2 col-sm-3 col-xs-8">
					<br>
					<div class="col-xs-8">
						<center>
							<input type="number" 
								   class="form-control cantidadItem" 
								   min="1" 
								   value="${item.cantidad}" 
								   tipo="${item.tipo}" 
								   precio="${item.precio}" 
								   idProducto="${item.id}" 
								   item="${index}">
						</center>
					</div>
				</div>
				<div class="col-md-2 col-sm-1 col-xs-4 text-center">
					<br>
					<p class="subTotal${index} subtotales">
						<strong>EUR €<span>${(item.cantidad * item.precio).toFixed(2)}</span></strong>
					</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr>
		`;

		$(".cuerpoCarrito").append(html);
	}

	/**
	 * Muestra un mensaje de error
	 */
	mostrarError(mensaje) {
		$(".alert").remove();
		$(".btnPagar").after(`<div class="alert alert-warning">${mensaje}</div>`);
	}

	/**
	 * Obtiene los datos para el pago
	 */
	obtenerDatosPago() {
		return {
			divisa: $("#cambiarDivisa").val(),
			total: $(".valorTotalCompra").html(),
			totalEncriptado: localStorage.getItem("total"),
			impuesto: $(".valorTotalImpuesto").html(),
			envio: $(".valorTotalEnvio").html(),
			subtotal: $(".valorSubtotal").html(),
			productos: this.obtenerProductosCarrito()
		};
	}

	/**
	 * Obtiene los productos del carrito
	 */
	obtenerProductosCarrito() {
		const productos = [];
		$('.cuerpoCarrito button, .comprarAhora button').each(function() {
			productos.push({
				id: $(this).attr("idProducto"),
				titulo: $(this).closest('.itemCarrito').find('.tituloCarritoCompra').text(),
				cantidad: $(this).closest('.itemCarrito').find('.cantidadItem').val(),
				precio: $(this).closest('.itemCarrito').find('.precioCarritoCompra span').text()
			});
		});
		return productos;
	}

	/**
	 * Realiza peticiones AJAX al servidor
	 */
	async realizarPeticion(url, datos) {
		try {
			const response = await $.ajax({
				url: url,
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false
			});
			return JSON.parse(response);
		} catch (error) {
			throw new Error('Error en la petición');
		}
	}
}

// Inicializar el carrito cuando el documento esté listo
$(document).ready(() => {
	window.carritoCompras = new CarritoCompras();
});

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
VISUALIZAR LOS PRODUCTOS EN LA PÁGINA CARRITO DE COMPRAS
=============================================*/

// Verificar si estamos en la página correcta
if(window.location.pathname.indexOf("carrito-de-compras") > -1) {
	console.log("Estamos en la página de carrito");
	console.log("Ruta oculta:", rutaOculta);

	// Verificar el estado del localStorage
	var listaProductos = localStorage.getItem("listaProductos");
	console.log("Contenido del localStorage:", listaProductos);

	if (!listaProductos) {
		console.log("No hay productos en el carrito");
		mostrarMensajeCarritoVacio();
		return;
	}

	try {
		var listaCarrito = JSON.parse(listaProductos);
		console.log("Lista de productos parseada:", listaCarrito);

		if (!Array.isArray(listaCarrito) || listaCarrito.length === 0) {
			console.log("El carrito está vacío");
			mostrarMensajeCarritoVacio();
			return;
		}

		// Limpiar el carrito antes de agregar los productos
		$(".cuerpoCarrito").empty();
		
		// Mostrar los elementos del carrito
		$(".sumaCarrito").show();
		$(".cabeceraCheckout").show();

		// Procesar cada producto
		var productosProcesados = 0;
		var totalProductos = listaCarrito.length;

		listaCarrito.forEach(function(item, index) {
			if(!item || !item.idProducto) {
				console.error("Producto inválido en el índice", index);
				productosProcesados++;
				return;
			}

			var datosProducto = new FormData();
			datosProducto.append("id", item.idProducto);

			$.ajax({
				url: rutaOculta+"ajax/producto.ajax.php",
				method: "POST",
				data: datosProducto,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta) {
					if(respuesta && respuesta.id) {
						var precio = respuesta.precioOferta > 0 ? respuesta.precioOferta : respuesta.precio;
						agregarProductoAlCarrito(item, index, precio);
						actualizarSubtotales();
					} else {
						console.error("No se recibió información válida del producto", item.idProducto);
					}

					productosProcesados++;
					if(productosProcesados === totalProductos) {
						if($(".cuerpoCarrito .itemCarrito").length === 0) {
							mostrarMensajeError("No se pudieron cargar los productos del carrito");
						}
					}
				},
				error: function(xhr, status, error) {
					console.error("Error en la petición AJAX para producto", item.idProducto, ":", error);
					productosProcesados++;
					if(productosProcesados === totalProductos) {
						mostrarMensajeError("Error al cargar los productos del carrito");
					}
				}
			});
		});

	} catch(e) {
		console.error("Error al parsear el localStorage:", e);
		mostrarMensajeError("Error al cargar el carrito de compras");
	}
}

function mostrarMensajeCarritoVacio() {
	$(".cuerpoCarrito").html('<div class="well">Aún no hay productos en el carrito de compras.</div>');
	$(".sumaCarrito").hide();
	$(".cabeceraCheckout").hide();
}

function mostrarMensajeError(mensaje) {
	$(".cuerpoCarrito").html('<div class="alert alert-danger">'+mensaje+'</div>');
	$(".sumaCarrito").hide();
	$(".cabeceraCheckout").hide();
}

function agregarProductoAlCarrito(item, index, precio) {
	var html = '<div class="row itemCarrito">'+
		'<div class="col-sm-1 col-xs-12">'+
			'<br>'+
			'<center>'+
				'<button class="btn btn-default backColor quitarItemCarrito" idProducto="'+item.idProducto+'" peso="'+item.peso+'">'+
					'<i class="fa fa-times"></i>'+
				'</button>'+
			'</center>'+
		'</div>'+
		'<div class="col-sm-1 col-xs-12">'+
			'<figure>'+
				'<img src="'+item.imagen+'" class="img-thumbnail">'+
			'</figure>'+
		'</div>'+
		'<div class="col-sm-4 col-xs-12">'+
			'<br>'+
			'<p class="tituloCarritoCompra text-left">'+item.titulo+'</p>'+
		'</div>'+
		'<div class="col-md-2 col-sm-1 col-xs-12">'+
			'<br>'+
			'<p class="precioCarritoCompra text-center">USD $<span>'+precio+'</span></p>'+
		'</div>'+
		'<div class="col-md-2 col-sm-3 col-xs-8">'+
			'<br>'+
			'<div class="col-xs-8">'+
				'<center>'+
					'<input type="number" class="form-control cantidadItem" min="1" value="'+item.cantidad+'" tipo="'+item.tipo+'" precio="'+precio+'" idProducto="'+item.idProducto+'" item="'+index+'">'+
				'</center>'+
			'</div>'+
		'</div>'+
		'<div class="col-md-2 col-sm-1 col-xs-4 text-center">'+
			'<br>'+
			'<p class="subTotal'+index+' subtotales">'+
				'<strong>EUR €<span>'+(Number(item.cantidad)*Number(precio))+'</span></strong>'+
			'</p>'+
		'</div>'+
	'</div>'+
	'<div class="clearfix"></div>'+
	'<hr>';

	$(".cuerpoCarrito").append(html);

	// Si es un producto virtual, hacer el input de cantidad readonly
	if(item.tipo === "virtual") {
		$(".cantidadItem[tipo='virtual']").attr("readonly", "true");
	}
}

function actualizarSubtotales() {
	var precioCarritoCompra = $(".cuerpoCarrito .precioCarritoCompra span");
	cestaCarrito(precioCarritoCompra.length);
	sumaSubtotales();
}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
AGREGAR AL CARRITO
=============================================*/

$(".agregarCarrito").click(function(){

	var idProducto = $(this).attr("idProducto");
	var imagen = $(this).attr("imagen");
	var titulo = $(this).attr("titulo");
	var precio = $(this).attr("precio");
	var tipo = $(this).attr("tipo");
	var peso = $(this).attr("peso");

	var agregarAlCarrito = false;

	/*=============================================
	CAPTURAR DETALLES
	=============================================*/

	if(tipo == "virtual"){

		agregarAlCarrito = true;

	}else{

		var seleccionarDetalle = $(".seleccionarDetalle");
		
		for(var i = 0; i < seleccionarDetalle.length; i++){

			console.log("seleccionarDetalle", $(seleccionarDetalle[i]).val());

			if($(seleccionarDetalle[i]).val() == ""){

				swal({
					  title: "Debe seleccionar Talla y Color",
					  text: "",
					  type: "warning",
					  showCancelButton: false,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "¡Seleccionar!",
					  closeOnConfirm: false
					})

				return;

			}else{

				titulo = titulo + "-" + $(seleccionarDetalle[i]).val();

				agregarAlCarrito = true;

			}

		}		

	}

	/*=============================================
	ALMACENAR EN EL LOCALSTARGE LOS PRODUCTOS AGREGADOS AL CARRITO
	=============================================*/

	if(agregarAlCarrito){

		/*=============================================
		RECUPERAR ALMACENAMIENTO DEL LOCALSTORAGE
		=============================================*/

		if(localStorage.getItem("listaProductos") == null){

			listaCarrito = [];

		}else{

			var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));
			console.log("Lista de productos del localStorage:", listaProductos);

			if (!listaProductos || !Array.isArray(listaProductos)) {
				console.error("No hay productos en el carrito o el formato es inválido");
				mostrarMensajeCarritoVacio();
				return;
			}

			var indice = Object.keys(listaProductos);
			console.log("Índices de productos:", indice);

			if (!indice || indice.length === 0) {
				console.error("No hay productos en el carrito");
				mostrarMensajeCarritoVacio();
				return;
			}

			for(var i = 0; i < indice.length; i++){

				if(listaProductos[i]["idProducto"] == idProducto && listaProductos[i]["tipo"] == "virtual"){

					swal({
					  title: "El producto ya está agregado al carrito de compras",
					  text: "",
					  type: "warning",
					  showCancelButton: false,
					  confirmButtonColor: "#DD6B55",
					  confirmButtonText: "¡Volver!",
					  closeOnConfirm: false
					})

					return;

				}

			}

			listaCarrito.concat(localStorage.getItem("listaProductos"));

		}

		listaCarrito.push({"idProducto":idProducto,
						   "imagen":imagen,
						   "titulo":titulo,
						   "precio":precio,
					       "tipo":tipo,
				           "peso":peso,
				           "cantidad":"1"});

		localStorage.setItem("listaProductos", JSON.stringify(listaCarrito));

		/*=============================================
		ACTUALIZAR LA CESTA
		=============================================*/

		var cantidadCesta = Number($(".cantidadCesta").html()) + 1;
		var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);

		$(".cantidadCesta").html(cantidadCesta);
		$(".sumaCesta").html(sumaCesta);

		localStorage.setItem("cantidadCesta", cantidadCesta);
		localStorage.setItem("sumaCesta", sumaCesta);
		
		/*=============================================
		MOSTRAR ALERTA DE QUE EL PRODUCTO YA FUE AGREGADO
		=============================================*/

		swal({
			  title: "",
			  text: "¡Se ha agregado un nuevo producto al carrito de compras!",
			  type: "success",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  cancelButtonText: "¡Continuar comprando!",
			  confirmButtonText: "¡Ir a mi carrito de compras!",
			  closeOnConfirm: false
			},
			function(isConfirm){
				if (isConfirm) {	   
					 window.location = rutaOculta+"carrito-de-compras";
				} 
		});

	}

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
QUITAR PRODUCTOS DEL CARRITO
=============================================*/

$(document).on("click", ".quitarItemCarrito", function(){

	$(this).parent().parent().parent().remove();

	var idProducto = $(".cuerpoCarrito button");
	var imagen = $(".cuerpoCarrito img");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
	var precio = $(".cuerpoCarrito .precioCarritoCompra span");
	var cantidad = $(".cuerpoCarrito .cantidadItem");

	/*=============================================
	SI AÚN QUEDAN PRODUCTOS VOLVERLOS AGREGAR AL CARRITO (LOCALSTORAGE)
	=============================================*/

	listaCarrito = [];

	if(idProducto.length != 0){

		for(var i = 0; i < idProducto.length; i++){

			var idProductoArray = $(idProducto[i]).attr("idProducto");
			var imagenArray = $(imagen[i]).attr("src");
			var tituloArray = $(titulo[i]).html();
			var precioArray = $(precio[i]).html();
			var pesoArray = $(idProducto[i]).attr("peso");
			var tipoArray = $(cantidad[i]).attr("tipo");
			var cantidadArray = $(cantidad[i]).val();

			listaCarrito.push({"idProducto":idProductoArray,
						   "imagen":imagenArray,
						   "titulo":tituloArray,
						   "precio":precioArray,
					       "tipo":tipoArray,
				           "peso":pesoArray,
				           "cantidad":cantidadArray});

		}

		localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

		sumaSubtotales();
		cestaCarrito(listaCarrito.length);


	}else{

		/*=============================================
		SI YA NO QUEDAN PRODUCTOS HAY QUE REMOVER TODO
		=============================================*/	

		localStorage.removeItem("listaProductos");

		localStorage.setItem("cantidadCesta","0");
		
		localStorage.setItem("sumaCesta","0");

		$(".cantidadCesta").html("0");
		$(".sumaCesta").html("0");

		$(".cuerpoCarrito").html('<div class="well">Aún no hay productos en el carrito de compras.</div>');
		$(".sumaCarrito").hide();
		$(".cabeceraCheckout").hide();

	}

})


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
GENERAR SUBTOTAL DESPUES DE CAMBIAR CANTIDAD
=============================================*/
$(document).on("change", ".cantidadItem", function(){

	var cantidad = $(this).val();
	var precio = $(this).attr("precio");
	var idProducto = $(this).attr("idProducto");
	var item = $(this).attr("item");

	$(".subTotal"+item).html('<strong>EUR €<span>'+(cantidad*precio)+'</span></strong>');

	/*=============================================
	ACTUALIZAR LA CANTIDAD EN EL LOCALSTORAGE
	=============================================*/

	var idProducto = $(".cuerpoCarrito button");
	var imagen = $(".cuerpoCarrito img");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
	var precio = $(".cuerpoCarrito .precioCarritoCompra span");
	var cantidad = $(".cuerpoCarrito .cantidadItem");

	listaCarrito = [];

	for(var i = 0; i < idProducto.length; i++){

			var idProductoArray = $(idProducto[i]).attr("idProducto");
			var imagenArray = $(imagen[i]).attr("src");
			var tituloArray = $(titulo[i]).html();
			var precioArray = $(precio[i]).html();
			var pesoArray = $(idProducto[i]).attr("peso");
			var tipoArray = $(cantidad[i]).attr("tipo");
			var cantidadArray = $(cantidad[i]).val();

			listaCarrito.push({"idProducto":idProductoArray,
						   "imagen":imagenArray,
						   "titulo":tituloArray,
						   "precio":precioArray,
					       "tipo":tipoArray,
				           "peso":pesoArray,
				           "cantidad":cantidadArray});

		}

		localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

		sumaSubtotales();
		cestaCarrito(listaCarrito.length);
})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
SUMA DE TODOS LOS SUBTOTALES
=============================================*/
function sumaSubtotales(){

	var subtotales = $(".subtotales span");
	var arraySumaSubtotales = [];
	
	for(var i = 0; i < subtotales.length; i++){

		var subtotalesArray = $(subtotales[i]).html();
		arraySumaSubtotales.push(Number(subtotalesArray));
		
	}

	
	function sumaArraySubtotales(total, numero){

		return total + numero;

	}

	var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
	
	$(".sumaSubTotal").html('<strong>EUR €<span>'+(sumaTotal).toFixed(2)+'</span></strong>');

	$(".sumaCesta").html((sumaTotal).toFixed(2));

	localStorage.setItem("sumaCesta", (sumaTotal).toFixed(2));


}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
ACTUALIZAR CESTA AL CAMBIAR CANTIDAD
=============================================*/
function cestaCarrito(cantidadProductos){

	/*=============================================
	SI HAY PRODUCTOS EN EL CARRITO
	=============================================*/

	if(cantidadProductos != 0){
		
		var cantidadItem = $(".cuerpoCarrito .cantidadItem");

		var arraySumaCantidades = [];
	
		for(var i = 0; i < cantidadItem .length; i++){

			var cantidadItemArray = $(cantidadItem[i]).val();
			arraySumaCantidades.push(Number(cantidadItemArray));
			
		}
	
		function sumaArrayCantidades(total, numero){

			return total + numero;

		}

		var sumaTotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);
		
		$(".cantidadCesta").html(sumaTotalCantidades );
		localStorage.setItem("cantidadCesta", sumaTotalCantidades);

	}

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
CHECKOUT
=============================================*/

$("#btnCheckout").click(function(){

	$(".listaProductos table.tablaProductos tbody").html("");

	$("#checkPaypal").prop("checked",true);
	$("#checkPayu").prop("checked", false);

	var idUsuario = $(this).attr("idUsuario");
	var peso = $(".cuerpoCarrito button, .comprarAhora button");
	var titulo = $(".cuerpoCarrito .tituloCarritoCompra, .comprarAhora .tituloCarritoCompra");
	var cantidad = $(".cuerpoCarrito .cantidadItem, .comprarAhora .cantidadItem");
	var subtotal = $(".cuerpoCarrito .subtotales span, .comprarAhora .subtotales span");
	var tipoArray =[];
	var cantidadPeso = [];

	/*=============================================
	SUMA SUBTOTAL
	=============================================*/

	var sumaSubTotal = $(".sumaSubTotal span")
	
	$(".valorSubtotal").html($(sumaSubTotal).html());
	$(".valorSubtotal").attr("valor",$(sumaSubTotal).html());

	/*=============================================
	TASAS DE IMPUESTO
	=============================================*/

	var impuestoTotal = ($(".valorSubtotal").html() * $("#tasaImpuesto").val()) /100;
	
	$(".valorTotalImpuesto").html((impuestoTotal).toFixed(2));
	$(".valorTotalImpuesto").attr("valor",(impuestoTotal).toFixed(2));

	sumaTotalCompra()

	/*=============================================
	VARIABLES ARRAY 
	=============================================*/

	for(var i = 0; i < titulo.length; i++){

		var pesoArray = $(peso[i]).attr("peso");
		var tituloArray = $(titulo[i]).html();
		var cantidadArray = $(cantidad[i]).val();		
		var subtotalArray = $(subtotal[i]).html();

		/*=============================================
		EVALUAR EL PESO DE ACUERDO A LA CANTIDAD DE PRODUCTOS
		=============================================*/

		cantidadPeso[i] = pesoArray * cantidadArray;

		function sumaArrayPeso(total, numero){

			return total + numero;

		}

		var sumaTotalPeso = cantidadPeso.reduce(sumaArrayPeso);
		
		/*=============================================
		MOSTRAR PRODUCTOS DEFINITIVOS A COMPRAR
		=============================================*/

		$(".listaProductos table.tablaProductos tbody").append('<tr>'+
															   '<td class="valorTitulo">'+tituloArray+'</td>'+
															   '<td class="valorCantidad">'+cantidadArray+'</td>'+
															   '<td>$<span class="valorItem" valor="'+subtotalArray+'">'+subtotalArray+'</span></td>'+
															   '<tr>');

		/*=============================================
		SELECCIONAR PAÍS DE ENVÍO SI HAY PRODUCTOS FÍSICOS
		=============================================*/
	
		tipoArray.push($(cantidad[i]).attr("tipo"));
		
		function checkTipo(tipo){

			return tipo == "fisico";
		
		}

	}

	/*=============================================
	EXISTEN PRODUCTOS FÍSICOS
	=============================================*/

	if(tipoArray.find(checkTipo) == "fisico"){

		$(".seleccionePais").html('<select class="form-control" id="seleccionarPais" required>'+
						
						          '<option value="">Seleccione el país</option>'+

					              '</select>');


		$(".formEnvio").show();

		$(".btnPagar").attr("tipo","fisico");

		$.ajax({
			url:rutaOculta+"vistas/js/plugins/countries.json",
			type: "GET",
			cache: false,
			contentType: false,
			processData:false,
			dataType:"json",
			success: function(respuesta){

				respuesta.forEach(seleccionarPais);

				function seleccionarPais(item, index){

					var pais = item.name;
					var codPais = item.code;

					$("#seleccionarPais").append('<option value="'+codPais+'">'+pais+'</option>');
				
				}

			}
		})

		/*=============================================
		EVALUAR TASAS DE ENVÍO SI EL PRODUCTO ES FÍSICO
		=============================================*/

		$("#seleccionarPais").change(function(){

			$(".alert").remove();

			var pais = $(this).val();
			var tasaPais = $("#tasaPais").val();

			if(pais == tasaPais){

				var resultadoPeso = sumaTotalPeso * $("#envioNacional").val();
				
				if(resultadoPeso < $("#tasaMinimaNal").val()){

					$(".valorTotalEnvio").html($("#tasaMinimaNal").val());
					$(".valorTotalEnvio").attr("valor", $("#tasaMinimaNal").val());

				}else{

					$(".valorTotalEnvio").html(resultadoPeso);
					$(".valorTotalEnvio").attr("valor",resultadoPeso);
				}

			}else{

				var resultadoPeso = sumaTotalPeso * $("#envioInternacional").val();
				
				if(resultadoPeso < $("#tasaMinimaInt").val()){

					$(".valorTotalEnvio").html($("#tasaMinimaInt").val());
					$(".valorTotalEnvio").attr("valor",$("#tasaMinimaInt").val());

				}else{

					$(".valorTotalEnvio").html(resultadoPeso);
					$(".valorTotalEnvio").attr("valor",resultadoPeso);
				}

			}	

			sumaTotalCompra();
			pagarConPayu();

		})

	}else{

		$(".btnPagar").attr("tipo","virtual");
	}

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
SUMA TOTAL DE LA COMPRA
=============================================*/
function sumaTotalCompra(){

	var sumaTotalTasas = Number($(".valorSubtotal").html())+ 
	                     Number($(".valorTotalEnvio").html())+ 
	                     Number($(".valorTotalImpuesto").html());


	$(".valorTotalCompra").html((sumaTotalTasas).toFixed(2));
	$(".valorTotalCompra").attr("valor",(sumaTotalTasas).toFixed(2));

	localStorage.setItem("total",hex_md5($(".valorTotalCompra").html()));
}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
MÉTODO DE PAGO PARA CAMBIO DE DIVISA
=============================================*/

var metodoPago = "paypal";
divisas(metodoPago);

// Establecer EUR como moneda por defecto
$("#cambiarDivisa").val("EUR").trigger("change");

$("input[name='pago']").change(function(){

	var metodoPago = $(this).val();

	divisas(metodoPago);

	if(metodoPago == "payu"){

		$(".btnPagar").hide();
		$(".formPayu").show();

		pagarConPayu();

	}else{

		$(".btnPagar").show();
		$(".formPayu").hide();

	}

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
FUNCIÓN PARA EL CAMBIO DE DIVISA
=============================================*/

function divisas(metodoPago){

	$("#cambiarDivisa").html("");

	if(metodoPago == "paypal"){

		$("#cambiarDivisa").append('<option value="USD">USD</option>'+
			                       '<option value="EUR">EUR</option>'+
			                       '<option value="GBP">GBP</option>'+
			                       '<option value="MXN">MXN</option>'+
			                       '<option value="JPY">JPY</option>'+
			                       '<option value="CAD">CAD</option>'+
			                       '<option value="BRL">BRL</option>')

	}else{

		$("#cambiarDivisa").append('<option value="USD">USD</option>'+
			                       '<option value="PEN">PEN</option>'+
			                       '<option value="COP">COP</option>'+
			                       '<option value="MXN">MXN</option>'+
			                       '<option value="CLP">CLP</option>'+
			                       '<option value="ARS">ARS</option>'+
			                       '<option value="BRL">BRL</option>')

	}

}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
CAMBIO DE DIVISA
=============================================*/

var divisaBase = "USD";

$("#cambiarDivisa").change(function(){

	$(".alert").remove();

	if($("#seleccionarPais").val() == ""){

		$("#cambiarDivisa").after('<div class="alert alert-warning">No ha seleccionado el país de envío</div>');

		return;

	}
	
	var divisa = $(this).val();

	$.ajax({

		url: "http://free.currconv.com/api/v7/convert?q="+divisaBase+"_"+divisa+"&compact=ultra&apiKey=a01ebaf9a1c69eb4ff79",
		type:"GET",
		cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"jsonp",
	    success:function(respuesta){
	        	
	    	var conversion = (respuesta["USD_"+divisa]).toFixed(2);

	    	$(".cambioDivisa").html(divisa);
	    	
	    	if(divisa == "USD"){

	    		$(".valorSubtotal").html($(".valorSubtotal").attr("valor"))
		    	$(".valorTotalEnvio").html($(".valorTotalEnvio").attr("valor"))
		    	$(".valorTotalImpuesto").html($(".valorTotalImpuesto").attr("valor"))
		    	$(".valorTotalCompra").html($(".valorTotalCompra").attr("valor"))

		    	var valorItem = $(".valorItem");

		    	localStorage.setItem("total",hex_md5($(".valorTotalCompra").html()));

		    	for(var i = 0; i < valorItem.length; i++){

		    		$(valorItem[i]).html($(valorItem[i]).attr("valor"));

		    	}
	    		
	    	}else{
	
		    	$(".valorSubtotal").html(
		    		
		    		Math.ceil(Number(conversion) * Number($(".valorSubtotal").attr("valor"))*100)/100

		    	)

		    	$(".valorTotalEnvio").html(

		    		(Number(conversion) * Number($(".valorTotalEnvio").attr("valor"))).toFixed(2)

		    	)

		    	$(".valorTotalImpuesto").html(

		    		(Number(conversion) * Number($(".valorTotalImpuesto").attr("valor"))).toFixed(2)

		    	)

		    	$(".valorTotalCompra").html(

		    		(Number(conversion) * Number($(".valorTotalCompra").attr("valor"))).toFixed(2)

		    	)

		    	var valorItem = $(".valorItem");

		    	localStorage.setItem("total",hex_md5($(".valorTotalCompra").html()));

		    	for(var i = 0; i < valorItem.length; i++){

		    		$(valorItem[i]).html(
		    			
		    			(Number(conversion) * Number($(valorItem[i]).attr("valor"))).toFixed(2)

		    		);

		    	}

		    }

	    	sumaTotalCompra();

	    	pagarConPayu();

	    }

	})	

	

})


/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
BOTÓN PAGAR PAYPAL
=============================================*/

$(".btnPagar").click(function(){

	var tipo = $(this).attr("tipo");

	if(tipo == "fisico" && $("#seleccionarPais").val() == ""){

		$(".btnPagar").after('<div class="alert alert-warning">No ha seleccionado el país de envío</div>');

		return;

	}

	var divisa = $("#cambiarDivisa").val();
	var total = $(".valorTotalCompra").html();
	var totalEncriptado = localStorage.getItem("total");
	var impuesto = $(".valorTotalImpuesto").html();
	var envio = $(".valorTotalEnvio").html();
	var subtotal = $(".valorSubtotal").html();
	var titulo = $(".valorTitulo");
	var cantidad = $(".valorCantidad");
	var valorItem = $(".valorItem");
	var idProducto = $('.cuerpoCarrito button, .comprarAhora button');

	var tituloArray = [];
	var cantidadArray = [];
	var valorItemArray = [];
	var idProductoArray = [];

	for(var i = 0; i < titulo.length; i++){

		tituloArray[i] = $(titulo[i]).html();
		cantidadArray[i] = $(cantidad[i]).html();
		valorItemArray[i] = $(valorItem[i]).html();
		idProductoArray[i] = $(idProducto[i]).attr("idProducto");

	}

	var datos = new FormData();

	datos.append("divisa", divisa);
	datos.append("total",total);
	datos.append("totalEncriptado",totalEncriptado);
	datos.append("impuesto",impuesto);
	datos.append("envio",envio);
	datos.append("subtotal",subtotal);
	datos.append("tituloArray",tituloArray);
	datos.append("cantidadArray",cantidadArray);
	datos.append("valorItemArray",valorItemArray);
	datos.append("idProductoArray",idProductoArray);

	$.ajax({
		 url:rutaOculta+"ajax/carrito.ajax.php",
		 method:"POST",
		 data: datos,
		 cache: false,
         contentType: false,
         processData: false,
         success:function(respuesta){
         	   	
               window.location = respuesta;

         }

	})

})

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
BOTÓN PAGAR PAYU
=============================================*/

function pagarConPayu(){

	if($("#seleccionarPais").val() == ""){

		$(".formPayu").after('<div class="alert alert-warning">No ha seleccionado el país de envío</div>');
		
		$(".formPayu input[name='Submit']").attr("type","button");
		
		return;

	}

	var divisa = $("#cambiarDivisa").val();
	var total = $(".valorTotalCompra").html();
	var impuesto = $(".valorTotalImpuesto").html();
	var envio = $(".valorTotalEnvio").html();
	var subtotal = $(".valorSubtotal").html();
	var titulo = $(".valorTitulo");
	var cantidad = $(".valorCantidad");
	var valorItem = $(".valorItem");
	var idProducto = $('.cuerpoCarrito button, .comprarAhora button');

	var tituloArray = [];
	var cantidadArray = [];
	var idProductoArray = [];
	var valorItemArray = [];

	for(var i = 0; i < titulo.length; i++){

		tituloArray[i] = $(titulo[i]).html();
		cantidadArray[i] = $(cantidad[i]).html();
		idProductoArray[i] = $(idProducto[i]).attr("idProducto");
		valorItemArray[i] = $(valorItem[i]).html();

	}

	var valorItemString = valorItemArray.toString();
	var pago = valorItemString.replace(",","-");

	var datos = new FormData();
	datos.append("metodoPago", "payu");
	datos.append("cantidadArray",cantidadArray);
	datos.append("valorItemArray",valorItemArray);
	datos.append("idProductoArray",idProductoArray);
	datos.append("divisaPayu", divisa);

	if(hex_md5(total) == localStorage.getItem("total")){

		$.ajax({
	      url:rutaOculta+"ajax/carrito.ajax.php",
	      method:"POST",
	      data: datos,
	      cache: false,
	      contentType: false,
	      processData: false,
	      success:function(respuesta){
	          
	          var merchantId = JSON.parse(respuesta).merchantIdPayu;
	          var accountId = JSON.parse(respuesta).accountIdPayu;
	          var apiKey = JSON.parse(respuesta).apiKeyPayu;
	          var modo = JSON.parse(respuesta).modoPayu;
	          var description = tituloArray.toString();
	          var referenceCode = (Number(Math.ceil(Math.random()*1000000))+Number(total).toFixed());
	          var productosToString = idProductoArray.toString();
	          var productos = productosToString.replace(/,/g, "-");
	          var cantidadToString = cantidadArray.toString();
	          var cantidad = cantidadToString.replace(/,/g, "-");
	          var signature = hex_md5(apiKey+"~"+merchantId+"~"+referenceCode+"~"+total+"~"+divisa);
	       

	          if(divisa == "COP"){

	          	var taxReturnBase = (total - impuesto).toFixed(2)

	          }else{

	          	var taxReturnBase = 0;

	          }        

	          if(modo == "sandbox"){

	            var url = "https://sandbox.gateway.payulatam.com/ppp-web-gateway/";
	            var test = 1;

	      	  }else{

	      	  	var url = "https://gateway.payulatam.com/ppp-web-gateway/";
	      	  	var test = 0;

	      	  }

	      	  if(envio != 0){

	      	  	var tipoEnvio = "YES";
	      	  
	      	  }else{

	      	  	var tipoEnvio = "NO";
	      	  }

	           $(".formPayu").attr("method","POST");
	           $(".formPayu").attr("action",url);
			   $(".formPayu input[name='merchantId']").attr("value", merchantId);
			   $(".formPayu input[name='accountId']").attr("value", accountId);
			   $(".formPayu input[name='description']").attr("value", description);
			   $(".formPayu input[name='referenceCode']").attr("value", referenceCode);
			   $(".formPayu input[name='amount']").attr("value", total);
			   $(".formPayu input[name='tax']").attr("value", impuesto);
			   $(".formPayu input[name='taxReturnBase']").attr("value", taxReturnBase);
			   $(".formPayu input[name='shipmentValue']").attr("value", envio);
			   $(".formPayu input[name='currency']").attr("value", divisa);
			   $(".formPayu input[name='responseUrl']").attr("value", rutaOculta+"index.php?ruta=finalizar-compra&payu=true&productos="+productos+"&cantidad="+cantidad+"&pago="+pago);
			   $(".formPayu input[name='declinedResponseUrl']").attr("value", rutaOculta+"carrito-de-compras");
			   $(".formPayu input[name='displayShippingInformation']").attr("value", tipoEnvio);
			   $(".formPayu input[name='test']").attr("value", test);
			   $(".formPayu input[name='signature']").attr("value", signature);

			   /*=============================================
				GENERADOR DE TARJETAS DE CRÉDITO
				http://www.elfqrin.com/discard_credit_card_generator.php
				=============================================*/

	      }

	  })
	}
}

/*=============================================
/*=============================================
/*=============================================
/*=============================================
/*=============================================
AGREGAR PRODUCTOS GRATIS
=============================================*/
$(".agregarGratis").click(function(){

	var idProducto = $(this).attr("idProducto");
	var idUsuario = $(this).attr("idUsuario");
	var tipo = $(this).attr("tipo");
	var titulo = $(this).attr("titulo");
	var agregarGratis = false;

	/*=============================================
	VERIFICAR QUE NO TENGA EL PRODUCTO ADQUIRIDO
	=============================================*/

	var datos = new FormData();

	datos.append("idUsuario", idUsuario);
	datos.append("idProducto", idProducto);

	$.ajax({
		url:rutaOculta+"ajax/carrito.ajax.php",
		method:"POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	success:function(respuesta){
      	    
      	    if(respuesta != "false"){

  	    		swal({
				  title: "¡Usted ya adquirió este producto!",
				  text: "",
				  type: "warning",
				  showCancelButton: false,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Regresar",
				  closeOnConfirm: false
				})


      	    }else{

				if(tipo == "virtual"){

					agregarGratis = true;

				}else{

					var seleccionarDetalle = $(".seleccionarDetalle");

					for(var i = 0; i < seleccionarDetalle.length; i++){

						if($(seleccionarDetalle[i]).val() == ""){

								swal({
									  title: "Debe seleccionar Talla y Color",
									  text: "",
									  type: "warning",
									  showCancelButton: false,
									  confirmButtonColor: "#DD6B55",
									  confirmButtonText: "¡Seleccionar!",
									  closeOnConfirm: false
									})

						}else{

							titulo = titulo + "-" + $(seleccionarDetalle[i]).val();

							agregarGratis = true;

						}

					}		

				}

				if(agregarGratis){

					window.location = rutaOculta+"index.php?ruta=finalizar-compra&gratis=true&producto="+idProducto+"&titulo="+titulo;

				}
    	    
      	    }

      	}

	})
	

})

/*=============================================
CARRITO DE COMPRAS
=============================================*/

const CACHE_NAME = 'carrito-cache-v1';

// Función para inicializar el cache
async function initCache() {
    try {
        const cache = await caches.open(CACHE_NAME);
        return cache;
    } catch (error) {
        console.error('Error al inicializar el cache:', error);
        return null;
    }
}

// Función para guardar el carrito en cache
async function guardarCarritoEnCache(carrito) {
    try {
        const cache = await initCache();
        if (cache) {
            await cache.put('carrito', new Response(JSON.stringify(carrito)));
            actualizarMiniCarrito();
        }
    } catch (error) {
        console.error('Error al guardar en cache:', error);
    }
}

// Función para obtener el carrito del cache
async function obtenerCarritoDeCache() {
    try {
        const cache = await initCache();
        if (cache) {
            const response = await cache.match('carrito');
            if (response) {
                return await response.json();
            }
        }
        return [];
    } catch (error) {
        console.error('Error al obtener del cache:', error);
        return [];
    }
}

// Función para actualizar el mini carrito
async function actualizarMiniCarrito() {
    try {
        const carrito = await obtenerCarritoDeCache();
        const cantidadTotal = carrito.reduce((total, item) => total + item.cantidad, 0);
        const total = carrito.reduce((sum, item) => sum + (item.precio * item.cantidad), 0);
        
        $('.cantidadCesta').text(cantidadTotal);
        $('.sumaCesta').text(total.toFixed(2).replace('.', ','));
    } catch (error) {
        console.error('Error al actualizar mini carrito:', error);
    }
}

// Función para agregar producto al carrito
async function agregarAlCarrito(id, cantidad = 1, talla = null, color = null) {
    try {
        const carrito = await obtenerCarritoDeCache();
        const producto = await obtenerProducto(id);
        
        if (!producto) {
            throw new Error('Producto no encontrado');
        }

        const key = `${id}${talla ? '_' + talla : ''}${color ? '_' + color : ''}`;
        const itemExistente = carrito.find(item => item.key === key);

        if (itemExistente) {
            itemExistente.cantidad += cantidad;
        } else {
            carrito.push({
                key,
                id,
                cantidad,
                talla,
                color,
                precio: producto.precio,
                titulo: producto.titulo,
                imagen: producto.imagen,
                ruta: producto.ruta
            });
        }

        await guardarCarritoEnCache(carrito);
        return true;
    } catch (error) {
        console.error('Error al agregar al carrito:', error);
        return false;
    }
}

// Función para vaciar carrito
async function vaciarCarrito() {
    try {
        const cache = await initCache();
        if (cache) {
            await cache.delete('carrito');
            actualizarMiniCarrito();
        }
        return true;
    } catch (error) {
        console.error('Error al vaciar carrito:', error);
        return false;
    }
}

// Inicializar el carrito al cargar la página
document.addEventListener('DOMContentLoaded', async () => {
    await actualizarMiniCarrito();
});


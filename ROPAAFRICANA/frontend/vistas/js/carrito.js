// Función para agregar un producto al carrito
function agregarAlCarrito(idProducto, cantidad = 1, talla = null, color = null) {
    $.ajax({
        url: '/ROPAAFRICANA/frontend/services/CarritoService.php',
        method: 'POST',
        data: {
            action: 'agregarProducto',
            id: idProducto,
            cantidad: cantidad,
            talla: talla,
            color: color
        },
        success: function(response) {
            try {
                const data = JSON.parse(response);
                if (data.success) {
                    // Mostrar mensaje de éxito
                    Swal.fire({
                        icon: 'success',
                        title: '¡Producto agregado!',
                        text: 'El producto se ha agregado al carrito correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                    // Actualizar contador del carrito
                    actualizarContadorCarrito();
                } else {
                    // Mostrar mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Error al agregar el producto al carrito'
                    });
                }
            } catch (e) {
                console.error('Error al procesar la respuesta:', e);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al procesar la respuesta del servidor'
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la petición AJAX:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error al comunicarse con el servidor'
            });
        }
    });
}

// Función para actualizar el contador del carrito
function actualizarContadorCarrito() {
    $.ajax({
        url: rutaOculta + "frontend/ajax/carrito.ajax.php",
        method: "POST",
        data: {
            action: 'obtenerTotalProductos'
        },
        success: function(respuesta) {
            try {
                const data = JSON.parse(respuesta);
                if (data.success) {
                    // Actualizar el contador en la interfaz
                    $('.cantidadCesta').text(data.cantidad);
                }
            } catch (e) {
                console.error('Error al procesar la respuesta:', e);
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la petición AJAX:', error);
        }
    });
}

// Inicializar los botones del carrito
$(document).ready(function() {
    // Manejar clic en botones con clase fa-shopping-cart
    $(document).on('click', '.fa-shopping-cart', function(e) {
        e.preventDefault();
        
        // Obtener el ID del producto del botón o del elemento padre
        const $button = $(this).closest('button');
        const idProducto = $button.attr('idProducto');
        
        if (!idProducto) {
            console.error('No se encontró el ID del producto');
            return;
        }
        
        // Obtener talla y color si están disponibles
        const talla = $button.attr('talla') || null;
        const color = $button.attr('color') || null;
        
        // Agregar al carrito
        agregarAlCarrito(idProducto, 1, talla, color);
    });
    
    // Actualizar contador del carrito al cargar la página
    actualizarContadorCarrito();
}); 
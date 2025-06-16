/*=============================================
SUBIR LOGO
=============================================*/
var imagenLogo = null;

$(".logoFile").change(function(e){
    imagenLogo = e.target.files[0];
    
    if(imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png"){
        $(".logoFile").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
    
    if(imagenLogo["size"] > 2000000){
        $(".logoFile").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
    
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagenLogo);
    $(datosImagen).on("load", function(event){
        var rutaImagen = event.target.result;
        $(".previsualizarLogo").attr("src", rutaImagen);
    });
});

$("#guardarLogo").click(function(){
    if(imagenLogo == null){
        swal({
            title: "Error",
            text: "¡Por favor seleccione una imagen!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }

    var datos = new FormData();
    datos.append("logo", imagenLogo);
    
    $.ajax({
        url: "ajax/comercio.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            if(respuesta == "ok"){
                swal({
                    title: "¡El logo ha sido actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result){
                    if(result.value){
                        window.location = "index.php?ruta=comercio";
                    }
                });
            } else {
                swal({
                    title: "Error",
                    text: "¡Hubo un error al actualizar el logo!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }
        },
        error: function(){
            swal({
                title: "Error",
                text: "¡Hubo un error en la conexión!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });
        }
    });
});

/*=============================================
SUBIR ICONO
=============================================*/
var imagenIcono = null;

$(".iconoFile").change(function(e){
    imagenIcono = e.target.files[0];
    
    if(imagenIcono["type"] != "image/jpeg" && imagenIcono["type"] != "image/png"){
        $(".iconoFile").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
    
    if(imagenIcono["size"] > 2000000){
        $(".iconoFile").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }
    
    var datosImagen = new FileReader;
    datosImagen.readAsDataURL(imagenIcono);
    $(datosImagen).on("load", function(event){
        var rutaImagen = event.target.result;
        $(".previsualizarIcono").attr("src", rutaImagen);
    });
});

$("#guardarIcono").click(function(){
    if(imagenIcono == null){
        swal({
            title: "Error",
            text: "¡Por favor seleccione una imagen!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        return;
    }

    var datos = new FormData();
    datos.append("icono", imagenIcono);
    
    $.ajax({
        url: "ajax/comercio.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            if(respuesta == "ok"){
                swal({
                    title: "¡El icono ha sido actualizado!",
                    type: "success",
                    confirmButtonText: "¡Cerrar!"
                }).then(function(result){
                    if(result.value){
                        window.location = "index.php?ruta=comercio";
                    }
                });
            } else {
                swal({
                    title: "Error",
                    text: "¡Hubo un error al actualizar el icono!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
            }
        },
        error: function(){
            swal({
                title: "Error",
                text: "¡Hubo un error en la conexión!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });
        }
    });
});

/*=============================================
CAMBIAR COLOR
=============================================*/

$(".cambioColor").change(function () {


    var barraSuperior = $("#barraSuperior").val();

	var textoSuperior = $("#textoSuperior").val();

	var colorFondo = $("#colorFondo").val();

    var colorTexto = $("#colorTexto").val();

    $("#guardarColores").click(function () {


        var datos = new FormData();
        datos.append("barraSuperior", barraSuperior);
		datos.append("textoSuperior", textoSuperior);
		datos.append("colorFondo", colorFondo);
        datos.append("colorTexto", colorTexto);


        $.ajax({


            url:"ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal.fire({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}


			}


        })
        
    })
    
})

/*=============================================
CAMBIAR COLOR DE REDES SOCIALES
=============================================*/

$("input[name='colorRedSocial']").change(function(){

	var color = $(this).val();

	$(".redSocial").removeClass("text-primary text-info text-success text-warning text-danger text-muted text-white text-black");

	if(color == "color"){

		$(".fa-facebook").addClass("text-primary");
		$(".fa-twitter").addClass("text-info");
		$(".fa-instagram").addClass("text-success");
		$(".fa-youtube").addClass("text-danger");

	}else if(color == "blanco"){

		$(".redSocial").addClass("text-white");

	}else if(color == "negro"){

		$(".redSocial").addClass("text-black");

	}

})

/*=============================================
CAMBIAR URL DE REDES SOCIALES
=============================================*/

$(".cambiarUrlRed").change(function(){

	var red = $(this).parent().children("span").children("i").attr("red");
	var url = $(this).val();
	var estilo = $(this).parent().children("span").children("i").attr("estilo");

	$(this).parent().children("span").children("i").attr("ruta", url);

	var redSocial = JSON.parse($("#valorRedesSociales").val());

	for(var i = 0; i < redSocial.length; i++){

		if(redSocial[i]["red"] == red){

			redSocial[i]["url"] = url;
			redSocial[i]["estilo"] = estilo;

		}

	}

	$("#valorRedesSociales").val(JSON.stringify(redSocial));

})

/*=============================================
SELECCIONAR REDES SOCIALES
=============================================*/

$(".seleccionarRed").change(function(){

	var red = $(this).attr("red");
	var ruta = $(this).attr("ruta");
	var estilo = $(this).attr("estilo");
	var validarRed = $(this).attr("validarRed");

	var redSocial = JSON.parse($("#valorRedesSociales").val());

	if($(this).is(":checked")){

		for(var i = 0; i < redSocial.length; i++){

			if(redSocial[i]["red"] == red){

				redSocial[i]["activo"] = 1;

			}

		}

	}else{

		for(var i = 0; i < redSocial.length; i++){

			if(redSocial[i]["red"] == red){

				redSocial[i]["activo"] = 0;

			}

		}

	}

	$("#valorRedesSociales").val(JSON.stringify(redSocial));

})

/*=============================================
GUARDAR REDES SOCIALES
=============================================*/

$("#guardarRedesSociales").click(function(){

	var redesSociales = $("#valorRedesSociales").val();

	$.ajax({

		url:"ajax/comercio.ajax.php",
		method: "POST",
		data: {redesSociales: redesSociales},
		success: function(respuesta){

			if(respuesta == "ok"){

				swal.fire({
					title: "Cambios guardados",
					text: "¡Las redes sociales han sido actualizadas correctamente!",
					type: "success",
					confirmButtonText: "¡Cerrar!"
				});

			}

		}

	})

})

/*=============================================
CAMBIAR CÓDIGOS
=============================================*/

$(".cambioScript").change(function () {

	var apiFacebook = $("#apiFacebook").val();

	var pixelFacebook = $("#pixelFacebook").val();

	var googleAnalytics = $("#googleAnalytics").val();


	$("#guardarScript").click(function () {


		var datos = new FormData();

		datos.append("apiFacebook", apiFacebook);
		datos.append("pixelFacebook", pixelFacebook);
		datos.append("googleAnalytics", googleAnalytics);

		$.ajax({

			url:"ajax/comercio.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){
				
				if(respuesta == "ok"){

					swal.fire({
				      title: "Cambios guardados",
				      text: "¡La plantilla ha sido actualizada correctamente!",
				      type: "success",
				      confirmButtonText: "¡Cerrar!"
				    });
			
				}
				
			}

		})
		
	
	})

})

/*=============================================
SELECCIONAR PAIS
=============================================*/

$.ajax({
	url:"vistas/js/countries.json",
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

			if($("#codigoPais").val() == codPais){

				$("#paisSeleccionado").attr("value",codPais);
				$("#paisSeleccionado").html(pais);

			}

			$("#seleccionarPais").append('<option value="'+codPais+'">'+pais+'</option>');

		}

	}

})



/*=============================================
CAMBIAR INFORMACIÓN
=============================================*/

var impuesto = $("#impuesto").val();
var envioNacional = $("#envioNacional").val();
var envioInternacional = $("#envioInternacional").val();
var tasaMinimaNal = $("#tasaMinimaNal").val();
var tasaMinimaInt = $("#tasaMinimaInt").val();
var seleccionarPais = $("#codigoPais").val();
var clienteIdPaypal = $("#clienteIdPaypal").val();
var llaveSecretaPaypal = $("#llaveSecretaPaypal").val();
var merchantIdPayu = $("#merchantIdPayu").val();
var accountIdPayu = $("#accountIdPayu").val();
var apiKeyPayu = $("#apiKeyPayu").val();



/*=============================================
CAMBIAR MODO PAYPAL
=============================================*/
$("input[name='modoPaypal']").on("ifChecked",function(){

	var modoPaypal = $(this).val();
	var modoPayu = $("input[name='modoPayu']:checked").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);

	});

})


/*=============================================
CAMBIAR MODO PAYU
=============================================*/

$("input[name='modoPayu']").on("ifChecked",function(){

	var modoPayu = $(this).val();
	var modoPaypal = $("input[name='modoPaypal']:checked").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);

	});

})


/*=============================================
GUARDAR LA INFORMACION
=============================================*/

$(".cambioInformacion").change(function(){

	impuesto = $("#impuesto").val();

	envioNacional = $("#envioNacional").val();

	envioInternacional = $("#envioInternacional").val();

	tasaMinimaNal = $("#tasaMinimaNal").val();

	tasaMinimaInt = $("#tasaMinimaInt").val();

	seleccionarPais = $("#seleccionarPais").val();

	modoPaypal = $("input[name='modoPaypal']:checked").val();

	clienteIdPaypal = $("#clienteIdPaypal").val();

	llaveSecretaPaypal = $("#llaveSecretaPaypal").val();

	modoPayu = $("input[name='modoPayu']:checked").val();

	merchantIdPayu = $("#merchantIdPayu").val();

	accountIdPayu = $("#accountIdPayu").val();

	apiKeyPayu = $("#apiKeyPayu").val();

	$("#guardarInformacion").click(function(){

		cambiarInformacion(modoPaypal, modoPayu);
	
	})	

})


/*=============================================
// FUNCIÓN PARA CAMBIAR LA INFORMACIÓN
=============================================*/

function cambiarInformacion(modoPaypal, modoPayu){

	var datos = new FormData();
	datos.append("impuesto", impuesto);
	datos.append("envioNacional", envioNacional);
	datos.append("envioInternacional", envioInternacional);
	datos.append("tasaMinimaNal", tasaMinimaNal);
	datos.append("tasaMinimaInt", tasaMinimaInt);
	datos.append("seleccionarPais", seleccionarPais);
	datos.append("modoPaypal", modoPaypal);	
	datos.append("clienteIdPaypal", clienteIdPaypal);
	datos.append("llaveSecretaPaypal", llaveSecretaPaypal);
	datos.append("modoPayu", modoPayu);	
	datos.append("merchantIdPayu", merchantIdPayu);
	datos.append("accountIdPayu", accountIdPayu);
	datos.append("apiKeyPayu", apiKeyPayu);

	$.ajax({

		url:"ajax/comercio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
			if(respuesta == "ok"){

				swal({
			      title: "Cambios guardados",
			      text: "¡El comercio ha sido actualizado correctamente!",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
			    });
			
			}
							
		}

	})

}









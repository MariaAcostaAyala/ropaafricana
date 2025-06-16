<?php
// Cargar el bootstrap de la aplicación
require_once __DIR__ . "/../../../app/bootstrap.php";
require_once __DIR__ . "/../../../app/Ruta.php";

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}

/*=============================================
API DE GOOGLE
=============================================*/

// https://console.developers.google.com/apis
// https://github.com/google/google-api-php-client

/*=============================================
CREAR EL OBJETO DE LA API GOOGLE
=============================================*/

$cliente = new Google_Client();
$cliente->setAuthConfig('modelos/client_secret.json');
$cliente->setAccessType("offline");
$cliente->setScopes(['profile','email']);

/*=============================================
RUTA PARA EL LOGIN DE GOOGLE
=============================================*/

$rutaGoogle = $cliente->createAuthUrl();

/*=============================================
RECIBIMOS LA VARIABLE GET DE GOOGLE LLAMADA CODE
=============================================*/

if(isset($_GET["code"])){

	$token = $cliente->authenticate($_GET["code"]);

	$_SESSION['id_token_google'] = $token;

	$cliente->setAccessToken($token);

}

/*=============================================
RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
=============================================*/

if($cliente->getAccessToken()){

 	$item = $cliente->verifyIdToken();

 	$datos = array("nombre"=>$item["name"],
				   "email"=>$item["email"],
				   "foto"=>$item["picture"],
				   "password"=>"null",
				   "modo"=>"google",
				   "verificacion"=>0,
				   "emailEncriptado"=>"null");

 	$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

 	echo '<script>
		
	setTimeout(function(){

		window.location = localStorage.getItem("rutaActual");

	},1000);

 	</script>';

}

?>

<!--=====================================
TOP
======================================-->

<div class="container-fluid barraSuperior" id="top">

    <div class="container">

        <div class="row">

            <!--=====================================
			SOCIAL
			======================================-->

            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">

                <ul>

                    <?php

					$controladorPlantilla = new ControladorPlantilla();
					$social = $controladorPlantilla->ctrEstiloPlantilla();

					if($social != null && $social["redesSociales"] != null){
						$jsonRedesSociales = json_decode($social["redesSociales"],true);		

						if($jsonRedesSociales != null){
							foreach ($jsonRedesSociales as $key => $value) {
								echo '<li>
										<a href="'.$value["url"].'" target="_blank">
											<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
										</a>
									</li>';
							}
						}
					}

					?>

                </ul>

            </div>

            <!--=====================================
			REGISTRO
			======================================-->

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">

                <ul>

                    <?php

				if(isset($_SESSION["validarSesion"])){

					if($_SESSION["validarSesion"] == "ok"){

						if($_SESSION["modo"] == "directo"){

							if($_SESSION["foto"] != ""){

								echo '<li>

										<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">

									 </li>';

							}else{

								echo '<li>

									<img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">

								</li>';

							}

							echo '<li>|</li>
							 <li><a href="'.$url.'perfil">Ver Perfil</a></li>
							 <li>|</li>
							 <li><a href="'.$url.'salir">Salir</a></li>';


						}

						if($_SESSION["modo"] == "facebook"){

							echo '<li>

									<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">

								   </li>
								   <li>|</li>
						 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
						 		   <li>|</li>
						 		   <li><a href="'.$url.'salir" class="salir">Salir</a></li>';

						}

						if($_SESSION["modo"] == "google"){

							echo '<li>

									<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">

								   </li>
								   <li>|</li>
						 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
						 		   <li>|</li>
						 		   <li><a href="'.$url.'salir">Salir</a></li>';

						}

					}

				}else{

					echo '<li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
						  <li>|</li>
						  <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>
						  <li>|</li>
						  <li><a href="http://localhost/ROPAAFRICANA/backend" target="_blank">Admin</a></li>';

				}

				?>

                </ul>

            </div>

        </div>

    </div>

</div>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid">

    <div class="container">

        <div class="row" id="cabezote">

            <!--=====================================
			LOGOTIPO
			======================================-->

            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">

                <a href="<?php echo $url; ?>">

                    <img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive">

                </a>

            </div>

            <!--=====================================
			BLOQUE CATEGORÍAS Y BUSCADOR
			======================================-->

            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">

                <!--=====================================
				BOTÓN CATEGORÍAS
				======================================-->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">

                    <p>CATEGORÍAS

                        <span class="pull-right">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>

                    </p>

                </div>

                <!--=====================================
				BUSCADOR
				======================================-->

                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">

                    <input type="search" name="buscar" class="form-control" placeholder="Buscar...">

                    <span class="input-group-btn">

                        <a href="<?php echo $url; ?>buscador/1/recientes">

                            <button class="btn btn-default backColor" type="submit">

                                <i class="fa fa-search"></i>

                            </button>

                        </a>

                    </span>

                </div>

            </div>

            <!--=====================================
			CARRITO DE COMPRAS
			======================================-->

            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
                <?php
                require_once __DIR__ . '/../../services/ProductoService.php';
                require_once __DIR__ . '/../../services/CarritoService.php';
                $carritoService = new CarritoService();
                $cantidadTotal = $carritoService->obtenerTotalProductos();
                $total = $carritoService->calcularTotal();
                ?>
                <a href="<?php echo $url;?>carrito-de-compras">
                    <button class="btn btn-default pull-left backColor">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                </a>
                <p>TU CESTA <span class="cantidadCesta"><?php echo $cantidadTotal; ?></span> <br> EUR € <span class="sumaCesta"><?php echo number_format($total, 2, ',', '.'); ?></span></p>
            </div>

        </div>

        <!--=====================================
		CATEGORÍAS
		======================================-->

        <div class="col-xs-12 backColor" id="categorias">

            <?php

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {

					echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							
							<h4>
								<a href="'.$url.$value["ruta"].'" class="pixelCategorias" titulo="'.$value["categoria"].'">'.$value["categoria"].'</a>
							</h4>
							
							<hr>

							<ul>';

							$item = "id_categoria";

							$valor = $value["id"];

							$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
							
							foreach ($subcategorias as $key => $value) {
									
									echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias" titulo="'.$value["subcategoria"].'">'.$value["subcategoria"].'</a></li>';
								}	
								
							echo '</ul>

						</div>';
				}

			?>

        </div>

    </div>

</header>

<!--=====================================
VENTANA MODAL PARA EL REGISTRO
======================================-->

<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

            <h3 class="backColor">REGISTRARSE</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!--=====================================
			REGISTRO DIRECTO
			======================================-->

            <form method="post" action="">

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-user"></i>

                        </span>

                        <input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario"
                            placeholder="Nombre Completo" required>

                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-envelope"></i>

                        </span>

                        <input type="email" class="form-control" id="regEmail" name="regEmail"
                            placeholder="Correo Electrónico" required>

                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-lock"></i>

                        </span>

                        <input type="password" class="form-control" id="regPassword" name="regPassword"
                            placeholder="Contraseña" required>

                    </div>

                </div>

                <div class="checkBox">

                    <label style="color: #333;">

                        <input id="regPoliticas" type="checkbox">

                        <small style="color: #333;">

                            Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad

                            <br>

                            <a href="<?php echo $url; ?>politica-privacidad" target="_blank" style="color: #2c3e50; text-decoration: underline;">Leer más</a>

                        </small>

                    </label>

                </div>

                <?php
                    $registro = new ControladorUsuarios();
                    $registro -> ctrRegistroUsuario();
                ?>

                <button type="submit" class="btn btn-default backColor btn-block">REGISTRARSE</button>

            </form>

        </div>

        <div class="modal-footer">

            ¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal"
                    data-toggle="modal">Ingresar</a></strong>

        </div>

    </div>

</div>

<!--=====================================
VENTANA MODAL PARA EL INGRESO
======================================-->

<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

            <h3 class="backColor">Login</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!--=====================================
			INGRESO DIRECTO
			======================================-->

            <form method="post">

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-envelope"></i>

                        </span>

                        <input type="email" class="form-control" id="ingEmail" name="ingEmail"
                            placeholder="Correo Electrónico" required>

                    </div>

                </div>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-lock"></i>

                        </span>

                        <input type="password" class="form-control" id="ingPassword" name="ingPassword"
                            placeholder="Contraseña" required>

                    </div>

                </div>



                <?php

					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuario();

				?>

                <button type="submit" class="btn btn-default backColor btn-block">Identificarme</button>

                <br>

                <center>

                    <a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

                </center>

            </form>

        </div>

        <div class="modal-footer">

            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal"
                    data-toggle="modal">Registrarse</a></strong>

        </div>

    </div>

</div>


<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

            <h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

            <form method="post">

                <label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos
                    una nueva contraseña:</label>

                <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon">

                            <i class="glyphicon glyphicon-envelope"></i>

                        </span>

                        <input type="email" class="form-control" id="passEmail" name="passEmail"
                            placeholder="Correo Electrónico" required>

                    </div>

                </div>

                <?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword();

				?>

                <input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

            </form>

        </div>

        <div class="modal-footer">

            ¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal"
                    data-toggle="modal">Registrarse</a></strong>

        </div>

    </div>

</div>
<?php

/*=============================================
CREADOR DE IP
=============================================*/

// Obtener la IP real del visitante
$ip = $_SERVER['REMOTE_ADDR'];

// Obtener información del país
$informacionPais = @file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

if($informacionPais === false) {
    $pais = "Unknown";
} else {
    $datosPais = json_decode($informacionPais);
    $pais = $datosPais->geoplugin_countryName ?? "Unknown";
}

$enviarIp = ControladorVisitas::ctrEnviarIp($ip, $pais);

$totalVisitas = ControladorVisitas::ctrMostrarTotalVisitas();

?>

<!--=====================================
BREADCRUMB VISITAS
======================================-->
<div class="container-fluid well well-sm">

	<div class="container">
	
		<div class="row">

			<ul class="breadcrumb lead">

			<h2 class="pull-right"><small>Eres nuestro visitante # <?php echo number_format($totalVisitas["total"] ?? 0); ?></small></h2>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
MÓDULO VISITAS
======================================-->

<div class="container-fluid">
	
	<div class="container">
		
		<div class="row">

		</div>

	</div>

</div>
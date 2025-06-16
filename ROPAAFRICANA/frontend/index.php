<?php
// Cargar el bootstrap de la aplicación
require_once __DIR__ . '/../app/bootstrap.php';

// Cargar controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/carrito.controlador.php";
require_once "controladores/visitas.controlador.php";

// Cargar modelos
require_once "modelos/plantilla.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/slide.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/carrito.modelo.php";
require_once "modelos/visitas.modelo.php";

// Cargar extensiones
require_once "extensiones/PHPMailer/PHPMailerAutoload.php";
require_once "extensiones/vendor/autoload.php";

if(isset($_GET["ruta"])){
    $rutas = explode("/", $_GET["ruta"]);
    if($rutas[0] == "initialize"){
        include "vistas/plantilla_init.php";
        exit();
    }else if($rutas[0] == "verificar-registros"){
        include "controladores/verificar-registros.controlador.php";
        ControladorVerificarRegistros::ctrVerificarRegistros();
    }else if($rutas[0] == "carrito-de-compras"){
        $carrito = new ControladorCarrito();
        $carrito->ctrMostrarCarrito();
    }else{
        $plantilla = new ControladorPlantilla();
        $plantilla -> plantilla();
    }
} else {
    // Si no hay ruta especificada, mostrar la plantilla principal
    $plantilla = new ControladorPlantilla();
    $plantilla -> plantilla();
}
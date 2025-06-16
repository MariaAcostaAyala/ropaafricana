<?php
// Cargar el bootstrap de la aplicación
require_once __DIR__ . '/../app/bootstrap.php';

// Cargar controladores
require_once __DIR__ . "/controladores/plantilla.controlador.php";
require_once __DIR__ . "/controladores/productos.controlador.php";
require_once __DIR__ . "/controladores/slide.controlador.php";
require_once __DIR__ . "/controladores/usuarios.controlador.php";
require_once __DIR__ . "/controladores/ventas.controlador.php";
require_once __DIR__ . "/controladores/visitas.controlador.php";

// Cargar modelos
require_once __DIR__ . "/modelos/plantilla.modelo.php";
require_once __DIR__ . "/modelos/productos.modelo.php";
require_once __DIR__ . "/modelos/slide.modelo.php";
require_once __DIR__ . "/modelos/usuarios.modelo.php";
require_once __DIR__ . "/modelos/ventas.modelo.php";
require_once __DIR__ . "/modelos/visitas.modelo.php";

if(isset($_GET["ruta"])){
    $rutas = explode("/", $_GET["ruta"]);
    if($rutas[0] == "salir"){
        $plantilla = new ControladorPlantilla();
        $plantilla -> ctrPlantilla();
    }else{
        $plantilla = new ControladorPlantilla();
        $plantilla -> ctrPlantilla();
    }
} else {
    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrPlantilla();
}
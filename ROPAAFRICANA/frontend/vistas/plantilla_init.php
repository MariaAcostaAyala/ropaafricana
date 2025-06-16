<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicializar Sistema</title>
    <link rel="stylesheet" href="vistas/css/plugins/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn {
            margin: 10px;
            padding: 10px 20px;
        }
        #resultadoInitialize {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_GET["ruta"])){
        $rutas = explode("/", $_GET["ruta"]);
        if($rutas[0] == "initialize"){
            include "modulos/initialize.php";
        }
    }
    ?>

    <?php
    if(!defined('JQUERY_LOADED')) {
        echo '<script src="vistas/js/plugins/jquery.min.js"></script>';
        define('JQUERY_LOADED', true);
    }
    ?>

    <script src="vistas/js/plugins/bootstrap.min.js"></script>
</body>
</html> 
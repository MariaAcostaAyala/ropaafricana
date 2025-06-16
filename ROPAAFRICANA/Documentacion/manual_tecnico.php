<?php
// Incluir verificación de sesión
require_once "verificar_sesion.php";

// Incluir configuración
$config = require "../app/config/app.php";
$nombreTienda = $config['company']['name'];

// Definir la ruta base
$baseUrl = "http://localhost/ROPAAFRICANA/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manual Técnico - <?php echo $nombreTienda; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/documentacion.css">
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="../backend/inicio"><i class="fas fa-arrow-left"></i> Volver al Panel de Administración</a>
            <a href="<?php echo $baseUrl; ?>documentacion/"><i class="fas fa-book"></i> Documentación Principal</a>
        </div>
        
        <header>
            <h1>Manual Técnico</h1>
        </header>

        <main>
            <div class="section">
                <h2>Arquitectura del Sistema</h2>
                <div class="data-grid">
                    <div class="data-card">
                        <h3>Frontend</h3>
                        <ul class="data-list">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>JavaScript/jQuery</li>
                            <li>Bootstrap</li>
                        </ul>
                    </div>
                    <div class="data-card">
                        <h3>Backend</h3>
                        <ul class="data-list">
                            <li>PHP</li>
                            <li>MySQL</li>
                            <li>MVC</li>
                            <li>AJAX</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section">
                <h2>Estructura de Directorios</h2>
                <pre>
/ROPAAFRICANA
├── app/
│   ├── config/
│   ├── controllers/
│   ├── models/
│   └── views/
├── public/
│   ├── css/
│   ├── js/
│   └── img/
└── vendor/
                </pre>
            </div>

            <div class="section">
                <h2>Base de Datos</h2>
                <p>El sistema utiliza MySQL como gestor de base de datos. Las principales tablas son:</p>
                <ul class="data-list">
                    <li>usuarios</li>
                    <li>productos</li>
                    <li>categorias</li>
                    <li>pedidos</li>
                    <li>detalles_pedido</li>
                </ul>
            </div>

            <div class="section">
                <h2>APIs y Servicios</h2>
                <ul class="data-list">
                    <li>PayPal para pagos</li>
                    <li>PayU para pagos alternativos</li>
                    <li>API de conversión de divisas</li>
                </ul>
            </div>

            <div class="section">
                <h2>Seguridad</h2>
                <ul class="data-list">
                    <li>Autenticación de usuarios</li>
                    <li>Encriptación de datos sensibles</li>
                    <li>Validación de formularios</li>
                    <li>Protección contra SQL Injection</li>
                </ul>
            </div>
        </main>
    </div>
</body>
</html> 
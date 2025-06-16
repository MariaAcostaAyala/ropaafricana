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
    <title>Manual de Usuario - <?php echo $nombreTienda; ?></title>
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
            <h1>Manual de Usuario</h1>
        </header>

        <main>
            <div class="section">
                <p>Bienvenido al manual de usuario. Aquí encontrarás información útil para navegar y utilizar la plataforma.</p>
            </div>

            <div class="section">
                <h2>Navegación</h2>
                <p>Utiliza los enlaces de navegación para acceder a diferentes secciones del manual.</p>
            </div>

            <div class="section">
                <h2>Configuración</h2>
                <p>Configura tu cuenta y personaliza tu experiencia.</p>
            </div>

            <div class="section">
                <h2>Productos</h2>
                <p>Explora y gestiona tus productos.</p>
            </div>

            <div class="section">
                <h2>Pedidos</h2>
                <p>Administra y gestiona tus pedidos.</p>
            </div>

            <div class="section">
                <h2>Clientes</h2>
                <p>Gestiona y gestiona a tus clientes.</p>
            </div>

            <div class="section">
                <h2>Ventas</h2>
                <p>Analiza y gestiona tus ventas.</p>
            </div>

            <div class="section">
                <h2>Inventario</h2>
                <p>Administra y gestiona tu inventario.</p>
            </div>

            <div class="section">
                <h2>Configuraciones</h2>
                <p>Configura la plataforma y personaliza tu tienda.</p>
            </div>
        </main>
    </div>
</body>
</html> 
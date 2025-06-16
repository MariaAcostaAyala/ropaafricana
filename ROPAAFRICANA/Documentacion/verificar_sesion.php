<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION["validarSesionBackend"]) || $_SESSION["validarSesionBackend"] != "ok") {
    // Si no está autenticado, redirigir al login del backend
    header("Location: ../backend/");
    exit();
}
?> 
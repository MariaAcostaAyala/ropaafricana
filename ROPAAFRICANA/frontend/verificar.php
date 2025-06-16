<?php

require_once "modelos/conexion.php";

try {
    // Intentar conectar a la base de datos
    $conexion = Conexion::conectar();
    echo "✅ Conexión exitosa a la base de datos<br>";

    // Verificar si la tabla plantilla existe
    $stmt = $conexion->query("SHOW TABLES LIKE 'plantilla'");
    if($stmt->rowCount() > 0) {
        echo "✅ La tabla 'plantilla' existe<br>";
        
        // Verificar las columnas de la tabla
        $stmt = $conexion->query("DESCRIBE plantilla");
        echo "Columnas en la tabla 'plantilla':<br>";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- " . $row['Field'] . "<br>";
        }
        
        // Verificar si hay datos en la tabla
        $stmt = $conexion->query("SELECT * FROM plantilla");
        if($stmt->rowCount() > 0) {
            echo "✅ La tabla tiene datos<br>";
            $datos = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Datos de ejemplo:<br>";
            print_r($datos);
        } else {
            echo "❌ La tabla está vacía<br>";
        }
    } else {
        echo "❌ La tabla 'plantilla' no existe<br>";
    }

} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
    
    // Verificar si la base de datos existe
    try {
        $conexion = new PDO("mysql:host=localhost", "root", "H7vICR)7kcijqVmw");
        $stmt = $conexion->query("SHOW DATABASES LIKE 'ecomerce'");
        if($stmt->rowCount() > 0) {
            echo "✅ La base de datos 'ecomerce' existe<br>";
        } else {
            echo "❌ La base de datos 'ecomerce' no existe<br>";
        }
    } catch(PDOException $e) {
        echo "❌ Error al verificar la base de datos: " . $e->getMessage() . "<br>";
    }
} 
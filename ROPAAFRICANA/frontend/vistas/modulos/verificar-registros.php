<?php
// Incluir archivo de conexión
require_once __DIR__ . '/../../modelos/conexion.php';

// Establecer conexión
$conexion = Conexion::conectar();

// Leer el archivo ecomerce.sql
$rutaArchivo = __DIR__ . '/../../../Initialize/ecomerce.sql';

if (!file_exists($rutaArchivo)) {
    echo "Error: No se encontró el archivo ecomerce.sql en la ruta: " . $rutaArchivo;
} else {
    $contenidoSQL = file_get_contents($rutaArchivo);
    
    // Extraer las sentencias INSERT y contar registros por tabla
    $tablas = [
        'administradores' => 0,
        'banner' => 0,
        'cabeceras' => 0,
        'categorias' => 0,
        'comercio' => 0,
        'comentarios' => 0,
        'compras' => 0,
        'deseos' => 0,
        'plantilla' => 0,
        'productos' => 0,
        'slide' => 0,
        'subcategorias' => 0,
        'usuarios' => 0,
        'visitaspaises' => 0,
        'visitaspersonas' => 0
    ];
    
    // Contar registros en el archivo SQL
    foreach ($tablas as $tabla => $count) {
        $pattern = "/INSERT\s+INTO\s+`?$tabla`?\s*\(/i";
        $tablas[$tabla] = preg_match_all($pattern, $contenidoSQL);
    }
    
    // Mostrar la tabla de verificación
    echo '<div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>Registros Esperados</th>
                        <th>Registros Actuales</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>';
    
    foreach ($tablas as $tabla => $esperados) {
        try {
            $actuales = $conexion->query("SELECT COUNT(*) FROM `$tabla`")->fetchColumn();
            $estado = $actuales == $esperados ? 'Correcto' : 'Incorrecto';
            $clase = $estado == 'Correcto' ? 'success' : 'danger';
            
            echo "<tr class='$clase'>
                    <td>$tabla</td>
                    <td>$esperados</td>
                    <td>$actuales</td>
                    <td>$estado</td>
                  </tr>";
        } catch (PDOException $e) {
            echo "<tr class='danger'>
                    <td>$tabla</td>
                    <td>$esperados</td>
                    <td>Error</td>
                    <td>Error: " . $e->getMessage() . "</td>
                  </tr>";
        }
    }
    
    echo '</tbody></table></div>';
}
?>

<style>
.table-responsive {
    margin-top: 20px;
}
.label {
    font-size: 12px;
    padding: 5px 10px;
}
</style> 
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $respuesta = '';
    
    // Incluir archivo de conexión
    require_once "../modelos/conexion.php";
    
    try {
        $conexion = Conexion::conectar();
        
        function ejecutarSQL($conexion, $sentencias) {
            $errores = [];
            foreach ($sentencias as $sentencia) {
                if ($sentencia !== '') {
                    try {
                        $conexion->exec($sentencia);
                    } catch (PDOException $e) {
                        $errores[] = $e->getMessage();
                    }
                }
            }
            if (count($errores) > 0) {
                return 'Errores al ejecutar SQL: <br>' . implode('<br>', $errores);
            }
            return 'Operación realizada correctamente.';
        }

        if ($accion === 'inicializar') {
            // Obtener todas las tablas de la base de datos
            $tablas = $conexion->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
            
            // Desactivar verificación de claves foráneas
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 0");
            
            // Eliminar todas las tablas
            $sentencias = [];
            foreach ($tablas as $tabla) {
                $sentencias[] = "DROP TABLE IF EXISTS `$tabla`";
            }
            
            $respuesta = ejecutarSQL($conexion, $sentencias);
            
            // Reactivar verificación de claves foráneas
            $conexion->exec("SET FOREIGN_KEY_CHECKS = 1");
            
        } elseif ($accion === 'crear_tablas') {
            // Sentencias SQL para crear las tablas
            $sentencias = [
                "CREATE TABLE `administradores` (
                    `id` int(11) NOT NULL,
                    `nombre` text COLLATE utf8_spanish_ci NOT NULL,
                    `email` text COLLATE utf8_spanish_ci NOT NULL,
                    `foto` text COLLATE utf8_spanish_ci NOT NULL,
                    `password` text COLLATE utf8_spanish_ci NOT NULL,
                    `perfil` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `banner` (
                    `id` int(11) NOT NULL,
                    `ruta` text COLLATE utf8_spanish_ci NOT NULL,
                    `img` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
                    `estilo` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `cabeceras` (
                    `id` int(11) NOT NULL,
                    `ruta` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo` text COLLATE utf8_spanish_ci NOT NULL,
                    `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
                    `palabrasClaves` text COLLATE utf8_spanish_ci NOT NULL,
                    `portada` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `categorias` (
                    `id` int(11) NOT NULL,
                    `categoria` text COLLATE utf8_spanish_ci NOT NULL,
                    `ruta` text COLLATE utf8_spanish_ci NOT NULL,
                    `oferta` int(11) NOT NULL,
                    `precioOferta` float NOT NULL,
                    `descuentoOferta` int(11) NOT NULL,
                    `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
                    `finOferta` datetime NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `comercio` (
                    `id` int(11) NOT NULL,
                    `impuesto` float NOT NULL,
                    `envioNacional` float NOT NULL,
                    `envioInternacional` float NOT NULL,
                    `tasaMinimaNal` float NOT NULL,
                    `tasaMinimaInt` float NOT NULL,
                    `pais` text COLLATE utf8_spanish_ci NOT NULL,
                    `modoPaypal` text COLLATE utf8_spanish_ci NOT NULL,
                    `clienteIdPaypal` text COLLATE utf8_spanish_ci NOT NULL,
                    `llaveSecretaPaypal` text COLLATE utf8_spanish_ci NOT NULL,
                    `modoPayu` text COLLATE utf8_spanish_ci NOT NULL,
                    `merchantIdPayu` int(11) NOT NULL,
                    `accountIdPayu` int(11) NOT NULL,
                    `apiKeyPayu` text COLLATE utf8_spanish_ci NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `comentarios` (
                    `id` int(11) NOT NULL,
                    `id_usuario` int(11) NOT NULL,
                    `id_producto` int(11) NOT NULL,
                    `calificacion` float NOT NULL,
                    `comentario` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `compras` (
                    `id` int(11) NOT NULL,
                    `id_usuario` int(11) NOT NULL,
                    `id_producto` int(11) NOT NULL,
                    `envio` int(11) NOT NULL,
                    `metodo` text COLLATE utf8_spanish_ci NOT NULL,
                    `email` text COLLATE utf8_spanish_ci NOT NULL,
                    `direccion` text COLLATE utf8_spanish_ci NOT NULL,
                    `pais` text COLLATE utf8_spanish_ci NOT NULL,
                    `cantidad` int(11) NOT NULL,
                    `detalle` text COLLATE utf8_spanish_ci DEFAULT NULL,
                    `pago` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `deseos` (
                    `id` int(11) NOT NULL,
                    `id_usuario` int(11) NOT NULL,
                    `id_producto` int(11) NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `plantilla` (
                    `id` int(11) NOT NULL,
                    `barraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
                    `textoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
                    `colorFondo` text COLLATE utf8_spanish_ci NOT NULL,
                    `colorTexto` text COLLATE utf8_spanish_ci NOT NULL,
                    `logo` text COLLATE utf8_spanish_ci NOT NULL,
                    `icono` text COLLATE utf8_spanish_ci NOT NULL,
                    `redesSociales` text COLLATE utf8_spanish_ci NOT NULL,
                    `apiFacebook` text COLLATE utf8_spanish_ci NOT NULL,
                    `pixelFacebook` text COLLATE utf8_spanish_ci NOT NULL,
                    `googleAnalytics` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `productos` (
                    `id` int(11) NOT NULL,
                    `id_categoria` int(11) NOT NULL,
                    `id_subcategoria` int(11) NOT NULL,
                    `tipo` text COLLATE utf8_spanish_ci NOT NULL,
                    `ruta` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo` text COLLATE utf8_spanish_ci NOT NULL,
                    `titular` text COLLATE utf8_spanish_ci NOT NULL,
                    `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
                    `multimedia` text COLLATE utf8_spanish_ci NOT NULL,
                    `detalles` text COLLATE utf8_spanish_ci NOT NULL,
                    `precio` float NOT NULL,
                    `portada` text COLLATE utf8_spanish_ci NOT NULL,
                    `vistas` int(11) NOT NULL,
                    `ventas` int(11) NOT NULL,
                    `vistasGratis` int(11) NOT NULL,
                    `ventasGratis` int(11) NOT NULL,
                    `oferta` int(11) NOT NULL,
                    `precioOferta` float NOT NULL,
                    `descuentoOferta` int(11) NOT NULL,
                    `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
                    `finOferta` datetime NOT NULL,
                    `nuevo` int(11) NOT NULL,
                    `peso` float NOT NULL,
                    `entrega` float NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `slide` (
                    `id` int(11) NOT NULL,
                    `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
                    `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
                    `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
                    `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
                    `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
                    `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
                    `boton` text COLLATE utf8_spanish_ci NOT NULL,
                    `url` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `subcategorias` (
                    `id` int(11) NOT NULL,
                    `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
                    `id_categoria` int(11) NOT NULL,
                    `ruta` text COLLATE utf8_spanish_ci NOT NULL,
                    `estado` int(11) NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `usuarios` (
                    `id` int(11) NOT NULL,
                    `nombre` text COLLATE utf8_spanish_ci NOT NULL,
                    `password` text COLLATE utf8_spanish_ci NOT NULL,
                    `email` text COLLATE utf8_spanish_ci NOT NULL,
                    `foto` text COLLATE utf8_spanish_ci NOT NULL,
                    `modo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
                    `verificacion` int(11) NOT NULL,
                    `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `visitaspaises` (
                    `id` int(11) NOT NULL,
                    `pais` text COLLATE utf8_spanish_ci NOT NULL,
                    `cantidad` int(11) NOT NULL,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;",

                "CREATE TABLE `visitaspersonas` (
                    `id` int(11) NOT NULL,
                    `ip` text COLLATE utf8_spanish_ci NOT NULL,
                    `pais` text COLLATE utf8_spanish_ci NOT NULL,
                    `visitas` int(11) NOT NULL DEFAULT 1,
                    `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;"
            ];
            
            // Agregar las claves primarias y AUTO_INCREMENT
            $sentencias[] = "ALTER TABLE `administradores` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `banner` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `cabeceras` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `categorias` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `comercio` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `comentarios` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `compras` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `deseos` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `plantilla` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `productos` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `slide` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `subcategorias` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `usuarios` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `visitaspaises` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            $sentencias[] = "ALTER TABLE `visitaspersonas` ADD PRIMARY KEY (`id`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
            
            $respuesta = ejecutarSQL($conexion, $sentencias);
            
        } elseif ($accion === 'rellenar_datos') {
            $sqlFile = __DIR__ . '/../../Initialize/backup.sql';
            
            if (!file_exists($sqlFile)) {
                $respuesta = 'Error: No se encuentra el archivo ecomerce.sql';
            } else {
                try {
                    // Obtener la configuración de la base de datos
                    $config = require __DIR__ . '/../../app/config/database.php';
                    $dbname = $config['database'];
                    $username = $config['username'];
                    $password = $config['password'];
                    $host = $config['host'];
                    
                    // Ruta al ejecutable mysql de XAMPP
                    $mysqlPath = 'C:\\xampp\\mysql\\bin\\mysql.exe';
                    
                    if (!file_exists($mysqlPath)) {
                        throw new Exception('No se encuentra el ejecutable de MySQL en XAMPP');
                    }
                    
                    // Construir el comando mysql
                    $command = sprintf(
                        '"%s" -h %s -u %s -p%s %s < %s',
                        $mysqlPath,
                        escapeshellarg($host),
                        escapeshellarg($username),
                        escapeshellarg($password),
                        escapeshellarg($dbname),
                        escapeshellarg($sqlFile)
                    );
                    
                    // Ejecutar el comando
                    exec($command . ' 2>&1', $output, $return_var);
                    
                    if ($return_var === 0) {
                        $respuesta = 'Datos cargados correctamente.';
                    } else {
                        $respuesta = 'Errores al ejecutar SQL:<br>' . implode('<br>', $output);
                    }
                } catch (Exception $e) {
                    $respuesta = 'Error: ' . $e->getMessage();
                }
            }
        } else {
            $respuesta = 'Acción no reconocida.';
        }
        
        echo $respuesta;
        
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
    }
} else {
    echo 'Acceso no permitido.';
} 
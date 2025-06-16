<?php
// Cargar el bootstrap de la aplicación
require_once __DIR__ . '/../../../../app/bootstrap.php';

// Inicializar la configuración
Configuracion::ctrConfiguracion();
?>
<!--=====================================
USUARIOS
======================================-->

<!-- user-menu -->
<li class="dropdown user user-menu">

    <!-- dropdown-toggle -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

        <img src="vistas/dist/img/user-default.jpg" class="user-image" alt="User Image">

        <span class="hidden-xs"><?php echo Configuracion::$email['nombre_remitente']; ?></span>

    </a>
    <!-- dropdown-toggle -->

    <!-- dropdown-menu -->
    <ul class="dropdown-menu">

        <li class="user-header">

            <img src="vistas/dist/img/user-default.jpg" class="img-circle" alt="User Image">

            <p>
                <?php echo Configuracion::$email['nombre_remitente']; ?>
            </p>

        </li>

        <li class="user-footer">

            <div class="pull-left">

                <a href="perfil" class="btn btn-default btn-flat">Perfil</a>

            </div>

            <div class="pull-right">

                <a href="index.php?ruta=salir" class="btn btn-default btn-flat">Salir</a>

            </div>
        </li>

    </ul>
    <!-- dropdown-menu -->

</li>
<!-- user-menu -->
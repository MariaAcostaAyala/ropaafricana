    <?php 

    $ventas = ControladorVentas::ctrMostrarTotalVentas();

    $visitas = ControladorVisitas::ctrMostrarTotalVisitas();

    $usuarios = ControladorUsuarios::ctrMostrarTotalUsuarios("id");

    $totalUsuarios = count($usuarios);


    $productos = ControladorProductos::ctrMostrarTotalProductos("id");

    $totalProductos = count($productos);


    
    
    
    ?>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">

                <h3>EUR <?php echo number_format($ventas["total"] ?? 0, 2); ?></h3>

                <p>ventas</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">

                <h3><?php echo number_format($visitas["total"] ?? 0); ?></h3>

                <p>visitas</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">mas info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo number_format($totalUsuarios ?? 0); ?></h3>

                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">mas info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo number_format($totalProductos ?? 0); ?></h3>

                <p>productos</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
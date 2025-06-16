<?php
require_once __DIR__ . "/../../controladores/administradores.controlador.php";
require_once __DIR__ . "/../../modelos/administradores.modelo.php";
?>
<style>
.login-page {
    background: url('vistas/img/backend/admin.jpg') no-repeat center center fixed;
    background-size: cover;
}
.login-box {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 5px;
    padding: 20px;
}
</style>
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Ropa Africana</b> Administración</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">iniciar session</p>

        <form  method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="ingEmail">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="ingPassword">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">logearme</button>
                </div>
                <!-- /.col -->
            </div>

            <?php 

            $login = new ControladorAdministradores();
            $login ->ctrIngresoAdministrador();
            
            
            
            ?>




        </form>



    </div>
    <!-- /.login-box-body -->
</div>
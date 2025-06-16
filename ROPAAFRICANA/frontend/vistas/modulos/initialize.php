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
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h2>Inicializar Base de Datos</h2>
                <p>Utiliza los siguientes botones para gestionar la base de datos.</p>
                
                <div class="alert alert-info">
                    <h4>Instrucciones:</h4>
                    <p>Para una instalación completa, sigue estos pasos en orden:</p>
                    <ol>
                        <li>Primero, haz clic en "Inicializar Base de Datos" para limpiar cualquier tabla existente</li>
                        <li>Luego, elige una de las dos opciones:
                            <ul>
                                <li>"Crear Tablas sin datos" si solo quieres la estructura</li>
                                <li>"Crear Tablas y datos" si quieres la estructura con datos de ejemplo</li>
                            </ul>
                        </li>
                    </ol>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Botones de Inicialización</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="well">
                                    <h4>Inicializar Base de Datos</h4>
                                    <p>Este botón eliminará todas las tablas existentes en la base de datos. Úsalo con precaución ya que borrará todos los datos.</p>
                                    <button id="btnInicializar" class="btn btn-danger btn-block" style="margin:10px;">Inicializar Base de Datos</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <h4>Crear Tablas sin datos</h4>
                                    <p>Este botón creará la estructura de todas las tablas necesarias para el sistema, pero sin ningún dato. Útil para una instalación limpia.</p>
                                    <button id="btnCrearTablas" class="btn btn-primary btn-block" style="margin:10px;">Crear Tablas sin datos</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <h4>Crear Tablas y datos</h4>
                                    <p>Este botón creará todas las tablas y cargará los datos de ejemplo desde el archivo ecomerce.sql. Incluye productos, categorías, usuarios y configuraciones.</p>
                                    <button id="btnRellenarDatos" class="btn btn-success btn-block" style="margin:10px;">Crear Tablas y datos</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="resultadoInitialize" style="margin-top:20px;"></div>
            </div>
        </div>
    </div>

    <?php
    if(!defined('JQUERY_LOADED')) {
        echo '<script src="vistas/js/plugins/jquery.min.js"></script>';
        define('JQUERY_LOADED', true);
    }
    ?>
    <script src="vistas/js/plugins/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#btnInicializar').click(function(){
            if(confirm('¿Estás seguro de que deseas inicializar la base de datos? Se eliminarán todas las tablas existentes.')){
                $('#resultadoInitialize').html('Ejecutando...').removeClass('success error');
                $.post('ajax/initialize.ajax.php', {accion: 'inicializar'}, function(res){
                    $('#resultadoInitialize').html(res).addClass(res.includes('correctamente') ? 'success' : 'error');
                });
            }
        });
        
        $('#btnCrearTablas').click(function(){
            $('#resultadoInitialize').html('Ejecutando...').removeClass('success error');
            $.post('ajax/initialize.ajax.php', {accion: 'crear_tablas'}, function(res){
                $('#resultadoInitialize').html(res).addClass(res.includes('correctamente') ? 'success' : 'error');
            });
        });
        
        $('#btnRellenarDatos').click(function(){
            $('#resultadoInitialize').html('Ejecutando...').removeClass('success error');
            $.post('ajax/initialize.ajax.php', {accion: 'rellenar_datos'}, function(res){
                $('#resultadoInitialize').html(res).addClass(res.includes('correctamente') ? 'success' : 'error');
            });
        });
    });
    </script>
</body>
</html> 
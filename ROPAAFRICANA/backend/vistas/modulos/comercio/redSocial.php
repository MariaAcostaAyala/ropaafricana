<?php 

$plantilla = ControladorComercio::ctrMostrarRedesSociales();

// Validar que plantilla y redesSociales existan
if ($plantilla && isset($plantilla["redesSociales"])) {
    $redSocial = json_decode($plantilla["redesSociales"], true);
} else {
    // Datos por defecto si no existen
    $redSocial = [
        [
            "red" => "fa-facebook",
            "estilo" => "color",
            "url" => "https://facebook.com/tutiendamurciana",
            "activo" => 1
        ],
        [
            "red" => "fa-twitter",
            "estilo" => "color",
            "url" => "https://twitter.com/tutiendamurciana",
            "activo" => 1
        ],
        [
            "red" => "fa-instagram",
            "estilo" => "color",
            "url" => "https://instagram.com/tutiendamurciana",
            "activo" => 1
        ],
        [
            "red" => "fa-youtube",
            "estilo" => "color",
            "url" => "https://youtube.com/tutiendamurciana",
            "activo" => 1
        ]
    ];
}

?>

<div class="box box-success">

    <div class="box-header with-border">

        <h3 class="box-title">REDES SOCIALES</h3>

        <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">

                <i class="fa fa-minus"></i>

            </button>

        </div>

    </div>

    <div class="box-body">

        <div class="form-group">

            <label class="checkbox-inline"><input type="radio" value="color" name="colorRedSocial"> Color</label>
            <label class="checkbox-inline"><input type="radio" value="blanco" name="colorRedSocial"> Blanco</label>
            <label class="checkbox-inline"><input type="radio" value="negro" name="colorRedSocial"> Negro</label>

        </div>

        <?php 

        if (is_array($redSocial)) {
            foreach($redSocial as $key => $value) {
                echo '<div class="form-group row">
                    <div class="col-xs-8">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa '.$value["red"].' '.$value["estilo"].' redSocial"></i></span>
                            <input type="text" class="form-control input-lg cambiarUrlRed" value="'.$value["url"].'">
                        </div>
                    </div>
                    <div class="col-xs-2">';

                if(isset($value["activo"]) && $value["activo"] != 0) {
                    echo '<input type="checkbox" class="seleccionarRed" ruta="'.$value["url"].'" red="'.$value["red"].'" estilo="'.$value["estilo"].'" validarRed="'.$value["red"].'" checked>';
                } else {
                    echo '<input type="checkbox" class="seleccionarRed" ruta="'.$value["url"].'" red="'.$value["red"].'" estilo="'.$value["estilo"].'" validarRed="'.$value["red"].'">';
                }

                echo '</div></div>';
            }
        }
        
        ?>

        <input type="hidden" id="valorRedesSociales" value="<?php echo isset($plantilla["redesSociales"]) ? $plantilla["redesSociales"] : json_encode($redSocial); ?>">

    </div>

    <div class="box-footer">

        <button type="button" id="guardarRedesSociales" class="btn btn-primary pull-right">Guardar</button>

    </div>

</div>
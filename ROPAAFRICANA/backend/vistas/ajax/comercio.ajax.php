<?php
require_once "../../controladores/comercio.controlador.php";
require_once "../../modelos/comercio.modelo.php";

class AjaxComercio {
    public $imagenLogo;
    public $imagenIcono;
    public $colores;
    public $redesSociales;
    public $script;
    public $informacion;

    /*=============================================
    SUBIR LOGO
    =============================================*/
    public function ajaxSubirLogo() {
        if(isset($_FILES["logo"])){
            // Verificar que sea una imagen válida
            $allowed = array('image/jpeg', 'image/png');
            if(!in_array($_FILES["logo"]["type"], $allowed)){
                echo "error";
                return;
            }
            
            // Verificar tamaño máximo (2MB)
            if($_FILES["logo"]["size"] > 2000000){
                echo "error";
                return;
            }
            
            $respuesta = ControladorComercio::ctrActualizarLogoIcono("logo", $_FILES["logo"]);
            echo $respuesta;
        }
    }

    /*=============================================
    SUBIR ICONO
    =============================================*/
    public function ajaxSubirIcono() {
        if(isset($_FILES["icono"])){
            // Verificar que sea una imagen válida
            $allowed = array('image/jpeg', 'image/png');
            if(!in_array($_FILES["icono"]["type"], $allowed)){
                echo "error";
                return;
            }
            
            // Verificar tamaño máximo (2MB)
            if($_FILES["icono"]["size"] > 2000000){
                echo "error";
                return;
            }
            
            $respuesta = ControladorComercio::ctrActualizarLogoIcono("icono", $_FILES["icono"]);
            echo $respuesta;
        }
    }

    public function ajaxActualizarColores() {
        $datos = array(
            "barraSuperior" => $this->colores["barraSuperior"],
            "textoSuperior" => $this->colores["textoSuperior"],
            "colorFondo" => $this->colores["colorFondo"],
            "colorTexto" => $this->colores["colorTexto"]
        );
        $respuesta = ControladorComercio::ctrActualizarColores($datos);
        echo $respuesta;
    }

    public function ajaxActualizarRedesSociales() {
        $datos = array(
            "redesSociales" => $this->redesSociales
        );
        $respuesta = ControladorComercio::ctrActualizarRedesSociales($datos);
        echo $respuesta;
    }

    public function ajaxActualizarScript() {
        $datos = array(
            "apiFacebook" => $this->script["apiFacebook"],
            "pixelFacebook" => $this->script["pixelFacebook"],
            "googleAnalytics" => $this->script["googleAnalytics"]
        );
        $respuesta = ControladorComercio::ctrActualizarScript($datos);
        echo $respuesta;
    }

    public function ajaxActualizarInformacion() {
        $datos = array(
            "impuesto" => $this->informacion["impuesto"],
            "envioNacional" => $this->informacion["envioNacional"],
            "envioInternacional" => $this->informacion["envioInternacional"],
            "tasaMinimaNal" => $this->informacion["tasaMinimaNal"],
            "tasaMinimaInt" => $this->informacion["tasaMinimaInt"],
            "seleccionarPais" => $this->informacion["seleccionarPais"],
            "modoPaypal" => $this->informacion["modoPaypal"],
            "clienteIdPaypal" => $this->informacion["clienteIdPaypal"],
            "llaveSecretaPaypal" => $this->informacion["llaveSecretaPaypal"],
            "modoPayu" => $this->informacion["modoPayu"],
            "merchantIdPayu" => $this->informacion["merchantIdPayu"],
            "accountIdPayu" => $this->informacion["accountIdPayu"],
            "apiKeyPayu" => $this->informacion["apiKeyPayu"]
        );
        $respuesta = ControladorComercio::ctrActualizarInformacion($datos);
        echo $respuesta;
    }
}

/*=============================================
SUBIR LOGO
=============================================*/
if(isset($_FILES["logo"])){
    $logo = new AjaxComercio();
    $logo -> imagenLogo = $_FILES["logo"];
    $logo -> ajaxSubirLogo();
}

/*=============================================
SUBIR ICONO
=============================================*/
if(isset($_FILES["icono"])){
    $icono = new AjaxComercio();
    $icono -> imagenIcono = $_FILES["icono"];
    $icono -> ajaxSubirIcono();
}

if(isset($_POST["colores"])) {
    $colores = new AjaxComercio();
    $colores->colores = $_POST["colores"];
    $colores->ajaxActualizarColores();
}

if(isset($_POST["redesSociales"])) {
    $redesSociales = new AjaxComercio();
    $redesSociales->redesSociales = $_POST["redesSociales"];
    $redesSociales->ajaxActualizarRedesSociales();
}

if(isset($_POST["script"])) {
    $script = new AjaxComercio();
    $script->script = $_POST["script"];
    $script->ajaxActualizarScript();
}

if(isset($_POST["informacion"])) {
    $informacion = new AjaxComercio();
    $informacion->informacion = $_POST["informacion"];
    $informacion->ajaxActualizarInformacion();
} 
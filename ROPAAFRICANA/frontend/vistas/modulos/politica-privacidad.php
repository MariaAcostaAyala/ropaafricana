<?php
// Cargar la configuración
require_once __DIR__ . "/../../../app/classes/Configuracion.php";
require_once __DIR__ . "/../../../app/models/Configuracion.php";

$configuracion = Configuracion::ctrConfiguracion();
?>

<style>
    .privacy-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 3rem 0;
        margin-bottom: 2rem;
        border-bottom: 1px solid #dee2e6;
    }
    .privacy-card {
        border: none;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        transition: transform 0.2s ease-in-out;
        margin-bottom: 1.5rem;
    }
    .privacy-card:hover {
        transform: translateY(-2px);
    }
    .privacy-card .card-body {
        padding: 2rem;
    }
    .privacy-card h2 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }
    .privacy-card h2:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 400px;
        height: 3px;
        background: linear-gradient(to right, #007bff, #ffffff);
    }
    .privacy-list li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #f8f9fa;
    }
    .privacy-list li:last-child {
        border-bottom: none;
    }
    .contact-info {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 8px;
    }
    .contact-info li {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }
    .contact-info li:before {
        content: '•';
        color: #007bff;
        font-weight: bold;
        margin-right: 0.5rem;
    }
    .last-update {
        font-size: 0.9rem;
        color: #6c757d;
        border-top: 1px solid #dee2e6;
        padding-top: 1rem;
        margin-top: 2rem;
    }
</style>

<div class="privacy-header">
    <div class="container">
        <h1 class="text-center display-4 mb-3">Política de Privacidad y Condiciones de Uso</h1>
        <p class="text-center text-muted">Última actualización: <?php echo date('d/m/Y'); ?></p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">1. Información General</h2>
                    <p class="lead">En cumplimiento con el deber de información recogido en artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico, le informamos que el Sitio Web y el portal de Internet <?php echo COMPANY_NAME; ?> (en adelante, el "Sitio Web") es propiedad de <?php echo COMPANY_NAME; ?>.</p>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">2. Protección de Datos Personales</h2>
                    <p>En cumplimiento de lo dispuesto en el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos, le informamos que:</p>
                    <ul class="privacy-list list-unstyled">
                        <li>Los datos personales que nos facilite serán utilizados con la finalidad de gestionar los servicios solicitados.</li>
                        <li>La base legal para el tratamiento de sus datos es el consentimiento que nos otorga al facilitárnoslos.</li>
                        <li>Los datos se conservarán mientras se mantenga la relación comercial o durante los años necesarios para cumplir con las obligaciones legales.</li>
                        <li>Puede ejercer sus derechos de acceso, rectificación, limitación, supresión, portabilidad y oposición dirigiéndose a nuestra dirección de correo electrónico.</li>
                    </ul>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">3. Uso de Cookies</h2>
                    <p>Este sitio web utiliza cookies propias y de terceros para mejorar la experiencia de navegación y ofrecer contenidos y servicios de interés. Al continuar con la navegación entendemos que se acepta nuestra política de cookies.</p>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">4. Propiedad Intelectual</h2>
                    <p>Todos los contenidos del Sitio Web, incluyendo textos, fotografías, gráficos, imágenes, iconos, tecnología, enlaces, contenidos audiovisuales o sonoros, así como su diseño gráfico y códigos fuente, son propiedad intelectual de <?php echo COMPANY_NAME; ?> o de terceros, sin que puedan entenderse cedidos al Usuario ninguno de los derechos de explotación reconocidos por la normativa vigente en materia de propiedad intelectual.</p>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">5. Condiciones de Uso</h2>
                    <p>El Usuario se compromete a utilizar el Sitio Web de conformidad con la ley, esta Política de Privacidad, y demás avisos e instrucciones puestos en su conocimiento.</p>
                    <p>El Usuario se compromete a:</p>
                    <ul class="privacy-list list-unstyled">
                        <li>No utilizar el Sitio Web con fines ilícitos o contrarios a lo establecido en esta Política.</li>
                        <li>No realizar acciones que puedan dañar, inutilizar, sobrecargar o deteriorar el Sitio Web.</li>
                        <li>No utilizar técnicas de ingeniería inversa o cualquier otro procedimiento para intentar conocer el código fuente del Sitio Web.</li>
                    </ul>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">6. Modificaciones</h2>
                    <p><?php echo COMPANY_NAME; ?> se reserva el derecho de modificar su Política de Privacidad, de acuerdo a su propio criterio, o motivado por un cambio legislativo, jurisprudencial o doctrinal de la Agencia Española de Protección de Datos.</p>
                </div>
            </div>

            <div class="privacy-card card">
                <div class="card-body">
                    <h2 class="h4">7. Contacto</h2>
                    <p>Para cualquier consulta sobre esta Política de Privacidad, puede contactar con nosotros a través de:</p>
                    <div class="contact-info">
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> <?php echo Configuracion::$contacto['email']; ?></li>
                            <li><strong>Teléfono:</strong> <?php echo Configuracion::$contacto['telefono']; ?></li>
                            <li><strong>Dirección:</strong> <?php echo Configuracion::$contacto['direccion']; ?>, <?php echo Configuracion::$contacto['ciudad']; ?>, <?php echo Configuracion::$contacto['pais']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center last-update">
                <p>© <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</div> 
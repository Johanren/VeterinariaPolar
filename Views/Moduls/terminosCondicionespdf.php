<?php
date_default_timezone_set('America/Mexico_City');
$fechaActal = date('Y-m-d');
//mascota
$sql = "SELECT * FROM `mascota` INNER JOIN cliente ON cliente.idCliente = mascota.idCliente INNER JOIN especie ON especie.idEspecie = mascota.idEspecie INNER JOIN genero ON genero.idGenero = mascota.idGenero WHERE idMascota = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->execute();
$mascota = $stms->fetchAll();
//informacionOperaciones
$sql = "SELECT * FROM `informacionoperaciones` WHERE idMascota = ? AND idFechaIngreso = ? AND fechaHistorico = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->bindParam(2, $_GET['fecha'], PDO::PARAM_INT);
$stms->bindParam(3, $fechaActal, PDO::PARAM_STR);
$stms->execute();
$operaciones = $stms->fetchAll();
//edad
$sql = "SELECT * FROM `edad` WHERE idMascota = ? AND idFechaIngreso = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->bindParam(2, $_GET['fecha'], PDO::PARAM_INT);
$stms->execute();
$edad = $stms->fetchAll();
//medico
$sql = "SELECT * FROM `fechamedico` INNER JOIN medico ON fechamedico.idMedico = medico.idMedico WHERE idFecha = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['fecha'], PDO::PARAM_INT);
$stms->execute();
$medico = $stms->fetchAll();
?>
<style>
    header {
        display: none !important;
    }

    .text {
        text-align: center;
        font-family: cursive;
        text-decoration: underline;
    }
</style>
<div>
    <div style="text-align: right;">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/VeterinariaPolar/Views/img/consejoProfesional.png" alt="">
    </div>
    <br><br><br>
    <h3 style="text-align: center;">FORMATO CONSENTIMIENTO INFORMADO EN MEDICINA VETERINARIA</h3>
    <h5 style="text-align: center;">(Se elabora uno específico para cada procedimiento que Io requiera)</h5>
    <br><br>
    <p>
        Ciudad: <?php print $operaciones[0]['ciudad']; ?><span style="color: transparent;">hola mundo como esta</span> Fecha y hora: <?php print $operaciones[0]['fechaHistorico'] . " " . $operaciones[0]['horaHistorico']; ?>
    </p>
    <br>
    <p>Yo <?php print $mascota[0]['propietario']; ?>, identificado con: <?php print $mascota[0]['numeroCedula']; ?> con domicilio en <?php print $operaciones[0]['ciudad']; ?>; propietario de: <?php print $mascota[0]['nombreMascota']; ?>, especie <?php print $mascota[0]['especie']; ?>. Sexo: <?php print $mascota[0]['genero']; ?>, edad. <?php print $edad[0]['edad']; ?> y con Identificación <?php print $mascota[0]['numeroCedula']; ?> e historia clínica No <?php print $mascota[0]['idMascota']; ?>:</p>

    <p>Manifiesto que he recibido y entendido la información sobre el procedimiento <?php print $operaciones[0]['procedimiento']; ?>, en el cual <?php print $operaciones[0]['explicacionTecnica']; ?>.</p>

    <p>Que existen otras alternativas de tratamiento como son <?php print $operaciones[0]['alternativas']; ?>, pero que <?php print $operaciones[0]['procedimiento']; ?> tiene mayores ventajas y beneficios ante las otras como lo son <?php print $operaciones[0]['ventajas']; ?>.</p>

    <p>Entiendo que, dentro de los riesgos, posibles consecuencias y efectos colaterales del procedimiento a realizar se encuentran <?php print $operaciones[0]['riesgo']; ?>, posibles consecuencias y efectos colaterales del procedimiento a realizar. y que podrían generarse secuelas como <?php print $operaciones[0]['secuelas']; ?>.</p>

    <p>Además, me han explicado y entiendo como riesgos específicos para <?php print $mascota[0]['nombreMascota']; ?>: <?php print $operaciones[0]['riesgo']; ?>.</p>

    <p>En constancia que <?php print $mascota[0]['nombreMascota']; ?> ha sido valorado/a, que yo he sido interrogado y de haber recibido la información relacionada con procedimiento, de haber aclarado las inquietudes, comprendido la información y de haber leído y comprendido lo consignado en este documento; en mi calidad de propietario/responsable, del paciente, procedo a autorizar al médico veterinario o médico veterinario zootecnista <?php print $medico[0]['medico']; ?> con matrícula profesional No <?php print $medico[0]['MP']; ?>, la realización del procedimiento aquí descrito, y procedo a firmar de manera libre y voluntaria, como constancia de aceptación de los procedimientos. Así mismo sé de mi derecho a rechazar los procedimientos o revocar esta autorización. También entiendo que existen situaciones extraordinarias, cuya probabilidad de ocurrencia es baja, como los son: <?php print $operaciones[0]['extraordinarias']; ?> las cuales, he comprendido y aceptado.</p>

    <p>He sido informado que para el buen curso de Io autorizado/ o para mitigar su riesgo es pertinente la práctica de <?php print $operaciones[0]['procedimiento']; ?> sobre la cuales acepto o rechazo su práctica.</p>
    <br>
    <p>Nombre del propietario/responsable: <?php print $mascota[0]['propietario']; ?></p>

    <p>Tipo y documento de identidad: <?php print $mascota[0]['numeroCedula']; ?></p>

    <p>Firma: ______________</p>
    <br>
    <p>Se adjunta fotocopia del documento de identificación de la persona firmante.</p>
    <br>
    <p>Yo <?php print $medico[0]['medico']; ?>, matrícula profesional No <?php print $medico[0]['MP']; ?> en calidad de <?php print $operaciones[0]['especialidad']; ?>, suscribo este documento como constancia de haber brindado al propietario/ responsable, la información sobre los procedimientos y específicamente los riesgos relacionados con 111. <?php print $operaciones[0]['procedimiento']; ?>, y las consecuencias de la no realización; quien ha manifestado de manera libre y voluntaria si acepto o rechazo para llevarlos a cabo.</p>
    <br>
    <p>Firma del profesional: ______________</p>

    <p>Matrícula profesional: <?php print $medico[0]['MP']; ?></p>
</div>

<?php

$html = ob_get_clean();
require 'vendor/autoload.php';
// include autoloader
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$canvas = $dompdf->getCanvas(); 
 
$w = $canvas->get_width(); 
$h = $canvas->get_height(); 
 
$imageURL = 'Views/img/icon.jpeg'; 
$imgWidth = 200; 
$imgHeight = 200; 
 
$canvas->set_opacity(.3); 
 
$x = (($w-$imgWidth)/2); 
$y = (($h-$imgHeight)/2); 
 
$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight); 

$dompdf->stream("consentimiento.pdf", array("Attachment" => true));
?>
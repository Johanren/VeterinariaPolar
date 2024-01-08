<?php
require_once 'Models/conexion.php';
require_once 'controllers/controladorPlanCasa.php';

date_default_timezone_set('America/Mexico_City');
$fechaActal = date('Y-m-d');
//mascota
$sql = "SELECT * FROM `mascota` INNER JOIN cliente ON cliente.idCliente = mascota.idCliente INNER JOIN especie ON especie.idEspecie = mascota.idEspecie INNER JOIN genero ON genero.idGenero = mascota.idGenero WHERE idMascota = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->execute();
$mascota = $stms->fetchAll();

//tratamiento casa
$sql = "SELECT * FROM terapeuticocasa where idMascota = ? and fechaHistorico = ? and idFechaIngreso = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->bindParam(2, $fechaActal, PDO::PARAM_STR);
$stms->bindParam(3, $_GET['fecha'], PDO::PARAM_INT);
$stms->execute();
$lsitCasa = $stms->fetchAll();

//recomendaciones
$sql = "SELECT * FROM `recomendaciones` WHERE idMascota = ? and fechaHistorico = ? and idFechaIngreso = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->bindParam(2, $fechaActal, PDO::PARAM_STR);
$stms->bindParam(3, $_GET['fecha'], PDO::PARAM_INT);
$stms->execute();
$recomendaciones = $stms->fetchAll();
//proximo Control
$sql = "SELECT * FROM `proximocontrol` WHERE idMascota = ? and fechaHistorico = ? and idFechaIngreso = ?";
$conn = new Conexion();
$stms = $conn->conectar()->prepare($sql);
$stms->bindParam(1, $_GET['idMascota'], PDO::PARAM_INT);
$stms->bindParam(2, $fechaActal, PDO::PARAM_STR);
$stms->bindParam(3, $_GET['fecha'], PDO::PARAM_INT);
$stms->execute();
$control = $stms->fetchAll();
?>
<style>
    header {
        display: none !important;
    }



    table,
    th,
    td {
        border: 1px solid;
    }

    .text {
        text-align: center;
        font-family: cursive;
        text-decoration: underline;
    }

    .center {
        position: relative;
        text-align: center;
        float: none;
    }
</style>
<div>
    <div>
        <div style="text-align: right;">
            <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/VeterinariaPolar/Views/img/logoFormularioVeterinario.png" alt="">
        </div>
        <br>
        <h4 class="text">Polar Veterinaria - Pet shop</h4>
    </div>
</div>
<br><br>
<p for="">Historia clinica #<?php print $_GET['idMascota']; ?></p>
<br>
<h4>Datos del paciente</h4>
<br>
<div class="form-control">
    <p>Nombre Paciente: <?php print $mascota[0]['nombreMascota']; ?></p>
    <p>Especie: <?php print $mascota[0]['especie']; ?></p>
    <p>Genero: <?php print $mascota[0]['genero']; ?></p>
    <p>Propietario: <?php print $mascota[0]['propietario']; ?></p>
    <p>Fecha: <?php print $fechaActal; ?></p>
</div>
<br>
<h4>Plan terapeutico/ en casa</h4>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Principio activo </th>
            <th scope="col">Dosis </th>
            <th scope="col">Via</th>
            <th scope="col">Frecuencia</th>
            <th scope="col">Duracion</th>
            <th scope="col">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($lsitCasa); $i++) {
        ?>
            <tr>
                <td scope="row"><?php echo $i + 1 ?></td>
                <td><?php print $lsitCasa[$i]['principioActivo'] ?></td>
                <td><?php print $lsitCasa[$i]['dosis'] ?></td>
                <td><?php print $lsitCasa[$i]['via'] ?></td>
                <td><?php print $lsitCasa[$i]['frecuencia'] ?></td>
                <td><?php print $lsitCasa[$i]['duracion'] ?></td>
                <td><?php print $lsitCasa[$i]['observaciones'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br><br>
<h4>Recomendaciones y proximo Control </h4>
<br>
<div class="form-control">
    <p>Recomendaciones: <?php if (isset($recomendaciones[0]['recomendacion'])) {
                                print $recomendaciones[0]['recomendacion'];
                            } ?></p>
    <p>Proximo control: <?php if (isset($control[0]['controlProximo'])) {
                                print $control[0]['controlProximo'];
                            } ?></p>
</div>
<br>
<p class="center">
    Firma Medico:_______________ <span style="color: transparent;">hola mundo como esta</span> Firma Propietario:______________
</p>
<?php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';
// include autoloader
require_once 'dompdf/autoload.inc.php';

$html = ob_get_clean();


//echo $html;
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('letter');
$dompdf->setPaper('', 'Arial');

// Render the HTML as PDF
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

// Output the generated PDF to Browser
$dompdf->stream("SeguimientoCasa.pdf", array("Attachment" => true));
?>
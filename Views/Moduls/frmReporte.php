<?php
date_default_timezone_set('America/Mexico_City');

//print $fechaActal;
if (isset($_POST['enviar'])) {
  $fechaActal = $_POST['fechaActual'];
} else {
  $fechaActal = date('Y-m');
}
//print $fechaActal;
$lsit = new ControladorInsumo();

$cont = $lsit->contarInsumosReporteControlador();
$lisMedica = new ControladorMedicamento();

$lisHos = new ControladorPlanHospitalario();
$resHos = $lisHos->listarHospitalarioReporteControlador($fechaActal);
$contHospital = $lisHos->contarMedicamentoHospitalControlador($fechaActal);
$lisInsu = new ControladorHospitalarioInsumo();
$resInsu = $lisInsu->listarInsumoHospitalarioReporteControlador($fechaActal);
$contHsiIn = $lisInsu->contarInsumoHospitalControlador($fechaActal);
if ($_SESSION['roles'] != "administrador") {
  echo '<script>window.location="inicio"</script>';
}

?>

<div>
  <div>
    <div style="text-align: right;">
      <img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/VeterinariaPolar/Views/img/logoFormularioVeterinario.png" alt="">
    </div>
  </div>
</div>

<h4 style="text-align: center;">Reporte</h4>
<br><br>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form action="" method="post" class="form-control">
      <label for="">Fecha</label>
      <input type="month" class="form-control" name="fechaActual" required>
      <br>
      <button name="enviar" class="btn btn-primary">Filtrar</button>
    </form>
    <br>
    <form action="" method="post">
      <!--<button name="pdf" class="btn btn-primary">Reporte</button>-->
      <a href="index.php?action=reporteExcel&fechaActal=<?php echo $fechaActal ?>" class="btn btn-primary">Reporte</a>
    </form>
  </div>
</div>
<br><br>
<div class="row">
  <div class="col">
    <div class="table-responsive">
      <h2 style="text-align: center;">Insumos Reporte</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Insumo utilizado</th>
            <th>Insumo en almacén</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resInsu as $key => $value) { ?>
            <tr>
              <th><?php echo $value['insumo'] ?></th>
              <td><?php
                  $res = $lsit->listarInsumosReporteControaldor($resInsu[$key]['insumo']);
                  //var_dump($res);
                  if ($res[0]['Insumo'] != $resInsu[$key]['insumo']) {
                    print 0;
                  } else {
                    $sumar = $lisInsu->sumarInsumoHospitalarioControlador($resInsu[$key]['insumo'], $fechaActal);
                    print $sumar[0]['total'];
                  } ?></td>
              <td><?php
                  $res = $lsit->listarInsumosReporteControaldor($resInsu[$key]['insumo']);
                  //var_dump($res);
                  if ($res[0]['Insumo'] != $resInsu[$key]['insumo']) {
                    print 0;
                  } else {
                    echo $res[0]['totalImsumos'];
                  } ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col">
    <div class="table-responsive">
      <h2 style="text-align: center;">Medicamento Reporte</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Medicamento utilizado</th>
            <th>Medicamento en almacén</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resHos as $key => $value) { ?>
            <tr>
              <th><?php echo $value['principioActivo'] ?></th>
              <td><?php
                  $resMedica = $lisMedica->listarMedicamentoReporteControlador($resHos[$key]['principioActivo']);
                  if ($resMedica[0]['Medicamento'] != $resHos[$key]['principioActivo']) {
                    print 0;
                  } else {
                    $sumar = $lisHos->sumarMedicamentoHospitalarioControlador($resHos[$key]['principioActivo'], $fechaActal);
                    print $sumar[0]['total'] . " " . $resMedica[0]['tipoMedicamento'];
                  } ?></td>
              <td><?php
                  $resMedica = $lisMedica->listarMedicamentoReporteControlador($resHos[$key]['principioActivo']);
                  if ($resMedica[0]['Medicamento'] != $resHos[$key]['principioActivo']) {
                    print 0;
                  } else {
                    echo $resMedica[0]['TotalMedicamento'] . " " . $resMedica[0]['tipoMedicamento'];
                  } ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
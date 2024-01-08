<?php
header("Pragma: public");
header("Expires: 0");
$filename = "Reporte ".$_GET['fechaActal'].".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
$lsit = new ControladorInsumo();

$cont = $lsit->contarInsumosReporteControlador();
$lisMedica = new ControladorMedicamento();

$lisHos = new ControladorPlanHospitalario();
$resHos = $lisHos->listarHospitalarioReporteControlador($_GET['fechaActal']);
$contHospital = $lisHos->contarMedicamentoHospitalControlador($_GET['fechaActal']);
$lisInsu = new ControladorHospitalarioInsumo();
$resInsu = $lisInsu->listarInsumoHospitalarioReporteControlador($_GET['fechaActal']);
$contHsiIn = $lisInsu->contarInsumoHospitalControlador($_GET['fechaActal']);
if ($_SESSION['roles'] != "administrador") {
    echo '<script>window.location="inicio"</script>';
}
?>
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
                                    $sumar = $lisInsu->sumarInsumoHospitalarioControlador($resInsu[$key]['insumo'], $_GET['fechaActal']);
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
    <br><br><br>
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
                                    $sumar = $lisHos->sumarMedicamentoHospitalarioControlador($resHos[$key]['principioActivo'], $_GET['fechaActal']);
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
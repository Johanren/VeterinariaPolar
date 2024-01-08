<?php

class ControladorPlanHospitalario
{
    function registrarPlanHospitalarioControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['principioActivo'] == '' && $_POST['posologia'] == ''  && $_POST['dosis'] == '' && $_POST['via'] == '' && $_POST['frecuencia'] == '' && $_POST['duracion'] == '' && $_POST['observacionesHospitalario'] == '') {
                $planCasa = new ControladorPlanCasa();
                $planCasa->registrarPlanCasa();
            } else {
                if ($_POST['idCliente'] == '') {
                    $conlIdMascota = array(
                        'ccDocumento' => $_POST['ccDocumento'],
                        'nombreMascota' => $_POST['mascota']
                    );
                    //Obtener id mascota
                    $consuMascota = new ControladorMascota();
                    $conIdMascota = $consuMascota->consultarIdClienteMascota($conlIdMascota);
                    $idMascota = $conIdMascota[0]['idMascota'];
                    //Obternr id fecha
                    $ConFechaIngreso = new ControladorFechaIngreso();
                    $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                    $reidFecha = $ConFechaIngreso->consultarIdControlador();
                    $idFecha = $reidFecha[0]['idFechaIngreso'];
                    //RegistrarExamenFisico
                    //RegistrarExamenFisico
                    $principioActivo = $_POST['principioActivo'];
                    $posologia = $_POST['posologia'];
                    $dosis = $_POST['dosis'];
                    $via = $_POST['via'];
                    $frecuencia = $_POST['frecuencia'];
                    $duracion = $_POST['duracion'];
                    $observacionesHospitalario = $_POST['observacionesHospitalario'];
                    for ($i = 0; $i < count($principioActivo); $i++) {
                        $insu = new ControladorMedicamento();
                        $lisMedicamento = $insu->obtenerTotalMedicamento($principioActivo[$i]);
                        if ($dosis[$i] > $lisMedicamento[0]['TotalMedicamento']) {
                            echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                        } else {
                            $total = $lisMedicamento[0]['TotalMedicamento'] - $dosis[$i];
                            $conMedicamento = $total;
                            $insu->actualizarMedicamentoTotal($conMedicamento, $principioActivo[$i]);
                            $regisDAM = new ModeloPlanHospital();
                            $resa = $regisDAM->registrarPlanHospitalModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $idMascota);
                        }
                    }

                    $planCasa = new ControladorPlanCasa();
                    $planCasa->registrarPlanCasa();
                } else {
                    if ($_POST['idMascota'] == '') {
                        $conlIdMascota = array(
                            'idCliente' => $_POST['idCliente'],
                            'nombreMascota' => $_POST['mascota']
                        );
                        //Obtener id mascota
                        $consuMascota = new ControladorMascota();
                        $conIdMascota = $consuMascota->consultarIdMascota($conlIdMascota);
                        $idMascota = $conIdMascota[0]['idMascota'];
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $idMascota);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $principioActivo = $_POST['principioActivo'];
                        $posologia = $_POST['posologia'];
                        $dosis = $_POST['dosis'];
                        $via = $_POST['via'];
                        $frecuencia = $_POST['frecuencia'];
                        $duracion = $_POST['duracion'];
                        $observacionesHospitalario = $_POST['observacionesHospitalario'];
                        for ($i = 0; $i < count($principioActivo); $i++) {
                            $insu = new ControladorMedicamento();
                            $lisMedicamento = $insu->obtenerTotalMedicamento($principioActivo[$i]);
                            if ($dosis[$i] > $lisMedicamento[0]['TotalMedicamento']) {
                                echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                            } else {
                                $total = $lisMedicamento[0]['TotalMedicamento'] - $dosis[$i];
                                $conMedicamento = $total;
                                $insu->actualizarMedicamentoTotal($conMedicamento, $principioActivo[$i]);
                                $regisDAM = new ModeloPlanHospital();
                                $resa = $regisDAM->registrarPlanHospitalModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $idMascota);
                            }
                        }
                        $planCasa = new ControladorPlanCasa();
                        $planCasa->registrarPlanCasa();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $principioActivo = $_POST['principioActivo'];
                        $posologia = $_POST['posologia'];
                        $dosis = $_POST['dosis'];
                        $via = $_POST['via'];
                        $frecuencia = $_POST['frecuencia'];
                        $duracion = $_POST['duracion'];
                        $observacionesHospitalario = $_POST['observacionesHospitalario'];
                        for ($i = 0; $i < count($principioActivo); $i++) {
                            $insu = new ControladorMedicamento();
                            $lisMedicamento = $insu->obtenerTotalMedicamento($principioActivo[$i]);
                            if ($dosis[$i] > $lisMedicamento[0]['TotalMedicamento']) {
                                echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                            } else {
                                $total = $lisMedicamento[0]['TotalMedicamento'] - $dosis[$i];
                                $conMedicamento = $total;
                                $insu->actualizarMedicamentoTotal($conMedicamento, $principioActivo[$i]);
                                $regisDAM = new ModeloPlanHospital();
                                $resa = $regisDAM->registrarPlanHospitalModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $_POST['idMascota']);
                            }
                        }
                        $planCasa = new ControladorPlanCasa();
                        $planCasa->registrarPlanCasa();
                    }
                }
            }
        }
    }

    function consultarPlanHospitalario()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloPlanHospital();
            $res = $con->consultarPlanHospital($id);
            return $res;
        }
    }

    function actualizarPlanHospitalario()
    {
        if (isset($_POST['enviarEdit'])) {

            if ($_POST['principioActivo'] == '' && $_POST['posologia'] == '' && $_POST['dosis'] == '' && $_POST['via'] == '' && $_POST['frecuencia'] == '' && $_POST['duracion'] == '' && $_POST['observacionesHospitalario'] == '') {
                $actualizarCasa = new ControladorPlanCasa();
                $actualizarCasa->actualizarPlanCasa();
            } else {
                $principioActivo = $_POST['principioActivo'];
                $posologia = $_POST['posologia'];
                $dosis = $_POST['dosis'];
                $via = $_POST['via'];
                $frecuencia = $_POST['frecuencia'];
                $duracion = $_POST['duracion'];
                $observacionesHospitalario = $_POST['observacionesHospitalario'];
                for ($i = 0; $i < count($principioActivo); $i++) {
                    $insu = new ControladorMedicamento();
                    $lisMedicamento = $insu->obtenerTotalMedicamento($principioActivo[$i]);
                    if ($dosis[$i] > $lisMedicamento[0]['TotalMedicamento']) {
                        echo '<script>window.location="index.php?action=fallidoActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                    } else {
                        $total = $lisMedicamento[0]['TotalMedicamento'] - $dosis[$i];
                        print $total;
                        $conMedicamento = $total;
                        $insu->actualizarMedicamentoTotal($conMedicamento, $principioActivo[$i]);
                        $actualziarHospital = new ModeloPlanHospital();
                        $res = $actualziarHospital->registrarPlanHospitalModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $_GET['idFechaIngreso'], $_GET['idMascota']);
                    }
                }
                $actualizarCasa = new ControladorPlanCasa();
                $actualizarCasa->actualizarPlanCasa();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['idHospital'] == '' && $_POST['principioActivoEdit'] == '' && $_POST['posologiaEdit'] == '' && $_POST['dosisEdit'] == '' && $_POST['viaEdit'] == '' && $_POST['frecuenciaEdit'] == '' && $_POST['duracionEdit'] == '' && $_POST['observacionesHospitalarioEdit'] == '') {
                $actualizarCasa = new ControladorPlanCasa();
                $actualizarCasa->actualizarPlanCasa();
            } else {
                $idHospotal = $_POST['idHospital'];
                $principioActivo = $_POST['principioActivoEdit'];
                $posologia = $_POST['posologiaEdit'];
                $dosis = $_POST['dosisEdit'];
                $via = $_POST['viaEdit'];
                $frecuencia = $_POST['frecuenciaEdit'];
                $duracion = $_POST['duracionEdit'];
                $actualziarHospital = new ModeloPlanHospital();
                $observacionesHospitalario = $_POST['observacionesHospitalarioEdit'];
                for ($i = 0; $i < count($idHospotal); $i++) {
                    $insu = new ControladorMedicamento();
                    $lisMedicamento = $insu->obtenerTotalMedicamento($principioActivo[$i]);
                    $lisMedicamentoDosis = $actualziarHospital->obtenerDosisMedicamentoHospitalario($principioActivo[$i], $idHospotal[$i]);
                    if ($dosis[$i] > $lisMedicamentoDosis[0]['dosis']) {
                        $resta = $dosis[$i] - $lisMedicamentoDosis[0]['dosis'];
                        $conMedicamento = $lisMedicamento[0]['TotalMedicamento'] - $resta;
                        $total = $lisMedicamentoDosis[0]['dosis'] + $resta;
                        $dosisTotla = $total;
                        print $total;
                    }
                    if ($dosis[$i] == $lisMedicamentoDosis[0]['dosis']) {
                        $dosisTotla = $dosis[$i];
                        $conMedicamento = $lisMedicamento[0]['TotalMedicamento'];
                    }
                    if ($dosis[$i] < $lisMedicamentoDosis[0]['dosis']) {
                        $total = $lisMedicamentoDosis[0]['dosis'] - $dosis[$i];
                        $conMedicamento = $lisMedicamento[0]['TotalMedicamento'] + $total;
                        $dosisTotla = $dosis[$i];
                        print $conMedicamento;
                    }
                    if ($conMedicamento < 0) {
                        echo '<script>window.location="index.php?action=fallidoActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                    } else {
                        $insu->actualizarMedicamentoTotal($conMedicamento, $principioActivo[$i]);
                        $res = $actualziarHospital->actualizarHospitalModelo($principioActivo[$i], $posologia[$i], $dosisTotla, $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idHospotal[$i]);
                    }
                }
                $actualizarCasa = new ControladorPlanCasa();
                $actualizarCasa->actualizarPlanCasa();
            }
        }
    }

    function listarHospitalarioReporteControlador($fecha){
        $lsit = new ModeloPlanHospital();
        $res = $lsit->ListarHospitalReporteModelo($fecha);
        return $res;
    }

    function contarMedicamentoHospitalControlador($fecha){
        $consultar = new ModeloPlanHospital();
        $respuesta = $consultar->contarMedicamentoHospitalModelo($fecha);
        return $respuesta;
    }

    function sumarMedicamentoHospitalarioControlador($insumo, $fecha){
        $list =  new ModeloPlanHospital();
        $res = $list->sumarMedicamentoHospitalarioModelo($insumo, $fecha);
        return $res;
    }
}

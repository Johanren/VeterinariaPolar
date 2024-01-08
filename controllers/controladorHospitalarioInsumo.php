<?php

class ControladorHospitalarioInsumo
{
    function registrarInsumoControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['principioActivoInsumo'] == null && $_POST['dosisInsumo'] == null) {
                $regiPlanHospital = new ControladorPlanHospitalario();
                $regiPlanHospital->registrarPlanHospitalarioControlador();
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
                    //RegistrarInsumo
                    $principioActivo = $_POST['principioActivoInsumo'];
                    $dosis = $_POST['dosisInsumo'];
                    for ($i = 0; $i < count($principioActivo); $i++) {
                        $insu = new ControladorInsumo();
                        $lisInsumo = $insu->obtenerTotalInsumo($principioActivo[$i]);
                        if ($dosis[$i] > $lisInsumo[0]['totalImsumos']) {
                            echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                        } else {
                            $total = $lisInsumo[0]['totalImsumos'] - $dosis[$i];
                            $consuIsumo = $total;
                            $insu->actualizarInsumoTotal($consuIsumo, $principioActivo[$i]);
                            $regisDAM = new ModeloHospitalarioInsumo();
                            $resa = $regisDAM->registrarHospitralInsumoModelo($principioActivo[$i], $dosis[$i], $idFecha, $idMascota);
                        }
                    }
                    $regiPlanHospital = new ControladorPlanHospitalario();
                    $regiPlanHospital->registrarPlanHospitalarioControlador();
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
                        //RegistrarInsumo
                        $principioActivo = $_POST['principioActivoInsumo'];
                        $dosis = $_POST['dosisInsumo'];
                        for ($i = 0; $i < count($principioActivo); $i++) {
                            $insu = new ControladorInsumo();
                            $lisInsumo = $insu->obtenerTotalInsumo($principioActivo[$i]);
                            if ($dosis[$i] > $lisInsumo[0]['totalImsumos']) {
                                echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                            } else {
                                $total = $lisInsumo[0]['totalImsumos'] - $dosis[$i];
                                $consuIsumo = $total;
                                $insu->actualizarInsumoTotal($consuIsumo, $principioActivo[$i]);
                                $regisDAM = new ModeloHospitalarioInsumo();
                                $resa = $regisDAM->registrarHospitralInsumoModelo($principioActivo[$i], $dosis[$i], $idFecha, $idMascota);
                            }
                        }

                        $regiPlanHospital = new ControladorPlanHospitalario();
                        $regiPlanHospital->registrarPlanHospitalarioControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarInsumo
                        $principioActivo = $_POST['principioActivoInsumo'];
                        $dosis = $_POST['dosisInsumo'];
                        for ($i = 0; $i < count($principioActivo); $i++) {
                            $insu = new ControladorInsumo();
                            $lisInsumo = $insu->obtenerTotalInsumo($principioActivo[$i]);
                            if ($dosis[$i] > $lisInsumo[0]['totalImsumos']) {
                                echo '<script>window.location="index.php?action=fallidoRegistroVeterinarioInsumo"</script>';
                            } else {
                                $total = $lisInsumo[0]['totalImsumos'] - $dosis[$i];
                                $consuIsumo = $total;
                                $insu->actualizarInsumoTotal($consuIsumo, $principioActivo[$i]);
                                $regisDAM = new ModeloHospitalarioInsumo();
                                $resa = $regisDAM->registrarHospitralInsumoModelo($principioActivo[$i], $dosis[$i], $idFecha, $_POST['idMascota']);
                            }
                        }

                        $regiPlanHospital = new ControladorPlanHospitalario();
                        $regiPlanHospital->registrarPlanHospitalarioControlador();
                    }
                }
            }
        }
    }

    function consultarHospitalarioInsumo()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloHospitalarioInsumo();
            $res = $con->consultarHospitalInsumo($id);
            return $res;
        }
    }

    function actualizarHospitalarioInsumo()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['principioActivoInsumo'] == "" && $_POST['dosisInsumo'] == "") {
                $actualizarPlanHospital = new ControladorPlanHospitalario();
                $actualizarPlanHospital->actualizarPlanHospitalario();
            } else {

                $principioActivo = $_POST['principioActivoInsumo'];
                $dosis = $_POST['dosisInsumo'];
                var_dump($principioActivo);
                var_dump($dosis);
                for ($i = 0; $i < count($principioActivo); $i++) {
                    $insu = new ControladorInsumo();
                    $lisInsumo = $insu->obtenerTotalInsumo($principioActivo[$i]);
                    if ($dosis[$i] > $lisInsumo[0]['totalImsumos']) {
                        echo '<script>window.location="index.php?action=fallidoActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                    } else {
                        $total = $lisInsumo[0]['totalImsumos'] - $dosis[$i];
                        $consuIsumo = $total;
                        $insu->actualizarInsumoTotal($consuIsumo, $principioActivo[$i]);
                        $regisDAM = new ModeloHospitalarioInsumo();
                        $res = $regisDAM->registrarHospitralInsumoModelo($principioActivo[$i], $dosis[$i], $_GET['idFechaIngreso'], $_GET['idMascota']);
                    }
                }

                $actualizarPlanHospital = new ControladorPlanHospitalario();
                $actualizarPlanHospital->actualizarPlanHospitalario();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if (
                $_POST['principioActivoInsumoEdit'] == null &&
                $_POST['dosisInsumoEdit'] == null &&
                $_POST['idHospitalarioInsumo'] == null
            ) {
                $actualizarPlanHospital = new ControladorPlanHospitalario();
                $actualizarPlanHospital->actualizarPlanHospitalario();
            } else {
                $principioActivo = $_POST['principioActivoInsumoEdit'];
                $dosis = $_POST['dosisInsumoEdit'];
                $idHospitalInsumo = $_POST['idHospitalarioInsumo'];
                $consultarisInsumoHos = new ModeloHospitalarioInsumo();
                //obtener totalInsumo
                for ($i = 0; $i < count($idHospitalInsumo); $i++) {
                    $insu = new ControladorInsumo();
                    $lisInsumo = $insu->obtenerTotalInsumo($principioActivo[$i]);
                    $lisInsumoDosis = $consultarisInsumoHos->obtenerDosisInsumoHospitalario($principioActivo[$i], $idHospitalInsumo[$i]);

                    if ($dosis[$i] > $lisInsumoDosis[0]['dosis']) {
                        $resta = $dosis[$i] - $lisInsumoDosis[0]['dosis'];
                        $total = $lisInsumoDosis[0]['dosis'] + $resta;
                        $consuIsumo = $lisInsumo[0]['totalImsumos'] - $resta;
                        $dosisTotla = $total;
                    }
                    if ($dosis[$i] == $lisInsumoDosis[0]['dosis']) {
                        $dosisTotla = $dosis[$i];
                        $consuIsumo = $lisInsumo[0]['totalImsumos'];
                    }
                    if ($dosis[$i] < $lisInsumoDosis[0]['dosis']) {
                        $total = $lisInsumoDosis[0]['dosis'] - $dosis[$i];
                        $consuIsumo = $lisInsumo[0]['totalImsumos'] + $total;
                        $dosisTotla = $dosis[$i];
                    }
                    if ($consuIsumo < 0) {
                        echo '<script>window.location="index.php?action=fallidoActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                    } else {
                        $insu->actualizarInsumoTotal($consuIsumo, $principioActivo[$i]);
                        $res = $consultarisInsumoHos->actualizarHospitalarioInsumoModelo($principioActivo[$i], $dosisTotla, $idHospitalInsumo[$i]);
                    }
                }
                $actualizarPlanHospital = new ControladorPlanHospitalario();
                $actualizarPlanHospital->actualizarPlanHospitalario();
            }
        }
    }

    function listarInsumoHospitalarioReporteControlador($fecha){
        $list =  new ModeloHospitalarioInsumo();
        $res = $list->listarInsumoHospitalarioReporteModelo($fecha);
        return $res;
    }

    function contarInsumoHospitalControlador($fecha){
        $list =  new ModeloHospitalarioInsumo();
        $res = $list->contarInsumoHospitalModelo($fecha);
        return $res;
    }

    function sumarInsumoHospitalarioControlador($insumo, $fecha){
        $list =  new ModeloHospitalarioInsumo();
        $res = $list->sumarInsumoHospitalarioModelo($insumo, $fecha);
        return $res;
    }
}

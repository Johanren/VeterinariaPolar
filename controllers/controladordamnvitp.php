<?php

class ControladorAMNVITP
{
    function registrarAMNVITPControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['DAMNVITP'] == null && $_POST['planDiagnostico'] == null && $_POST['diagnosticoDefinitivo'] == null && $_POST['pronostico'] == null) {
                $regiPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                $regiPlanHospitalInsumo->registrarInsumoControlador();
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
                    $regExamenFisico = array(
                        'DAMNVITP' => $_POST['DAMNVITP'],
                        'planDiagnostico' => $_POST['planDiagnostico'],
                        'diagnosticoDefinitivo' => $_POST['diagnosticoDefinitivo'],
                        'pronostico' => $_POST['pronostico'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $regisDAM = new ModeloAMNVIPT();
                    $resa = $regisDAM->registrarAMNVIPTModelo($regExamenFisico);

                    $regiPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                    $regiPlanHospitalInsumo->registrarInsumoControlador();
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
                        $regExamenFisico = array(
                            'DAMNVITP' => $_POST['DAMNVITP'],
                            'planDiagnostico' => $_POST['planDiagnostico'],
                            'diagnosticoDefinitivo' => $_POST['diagnosticoDefinitivo'],
                            'pronostico' => $_POST['pronostico'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $regisDAM = new ModeloAMNVIPT();
                        $resa = $regisDAM->registrarAMNVIPTModelo($regExamenFisico);

                        $regiPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                        $regiPlanHospitalInsumo->registrarInsumoControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $regExamenFisico = array(
                            'DAMNVITP' => $_POST['DAMNVITP'],
                            'planDiagnostico' => $_POST['planDiagnostico'],
                            'diagnosticoDefinitivo' => $_POST['diagnosticoDefinitivo'],
                            'pronostico' => $_POST['pronostico'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $regisDAM = new ModeloAMNVIPT();
                        $resa = $regisDAM->registrarAMNVIPTModelo($regExamenFisico);

                        $regiPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                        $regiPlanHospitalInsumo->registrarInsumoControlador();
                    }
                }
            }
        }
    }

    function consultarDAM()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloAMNVIPT();
            $res = $con->consultaDAM($id);
            return $res;
        }
    }

    function actualizardamnvitpControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if (
                $_POST['DAMNVITPEditar'] == null &&
                $_POST['planDiagnosticoEditar'] == null &&
                $_POST['diagnosticoDefinitivoEditar'] == null &&
                $_POST['pronosticoEditar'] == null
            ) {
                $ActuPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                $ActuPlanHospitalInsumo->actualizarHospitalarioInsumo();
            } else {
                $dato = array(
                    'DAMNVITP' => $_POST['DAMNVITPEditar'],
                    'planDiagnostico' => $_POST['planDiagnosticoEditar'],
                    'diagnosticoDefinitivo' => $_POST['diagnosticoDefinitivoEditar'],
                    'pronostico' => $_POST['pronosticoEditar'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                $consultarisDAM = new ModeloAMNVIPT();
                $res = $consultarisDAM->registrarAMNVIPTModelo($dato);
                if ($res == true) {
                    $ActuPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                    $ActuPlanHospitalInsumo->actualizarHospitalarioInsumo();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if (
                $_POST['damnvitp'] == null &&
                $_POST['planDiagnostico'] == null &&
                $_POST['diagnosticoDefinitivo'] == null &&
                $_POST['pronostico'] == null &&
                $_POST['idDamnvitp'] == null
            ) {
                $ActuPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                $ActuPlanHospitalInsumo->actualizarHospitalarioInsumo();
            } else {
                $damnvitp = $_POST['damnvitp'];
                $planDiagnostico = $_POST['planDiagnostico'];
                $diagnosticoDefinitivo = $_POST['diagnosticoDefinitivo'];
                $pronostico = $_POST['pronostico'];
                $idDiagnostico = $_POST['idDamnvitp'];
                for ($i = 0; $i < count($damnvitp); $i++) {
                    $consultarisDAM = new ModeloAMNVIPT();
                    $res = $consultarisDAM->actualizarAMNVIPTModelo($damnvitp[$i], $planDiagnostico[$i], $diagnosticoDefinitivo[$i], $pronostico[$i], $idDiagnostico[$i]);
                }

                if ($res == true) {
                    $ActuPlanHospitalInsumo = new ControladorHospitalarioInsumo();
                    $ActuPlanHospitalInsumo->actualizarHospitalarioInsumo();
                }
            }
        }
    }
}

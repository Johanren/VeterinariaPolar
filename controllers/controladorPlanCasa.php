<?php

class ControladorPlanCasa
{
    function registrarPlanCasa()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['principioActivoCasa'] == '' && $_POST['posologiaCasa'] == ''  && $_POST['dosisCasa'] == '' && $_POST['viaCasa'] == '' && $_POST['frecuenciaCasa'] == '' && $_POST['duracionCasa'] == '' && $_POST['observacionesCasa'] == '') {
                $recon = new ControladorRecomendaciones();
                $recon->reigstrarRecomendacionesControlador();
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
                    $principioActivo = $_POST['principioActivoCasa'];
                    $posologia = $_POST['posologiaCasa'];
                    $dosis = $_POST['dosisCasa'];
                    $via = $_POST['viaCasa'];
                    $frecuencia = $_POST['frecuenciaCasa'];
                    $duracion = $_POST['duracionCasa'];
                    $observacionesHospitalario = $_POST['observacionesCasa'];
                    for ($i = 0; $i < count($principioActivo); $i++) {

                        $regisDAM = new ModeloPlanCasa();
                        $resa = $regisDAM->registrarPlanCasaModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $idMascota);
                    }
                    $recon = new ControladorRecomendaciones();
                    $recon->reigstrarRecomendacionesControlador();
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
                        $principioActivo = $_POST['principioActivoCasa'];
                        $posologia = $_POST['posologiaCasa'];
                        $dosis = $_POST['dosisCasa'];
                        $via = $_POST['viaCasa'];
                        $frecuencia = $_POST['frecuenciaCasa'];
                        $duracion = $_POST['duracionCasa'];
                        $observacionesHospitalario = $_POST['observacionesCasa'];
                        for ($i = 0; $i < count($principioActivo); $i++) {

                            $regisDAM = new ModeloPlanCasa();
                            $resa = $regisDAM->registrarPlanCasaModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $idMascota);
                        }
                        $recon = new ControladorRecomendaciones();
                        $recon->reigstrarRecomendacionesControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $principioActivo = $_POST['principioActivoCasa'];
                        $posologia = $_POST['posologiaCasa'];
                        $dosis = $_POST['dosisCasa'];
                        $via = $_POST['viaCasa'];
                        $frecuencia = $_POST['frecuenciaCasa'];
                        $duracion = $_POST['duracionCasa'];
                        $observacionesHospitalario = $_POST['observacionesCasa'];
                        for ($i = 0; $i < count($principioActivo); $i++) {

                            $regisDAM = new ModeloPlanCasa();
                            $resa = $regisDAM->registrarPlanCasaModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idFecha, $_POST['idMascota']);
                        }
                        $recon = new ControladorRecomendaciones();
                        $recon->reigstrarRecomendacionesControlador();
                    }
                }
            }
        }
    }

    function consultarPlanCasa()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloPlanCasa();
            $res = $con->consultarPlanCasa($id);
            return $res;
        }
    }

    function actualizarPlanCasa()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['principioActivoCasa'] == '' && $_POST['posologiaCasa'] == '' && $_POST['dosisCasa'] == '' && $_POST['viaCasa'] == '' && $_POST['frecuenciaCasa'] == '' && $_POST['duracionCasa'] == '' && $_POST['observacionesCasa'] == '') {
                $actualizarReco = new controladorInformacionOperaciones();
                $actualizarReco->actualizarInformacionOperacionesControlador();
            } else {
                $principioActivo = $_POST['principioActivoCasa'];
                $posologia = $_POST['posologiaCasa'];
                $dosis = $_POST['dosisCasa'];
                $via = $_POST['viaCasa'];
                $frecuencia = $_POST['frecuenciaCasa'];
                $duracion = $_POST['duracionCasa'];
                $observacionesHospitalario = $_POST['observacionesCasa'];
                for ($i = 0; $i < count($principioActivo); $i++) {
                    $actualizarPlanCasa = new ModeloPlanCasa();
                    $res = $actualizarPlanCasa->registrarPlanCasaModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $_GET['idFechaIngreso'], $_GET['idMascota']);
                }
                $actualizarReco = new controladorInformacionOperaciones();
                $actualizarReco->actualizarInformacionOperacionesControlador();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['idCasa'] == '' && $_POST['principioActivoCasaEdit'] == '' && $_POST['posologiaCasaEdit'] == '' && $_POST['dosisCasaEdit'] == '' && $_POST['viaCasaEdit'] == '' && $_POST['frecuenciaCasaEdit'] == '' && $_POST['duracionCasaEdit'] == '' && $_POST['observacionesCasaEdit'] == '') {
                $actualizarReco = new controladorInformacionOperaciones();
                $actualizarReco->actualizarInformacionOperacionesControlador();
            } else {
                $idCasa = $_POST['idCasa'];
                $principioActivo = $_POST['principioActivoCasaEdit'];
                $posologia = $_POST['posologiaCasaEdit'];
                $dosis = $_POST['dosisCasaEdit'];
                $via = $_POST['viaCasaEdit'];
                $frecuencia = $_POST['frecuenciaCasaEdit'];
                $duracion = $_POST['duracionCasaEdit'];
                $observacionesHospitalario = $_POST['observacionesCasaEdit'];
                for ($i = 0; $i < count($principioActivo); $i++) {
                    $actualizarPlanCasa = new ModeloPlanCasa();
                    $res = $actualizarPlanCasa->actualizarPlanCasaModelo($principioActivo[$i], $posologia[$i], $dosis[$i], $via[$i], $frecuencia[$i], $duracion[$i], $observacionesHospitalario[$i], $idCasa[$i]);
                }
                $actualizarReco = new controladorInformacionOperaciones();
                $actualizarReco->actualizarInformacionOperacionesControlador();
            }
        }
    }

    function obtenerIdMascotaCasa()
    {
        $id = $_GET['idMascota'];
        $modelo = new ControladorPlanCasa();
        $modelo->idMascotaCasa($id);
    }

    function idMascotaCasa($id)
    {
        print $id;
    }
}

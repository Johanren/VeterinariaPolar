<?php

class ConstroladorExamenFisico
{
    function registrarExamenFisicoControlador()
    {
        if (isset($_POST['enviar'])) {
            if (
                $_POST['temperaturas'] == null && $_POST['pulso'] == null && $_POST['mucosa'] == null && $_POST['llenadoCapilar'] == null
                && $_POST['dolor'] == null && $_POST['cardiaca'] == null && $_POST['respiratoria'] == null && $_POST['tusigeno'] == null
                && $_POST['deshidratacion'] == null && $_POST['condicionCorporal'] == null && $_POST['peso'] == null && $_POST['gangliosLinfaticos'] == null
                && $_POST['observaciones'] == null
            ) {
                $contSistemaAfectado = new ControladorSistemasAfectados();
                $resSistema = $contSistemaAfectado->registrarSistemasAfectadoControlador();
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
                        'temperaturas' => $_POST['temperaturas'],
                        'pulso' => $_POST['pulso'],
                        'mucosa' => $_POST['mucosa'],
                        'llenadoCapilar' => $_POST['llenadoCapilar'],
                        'dolor' => $_POST['dolor'],
                        'cardiaca' => $_POST['cardiaca'],
                        'respiratoria' => $_POST['respiratoria'],
                        'tusigeno' => $_POST['tusigeno'],
                        'deshidratacion' => $_POST['deshidratacion'],
                        'condicionCorporal' => $_POST['condicionCorporal'],
                        'peso' => $_POST['peso'],
                        'gangliosLinfaticos' => $_POST['gangliosLinfaticos'],
                        'observaciones' => $_POST['observaciones'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $registrarExamen = new ModeloExamenFisico();
                    $res = $registrarExamen->registrarExamenFisicoModelo($regExamenFisico);

                    $contSistemaAfectado = new ControladorSistemasAfectados();
                    $resSistema = $contSistemaAfectado->registrarSistemasAfectadoControlador();
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
                            'temperaturas' => $_POST['temperaturas'],
                            'pulso' => $_POST['pulso'],
                            'mucosa' => $_POST['mucosa'],
                            'llenadoCapilar' => $_POST['llenadoCapilar'],
                            'dolor' => $_POST['dolor'],
                            'cardiaca' => $_POST['cardiaca'],
                            'respiratoria' => $_POST['respiratoria'],
                            'tusigeno' => $_POST['tusigeno'],
                            'deshidratacion' => $_POST['deshidratacion'],
                            'condicionCorporal' => $_POST['condicionCorporal'],
                            'peso' => $_POST['peso'],
                            'gangliosLinfaticos' => $_POST['gangliosLinfaticos'],
                            'observaciones' => $_POST['observaciones'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $registrarExamen = new ModeloExamenFisico();
                        $res = $registrarExamen->registrarExamenFisicoModelo($regExamenFisico);

                        $contSistemaAfectado = new ControladorSistemasAfectados();
                        $resSistema = $contSistemaAfectado->registrarSistemasAfectadoControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $regExamenFisico = array(
                            'temperaturas' => $_POST['temperaturas'],
                            'pulso' => $_POST['pulso'],
                            'mucosa' => $_POST['mucosa'],
                            'llenadoCapilar' => $_POST['llenadoCapilar'],
                            'dolor' => $_POST['dolor'],
                            'cardiaca' => $_POST['cardiaca'],
                            'respiratoria' => $_POST['respiratoria'],
                            'tusigeno' => $_POST['tusigeno'],
                            'deshidratacion' => $_POST['deshidratacion'],
                            'condicionCorporal' => $_POST['condicionCorporal'],
                            'peso' => $_POST['peso'],
                            'gangliosLinfaticos' => $_POST['gangliosLinfaticos'],
                            'observaciones' => $_POST['observaciones'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $registrarExamen = new ModeloExamenFisico();
                        $res = $registrarExamen->registrarExamenFisicoModelo($regExamenFisico);
                        $contSistemaAfectado = new ControladorSistemasAfectados();
                        $resSistema = $contSistemaAfectado->registrarSistemasAfectadoControlador();
                    }
                }
            }
        }
    }

    function consultarExamen()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloExamenFisico();
            $res = $con->consultaExamen($id);
            return $res;
        }
    }

    function actualizarExamenFisicoControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if (
                $_POST['temperaturasEditar'] == null &&
                $_POST['pulsoEditar'] == null &&
                $_POST['mucosaEditar'] == null &&
                $_POST['dolorEditar'] == null &&
                $_POST['cardiacaEditar'] == null &&
                $_POST['respiratoriaEditar'] == null &&
                $_POST['tusigenoEditar'] == null &&
                $_POST['deshidratacionEditar'] == null &&
                $_POST['condicionCorporalEditar'] == null &&
                $_POST['pesoEditar'] == null &&
                $_POST['gangliosLinfaticosEditar'] == null &&
                $_POST['observacionesEditar'] == null
            ) {
                $contSistemaAfectado = new ControladorSistemasAfectados();
                $contSistemaAfectado->actualizarSistemaAfectadoControlador();
            } else {
                $dato = array(
                    'temperaturas' => $_POST['temperaturasEditar'],
                    'pulso' => $_POST['pulsoEditar'],
                    'mucosa' => $_POST['mucosaEditar'],
                    'llenadoCapilar' => $_POST['llenadoCapilarEditar'],
                    'dolor' => $_POST['dolorEditar'],
                    'cardiaca' => $_POST['cardiacaEditar'],
                    'respiratoria' => $_POST['respiratoriaEditar'],
                    'tusigeno' => $_POST['tusigenoEditar'],
                    'deshidratacion' => $_POST['deshidratacionEditar'],
                    'condicionCorporal' => $_POST['condicionCorporalEditar'],
                    'peso' => $_POST['pesoEditar'],
                    'gangliosLinfaticos' => $_POST['gangliosLinfaticosEditar'],
                    'observaciones' => $_POST['observacionesEditar'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                $actualizarExamen = new ModeloExamenFisico();
                $res = $actualizarExamen->registrarExamenFisicoModelo($dato);
                if ($res == true) {
                    $contSistemaAfectado = new ControladorSistemasAfectados();
                    $contSistemaAfectado->actualizarSistemaAfectadoControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if (
                $_POST['idExamen'] == null &&
                $_POST['temperaturas'] == null &&
                $_POST['pulso'] == null &&
                $_POST['mucosa'] == null &&
                $_POST['dolor'] == null &&
                $_POST['cardiaca'] == null &&
                $_POST['respiratoria'] == null &&
                $_POST['tusigeno'] == null &&
                $_POST['deshidratacion'] == null &&
                $_POST['condicionCorporal'] == null &&
                $_POST['pesoEditar'] == null &&
                $_POST['gangliosLinfaticos'] == null &&
                $_POST['observaciones'] == null
            ) {
                $contSistemaAfectado = new ControladorSistemasAfectados();
                $contSistemaAfectado->actualizarSistemaAfectadoControlador();
            } else {
                $temperaturas = $_POST['temperaturas'];
                $pulso = $_POST['pulso'];
                $mucosa = $_POST['mucosa'];
                $llenadoCapilar = $_POST['llenadoCapilar'];
                $dolor = $_POST['dolor'];
                $cardiaca = $_POST['cardiaca'];
                $respiratoria = $_POST['respiratoria'];
                $tusigeno = $_POST['tusigeno'];
                $deshidratacion = $_POST['deshidratacion'];
                $condicionCorporal = $_POST['condicionCorporal'];
                $peso = $_POST['peso'];
                $gangliosLinfaticos = $_POST['gangliosLinfaticos'];
                $observaciones = $_POST['observaciones'];
                $idExamen = $_POST['idExamen'];

                for ($i = 0; $i < count($temperaturas); $i++) {
                    $actualizarExamen = new ModeloExamenFisico();
                    $res = $actualizarExamen->actualizarExamenFisicoModelo($temperaturas[$i], $pulso[$i], $mucosa[$i], $llenadoCapilar[$i], $dolor[$i], $cardiaca[$i], $respiratoria[$i], $tusigeno[$i], $deshidratacion[$i], $condicionCorporal[$i], $peso[$i], $observaciones[$i], $gangliosLinfaticos[$i], $idExamen[$i]);
                }
                if ($res == true) {
                    $contSistemaAfectado = new ControladorSistemasAfectados();
                    $contSistemaAfectado->actualizarSistemaAfectadoControlador();
                }
            }
        }
    }
}

<?php

class ControladorProximoControl
{
    function registrarProximoControlControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['proximoControl'] == null) {
                $notas = new ControladorNotasProgreso();
                $notas->registrarControladorNotasProgresoControlador();
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
                    $datos = array(
                        'proximoControl' => $_POST['proximoControl'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $regRecomendaciones = new ModeloProximoControl();
                    $regRecomendaciones->RegistrarProximoControlModelo($datos);

                    $notas = new ControladorNotasProgreso();
                    $notas->registrarControladorNotasProgresoControlador();
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
                        $datos = array(
                            'proximoControl' => $_POST['proximoControl'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $regRecomendaciones = new ModeloProximoControl();
                        $regRecomendaciones->RegistrarProximoControlModelo($datos);

                        $notas = new ControladorNotasProgreso();
                        $notas->registrarControladorNotasProgresoControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $datos = array(
                            'proximoControl' => $_POST['proximoControl'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $regRecomendaciones = new ModeloProximoControl();
                        $regRecomendaciones->RegistrarProximoControlModelo($datos);

                        $notas = new ControladorNotasProgreso();
                        $notas->registrarControladorNotasProgresoControlador();
                    }
                }
            }
        }
    }

    function consultarControlProximo()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloProximoControl();
            $res = $con->consultaProximoControl($id);
            return $res;
        }
    }

    function actualizarProximoControlControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['proximoControlEditar'] == null) {
                $actualizarNotas = new ControladorNotasProgreso();
                $actualizarNotas->actualizarNotaProgresoControlador();
            } else {
                $dato = array(
                    'proximoControl' => $_POST['proximoControlEditar'],
                    'idFecha' => $_GET['idFechaIngreso'],
                    'idMascota' => $_GET['idMascota']
                );
                $consultarProximoControl = new ModeloProximoControl();
                $res = $consultarProximoControl->RegistrarProximoControlModelo($dato);
                if ($res == true) {
                    $actualizarNotas = new ControladorNotasProgreso();
                    $actualizarNotas->actualizarNotaProgresoControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['proximoControl'] == null && $_POST['idCOntrol'] == null) {
                $actualizarNotas = new ControladorNotasProgreso();
                $actualizarNotas->actualizarNotaProgresoControlador();
            } else {
                $proximoControl = $_POST['proximoControl'];
                $idProximo = $_POST['idCOntrol'];
                for ($i = 0; $i < count($idProximo); $i++) {
                    $consultarProximoControl = new ModeloProximoControl();
                    $res = $consultarProximoControl->actualizarProximoControlModelo($proximoControl[$i], $idProximo[$i]);
                }
                if ($res == true) {
                    $actualizarNotas = new ControladorNotasProgreso();
                    $actualizarNotas->actualizarNotaProgresoControlador();
                }
            }
        }
    }
}

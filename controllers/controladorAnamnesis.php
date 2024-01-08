<?php

class ControladorAnamnesis
{
    function registrarAnemesisControlador()
    {
        if (isset($_POST['enviar'])) {
            if (
                $_POST['motivoConsulta'] == null && $_POST['signosObservados'] == null && $_POST['causaPaciente'] == null
                && $_POST['tratamiento'] == null
            ) {
                $contExamenFisico = new ConstroladorExamenFisico();
                $resExamen = $contExamenFisico->registrarExamenFisicoControlador();
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
                    //RegistrarAnamesis
                    $regiAnamnesis = array(
                        'motivoConsulta' => $_POST['motivoConsulta'],
                        'signosObservados' => $_POST['signosObservados'],
                        'causaPaciente' => $_POST['causaPaciente'],
                        'tratamiento' => $_POST['tratamiento'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $regAnamnesis = new ModeloAnamnesis();
                    $resanemnesis = $regAnamnesis->registrarAnemesisModelo($regiAnamnesis);

                    $contExamenFisico = new ConstroladorExamenFisico();
                    $resExamen = $contExamenFisico->registrarExamenFisicoControlador();
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
                        //RegistrarAnamesis
                        $regiAnamnesis = array(
                            'motivoConsulta' => $_POST['motivoConsulta'],
                            'signosObservados' => $_POST['signosObservados'],
                            'causaPaciente' => $_POST['causaPaciente'],
                            'tratamiento' => $_POST['tratamiento'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $regAnamnesis = new ModeloAnamnesis();
                        $resanemnesis = $regAnamnesis->registrarAnemesisModelo($regiAnamnesis);

                        $contExamenFisico = new ConstroladorExamenFisico();
                        $resExamen = $contExamenFisico->registrarExamenFisicoControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarAnamesis
                        $regiAnamnesis = array(
                            'motivoConsulta' => $_POST['motivoConsulta'],
                            'signosObservados' => $_POST['signosObservados'],
                            'causaPaciente' => $_POST['causaPaciente'],
                            'tratamiento' => $_POST['tratamiento'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $regAnamnesis = new ModeloAnamnesis();
                        $resanemnesis = $regAnamnesis->registrarAnemesisModelo($regiAnamnesis);
                        $contExamenFisico = new ConstroladorExamenFisico();

                        $resExamen = $contExamenFisico->registrarExamenFisicoControlador();
                    }
                }
            }
        }
    }

    function consultarAnemesis()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloAnamnesis();
            $res = $con->consultaAnemesis($id);
            return $res;
        }
    }

    function actualizarAnemesis()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['motivoConsultaEditar'] == null && $_POST['signosObservadosEditar'] == null && $_POST['causaPacienteEditar'] == null && $_POST['tratamientoEditar'] == null) {
                $contExamenFisico = new ConstroladorExamenFisico();
                $contExamenFisico->actualizarExamenFisicoControlador();
            } else {

                $dato = array(
                    'motivoConsulta' => $_POST['motivoConsultaEditar'],
                    'signosObservados' => $_POST['signosObservadosEditar'],
                    'causaPaciente' => $_POST['causaPacienteEditar'],
                    'tratamiento' => $_POST['tratamientoEditar'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                $conAnamnesis = new ModeloAnamnesis();
                $res = $conAnamnesis->registrarAnemesisModelo($dato);
                if ($res == true) {
                    $contExamenFisico = new ConstroladorExamenFisico();
                    $contExamenFisico->actualizarExamenFisicoControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['idAnemesis'] == null && $_POST['motivoConsulta'] == null && $_POST['signosObservados'] == null && $_POST['causaPaciente'] == null && $_POST['tratamiento'] == null) {
                $contExamenFisico = new ConstroladorExamenFisico();
                $contExamenFisico->actualizarExamenFisicoControlador();
            } else {
                $idAnemesis = $_POST['idAnemesis'];
                $motivoConsulta = $_POST['motivoConsulta'];
                $signosObservados = $_POST['signosObservados'];
                $causaAparente = $_POST['causaPaciente'];
                $tratamiento = $_POST['tratamiento'];
                for ($i = 0; $i < count($idAnemesis); $i++) {
                    $conAnamnesis = new ModeloAnamnesis();
                    $res = $conAnamnesis->actualizarAnemesisModelo($idAnemesis[$i], $motivoConsulta[$i], $signosObservados[$i], $causaAparente[$i], $tratamiento[$i]);
                }
                if ($res == true) {
                    $contExamenFisico = new ConstroladorExamenFisico();
                    $contExamenFisico->actualizarExamenFisicoControlador();
                } else {
                    print 'feo';
                }
            }
        }
    }
}

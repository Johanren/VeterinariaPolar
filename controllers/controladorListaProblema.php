<?php

class ControladorListaProblema
{
    function registrarListaProblemaControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['problema'] == null) {
                $contListaDepurada = new ControladorListaDepurada();
                $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
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
                    if ($_POST['problema'] == null) {
                        $contListaDepurada = new ControladorListaDepurada();
                        $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                    } else {
                        foreach ($_POST['problema'] as $key => $valueProblema) {
                            $regExamenFisico = array(
                                'problema' => $valueProblema,
                                'idFecha' => $idFecha,
                                'idMascota' => $idMascota
                            );
                            $regisListaProblema = new ModeloListaProblema();
                            $res = $regisListaProblema->registrarListaProblemaModelo($regExamenFisico);
                        }
                        $contListaDepurada = new ControladorListaDepurada();
                        $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                    }
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
                        if ($_POST['problema'] == null) {
                            $contListaDepurada = new ControladorListaDepurada();
                            $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                        } else {
                            foreach ($_POST['problema'] as $key => $valueProblema) {
                                $regExamenFisico = array(
                                    'problema' => $valueProblema,
                                    'idFecha' => $idFecha,
                                    'idMascota' => $idMascota
                                );
                                $regisListaProblema = new ModeloListaProblema();
                                $res = $regisListaProblema->registrarListaProblemaModelo($regExamenFisico);
                            }
                            $contListaDepurada = new ControladorListaDepurada();
                            $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                        }
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        if ($_POST['problema'] == null) {
                            $contListaDepurada = new ControladorListaDepurada();
                            $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                        } else {
                            foreach ($_POST['problema'] as $key => $valueProblema) {
                                $regExamenFisico = array(
                                    'problema' => $valueProblema,
                                    'idFecha' => $idFecha,
                                    'idMascota' => $_POST['idMascota']
                                );
                                $regisListaProblema = new ModeloListaProblema();
                                $res = $regisListaProblema->registrarListaProblemaModelo($regExamenFisico);
                            }

                            $contListaDepurada = new ControladorListaDepurada();
                            $resListaDepura = $contListaDepurada->registrarListaDepuradaControlador();
                        }
                    }
                }
            }
        }
    }

    function consultarProblemaFecha()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloListaProblema();
            $res = $con->consultaProblema($id);
            return $res;
        }
    }

    function actualizarProblemaControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['problema'] == null) {
                $actualizarListaDepurada = new ControladorListaDepurada();
                $actualizarListaDepurada->actualizarDepuraControlador();
            } else {
                $problema = $_POST['problema'];
                for ($i = 0; $i < count($problema); $i++) {
                    $ActualizarListaProblema = new ModeloListaProblema();
                    $res = $ActualizarListaProblema->registrarListaProblemaModelo1($problema[$i], $_GET['idFechaIngreso'], $_GET['idMascota']);
                }
                $actualizarListaDepurada = new ControladorListaDepurada();
                $actualizarListaDepurada->actualizarDepuraControlador();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['problemaEdit'] == null && $_POST['idProblema'] == null) {
                $actualizarListaDepurada = new ControladorListaDepurada();
                $actualizarListaDepurada->actualizarDepuraControlador();
            } else {
                $problema = $_POST['problemaEdit'];
                $idProblema = $_POST['idProblema'];
                for ($i = 0; $i < count($problema); $i++) {
                    $ActualizarListaProblema = new ModeloListaProblema();
                    $res = $ActualizarListaProblema->actualizarProblemaModelo($problema[$i], $idProblema[$i]);
                }
                $actualizarListaDepurada = new ControladorListaDepurada();
                $actualizarListaDepurada->actualizarDepuraControlador();
            }
        }
    }
}

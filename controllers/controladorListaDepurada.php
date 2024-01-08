<?php

class ControladorListaDepurada
{
    function registrarListaDepuradaControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['depurada'] == null) {
                $contamn = new ControladorAMNVITP();
                $resamnv = $contamn->registrarAMNVITPControlador();
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
                    if ($_POST['depurada'] == null) {
                        $contamn = new ControladorAMNVITP();
                        $resamnv = $contamn->registrarAMNVITPControlador();
                    } else {
                        foreach ($_POST['depurada'] as $key => $valueDepura) {
                            $regExamenFisico = array(
                                'depura' => $valueDepura,
                                'idFecha' => $idFecha,
                                'idMascota' => $idMascota
                            );
                            $resListaDepurada = new ModeloListaDepurada();
                            $res = $resListaDepurada->registrarListaDepuradaModelo($regExamenFisico);
                        }
                        $contamn = new ControladorAMNVITP();
                        $resamnv = $contamn->registrarAMNVITPControlador();
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
                        if ($_POST['depurada'] == null) {
                            $contamn = new ControladorAMNVITP();
                            $resamnv = $contamn->registrarAMNVITPControlador();
                        } else {
                            foreach ($_POST['depurada'] as $key => $valueDepura) {
                                $regExamenFisico = array(
                                    'depura' => $valueDepura,
                                    'idFecha' => $idFecha,
                                    'idMascota' => $idMascota
                                );
                                $resListaDepurada = new ModeloListaDepurada();
                                $res = $resListaDepurada->registrarListaDepuradaModelo($regExamenFisico);
                            }
                            $contamn = new ControladorAMNVITP();
                            $resamnv = $contamn->registrarAMNVITPControlador();
                        }
                    } else {
                        if ($_POST['depurada'] == null) {
                            $contamn = new ControladorAMNVITP();
                            $resamnv = $contamn->registrarAMNVITPControlador();
                        } else {
                            //Obternr id fecha
                            $ConFechaIngreso = new ControladorFechaIngreso();
                            $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                            $reidFecha = $ConFechaIngreso->consultarIdControlador();
                            $idFecha = $reidFecha[0]['idFechaIngreso'];
                            //RegistrarExamenFisico
                            if ($_POST['depurada'] == null) {
                                $contamn = new ControladorAMNVITP();
                                $resamnv = $contamn->registrarAMNVITPControlador();
                            } else {
                                foreach ($_POST['depurada'] as $key => $valueDepura) {
                                    $regExamenFisico = array(
                                        'depura' => $valueDepura,
                                        'idFecha' => $idFecha,
                                        'idMascota' => $_POST['idMascota']
                                    );
                                    $resListaDepurada = new ModeloListaDepurada();
                                    $res = $resListaDepurada->registrarListaDepuradaModelo($regExamenFisico);
                                }
                                $contamn = new ControladorAMNVITP();
                                $resamnv = $contamn->registrarAMNVITPControlador();
                            }
                        }
                    }
                }
            }
        }
    }

    function consultarDepura()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloListaDepurada();
            $res = $con->consultarDepura($id);
            return $res;
        }
    }

    function actualizarDepuraControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['depurada'] == null) {

                $contamn = new ControladorAMNVITP();
                $contamn->actualizardamnvitpControlador();
            } else {

                $depura = $_POST['depurada'];
                for ($i = 0; $i < count($depura); $i++) {
                    $actualizarListaDepurada = new ModeloListaDepurada();
                    $res = $actualizarListaDepurada->registrarListaDepuradaModelo1($depura[$i], $_GET['idFechaIngreso'], $_GET['idMascota']);
                }
                $contamn = new ControladorAMNVITP();
                $contamn->actualizardamnvitpControlador();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['depuraEdit'] == null && $_POST['idDepura'] == null) {

                $contamn = new ControladorAMNVITP();
                $contamn->actualizardamnvitpControlador();
            } else {
                $depura = $_POST['depuraEdit'];
                $idDepura = $_POST['idDepura'];
                for ($i = 0; $i < count($idDepura); $i++) {
                    $actualizarListaDepurada = new ModeloListaDepurada();
                    $res = $actualizarListaDepurada->actualizarDepuraModelo($depura[$i], $idDepura[$i]);
                }
                if ($res == true) {
                    $contamn = new ControladorAMNVITP();
                    $contamn->actualizardamnvitpControlador();
                }
            }
        }
    }
}

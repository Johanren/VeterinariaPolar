<?php

class ControladorRecomendaciones
{
    function reigstrarRecomendacionesControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['recomendaciones'] == null) {
                $recon = new ControladorProximoControl();
                $recon->registrarProximoControlControlador();
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
                        'recomendaciones' => $_POST['recomendaciones'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $regRecomendaciones = new ModeloRecomendaciones();
                    $regRecomendaciones->registrarRecomendacionesModelo($datos);

                    $recon = new ControladorProximoControl();
                    $recon->registrarProximoControlControlador();
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
                            'recomendaciones' => $_POST['recomendaciones'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $regRecomendaciones = new ModeloRecomendaciones();
                        $regRecomendaciones->registrarRecomendacionesModelo($datos);

                        $recon = new ControladorProximoControl();
                        $recon->registrarProximoControlControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $datos = array(
                            'recomendaciones' => $_POST['recomendaciones'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $regRecomendaciones = new ModeloRecomendaciones();
                        $regRecomendaciones->registrarRecomendacionesModelo($datos);

                        $recon = new ControladorProximoControl();
                        $recon->registrarProximoControlControlador();
                    }
                }
            }
        }
    }

    function consultarRecomendacion()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloRecomendaciones();
            $res = $con->consultaRecomendacion($id);
            return $res;
        }
    }

    function actualizarRecomendacioneControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['recomendacionesEditar'] == null) {
                $actualziarProximoControl = new ControladorProximoControl();
                $actualziarProximoControl->actualizarProximoControlControlador();
            } else {
                $dato = array(
                    'recomendaciones' => $_POST['recomendacionesEditar'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                $actualizarRecomendaciones = new ModeloRecomendaciones();
                $res = $actualizarRecomendaciones->registrarRecomendacionesModelo($dato);
                if ($res == true) {
                    $actualziarProximoControl = new ControladorProximoControl();
                    $actualziarProximoControl->actualizarProximoControlControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['idRecomedaciones'] == null && $_POST['recomendaciones'] == null) {
                $actualziarProximoControl = new ControladorProximoControl();
                $actualziarProximoControl->actualizarProximoControlControlador();
            } else {
                $idRecomedaciones = $_POST['idRecomedaciones'];
                $recomendaciones = $_POST['recomendaciones'];
                for ($i = 0; $i < count($idRecomedaciones); $i++) {
                    $actualizarRecomendaciones = new ModeloRecomendaciones();
                    $res = $actualizarRecomendaciones->actualziarRecomendacionesModelo($recomendaciones[$i], $idRecomedaciones[$i]);
                }
                if ($res == true) {
                    $actualziarProximoControl = new ControladorProximoControl();
                    $actualziarProximoControl->actualizarProximoControlControlador();
                }
            }
        }
    }
}

<?php

class ControladorSistemasAfectados
{
    function registrarSistemasAfectadoControlador()
    {
        if (isset($_POST['enviar'])) {
            if (
                $_POST['circulatorio'] == null && $_POST['circulatorio'] == null && $_POST['linfatico'] == null && $_POST['digestivo'] == null
                && $_POST['genitourinario'] == null && $_POST['respiratorio'] == null && $_POST['oseo'] == null && $_POST['dermatologico'] == null
                && $_POST['organosSentidos'] == null
            ) {
                $contListaProblema = new ControladorListaProblema();
                $resListaProblema = $contListaProblema->registrarListaProblemaControlador();
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
                    $regSistemaAfectado = array(
                        'circulatorio' => $_POST['circulatorio'],
                        'nervioso' => $_POST['nervioso'],
                        'linfatico' => $_POST['linfatico'],
                        'digestivo' => $_POST['digestivo'],
                        'genitourinario' => $_POST['genitourinario'],
                        'respiratorio' => $_POST['respiratorio'],
                        'oseo' => $_POST['oseo'],
                        'dermatologico' => $_POST['dermatologico'],
                        'organosSentidos' => $_POST['organosSentidos'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $resSisteaAfecado = new ModeloSistemaAfectado();
                    $res = $resSisteaAfecado->registrarSistemaAfectadoModelo($regSistemaAfectado);

                    $contListaProblema = new ControladorListaProblema();
                    $resListaProblema = $contListaProblema->registrarListaProblemaControlador();
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
                        $regSistemaAfectado = array(
                            'circulatorio' => $_POST['circulatorio'],
                            'nervioso' => $_POST['nervioso'],
                            'linfatico' => $_POST['linfatico'],
                            'digestivo' => $_POST['digestivo'],
                            'genitourinario' => $_POST['genitourinario'],
                            'respiratorio' => $_POST['respiratorio'],
                            'oseo' => $_POST['oseo'],
                            'dermatologico' => $_POST['dermatologico'],
                            'organosSentidos' => $_POST['organosSentidos'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $resSisteaAfecado = new ModeloSistemaAfectado();
                        $res = $resSisteaAfecado->registrarSistemaAfectadoModelo($regSistemaAfectado);

                        $contListaProblema = new ControladorListaProblema();
                        $resListaProblema = $contListaProblema->registrarListaProblemaControlador();
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $regSistemaAfectado = array(
                            'circulatorio' => $_POST['circulatorio'],
                            'nervioso' => $_POST['nervioso'],
                            'linfatico' => $_POST['linfatico'],
                            'digestivo' => $_POST['digestivo'],
                            'genitourinario' => $_POST['genitourinario'],
                            'respiratorio' => $_POST['respiratorio'],
                            'oseo' => $_POST['oseo'],
                            'dermatologico' => $_POST['dermatologico'],
                            'organosSentidos' => $_POST['organosSentidos'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $resSisteaAfecado = new ModeloSistemaAfectado();
                        $res = $resSisteaAfecado->registrarSistemaAfectadoModelo($regSistemaAfectado);

                        $contListaProblema = new ControladorListaProblema();
                        $resListaProblema = $contListaProblema->registrarListaProblemaControlador();
                    }
                }
            }
        }
    }

    function consultarSistema()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloSistemaAfectado();
            $res = $con->consultaSistema($id);
            return $res;
        }
    }

    function actualizarSistemaAfectadoControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if (
                $_POST['circulatorioEditar'] == null &&
                $_POST['nerviosoEditar'] == null &&
                $_POST['linfaticoEditar'] == null &&
                $_POST['digestivoEditar'] == null &&
                $_POST['genitourinarioEditar'] == null &&
                $_POST['respiratorioEditar'] == null &&
                $_POST['oseoEditar'] == null &&
                $_POST['dermatologicoEditar'] == null &&
                $_POST['organosSentidosEditar'] == null
            ) {

                $actualizarListaProblema = new ControladorListaProblema();
                $actualizarListaProblema->actualizarProblemaControlador();
            } else {
                $dato = array(
                    'circulatorio' => $_POST['circulatorioEditar'],
                    'nervioso' => $_POST['nerviosoEditar'],
                    'linfatico' => $_POST['linfaticoEditar'],
                    'digestivo' => $_POST['digestivoEditar'],
                    'genitourinario' => $_POST['genitourinarioEditar'],
                    'respiratorio' => $_POST['respiratorioEditar'],
                    'oseo' => $_POST['oseoEditar'],
                    'dermatologico' => $_POST['dermatologicoEditar'],
                    'organosSentidos' => $_POST['organosSentidosEditar'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                //var_dump($dato);
                $actualizaSisteaAfecado = new ModeloSistemaAfectado();
                $res = $actualizaSisteaAfecado->registrarSistemaAfectadoModelo($dato);
                if ($res == true) {
                    $actualizarListaProblema = new ControladorListaProblema();
                    $actualizarListaProblema->actualizarProblemaControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if (
                $_POST['idSistema'] == null &&
                $_POST['circulatorio'] == null &&
                $_POST['nervioso'] == null &&
                $_POST['linfatico'] == null &&
                $_POST['digestivo'] == null &&
                $_POST['genitourinario'] == null &&
                $_POST['respiratorio'] == null &&
                $_POST['oseoEditar'] == null &&
                $_POST['dermatologico'] == null &&
                $_POST['organosSentidos'] == null
            ) {

                $actualizarListaProblema = new ControladorListaProblema();
                $actualizarListaProblema->actualizarProblemaControlador();
            } else {
                $circulatorio = $_POST['circulatorio'];
                $nervioso = $_POST['nervioso'];
                $linfatico = $_POST['linfatico'];
                $digestivo = $_POST['digestivo'];
                $genitourinario = $_POST['genitourinario'];
                $respiratorio = $_POST['respiratorio'];
                $oseo = $_POST['oseo'];
                $dermatologico = $_POST['dermatologico'];
                $organosSentidos = $_POST['organosSentidos'];
                $idSistema = $_POST['idSistema'];
                for ($i = 0; $i < count($idSistema); $i++) {
                    var_dump($oseo = $_POST['oseo']);
                    $actualizaSisteaAfecado = new ModeloSistemaAfectado();
                    $res = $actualizaSisteaAfecado->actualizarSistemaAfectadoModelo($circulatorio[$i], $nervioso[$i], $linfatico[$i], $digestivo[$i], $genitourinario[$i], $respiratorio[$i], $oseo[$i], $dermatologico[$i], $organosSentidos[$i], $idSistema[$i]);
                }
                if ($res == true) {
                    $actualizarListaProblema = new ControladorListaProblema();
                    $actualizarListaProblema->actualizarProblemaControlador();
                }
            }
        }
    }
}

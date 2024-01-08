<?php

class ControladorNotasProgreso
{
    function registrarControladorNotasProgresoControlador()
    {
        if (isset($_POST['enviar'])) {
            if ($_POST['notasProgreso'] == null) {
                if ($_POST['ccDocumento'] == null) {
                    echo '<script>window.location="index.php?action=fallidoRegistroVeterinario"</script>';
                } else {
                    echo '<script>window.location="index.php?action=okRegistroVeterinario"</script>';
                }
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
                        'notasProgreso' => $_POST['notasProgreso'],
                        'idFecha' => $idFecha,
                        'idMascota' => $idMascota
                    );
                    $regRecomendaciones = new ModeloNotasProgreso();
                    $res = $regRecomendaciones->RegistrarNotasProcesoModelo($datos);
                    if ($res == true) {
                        echo '<script>window.location="index.php?action=okRegistroVeterinario"</script>';
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
                        $datos = array(
                            'notasProgreso' => $_POST['notasProgreso'],
                            'idFecha' => $idFecha,
                            'idMascota' => $idMascota
                        );
                        $regRecomendaciones = new ModeloNotasProgreso();
                        $res = $regRecomendaciones->RegistrarNotasProcesoModelo($datos);
                        if ($res == true) {
                            echo '<script>window.location="index.php?action=okRegistroVeterinario"</script>';
                        }
                    } else {
                        //Obternr id fecha
                        $ConFechaIngreso = new ControladorFechaIngreso();
                        $datoFechaIngreso = array('fecha' => $_POST['fechaIngreso'], 'idMascota' => $_POST['idMascota']);
                        $reidFecha = $ConFechaIngreso->consultarIdControlador();
                        $idFecha = $reidFecha[0]['idFechaIngreso'];
                        //RegistrarExamenFisico
                        $datos = array(
                            'notasProgreso' => $_POST['notasProgreso'],
                            'idFecha' => $idFecha,
                            'idMascota' => $_POST['idMascota']
                        );
                        $regRecomendaciones = new ModeloNotasProgreso();
                        $res = $regRecomendaciones->RegistrarNotasProcesoModelo($datos);
                        if ($res == true) {
                            echo '<script>window.location="index.php?action=okRegistroVeterinario"</script>';
                        }
                    }
                }
            }
        }
    }

    function consultarNotaProgreso()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloNotasProgreso();
            $res = $con->consultarNotaProgreso($id);
            return $res;
        }
    }

    function actualizarNotaProgresoControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if ($_POST['notasProgresoEditar'] == null) {
                $archivo = new ControladorAnexoPDF();
                $archivo->archivosAnexoControlador();
                //echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
            } else {
                $dato = array(
                    'notasProgreso' => $_POST['notasProgresoEditar'],
                    'idFecha' => $_GET['idFechaIngreso'],
                    'idMascota' => $_GET['idMascota']
                );
                $actualizarNota = new ModeloNotasProgreso();
                $res = $actualizarNota->RegistrarNotasProcesoModelo($dato);
                if ($res == true) {
                    $archivo = new ControladorAnexoPDF();
                    $archivo->archivosAnexoControlador();
                }
            }
        } elseif (isset($_POST['Actualizar'])) {
            if ($_POST['notasProgreso'] == null && $_POST['idNotas'] == null) {
                echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
            } else {
                $notasProgreso = $_POST['notasProgreso'];
                $idNotas = $_POST['idNotas'];
                for ($i = 0; $i < count($notasProgreso); $i++) {
                    $actualizarNota = new ModeloNotasProgreso();
                    $res = $actualizarNota->actualizarNotasProgresoModelo($notasProgreso[$i], $idNotas[$i]);
                }
                if ($res == true) {
                    echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                } else {
                    echo '<script>window.location="index.php?action=okActualizarInvestigado&idFechaIngreso=' . $_GET['idFechaIngreso'] . '&idMascota=' . $_GET['idMascota'] . '"</script>';
                }
            }
        }
    }
}

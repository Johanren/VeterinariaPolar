<?php

class controladorInformacionOperaciones
{
    function actualizarInformacionOperacionesControlador()
    {
        if (isset($_POST['enviarEdit'])) {
            if (
                $_POST['procedimiento'] == '' && $_POST['tecnica'] == '' && $_POST['explicacionTecnica'] == ''
                && $_POST['ventajas'] == '' && $_POST['ciudad'] == '' && $_POST['consecuencias'] == '' && $_POST['secuelas'] == ''
                && $_POST['riesgo'] == '' && $_POST['extraordinarias'] == '' && $_POST['especialidad'] == '' && $_POST['alternativas'] == ''
            ) {
                $actualizarReco = new ControladorRecomendaciones();
                $actualizarReco->actualizarRecomendacioneControlador();
            } else {
                $dato = array(
                    'procedimiento' => $_POST['procedimiento'],
                    'tecnica' => $_POST['tecnica'],
                    'explicacionTecnica' => $_POST['explicacionTecnica'],
                    'ventajas' => $_POST['ventajas'],
                    'ciudad' => $_POST['ciudad'],
                    'consecuencias' => $_POST['consecuencias'],
                    'secuelas' => $_POST['secuelas'],
                    'riesgo' => $_POST['riesgo'],
                    'extraordinarias' => $_POST['extraordinarias'],
                    'especialidad' => $_POST['especialidad'],
                    'alternativas' => $_POST['alternativas'],
                    'idMascota' => $_GET['idMascota'],
                    'idFecha' => $_GET['idFechaIngreso']
                );
                //var_dump($dato);
                $registrarInfro = new ModeloInformacionOperaciones();
                $registrarInfro->registrarInformacionOperacionesModelo($dato);
                $actualizarReco = new ControladorRecomendaciones();
                $actualizarReco->actualizarRecomendacioneControlador();
            }
        } elseif (isset($_POST['Actualizar'])) {
            if (
                $_POST['procedimientodit'] == '' && $_POST['tecnicaEdit'] == '' && $_POST['explicacionTecnicaEdit'] == ''
                && $_POST['ventajasEdit'] == '' && $_POST['ciudadEdit'] == '' && $_POST['consecuenciasEdit'] == '' && $_POST['secuelasEdit'] == ''
                && $_POST['riesgoEdit'] == '' && $_POST['extraordinariasEdit'] == '' && $_POST['especialidadEdit'] == '' && $_POST['alternativasEdit'] == ''
            ) {
                $actualizarReco = new ControladorRecomendaciones();
                $actualizarReco->actualizarRecomendacioneControlador();
            } else {
                $idOperaciones = $_POST['idOperacionesEdit'];
                $procedimiento = $_POST['procedimientodit'];
                $tecnica = $_POST['tecnicaEdit'];
                $explicacionTecnica = $_POST['explicacionTecnicaEdit'];
                $ventajas = $_POST['ventajasEdit'];
                $ciudad = $_POST['ciudadEdit'];
                $consecuencias = $_POST['consecuenciasEdit'];
                $secuelas = $_POST['secuelasEdit'];
                $riesgo = $_POST['riesgoEdit'];
                $extraordinarias = $_POST['extraordinariasEdit'];
                $especialidad = $_POST['especialidadEdit'];
                $alternativas = $_POST['alternativasEdit'];
                for ($i = 0; $i < count($idOperaciones); $i++) {
                    $actualizarPlanCasa = new ModeloInformacionOperaciones();
                    $res = $actualizarPlanCasa->actualizarInformacionOperacionesModelo($idOperaciones[$i], $procedimiento[$i], $tecnica[$i], $explicacionTecnica[$i], $ventajas[$i], $ciudad[$i], $consecuencias[$i], $secuelas[$i], $riesgo[$i], $extraordinarias[$i], $especialidad[$i], $alternativas[$i]);
                }
                $actualizarReco = new ControladorRecomendaciones();
                $actualizarReco->actualizarRecomendacioneControlador();
            }
        }
    }

    function consultarInformacionOperaciones()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $con = new ModeloInformacionOperaciones();
            $res = $con->consultarInformacionOperacionesModelo($id);
            return $res;
        }
    }
}

<?php

class ControladorTipoConsulta{
    function consultarTipoConsultaAjaxControlador($dato){
        $consultar = new ModeloTipoConsulta();
        $respuesta = $consultar->consultarTipoConsultaAjaxModelo($dato);
        return $respuesta;
    }

    function registrarTipoConsulta($dato){
        $registrar = new ModeloTipoConsulta();
        $res = $registrar->registrarTipoConsultaModelo($dato);
        return $res;
    }
}
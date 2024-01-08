<?php
class ControladorEdad{
    function consultarEdadAjaxControlador($dato){
        $consultar = new ModeloEdad();
        $respuesta = $consultar->consultarEdadAjaxModelo($dato);
        return $respuesta;
    }

    function registrarEdadControlador($dato){
        $registrar = new ModeloEdad();
        $res = $registrar->registrarEdadModelo($dato);
        return $res;
    }

}
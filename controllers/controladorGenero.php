<?php
class ControladorGenero{
    function consultarGeneroAjaxControlador($dato){
        $consultar = new ModeloGenero();
        $respuesta = $consultar->consultarGeneroAjaxModelo($dato);
        return $respuesta;
    }
}
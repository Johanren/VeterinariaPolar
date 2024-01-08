<?php

class controladorEspecie{
    function consultarEspecieAjaxControlador($dato){
        $consultar = new ModeloEspecie();
        $respuesta = $consultar->consultarEspecieAjaxModelo($dato);
        return $respuesta;
    }
}
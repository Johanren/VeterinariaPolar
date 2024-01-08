<?php

class ControladorMascota{
    function consultarMascotaAjaxControlador($dato){
        $consultar = new ModeloMascota();
        $respuesta = $consultar->consultarMascotaAjaxModelo($dato);
        return $respuesta;
    }


    function registrarMascotaControlador($dato){
        $resMascota = new ModeloMascota();
        $res = $resMascota->registrarMascotaModelo($dato);
    }

    function consultarIdMascota($dato){
        $con = new ModeloMascota();
        $res = $con->consultarIdMascotaModelo($dato);
        return $res;
    }

    function consultarIdClienteMascota($dato){
        $con = new ModeloMascota();
        $res = $con->consultarIdClieMascotaModelo($dato);
        return $res;
    }

}
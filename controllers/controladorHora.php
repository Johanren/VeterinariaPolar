<?php

class ControladorHora{
    function registrarHoraControlador($dato){
        $regisHora = new ModeloHora();
        $res = $regisHora->registrarModeloHora($dato);
        return $res;
    }

    function consultarHoraMascota(){
        if (isset($_POST['enviarTimeVete'])) {
            $dato = array(
                'numeroCedula' => $_POST['numeroCedula'],
                'fechaIngreso' => $_POST['fechaIngreso']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->consultarHoraMascota($dato);
            return $res;
        }
    }

    function consultarHistoricoHoraMascotaControlador(){
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulHora = new ModeloHora();
            $res = $consulHora->consultarHistoricoHoraMascotaModelo($dato);
            return $res;
        }
    }
}
<?php

class RegistrarFechaMedico
{
    function registrarFechaMedicoControlador($dato)
    {
        $res = new ModeloFechaMedico();
        $ress = $res->registrarFechaMedicoModelo($dato);
        return $ress;
    }

    function consultarFechaMedicoControlador(){
        if (isset($_GET['idFechaIngreso'])) {
            $id = $_GET['idFechaIngreso'];
            $consult =  new ModeloFechaMedico();
            $res = $consult->consultarFechaMedicoModelo($id);
            return $res;
        }
    }
}

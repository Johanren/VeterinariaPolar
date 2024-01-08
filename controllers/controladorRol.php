<?php

class ControladorRol{
    function listarRolControlador(){
        $lis = new ModeloRol();
        $res = $lis->listarRolModelo();
        return $res;
    }
}
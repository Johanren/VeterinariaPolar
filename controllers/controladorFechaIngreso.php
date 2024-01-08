<?php

class ControladorFechaIngreso
{
    function registrarFechaIngresoControlador($dato)
    {
        $registrarFecha = new ModeloFechaIngreso();
        $res = $registrarFecha->registrarFechaingresoModelo($dato);
        return $res;
    }
    function consultarIdControlador()
    {
        $con = new ModeloFechaIngreso();
        $res = $con->conusltarIdModelo();
        return $res;
    }

    function consultarFechaCliente()
    {
        if (isset($_POST['enviarDateVete'])) {
            $dato = array(
                'numeroCedula' => $_POST['numeroCedula'],
                'fechaIngreso' => $_POST['fechaIngreso']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->consultarFechaCliente($dato);
            return $res;
        }
    }


    function listarTodoVeterinaria()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarTodoVeretinatia($dato);
            return $res;
        }
    }

    function listarMascotaCliente()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarMascotaClienteFecha($dato);
            return $res;
        }
    }

    function listarAnamnesis()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarAnamnesis($dato);
            return $res;
        }
    }

    function listarExamen()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarExamen($dato);
            return $res;
        }
    }

    function listarSistema()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarSistema($dato);
            return $res;
        }
    }

    function listarPronostico()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarPronostico($dato);
            return $res;
        }
    }

    function listarrecomenda()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarrecomenda($dato);
            return $res;
        }
    }

    function listarControl()
    {
        if (isset($_GET['idFechaIngreso'])) {
            $dato = array(
                'idFecha' => $_GET['idFechaIngreso'],
                'idMascota' => $_GET['idMascota']
            );
            $consulFecha = new ModeloFechaIngreso();
            $res = $consulFecha->listarControl($dato);
            return $res;
        }
    }
}

<?php

require_once '../controllers/controladorEspecie.php';
require_once '../controllers/controladorGenero.php';
require_once '../controllers/controladorTipoConsulta.php';
require_once '../controllers/controladorCliente.php';
require_once '../controllers/controladorMascota.php';
require_once '../controllers/controladorEdad.php';
require_once '../controllers/controladorMedico.php';
require_once '../controllers/controladorMedicamento.php';
require_once '../controllers/controladorInsumo.php';

require_once  '../Models/modeloEspecie.php';
require_once '../Models/modeloGenero.php';
require_once '../Models/modeloTipoConsulta.php';
require_once '../Models/modeloCliente.php';
require_once '../Models/modeloMascota.php';
require_once '../Models/modeloEdad.php';
require_once '../Models/modeloMedico.php';
require_once '../Models/modeloMedicamento.php';
require_once '../Models/modeloInsumo.php';

class Ajax
{
    public $especie;
    public $genero;
    public $consulta;
    public $cedula;
    public $mascota;
    public $idEdad;
    public $medico;
    public $medicamento;
    public $insumo;

    function consultarEspecieAjax()
    {
        $Consultarespecie = new controladorEspecie();
        $respuesta = $Consultarespecie->consultarEspecieAjaxControlador($this->especie);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['especie'],
                'id' => $value['idEspecie']
            );
        }

        print json_encode($datos);
    }

    function consultarGeneroAjax()
    {
        $Consultargenero = new ControladorGenero();
        $respuesta = $Consultargenero->consultarGeneroAjaxControlador($this->genero);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['genero'],
                'id' => $value['idGenero']
            );
        }

        print json_encode($datos);
    }

    function consultarConsultaAjax()
    {
        $Consultargenero = new ControladorTipoConsulta();
        $respuesta = $Consultargenero->consultarTipoConsultaAjaxControlador($this->consulta);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['consulta'],
                'id' => $value['idTipoConsulta']
            );
        }

        print json_encode($datos);
    }

    function consultarPropietarioAjax()
    {
        $Consultargenero = new ControladorCliente();
        $respuesta = $Consultargenero->consultarPropietarioAjaxControlador($this->cedula);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['propietario'],
                'labelNum' => $value['telefono'],
                'labelCC' => $value['numeroCedula'],
                'id' => $value['idCliente']
            );
        }

        print json_encode($datos);
    }

    function consultarMascotaAjax()
    {
        $Consultargenero = new ControladorMascota();
        $respuesta = $Consultargenero->consultarMascotaAjaxControlador($this->mascota);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['nombreMascota'],
                'idEspe' => $value['idEspecie'],
                'labelEspe' => $value['especie'],
                'id' => $value['idMascota'],
                'labelGene' => $value['genero'],
                'idGene' => $value['idGenero'],
                'ente' => $value['Entero']
            );
        }

        print json_encode($datos);
    }

    function consultarEdadAjax()
    {
        $Consultargenero = new ControladorEdad();
        $respuesta = $Consultargenero->consultarEdadAjaxControlador($this->idEdad);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['edad'],
                'id' => $value['idEdad']
            );
        }

        print json_encode($datos);
    }

    function consultarMedicojax()
    {
        $Consultargenero = new ControladorMedico();
        $respuesta = $Consultargenero->controladorMedicoAjax($this->medico);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['medico'],
                'labelN' => $value['medico'],
                'mp' => $value['MP'],
                'id' => $value['idMedico']
            );
        }

        print json_encode($datos);
    }

    function consultarMedicamentoajax(){
        $conusltarMedicmaento = new ControladorMedicamento();
        $respuesta = $conusltarMedicmaento->controladorMedicamentoAjax($this->medicamento);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['Medicamento']
            );
        }
        print json_encode($datos);
    }

    function consultarInsumoajax(){
        $consultarinsumo = new ControladorInsumo();
        $respuesta = $consultarinsumo->controladorInsumoAjax($this->insumo);
        foreach ($respuesta as $key => $value) {
            $datos[] = array(
                'label' => $value['Insumo']
            );
        }
        print json_encode($datos);
    }

}

$ajax = new Ajax();

if (isset($_GET['especie'])) {
    $ajax->especie = $_GET['especie'];
    $ajax->consultarEspecieAjax();
}
if (isset($_GET['genero'])) {
    $ajax->genero = $_GET['genero'];
    $ajax->consultarGeneroAjax();
}
if (isset($_GET['tipoConsultao'])) {
    $ajax->consulta = $_GET['tipoConsultao'];
    $ajax->consultarConsultaAjax();
}
if (isset($_GET['cedula'])) {
    $ajax->cedula = $_GET['cedula'];
    $ajax->consultarPropietarioAjax();
}
if (isset($_GET['mascota'])) {
    $ajax->mascota = $_GET['mascota'];
    $ajax->consultarMascotaAjax();
}
if (isset($_GET['idEdad'])) {
    $ajax->idEdad = $_GET['idEdad'];
    $ajax->consultarEdadAjax();
}

if (isset($_GET['medico'])) {
    $ajax->idEdad = $_GET['medico'];
    $ajax->consultarMedicojax();
}

if (isset($_GET['medicamento'])) {
    $ajax->medicamento = $_GET['medicamento'];
    $ajax->consultarMedicamentoajax();
}

if (isset($_GET['insumo'])) {
    $ajax->insumo = $_GET['insumo'];
    $ajax->consultarInsumoajax();
}
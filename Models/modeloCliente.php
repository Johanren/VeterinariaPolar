<?php
require_once 'conexion.php';
class ModeloCliente{
    public $tabla = 'cliente';

    function consultarPropietarioAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE numeroCedula like ? ORDER BY numeroCedula";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY numeroCedula";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function registrarPropietarioModelo($dato){
        $sql = "INSERT INTO $this->tabla (propietario, numeroCedula, telefono) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($dato != ''){
            $stms->bindParam(1, $dato['nomPropietario'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['cc'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['telefono'], PDO::PARAM_STR);
        }
        try{
            if($stms->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    function consultarIdPropietarioModelo($dato){
        $sql = "SELECT * FROM $this->tabla WHERE numeroCedula = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($dato != ''){
            $stms->bindParam(1, $dato['cc'], PDO::PARAM_STR);
        }
        try{
            if($stms->execute()){
                return $stms->fetchAll();
            }else{
                return false;
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

}
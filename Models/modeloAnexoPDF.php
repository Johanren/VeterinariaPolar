<?php
require_once 'conexion.php';
class ModeloAnexoPDF{
    public $tabla = 'anexomascotapdf';
    function registrarAnexoPDF($descripcion, $pdf,$idMascota, $idFecha){
        $sql = "INSERT INTO $this->tabla (Descripcion, urlPDF,idMascota, idFechaIngreso) VALUES (?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($descripcion != ''){
            $stms->bindParam(1, $descripcion, PDO::PARAM_STR);
            $stms->bindParam(2, $pdf, PDO::PARAM_STR);
            $stms->bindParam(3, $idMascota, PDO::PARAM_INT);
            $stms->bindParam(4, $idFecha, PDO::PARAM_INT);
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

    function listarPDFModelo($id){
        $sql = "SELECT * FROM $this->tabla WHERE idFechaIngreso = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($id != ''){
            $stms->bindParam(1, $id, PDO::PARAM_INT);
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
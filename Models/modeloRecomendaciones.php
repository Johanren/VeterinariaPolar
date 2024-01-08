<?php

require_once 'conexion.php';
class ModeloRecomendaciones{
    public $tabla = 'recomendaciones';
    function registrarRecomendacionesModelo($dato){
        $sql = "INSERT INTO $this->tabla (recomendacion, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['recomendaciones'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['idMascota'], PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultaRecomendacion($id){
        $sql = "SELECT * FROM $this->tabla WHERE idFechaIngreso = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($id != '') {
            $stms->bindParam(1, $id, PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualziarRecomendacionesModelo($recomendaciones, $idRecomedaciones){
        $sql = "UPDATE $this->tabla SET recomendacion = ? WHERE idRecomendaciones = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idRecomedaciones != '') {
            $stms->bindParam(1, $recomendaciones, PDO::PARAM_STR);
            $stms->bindParam(2, $idRecomedaciones, PDO::PARAM_INT);
        }
        try {
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

}
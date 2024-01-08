<?php

require_once 'conexion.php';

class ModeloPlanHospital
{
    public $tabla = 'intrahospitalario';
    function registrarPlanHospitalModelo($principioActivo, $posologia, $dosis, $via, $frecuencia, $duracion, $observacionesHospitalario, $id, $idMax)
    {

        $sql = "INSERT INTO $this->tabla (principioActivo, posologia, dosis, via, frecuencia, duracion, observaciones, idFechaIngreso, idMascota) VALUES (?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($principioActivo != '') {
            $stms->bindParam(1, $principioActivo, PDO::PARAM_STR);
            $stms->bindParam(2, $posologia, PDO::PARAM_STR);
            $stms->bindParam(3, $dosis, PDO::PARAM_STR);
            $stms->bindParam(4, $via, PDO::PARAM_STR);
            $stms->bindParam(5, $frecuencia, PDO::PARAM_STR);
            $stms->bindParam(6, $duracion, PDO::PARAM_STR);
            $stms->bindParam(7, $observacionesHospitalario, PDO::PARAM_STR);
            $stms->bindParam(8, $id, PDO::PARAM_INT);
            $stms->bindParam(9, $idMax, PDO::PARAM_INT);
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

    function consultarPlanHospital($id)
    {
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

    function actualizarHospitalModelo($principioActivo, $posologia, $dosis, $via, $frecuencia, $duracion, $observacionesHospitalario, $id)
    {
        $sql = "UPDATE $this->tabla SET principioActivo = ?, posologia = ?, dosis = ?, via = ?, frecuencia = ?, duracion = ?, observaciones = ? WHERE idIntraHospitalario = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($principioActivo != '') {
            $stms->bindParam(1, $principioActivo, PDO::PARAM_STR);
            $stms->bindParam(2, $posologia, PDO::PARAM_STR);
            $stms->bindParam(3, $dosis, PDO::PARAM_STR);
            $stms->bindParam(4, $via, PDO::PARAM_STR);
            $stms->bindParam(5, $frecuencia, PDO::PARAM_STR);
            $stms->bindParam(6, $duracion, PDO::PARAM_STR);
            $stms->bindParam(7, $observacionesHospitalario, PDO::PARAM_STR);
            $stms->bindParam(8, $id, PDO::PARAM_INT);
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

    function obtenerDosisMedicamentoHospitalario($dato, $id){
        $sql = "SELECT dosis, principioActivo FROM $this->tabla WHERE principioActivo = ? AND idIntraHospitalario = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
                $stms->bindParam(2, $id, PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function ListarHospitalReporteModelo($fecha){
        $fecha = $fecha.'%';
        $sql = "SELECT DISTINCT principioActivo FROM $this->tabla WHERE fechaHistorico LIKE ? ORDER BY principioActivo DESC";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $fecha, PDO::PARAM_STR);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function contarMedicamentoHospitalModelo($fecha){
        $fecha = $fecha.'%';
        $sql = "SELECT COUNT(DISTINCT principioActivo) AS CONT FROM $this->tabla WHERE fechaHistorico LIKE ?";
        try { 
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $fecha, PDO::PARAM_STR);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function sumarMedicamentoHospitalarioModelo($insumo, $fecha){
        $fecha = $fecha.'%';
        $sql = "SELECT SUM(dosis) AS total FROM $this->tabla WHERE principioActivo = ? AND fechaHistorico LIKE ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($insumo != null) {
                $stms->bindParam(1, $insumo, PDO::PARAM_STR);
                $stms->bindParam(2, $fecha, PDO::PARAM_STR);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}

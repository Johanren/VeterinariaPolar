<?php

require_once 'conexion.php';

class ModeloHospitalarioInsumo
{
    public $tabla = 'hopitalarioinsumo';
    function registrarHospitralInsumoModelo($principioActivo, $dosis, $idFecha, $idMascota)
    {
        $sql = "INSERT INTO $this->tabla (insumo, dosis, idFechaIngreso, idMascota) VALUES (?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($principioActivo != '') {
            $stms->bindParam(1, $principioActivo, PDO::PARAM_STR);
            $stms->bindParam(2, $dosis, PDO::PARAM_STR);
            $stms->bindParam(3, $idFecha, PDO::PARAM_INT);
            $stms->bindParam(4, $idMascota, PDO::PARAM_INT);
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

    function consultarHospitalInsumo($id)
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

    function actualizarHospitalarioInsumoModelo($principioActivo, $dosis, $idHospitalInsumo)
    {
        $sql = "UPDATE $this->tabla SET insumo = ?,dosis = ? WHERE idHospitalInsumo = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($principioActivo != '') {
            $stms->bindParam(1, $principioActivo, PDO::PARAM_STR);
            $stms->bindParam(2, $dosis, PDO::PARAM_STR);
            $stms->bindParam(3, $idHospitalInsumo, PDO::PARAM_INT);
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

    function obtenerDosisInsumoHospitalario($dato, $id)
    {
        $sql = "SELECT dosis, insumo FROM $this->tabla WHERE insumo = ? AND idHospitalInsumo = ?";
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

    function listarInsumoHospitalarioReporteModelo($fecha)
    {
        $fecha = $fecha.'%';
        $sql = "SELECT DISTINCT insumo  FROM $this->tabla WHERE fechaHistorico like ? ORDER BY insumo DESC";
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

    function contarInsumoHospitalModelo($fecha)
    {
        $fecha = $fecha.'%';
        $sql = "SELECT COUNT(DISTINCT insumo) AS CONT FROM $this->tabla WHERE fechaHistorico like ?";
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

    function sumarInsumoHospitalarioModelo($insumo, $fecha)
    {
        $fecha = $fecha.'%';
        $sql = "SELECT SUM(dosis) AS total FROM $this->tabla WHERE insumo = ? AND fechaHistorico like ?";
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

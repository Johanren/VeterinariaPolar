<?php

require_once 'conexion.php';
class ModeloInsumo
{
    public $tabla = 'insumos';
    function listarInsumoModelo()
    {
        $sql = "SELECT * FROM $this->tabla";

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function contarDatoaInsumoModelo()
    {
        $sql = "SELECT COUNT(Insumo) FROM $this->tabla";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function registraInsumoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (Insumo, totalImsumos) VALUES (?,?)";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['insumo'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['cantiada'], PDO::PARAM_STR);
            }
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultarInsumoModelo($dato)
    {
        $sql = "SELECT * FROM $this->tabla WHERE idInsumos = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato, PDO::PARAM_INT);
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

    function actualziarInsumoModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET Insumo=?,totalImsumos=? WHERE idInsumos = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['insumo'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['cantiada'], PDO::PARAM_INT);
                $stms->bindParam(3, $dato['id'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function consultaInsumoAjax($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE Insumo like ? ORDER BY Insumo";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY Insumo";
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

    function obtenerTotalInsumoModelo($dato)
    {
        $sql = "SELECT totalImsumos, Insumo FROM $this->tabla WHERE Insumo = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
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

    function actualizarInsumoTotalModelo($total, $insumo)
    {
        $sql = "UPDATE $this->tabla SET totalImsumos=? WHERE Insumo = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $total, PDO::PARAM_STR);
            $stms->bindParam(2, $insumo, PDO::PARAM_STR);
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function listarInsumoReporteModelo($insumo)
    {
        $sql = "SELECT * FROM $this->tabla WHERE Insumo = ? ORDER BY Insumo DESC";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            $stms->bindParam(1, $insumo, PDO::PARAM_STR);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function contarInsumosReportModelo()
    {
        $sql = "SELECT COUNT(Insumo) AS CONT FROM $this->tabla";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}

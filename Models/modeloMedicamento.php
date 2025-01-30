<?php

require_once 'conexion.php';

class ModeloMedicamento
{
    public $tabla = 'medicamentos';
    function listarMedicamentoModelo()
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

    function contarDatoaMedicamaneotModelo()
    {
        $sql = "SELECT COUNT(Medicamento) FROM $this->tabla";
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

    function registrarMedicamentoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(Medicamento, TotalMedicamento, tipoMedicamento) VALUES (?,?,?)";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['medicamento'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['cantidad'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['tipo'], PDO::PARAM_STR);
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

    function consultarMedicamentoModelo($dato)
    {
        $sql = "SELECT * FROM $this->tabla WHERE IdMedicamento = ?";
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

    function actualizarMedicamentoModelo($dato)
    {
        $sql = "UPDATE medicamentos SET Medicamento=?,TotalMedicamento=?,tipoMedicamento=? WHERE IdMedicamento = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['medicamento'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['cantidad'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['tipo'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['id'], PDO::PARAM_INT);
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

    function consultarMedicamentoAjax($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE Medicamento like ? ORDER BY Medicamento";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY Medicamento";
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

    function obtenerTotalMedicamentoModelo($dato)
    {
        $sql = "SELECT TotalMedicamento, Medicamento FROM $this->tabla WHERE Medicamento = ?";
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

    function actualizarMedicamentoTotalModelo($total, $insumo)
    {
        $sql = "UPDATE $this->tabla SET TotalMedicamento=? WHERE Medicamento = ?";
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

    function listarMedicamentoReporteModelo($insumo)
    {
        $sql = "SELECT * FROM $this->tabla WHERE Medicamento = ? ORDER BY Medicamento DESC";
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
}

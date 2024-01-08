<?php

require_once 'conexion.php';
class ModeloExamenFisico
{
    public $tabla = 'examenfisico';
    function registrarExamenFisicoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (temperatura, pulso, mucosas, llenadoCapilar, Dolor, cardiaca, respiratoria, tusigeno, deshidratacion, condicionCorporal, peso, gangliosLinfaticos, Observaciones, idFechaIngreso, idMascota) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['temperaturas'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['pulso'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['mucosa'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['llenadoCapilar'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['dolor'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['cardiaca'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['respiratoria'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['tusigeno'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['deshidratacion'], PDO::PARAM_STR);
            $stms->bindParam(10, $dato['condicionCorporal'], PDO::PARAM_STR);
            $stms->bindParam(11, $dato['peso'], PDO::PARAM_STR);
            $stms->bindParam(12, $dato['gangliosLinfaticos'], PDO::PARAM_STR);
            $stms->bindParam(13, $dato['observaciones'], PDO::PARAM_STR);
            $stms->bindParam(14, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(15, $dato['idMascota'], PDO::PARAM_INT);
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

    function consultaExamen($id)
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

    function actualizarExamenFisicoModelo($temperaturas, $pulso, $mucosa, $llenadoCapilar, $dolor, $cardiaca, $respiratoria, $tusigeno, $deshidratacion, $condicionCorporal, $peso, $observaciones, $gangliosLinfaticos ,$idExamen)
    { {
            $sql = "UPDATE $this->tabla SET temperatura = ?, pulso = ?, mucosas = ?, llenadoCapilar = ?, Dolor = ?, cardiaca = ?, respiratoria = ?, tusigeno = ?, deshidratacion = ?, condicionCorporal = ?, peso = ?, gangliosLinfaticos = ?, Observaciones = ? WHERE idExamenFisico = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($idExamen != '') {
                $stms->bindParam(1, $temperaturas, PDO::PARAM_STR);
                $stms->bindParam(2, $pulso, PDO::PARAM_STR);
                $stms->bindParam(3, $mucosa, PDO::PARAM_STR);
                $stms->bindParam(4, $llenadoCapilar, PDO::PARAM_STR);
                $stms->bindParam(5, $dolor, PDO::PARAM_STR);
                $stms->bindParam(6, $cardiaca, PDO::PARAM_STR);
                $stms->bindParam(7, $respiratoria, PDO::PARAM_STR);
                $stms->bindParam(8, $tusigeno, PDO::PARAM_STR);
                $stms->bindParam(9, $deshidratacion, PDO::PARAM_STR);
                $stms->bindParam(10, $condicionCorporal, PDO::PARAM_STR);
                $stms->bindParam(11, $peso, PDO::PARAM_STR);
                $stms->bindParam(12, $gangliosLinfaticos, PDO::PARAM_STR);
                $stms->bindParam(13, $observaciones, PDO::PARAM_STR);
                $stms->bindParam(14, $idExamen, PDO::PARAM_INT);
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
}

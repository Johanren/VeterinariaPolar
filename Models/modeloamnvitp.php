<?php

require_once 'conexion.php';

class ModeloAMNVIPT
{
    public $tabla = 'diagnostico';
    function registrarAMNVIPTModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (damnvitp, planDiagnostico, diagnosticodefinitivo, pronostico, idFechaIngreso, idMascota) VALUES (?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['DAMNVITP'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['planDiagnostico'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['diagnosticoDefinitivo'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['pronostico'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(6, $dato['idMascota'], PDO::PARAM_INT);
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

    function consultaDAM($id)
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

    function actualizarAMNVIPTModelo($damnvitp, $planDiagnostico, $diagnosticoDefinitivo, $pronostico, $idDiagnostico)
    {
        $sql = "UPDATE $this->tabla SET damnvitp = ?, planDiagnostico = ?, diagnosticodefinitivo = ?, pronostico = ? WHERE idDiagnostico = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idDiagnostico != '') {
            $stms->bindParam(1, $damnvitp, PDO::PARAM_STR);
            $stms->bindParam(2, $planDiagnostico, PDO::PARAM_STR);
            $stms->bindParam(3, $diagnosticoDefinitivo, PDO::PARAM_STR);
            $stms->bindParam(4, $pronostico, PDO::PARAM_STR);
            $stms->bindParam(5, $idDiagnostico, PDO::PARAM_INT);
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

<?php

require_once 'conexion.php';

class ModeloPlanCasa
{
    public $tabla = 'terapeuticocasa';
    function registrarPlanCasaModelo($principioActivo, $posologia, $dosis, $via, $frecuencia, $duracion, $observacionesHospitalario, $id, $idMax)
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

    function consultarPlanCasa($id)
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

    function ListarPlanCasa()
    {
        $sql = "SELECT * FROM $this->tabla";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        try {
            $stms->execute();
            return $stms->fetchAll();
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function actualizarPlanCasaModelo($principioActivo, $posologia, $dosis, $via, $frecuencia, $duracion, $observacionesHospitalario, $id)
    {
        $sql = "UPDATE $this->tabla SET principioActivo = ?, posologia = ?, dosis = ?, via = ?, frecuencia = ?, duracion = ?, observaciones = ? WHERE idTerapeuticoCasa = ? ";
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
}

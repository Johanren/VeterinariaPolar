<?php

require_once 'conexion.php';
class ModeloFechaMedico
{
    public $tabla = 'fechamedico';
    function registrarFechaMedicoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(idMedico, idFecha) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idMedico'], PDO::PARAM_INT);
            $stms->bindParam(2, $dato['idFecha'], PDO::PARAM_INT);
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

    function consultarFechaMedicoModelo($id)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN medico ON medico.idMedico = fechamedico.idMedico WHERE fechamedico.idFecha = ?";
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
}

<?php

require_once 'conexion.php';
class ModeloNotasProgreso
{
    public $tabla = 'notasprogreso';
    function RegistrarNotasProcesoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (progreso, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['notasProgreso'], PDO::PARAM_STR);
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

    function consultarNotaProgreso($id){
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

    function actualizarNotasProgresoModelo($notasProgreso, $idNotas)
    {
        $sql = "UPDATE $this->tabla SET progreso = ? WHERE idProgreso = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idNotas != '') {
            $stms->bindParam(1, $notasProgreso, PDO::PARAM_STR);
            $stms->bindParam(2, $idNotas, PDO::PARAM_INT);
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

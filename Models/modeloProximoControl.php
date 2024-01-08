<?php

require_once 'conexion.php';
class ModeloProximoControl
{
    public $tabla = 'proximocontrol';
    function RegistrarProximoControlModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (controlProximo, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['proximoControl'], PDO::PARAM_STR);
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

    function consultaProximoControl($id)
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

    function actualizarProximoControlModelo($proximoControl, $idProximo)
    {
        $sql = "UPDATE $this->tabla SET controlProximo = ? WHERE idControl = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idProximo != '') {
            $stms->bindParam(1, $proximoControl, PDO::PARAM_STR);
            $stms->bindParam(2, $idProximo, PDO::PARAM_INT);
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

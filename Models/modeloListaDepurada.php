<?php

require_once 'conexion.php';

class ModeloListaDepurada
{
    public $tabla = 'listadepurada';
    function registrarListaDepuradaModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (depurada, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato['depura'] != '') {
            $stms->bindParam(1, $dato['depura'], PDO::PARAM_STR);
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

    function registrarListaDepuradaModelo1($depurado, $idFecha, $id)
    {
        $sql = "INSERT INTO $this->tabla (depurada, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($depurado != '') {
            $stms->bindParam(1, $depurado, PDO::PARAM_STR);
            $stms->bindParam(2, $idFecha, PDO::PARAM_INT);
            $stms->bindParam(3, $id, PDO::PARAM_INT);
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

    function consultarDepura($id)
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

    function actualizarDepuraModelo($depura, $idDepura){
        $sql = "UPDATE $this->tabla SET depurada = ? WHERE idListaDepurada = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idDepura != '') {
            $stms->bindParam(1, $depura, PDO::PARAM_STR);
            $stms->bindParam(2, $idDepura, PDO::PARAM_INT);
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

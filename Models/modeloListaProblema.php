<?php
require_once 'conexion.php';

class ModeloListaProblema
{
    public $tabla = 'listaproblema';
    function registrarListaProblemaModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (problema, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato['problema'] != '') {
            $stms->bindParam(1, $dato['problema'], PDO::PARAM_STR);
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

    function registrarListaProblemaModelo1($problema, $idFecha, $id)
    {
        $sql = "INSERT INTO $this->tabla (problema, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($problema != '') {
            $stms->bindParam(1, $problema, PDO::PARAM_STR);
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



    function consultaProblema($id)
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

    function actualizarProblemaModelo($problema, $idProblema)
    {
        $sql = "UPDATE $this->tabla SET problema = ? WHERE idProblema = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idProblema != '') {
            $stms->bindParam(1, $problema, PDO::PARAM_STR);
            $stms->bindParam(2, $idProblema, PDO::PARAM_INT);
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

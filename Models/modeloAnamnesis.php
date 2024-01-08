<?php
require_once 'conexion.php';
class ModeloAnamnesis
{
    public $tabla = 'anamnesiscatemnesis';
    function registrarAnemesisModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (motivoConsulta, signosObservados, causaAparente, tratamiento, idFechaIngreso, idMascota) VALUES (?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['motivoConsulta'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['signosObservados'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['causaPaciente'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['tratamiento'], PDO::PARAM_STR);
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

    function consultaAnemesis($id){
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

    function actualizarAnemesisModelo($idAnemesis, $motivoConsulta, $signosObservados, $causaAparente, $tratamiento){
        $sql = "UPDATE $this->tabla SET motivoConsulta = ?, signosObservados = ?, causaAparente = ?, tratamiento = ? WHERE idAnamnesisCatemnesis = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idAnemesis != '') {
            $stms->bindParam(1, $motivoConsulta, PDO::PARAM_STR);
            $stms->bindParam(2, $signosObservados, PDO::PARAM_STR);
            $stms->bindParam(3, $causaAparente, PDO::PARAM_STR);
            $stms->bindParam(4, $tratamiento, PDO::PARAM_STR);
            $stms->bindParam(5, $idAnemesis, PDO::PARAM_INT);
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

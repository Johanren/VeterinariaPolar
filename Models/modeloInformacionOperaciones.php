<?php

require_once 'conexion.php';

class ModeloInformacionOperaciones
{
    public $tabla = 'informacionoperaciones';
    function registrarInformacionOperacionesModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (procedimiento, tecnica, explicacionTecnica, ventajas, ciudad, consecuencias, secuelas, riesgo, extraordinarias, especialidad, alternativas, idMascota, idFechaIngreso) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['procedimiento'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['tecnica'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['explicacionTecnica'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['ventajas'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['ciudad'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['consecuencias'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['secuelas'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['riesgo'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['extraordinarias'], PDO::PARAM_STR);
            $stms->bindParam(10, $dato['especialidad'], PDO::PARAM_STR);
            $stms->bindParam(11, $dato['alternativas'], PDO::PARAM_STR);
            $stms->bindParam(12, $dato['idMascota'], PDO::PARAM_INT);
            $stms->bindParam(13, $dato['idFecha'], PDO::PARAM_INT);
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

    function consultarInformacionOperacionesModelo($id)
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

    function actualizarInformacionOperacionesModelo($idOperaciones, $procedimiento, $tecnica, $explicacionTecnica, $ventajas, $ciudad, $consecuencias, $secuelas, $riesgo, $extraordinarias, $especialidad, $alternativas)
    {
        $sql = "UPDATE $this->tabla SET procedimiento = ?, tecnica = ?, explicacionTecnica = ?, ventajas = ?, ciudad = ?, consecuencias = ?, secuelas = ?, riesgo = ?, extraordinarias = ?, especialidad = ?, alternativas = ? WHERE idOperaciones = ? ";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($idOperaciones != '') {
            $stms->bindParam(1, $procedimiento, PDO::PARAM_STR);
            $stms->bindParam(2, $tecnica, PDO::PARAM_STR);
            $stms->bindParam(3, $explicacionTecnica, PDO::PARAM_STR);
            $stms->bindParam(4, $ventajas, PDO::PARAM_STR);
            $stms->bindParam(5, $ciudad, PDO::PARAM_STR);
            $stms->bindParam(6, $consecuencias, PDO::PARAM_STR);
            $stms->bindParam(7, $secuelas, PDO::PARAM_STR);
            $stms->bindParam(8, $riesgo, PDO::PARAM_STR);
            $stms->bindParam(9, $extraordinarias, PDO::PARAM_STR);
            $stms->bindParam(10, $especialidad, PDO::PARAM_STR);
            $stms->bindParam(11, $alternativas, PDO::PARAM_STR);
            $stms->bindParam(12, $idOperaciones, PDO::PARAM_INT);
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

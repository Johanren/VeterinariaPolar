<?php
require_once 'conexion.php';
class ModeloLogin{
    public $tabla = 'medico';
    function ModeloLoginIngresar($dato){
        $sql = "SELECT * FROM $this->tabla INNER JOIN roles ON medico.idRol = roles.idRol WHERE medico.MP = ? AND medico.password = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['mp'], PDO::PARAM_INT);
            $stms->bindParam(2, $dato['clave'], PDO::PARAM_STR);
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
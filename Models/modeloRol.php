<?php

require_once 'conexion.php';
class ModeloRol{
    public $tabla = 'roles';
    function listarRolModelo(){
        $sql = "SELECT * FROM $this->tabla";
        $conn =  new Conexion();
        $stmt = $conn->conectar()->prepare($sql);
        try {
            if ($stmt->execute()) {
                return $stmt->fetchAll();
            }else{
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}
<?php

require_once 'conexion.php';

class ModeloFotoPeluqueria{
    public $tabla = 'fotopeluqueria';
    function registrarFotoPeluqueriaModelo($dato){
        $sql = "INSERT INTO $this->tabla(fotoAntes, fotoDespues, observaciones, idFechaIngreso, idMascota) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['antes'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['despues'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['observaciones'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(5, $dato['idMascota'], PDO::PARAM_INT);
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

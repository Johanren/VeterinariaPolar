<?php
require_once 'conexion.php';
class ModeloEdad{
    public $tabla = 'edad';

    function consultarEdadAjaxModelo($dato){
        if($dato != ''){
            $dato = '%'.$dato.'%';
            $sql = "SELECT * FROM $this->tabla WHERE edad like ? ORDER BY edad";
        }else{
            $sql = "SELECT * FROM $this->tabla ORDER BY edad";
        }

        try{
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if($dato != ''){
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
            }
            if($stms->execute()){
                return $stms->fetchAll();
            }else{
                return [];
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
        
    }

    function registrarEdadModelo($dato){
        $sql = "INSERT INTO $this->tabla(edad, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['edad'], PDO::PARAM_STR);
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

}
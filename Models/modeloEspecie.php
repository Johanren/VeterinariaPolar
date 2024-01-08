<?php
require_once 'conexion.php';
class ModeloEspecie{

public $tabla = 'especie';

    function consultarEspecieAjaxModelo($dato){
        if($dato != ''){
            $dato = '%'.$dato.'%';
            $sql = "SELECT * FROM $this->tabla WHERE especie like ? ORDER BY especie";
        }else{
            $sql = "SELECT * FROM $this->tabla ORDER BY especie";
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
}
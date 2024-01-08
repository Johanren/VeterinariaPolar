<?php
require_once 'conexion.php';
class ModeloGenero
{

public $tabla = 'genero';

    function consultarGeneroAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE genero like ? ORDER BY genero";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY genero";
        }

        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
            }
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }
}

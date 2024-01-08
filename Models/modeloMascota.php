<?php
require_once 'conexion.php';
class ModeloMascota{
    public $tabla = 'mascota';

    function consultarMascotaAjaxModelo($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM `mascota` inner JOIN cliente on mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie on mascota.idEspecie = especie.idEspecie WHERE cliente.numeroCedula LIKE ? ORDER BY cliente.numeroCedula";
        } else {
            $sql = "SELECT * FROM `mascota` inner JOIN cliente on mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie on mascota.idEspecie = especie.idEspecie ORDER BY cliente.numeroCedula";
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

    function registrarMascotaModelo($dato){
        $sql = "INSERT INTO $this->tabla(nombreMascota, idEspecie, idGenero, Entero, idCliente) VALUES (?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($dato != ''){
            $stms->bindParam(1, $dato['nombreMascota'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idEspecie'], PDO::PARAM_INT);
            $stms->bindParam(3, $dato['idGenero'], PDO::PARAM_INT);
            $stms->bindParam(4, $dato['entero'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['idCliente'], PDO::PARAM_INT);
        }
        try{
            if($stms->execute()){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }

    }

    function consultarIdMascotaModelo($dato){
        $sql = "SELECT mascota.idMascota FROM $this->tabla INNER JOIN cliente on mascota.idCliente = cliente.idCliente WHERE cliente.idCliente = ? AND mascota.nombreMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($dato != ''){
            $stms->bindParam(1, $dato['idCliente'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nombreMascota'], PDO::PARAM_STR);
        }
        try{
            if($stms->execute()){
                return $stms->fetchAll();
            }else{
                return false;
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

    function consultarIdClieMascotaModelo($dato){
        $sql = "SELECT mascota.idMascota FROM $this->tabla INNER JOIN cliente on mascota.idCliente = cliente.idCliente WHERE cliente.numeroCedula = ? AND mascota.nombreMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if($dato != ''){
            $stms->bindParam(1, $dato['ccDocumento'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nombreMascota'], PDO::PARAM_STR);
        }
        try{
            if($stms->execute()){
                return $stms->fetchAll();
            }else{
                return false;
            }
        }catch(PDOException $e){
            print_r($e->getMessage());
        }
    }

}
<?php

require_once 'conexion.php';

class ModeloHora{
    public $tabla = 'horaingreso';
    function registrarModeloHora($dato){
        $sql = "INSERT INTO $this->tabla(hora, idFechaIngreso, idMascota) VALUES (?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['hora'], PDO::PARAM_STR);
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

    function consultarHistoricoHoraMascotaModelo($dato){
        $sql = "SELECT * FROM fotopeluqueria INNER JOIN mascota ON mascota.idMascota = fotopeluqueria.idMascota INNER JOIN fechaingreso ON fechaingreso.idFechaIngreso = fotopeluqueria.idFechaIngreso INNER JOIN edad ON edad.idFechaIngreso = fotopeluqueria.idFechaIngreso INNER JOIN cliente ON cliente.idCliente = mascota.idCliente INNER JOIN horaingreso ON horaingreso.idFechaIngreso = fotopeluqueria.idFechaIngreso INNER JOIN especie ON especie.idEspecie = mascota.idEspecie INNER JOIN genero ON mascota.idGenero = genero.idGenero WHERE fotopeluqueria.idFechaIngreso = ? AND fotopeluqueria.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_INT);
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
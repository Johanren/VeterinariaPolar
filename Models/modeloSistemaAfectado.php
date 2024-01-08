<?php
require_once 'conexion.php';

class ModeloSistemaAfectado{
    public $tabla = 'sistemasafectados';
    function registrarSistemaAfectadoModelo($dato){
        $sql = "INSERT INTO $this->tabla (circulatorio, nervisoso, organosSentidos, Digestivo, Genitourinario, Linfatico, Respiratorio, Oseo, Dermatologico, idFechaIngreso, idMascota) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['circulatorio'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['nervioso'], PDO::PARAM_STR);
            $stms->bindParam(3, $dato['organosSentidos'], PDO::PARAM_STR);
            $stms->bindParam(4, $dato['digestivo'], PDO::PARAM_STR);
            $stms->bindParam(5, $dato['genitourinario'], PDO::PARAM_STR);
            $stms->bindParam(6, $dato['linfatico'], PDO::PARAM_STR);
            $stms->bindParam(7, $dato['respiratorio'], PDO::PARAM_STR);
            $stms->bindParam(8, $dato['oseo'], PDO::PARAM_STR);
            $stms->bindParam(9, $dato['dermatologico'], PDO::PARAM_STR);
            $stms->bindParam(10, $dato['idFecha'], PDO::PARAM_INT);
            $stms->bindParam(11, $dato['idMascota'], PDO::PARAM_INT);
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

    function consultaSistema($id){
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

    function actualizarSistemaAfectadoModelo($circulatorio, $nervioso, $linfatico, $digestivo, $genitourinario, $respiratorio, $oseo, $dermatologico, $organosSentidos, $idSistema){

        $sql = "UPDATE $this->tabla SET circulatorio = ?, nervisoso = ?, organosSentidos = ?, Digestivo = ?, Genitourinario = ?, Linfatico = ?, Respiratorio = ?, Oseo = ?, Dermatologico = ? WHERE idSitemasAfectados = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($idSistema != '') {
                $stms->bindParam(1, $circulatorio, PDO::PARAM_STR);
                $stms->bindParam(2, $nervioso, PDO::PARAM_STR);
                $stms->bindParam(3, $organosSentidos, PDO::PARAM_STR);
                $stms->bindParam(4, $digestivo, PDO::PARAM_STR);
                $stms->bindParam(5, $genitourinario, PDO::PARAM_STR);
                $stms->bindParam(6, $linfatico, PDO::PARAM_STR);
                $stms->bindParam(7, $respiratorio, PDO::PARAM_STR);
                $stms->bindParam(8, $oseo, PDO::PARAM_STR);
                $stms->bindParam(9, $dermatologico, PDO::PARAM_STR);
                $stms->bindParam(10, $idSistema, PDO::PARAM_INT);
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

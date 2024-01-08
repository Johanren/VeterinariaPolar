<?php

require_once 'conexion.php';
class ModeloMedico
{
    public $tabla = 'medico';
    function consultarMedicoAjax($dato)
    {
        if ($dato != '') {
            $dato = '%' . $dato . '%';
            $sql = "SELECT * FROM $this->tabla WHERE medico like ? ORDER BY medico";
        } else {
            $sql = "SELECT * FROM $this->tabla ORDER BY medico";
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

    function contarDatoaMedicoModelo(){
        $sql = "SELECT COUNT(medico) FROM $this->tabla";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($stms->execute()) {
                return $stms->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }

    }

    function listarMedicoModelo($dato, $LIM)
    {
        if ($dato != null) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN roles ON medico.idRol = roles.idRol WHERE medico.medico like ?";
        } else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN roles ON medico.idRol = roles.idRol LIMIT ?,?";
        }
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $dato .= '%';
                $stms->bindParam(1, $dato, PDO::PARAM_STR);
            } else {
                $stms = $conn->conectar()->prepare($sql);
                $stms->bindParam(1, $LIM['pagina'], PDO::PARAM_INT);
                $stms->bindParam(2, $LIM['limit'], PDO::PARAM_INT);
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

    function consultarMedicoModelo($dato)
    {
        $sql = "SELECT * FROM $this->tabla WHERE idMedico = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato, PDO::PARAM_INT);
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

    function actualizarMedicoModelo($dato)
    {
        $sql = "UPDATE $this->tabla SET activo=?,idRol=? WHERE idMedico = ?";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['activo'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['rol'], PDO::PARAM_INT);
                $stms->bindParam(3, $dato['idMedico'], PDO::PARAM_INT);
            }
            if ($stms->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    function registrarMedicoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla (medico, password, MP, activo, idRol) VALUES (?,?,?,?,?)";
        try {
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != null) {
                $stms->bindParam(1, $dato['medico'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['password'], PDO::PARAM_STR);
                $stms->bindParam(3, $dato['MP'], PDO::PARAM_STR);
                $stms->bindParam(4, $dato['activo'], PDO::PARAM_STR);
                $stms->bindParam(5, $dato['rol'], PDO::PARAM_INT);
            }
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

<?php
require_once 'conexion.php';
class ModeloFechaIngreso
{
    public $tabla = 'fechaingreso';
    function registrarFechaingresoModelo($dato)
    {
        $sql = "INSERT INTO $this->tabla(fecha, idMascota) VALUES (?,?)";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['fecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_INT);
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

    function conusltarIdModelo()
    {
        $sql = "SELECT MAX(idFechaIngreso) AS idFechaIngreso FROM $this->tabla";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
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

    function consultarFechaCliente($dato)
    {
        if ($dato['fechaIngreso'] == null) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso WHERE cliente.numeroCedula = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['numeroCedula'], PDO::PARAM_STR);
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
        }elseif ($dato['numeroCedula'] == null) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso WHERE fechaingreso.fecha = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['fechaIngreso'], PDO::PARAM_STR);
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
        } else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso WHERE fechaingreso.fecha = ? AND cliente.numeroCedula = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['fechaIngreso'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['numeroCedula'], PDO::PARAM_STR);
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

    function consultarHoraMascota($dato){
        if ($dato['fechaIngreso'] == null) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN horaingreso ON horaingreso.idFechaIngreso = fechaingreso.idFechaIngreso WHERE cliente.numeroCedula = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['numeroCedula'], PDO::PARAM_STR);
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
        }elseif ($dato['numeroCedula'] == null) {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN horaingreso ON horaingreso.idFechaIngreso = fechaingreso.idFechaIngreso WHERE fechaingreso.fecha = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['fechaIngreso'], PDO::PARAM_STR);
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
        }else {
            $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN horaingreso ON horaingreso.idFechaIngreso = fechaingreso.idFechaIngreso WHERE fechaingreso.fecha = ? AND cliente.numeroCedula = ?";
            $conn = new Conexion();
            $stms = $conn->conectar()->prepare($sql);
            if ($dato != '') {
                $stms->bindParam(1, $dato['fechaIngreso'], PDO::PARAM_STR);
                $stms->bindParam(2, $dato['numeroCedula'], PDO::PARAM_STR);
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

    function listarMascotaClienteFecha($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarControl($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso INNER JOIN sistemasafectados ON fechaingreso.idFechaIngreso = sistemasafectados.idFechaIngreso INNER JOIN diagnostico ON fechaingreso.idFechaIngreso = diagnostico.idFechaIngreso INNER JOIN recomendaciones ON fechaingreso.idFechaIngreso = recomendaciones.idFechaIngreso INNER JOIN proximocontrol ON fechaingreso.idFechaIngreso = proximocontrol.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarrecomenda($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso INNER JOIN sistemasafectados ON fechaingreso.idFechaIngreso = sistemasafectados.idFechaIngreso INNER JOIN diagnostico ON fechaingreso.idFechaIngreso = diagnostico.idFechaIngreso INNER JOIN recomendaciones ON fechaingreso.idFechaIngreso = recomendaciones.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarPronostico($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso INNER JOIN sistemasafectados ON fechaingreso.idFechaIngreso = sistemasafectados.idFechaIngreso INNER JOIN diagnostico ON fechaingreso.idFechaIngreso = diagnostico.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarSistema($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso INNER JOIN sistemasafectados ON fechaingreso.idFechaIngreso = sistemasafectados.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarExamen($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarAnamnesis($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

    function listarTodoVeretinatia($dato)
    {
        $sql = "SELECT * FROM $this->tabla INNER JOIN mascota ON fechaingreso.idMascota = mascota.idMascota INNER JOIN cliente ON mascota.idCliente = cliente.idCliente INNER JOIN genero ON mascota.idGenero = genero.idGenero INNER JOIN especie ON mascota.idEspecie = especie.idEspecie INNER JOIN edad ON fechaingreso.idFechaIngreso = edad.idFechaIngreso INNER JOIN tipoconsulta ON fechaingreso.idFechaIngreso = tipoconsulta.idFechaIngreso INNER JOIN anamnesiscatemnesis ON fechaingreso.idFechaIngreso = anamnesiscatemnesis.idFechaIngreso INNER JOIN examenfisico ON fechaingreso.idFechaIngreso = examenfisico.idFechaIngreso INNER JOIN sistemasafectados ON fechaingreso.idFechaIngreso = sistemasafectados.idFechaIngreso INNER JOIN diagnostico ON fechaingreso.idFechaIngreso = diagnostico.idFechaIngreso INNER JOIN recomendaciones ON fechaingreso.idFechaIngreso = recomendaciones.idFechaIngreso INNER JOIN proximocontrol ON fechaingreso.idFechaIngreso = proximocontrol.idFechaIngreso INNER JOIN notasprogreso ON fechaingreso.idFechaIngreso = notasprogreso.idFechaIngreso WHERE fechaingreso.idFechaIngreso = ? AND mascota.idMascota = ?";
        $conn = new Conexion();
        $stms = $conn->conectar()->prepare($sql);
        if ($dato != '') {
            $stms->bindParam(1, $dato['idFecha'], PDO::PARAM_STR);
            $stms->bindParam(2, $dato['idMascota'], PDO::PARAM_STR);
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

<?php
class Conexion{
    public function conectar(){
		$pdo = new PDO("mysql:host=localhost;dbname=veterinariapolar","root","");
		return $pdo;
	}
}
?>
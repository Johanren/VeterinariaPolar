<?php
header('Content-Type: application/json');
require_once '../Models/conexion.php';
$conn = new Conexion();
$stmt = $conn->conectar()->prepare("SELECT * FROM terapeuticocasa");
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);
exit();

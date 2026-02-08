<?php
require_once "conexion.php";
session_start();

$solicitud_id = $_POST['solicitud_id'];
$cuidador_id  = $_SESSION['cuidador_id'];

$sql = "
UPDATE solicitudes
SET estado = 'aceptado', cuidador_id = ?
WHERE id = ? AND estado = 'pendiente'
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cuidador_id, $solicitud_id);
$stmt->execute();

header("Location: ../panel/empleado.php");

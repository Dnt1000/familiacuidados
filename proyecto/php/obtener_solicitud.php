<?php
require_once "conexion.php";
session_start();

$cliente_id = $_SESSION['id'] ?? 1;

$sql = "
SELECT s.estado,
       c.nombre,
       c.telefono
FROM solicitudes s
LEFT JOIN cuidadores c ON s.cuidador_id = c.id
WHERE s.cliente_id = ?
ORDER BY s.id DESC
LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_assoc();

echo json_encode($data ?: null);

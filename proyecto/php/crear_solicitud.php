<?php
require_once "conexion.php";
session_start();

// Seguridad básica
if (!isset($_POST['servicio_id'])) {
    header("Location: ../html/index.php");
    exit;
}

$servicio_id = intval($_POST['servicio_id']);

// (opcional) si querés exigir login
$cliente_id = $_SESSION['cliente_id'] ?? null;

// Insertar solicitud
$stmt = $conn->prepare("
    INSERT INTO solicitudes (servicio_id, estado, fecha)
    VALUES (?, 'pendiente', NOW())
");

$stmt->bind_param("i", $servicio_id);
$stmt->execute();

// Redirección con feedback
header("Location: ../html/index.php?solicitud=ok");
exit;

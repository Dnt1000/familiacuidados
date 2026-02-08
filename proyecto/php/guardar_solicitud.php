<?php
require_once "conexion.php";
require_once "matching.php";
session_start();

$cliente_id  = $_SESSION['id'] ?? 1;
$servicio_id = $_POST['servicio_id'];
$urgencia    = $_POST['urgencia'] ?? 'ahora';

// ubicación (ejemplo, ajustá a tu formulario real)
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$sql = "INSERT INTO solicitudes (cliente_id, servicio_id, lat, lng, estado)
        VALUES (?, ?, ?, ?, 'pendiente')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iidd", $cliente_id, $servicio_id, $lat, $lng);

if ($stmt->execute()) {

    $solicitud_id = $conn->insert_id;

    asignarCuidador($conn, $solicitud_id, $lat, $lng);

    echo "Solicitud enviada correctamente";

} else {
    echo "Error al enviar solicitud";
}

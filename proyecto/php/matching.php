<?php

function asignarCuidador($conn, $solicitud_id, $lat, $lng) {

    $sql = "
    SELECT id,
    (
      6371 * acos(
        cos(radians(?)) *
        cos(radians(lat)) *
        cos(radians(lng) - radians(?)) +
        sin(radians(?)) *
        sin(radians(lat))
      )
    ) AS distancia
    FROM cuidadores
    WHERE disponible = 1
    ORDER BY distancia ASC
    LIMIT 1
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddd", $lat, $lng, $lat);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($cuidador = $resultado->fetch_assoc()) {

        // asignar cuidador
        $update = $conn->prepare("
            UPDATE solicitudes
            SET cuidador_id = ?, estado = 'aceptado'
            WHERE id = ?
        ");
        $update->bind_param("ii", $cuidador['id'], $solicitud_id);
        $update->execute();

        // marcar cuidador como no disponible
        $updateCuidador = $conn->prepare("
            UPDATE cuidadores
            SET disponible = 0
            WHERE id = ?
        ");
        $updateCuidador->bind_param("i", $cuidador['id']);
        $updateCuidador->execute();

        return true;
    }

    return false;
}

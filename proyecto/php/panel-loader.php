<?php
require_once "../php/seguridad.php";


$rol = $_SESSION['rol'] ?? null;

switch ($rol) {
    case 'admin':
        proteger(['admin']);
        require "../panel/admin.php";
        break;

    case 'empleado':
        proteger(['empleado']);
        require "../panel/empleado.php";
        break;

    case 'desarrollador':
        proteger(['desarrollador']);
        require "../panel/dev.php";
        break;

    case 'cliente':
        proteger(['cliente']);
        require "../panel/cliente.php";
        break;

    default:
        header("HTTP/1.1 403 Forbidden");
        echo "<p>No autorizado</p>";
}


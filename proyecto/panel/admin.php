<?php
require_once "../php/seguridad.php";
proteger(['admin']);
?>

<h2 class="panel-titulo">👑 Panel Administrador</h2>

<p class="panel-saludo">
    Hola <strong><?= htmlspecialchars($_SESSION['nombre'] ?? 'Admin') ?></strong>
</p>

<div class="panel-seccion">
    <h3>Gestión</h3>
    <ul class="panel-lista">
        <li>📄 Revisar CV</li>
        <li>✅ Aceptar / rechazar usuarios</li>
        <li>⛔ Banear usuarios</li>
    </ul>
</div>

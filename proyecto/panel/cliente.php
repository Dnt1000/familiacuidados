<?php
require_once "../php/seguridad.php";
proteger(['cliente']);
?>

<h2 class="panel-titulo">👤 Panel Cliente</h2>

<p class="panel-saludo">
    Hola <strong><?= htmlspecialchars($_SESSION['nombre'] ?? 'Cliente') ?></strong>
</p>

<div class="panel-seccion">
    <h3>Mis opciones</h3>

    <ul class="panel-lista">
        <li>📄 Ver mis datos</li>
        <li>📬 Consultar estado de solicitudes</li>
        <li>📝 Enviar documentación</li>
    </ul>

    <div id="estado-solicitud" class="panel-estado"></div>
</div>
<script src="../js/script.js"></script>

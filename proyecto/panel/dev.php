<?php
require_once "../php/seguridad.php";
proteger(['desarrollador']);
?>

<h2 class="panel-titulo">💻 Panel Desarrollador</h2>

<p class="panel-saludo">
    Hola <strong><?= htmlspecialchars($_SESSION['nombre'] ?? 'Dev') ?></strong>
</p>

<div class="panel-seccion">
    <h3>Desarrollo</h3>
    <ul class="panel-lista">
        <li>🛠 Ver logs del sistema</li>
        <li>⚙️ Configurar módulos</li>
        <li>🚀 Deploy / mantenimiento</li>
    </ul>
</div>

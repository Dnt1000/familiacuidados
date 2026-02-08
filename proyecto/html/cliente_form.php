<?php
require_once "../config/database.php";

$servicios = $conn->query("SELECT id, nombre FROM servicios WHERE activo = 1");
?>

<form action="../php/guardar_solicitud.php" method="POST">

    <input type="text" name="nombre" placeholder="Tu nombre" required>
    <input type="tel" name="telefono" placeholder="Teléfono" required>

    <select name="servicio_id" required>
        <option value="">Seleccionar servicio</option>
        <?php while ($s = $servicios->fetch_assoc()): ?>
            <option value="<?= $s['id'] ?>">
                <?= htmlspecialchars($s['nombre']) ?>
            </option>
        <?php endwhile; ?>
    </select>

    <select name="urgencia" required>
        <option value="ahora">Ahora</option>
        <option value="programado">Programar</option>
    </select>

    <button type="submit">Solicitar cuidador</button>

</form>

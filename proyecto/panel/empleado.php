<?php
require_once "../php/conexion.php";
session_start();

if (!isset($_SESSION['cuidador_id'])) {
    header("Location: ../html/login_cuidador.php");
    exit;
}

$sql = "
SELECT s.id, s.estado, sv.nombre AS servicio
FROM solicitudes s
JOIN servicios sv ON s.servicio_id = sv.id
WHERE s.estado = 'pendiente'
ORDER BY s.fecha ASC
";

$solicitudes = $conn->query($sql);
?>

<h2>Solicitudes disponibles</h2>

<?php while ($s = $solicitudes->fetch_assoc()): ?>
    <div class="seccion">
        <strong><?= $s['servicio'] ?></strong><br>
        Estado: <?= $s['estado'] ?><br>

        <form action="../php/aceptar_solicitud.php" method="POST">
            <input type="hidden" name="solicitud_id" value="<?= $s['id'] ?>">
            <button>Aceptar solicitud</button>
        </form>
    </div>
<?php endwhile; ?>

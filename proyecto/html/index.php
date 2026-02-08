<?php
session_start();
require_once "../php/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Familia Cuidados</title>

    <link rel="stylesheet" href="../css/estilo-base.css">
    <link rel="stylesheet" href="../css/estilo-menu.css">
    
    <link rel="stylesheet"href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

</head>
<body>

<!-- ================= HEADER / NAVBAR ================= -->
<header class="topbar">

    <div class="logo">
        <div class="logo-img">
            <img src="../img/logo.jpeg" alt="Familia Cuidados">
        </div>
        <span>Familia Cuidados</span>
    </div>

    <nav class="nav">
        <div class="nav-item">
            <button class="nav-btn">Inicio ▾</button>
            <div class="dropdown">
                <a href="#">Inicio</a>
                <a href="#">Quiénes somos</a>
            </div>
        </div>

<div class="nav-item">
    <button class="nav-btn" id="btn-servicios">
        Servicios ▾
    </button>

    <div class="dropdown" id="menu-servicios">
        <a href="#servicios">Nuestros servicios</a>
        <a href="#contacto">Contacto</a>
    </div>
</div>


    </nav>

    <div class="auth">
        <?php if (!isset($_SESSION['rol'])): ?>

            <a href="login.php" class="btn-login">Iniciar sesión</a>
            <a href="ids.php" class="btn-register">Registrarse</a>

        <?php else: ?>

            <span class="bienvenido">
                👋 Hola, <strong><?= htmlspecialchars($_SESSION['nombre'] ?? 'Usuario') ?></strong>
            </span>

            <?php
            switch ($_SESSION['rol']) {
                case 'admin':
                    $panel = '../panel/admin.php';
                    break;
                case 'empleado':
                    $panel = '../panel/empleado.php';
                    break;
                case 'desarrollador':
                    $panel = '../panel/dev.php';
                    break;
                default:
                    $panel = '../panel/cliente.php';
            }
            ?>

            <button class="btn-panel" onclick="abrirPanel()">Panel</button>

        <?php endif; ?>
    </div>

</header>

<!-- ================= CONTENIDO ================= -->
<main class="contenido">

    <!-- HERO -->
    <section class="hero">
        <div class="hero-inner">
            <h1>
                Cuidado profesional y humano<br>
                para quienes más querés
            </h1>

            <p>
                Acompañamiento, enfermería y atención en salud
                en domicilio u hospital, con profesionales capacitados
                y un trato cercano.
            </p>

            <div class="hero-actions">
            <a href="#servicios" class="btn-panel">Ver servicios</a>
                <a href="#contacto" class="btn-login">Contacto</a>
            </div>
        </div>
    </section>

    <!-- BARRA DE CONFIANZA -->
    <section class="trust">
        <p>
            ✔ Profesionales capacitados &nbsp;
            ✔ Atención personalizada &nbsp;
            ✔ Confianza y confidencialidad
        </p>
    </section>

   <section class="seccion" id='servicios'>
    <h2>Nuestros servicios</h2>

    <div class="servicios-grid">

<?php if (isset($_GET['solicitud']) && $_GET['solicitud'] === 'ok'): ?>
    <p style="color:#22c55e; font-weight:600;">
        ✅ Solicitud enviada correctamente
    </p>
<?php endif; ?>

<div class="servicio">
    <h3>Acompañamiento profesional</h3>
    <p>Presencia humana, responsable y empática.</p>

    <button 
      class="btn-servicio"
      onclick="abrirModalSolicitud(1, 'Acompañamiento profesional')">
      Solicitar Servicio
    </button>
</div>

<div class="servicio">
    <h3>Enfermería a domicilio</h3>
    <p>
        Atención de enfermería profesional: controles, curaciones,
        medicación y seguimiento en el hogar.
    </p>

    <button 
      class="btn-servicio"
      onclick="abrirModalSolicitud(1, 'Enfermeria a Domicilio')">
      Solicitar Servicio
    </button>

</div>

<div class="servicio">
    <h3>Emergencias a domicilio</h3>
    <p>
        Respuesta rápida ante situaciones urgentes,
        priorizando la seguridad y el cuidado inmediato.
    </p>

    <button 
      class="btn-servicio"
      onclick="abrirModalSolicitud(1, 'Emergencia a Domicilio')">
      Solicitar Servicio
    </button>
</div>

<div class="servicio">
    <h3>Fisioterapia</h3>
    <p>
        Rehabilitación física y tratamiento personalizado
        sin necesidad de salir de casa.
    </p>

    <button 
      class="btn-servicio"
      onclick="abrirModalSolicitud(1, 'Fisioterapia')">
      Solicitar Servicio
    </button>
</div>
</section>

<?php
$stmt = $pdo->query("SELECT id, nombre, descripcion FROM servicios");
$servicios = $stmt->fetchAll();
?>
    <!-- CRECIMIENTO FUTURO -->
    <section class="seccion">
        <h2>Seguimos creciendo</h2>

        <p>
            Nuestro compromiso es brindar un servicio cada vez más completo.
            Próximamente incorporaremos:
        </p>

        <ul>
            <li>🚑 Servicio de ambulancias para urgencias</li>
            <li>🏥 Alquiler de equipos médicos</li>
            <li>🛏️ Equipamiento residencial para adultos mayores</li>
        </ul>

        <p class="nota">
            Crecemos junto a las necesidades de nuestros pacientes y sus familias.
        </p>
    </section>

    <!-- TRABAJO -->
    <section class="seccion">
        <h2>Sumate a nuestro equipo</h2>

        <p>
            Si sos cuidador, enfermero o profesional de la salud
            y compartís nuestros valores, queremos conocerte.
        </p>
<br>
        <a
            href="https://docs.google.com/forms/d/e/1RVyBF-bDgIxt9dpLumskH25e-4MSdgToTiHw_1KsJGo/viewform"
            target="_blank"
            class="btn-register"
        >
            Postularme
        </a>
    </section>

    <!-- CONTACTO -->
<section class="seccion" id="contacto">
        <h2>Contacto</h2>

        <p>
            Para consultas, información sobre nuestros servicios
            o contacto comercial:
        </p>

        <p class="mail">
            📩 <strong>info@familia.com</strong>
        </p>
    </section>

</main>

<!-- ================= PANEL / SCRIPTS ================= -->
<script>
    window.USER_ROL = "<?= $_SESSION['rol'] ?? 'guest' ?>";
</script>

<script src="../js/auth.js"></script>

<div id="panel-overlay" class="panel-overlay">
    <div class="panel-modal">
        <button class="cerrar-panel" onclick="cerrarPanel()">✕</button>
        <div id="panel-contenido"></div>
    </div>
</div>

<link rel="stylesheet" href="../css/estilo-panel.css">
<script src="../js/panel.js"></script>

<script>
const btn = document.getElementById("btn-servicios");
const menu = document.getElementById("menu-servicios");

btn.addEventListener("click", (e) => {
    e.stopPropagation();
    menu.classList.toggle("abierto");
});

document.addEventListener("click", () => {
    menu.classList.remove("abierto");
});
</script>

<div id="modal-solicitud" class="modal">
  <div class="modal-contenido modal-dark">

    <button class="cerrar" onclick="cerrarModal()">✕</button>

    <h2 id="modal-servicio-nombre">Solicitar servicio</h2>
    <p class="modal-sub">
      Confirmá la ubicación donde se realizará el servicio.
      Podés mover el pin o editar la dirección.
    </p>

    <form id="form-solicitud">

      <input type="hidden" name="servicio_id" id="servicio_id">
      <input type="hidden" name="lat" id="lat">
      <input type="hidden" name="lng" id="lng">

      <label>📍 Dirección</label>
      <input
        type="text"
        id="direccion"
        name="ubicacion1"
        placeholder="Calle, número, barrio"
        required
      >

      <div id="mapa" class="mapa-modal"></div>

      <button type="submit" class="btn-servicio btn-full">
        Confirmar solicitud
      </button>

    </form>
  </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="../js/solicitud.js"></script>
</body>
</html>

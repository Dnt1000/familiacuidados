<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrarse</title>
    <meta charset="UTF-8">   
    <link rel="stylesheet" href="../css/estilo-base.css">
    <link rel="stylesheet" href="../css/estilo-login.css">
</head>
<body>

<h1>Registrarse</h1>

<form action="../php/rds.php" method="post" novalidate>

    <div>
        <label for="nombre">Usuario</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="<?= htmlspecialchars($_GET['nombre'] ?? '') ?>"
        >
    </div>

    <div>
        <label for="gmail">Gmail</label>
        <input
            type="email"
            id="gmail"
            name="gmail"
            value="<?= htmlspecialchars($_GET['gmail'] ?? '') ?>"
        >
    </div>
    
    <div>
        <label>Contraseña</label>
        <div class="contra">
            <input type="password" id="contra" name="contra" autocomplete="new-password">
            <span class="eye" onclick="togglePassword('contra', 'confirmar')">👁</span>
        </div>
    </div>

    <div>
        <label>Confirmar Contraseña</label>
        <div class="contra">
            <input type="password" id="confirmar" name="confirmar" autocomplete="new-password">
            <span class="eye" onclick="togglePassword('confirmar', 'contra')">👁</span>
        </div>
    </div>

    <p id="error" class="error">
        <?= htmlspecialchars($_GET['error'] ?? '') ?>
    </p>

    <button class="btn-aceptar">Registrarse</button>
</form>

<script src="../js/script.js"></script>

</body>
</html>

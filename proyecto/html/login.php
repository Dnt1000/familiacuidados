<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/estilo-base.css">
    <link rel="stylesheet" href="../css/estilo-login.css">
</head>
<body>

<h1>Iniciar Sesión</h1>

<form action="../php/procesar-ids.php" method="post">

    <div>
        <label>Gmail</label>
        <input type="email" name="gmail" id="gmail" autocomplete="username" required>
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="contra" id="contra" autocomplete="current-password" required>
    </div>

    <p class="error">
        <?= $_GET['error'] ?? '' ?>
    </p>

    <button class="btn-aceptar">Entrar</button>
</form>

</body>
</html>

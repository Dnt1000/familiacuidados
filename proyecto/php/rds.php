<?php
session_start();

$errores = [];
$nombre = trim($_POST['nombre'] ?? '');
$gmail = trim($_POST['gmail'] ?? '');
$contra = $_POST['contra'] ?? '';
$confirmar = $_POST['confirmar'] ?? '';

if ($nombre === '') {
    $errores[] = "Ingresá nombre";
}

if (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Gmail inválido";
}

if (strlen($contra) < 8) {
    $errores[] = "La contraseña debe tener mínimo 8 caracteres";
}

if (!preg_match("/[a-z]/i", $contra)) {
    $errores[] = "La contraseña debe tener al menos una letra";
}

if (!preg_match("/[0-9]/", $contra)) {
    $errores[] = "La contraseña debe tener al menos un número";
}

if ($contra !== $confirmar) {
    $errores[] = "Las contraseñas no coinciden";
}

if ($errores) {
$query = http_build_query([
    "error" => $errores[0],
    "nombre" => $nombre,
    "gmail" => $gmail
]);

header("Location: ../html/ids.php?$query");
exit;

}

/* 
  ACÁ DESPUÉS VA LA BASE DE DATOS
*/

// rol provisorio
$rol = "cliente";
if ($gmail === "dnt@example.com") {
    $rol = "desarrollador";
}

$_SESSION['id'] = uniqid();
$_SESSION['nombre'] = $nombre;
$_SESSION['rol'] = $rol;

/* 👉 SIEMPRE VOLVEMOS AL INDEX */
header("Location: ../html/index.php");
exit;

<?php
session_start();

$errores = [];

$gmail = trim($_POST["gmail"] ?? "");
$contra = $_POST["contra"] ?? "";

if ($gmail === "") {
    $errores[] = "Ingresá tu gmail";
} elseif (!filter_var($gmail, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Gmail inválido";
}

if ($contra === "") {
    $errores[] = "Ingresá tu contraseña";
}

if ($errores) {
    header("Location: ../html/login.php?error=" . urlencode($errores[0]));
    exit;
}

/*
  usuarios fake (después va MySQL)
*/
$usuarios_fake = [
    "cliente@test.com" => [
        "nombre" => "Cliente",
        "contra" => password_hash("abc12345", PASSWORD_DEFAULT),
        "rol" => "cliente"
    ],
    "empleado@test.com" => [
        "nombre" => "Empleado",
        "contra" => password_hash("abc12345", PASSWORD_DEFAULT),
        "rol" => "empleado"
    ],
    "admin@test.com" => [
        "nombre" => "Admin",
        "contra" => password_hash("abc12345", PASSWORD_DEFAULT),
        "rol" => "admin"
    ],
    "dev@test.com" => [
        "nombre" => "Dev",
        "contra" => password_hash("abc12345", PASSWORD_DEFAULT),
        "rol" => "desarrollador"
    ],
];

if (!isset($usuarios_fake[$gmail])) {
    header("Location: ../html/login.php?error=Usuario no encontrado");
    exit;
}

$usuario = $usuarios_fake[$gmail];

if (!password_verify($contra, $usuario["contra"])) {
    header("Location: ../html/login.php?error=Contraseña incorrecta");
    exit;
}

$_SESSION["nombre"] = $usuario["nombre"];
$_SESSION["rol"] = $usuario["rol"];

/* 👉 SIEMPRE VOLVEMOS AL INDEX */
header("Location: ../html/index.php");
exit;

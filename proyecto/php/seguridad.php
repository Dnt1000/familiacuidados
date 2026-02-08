<?php
session_start();

function proteger($rolesPermitidos = []) {
    if (!isset($_SESSION['rol'])) {
        header("Location: ../html/login.php");
        exit;
    }

    if ($rolesPermitidos && !in_array($_SESSION['rol'], $rolesPermitidos)) {
        header("Location: ../panel/cliente.php");
        exit;
    }
}

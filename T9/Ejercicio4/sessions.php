<?php
session_start();

function login($email, $password) {
    // Simulación de un login ficticio
    $user_email = "admin@admin.com";
    $user_password = "123456";
    //if constraseña y email son correctos
    if ($email === $user_email && $password === $user_password) {
        // Inicio de sesión
        $_SESSION["usuario"] = $email;
        // Redirección al panel de control
        header("Location: account.php");
        exit;
    } else {
        // Error de login
        return "Email o contraseña incorrectos.";
    }
}

function require_login() {
    // Comprueba si el usuario está logueado
    if (!isset($_SESSION["usuario"])) {
        header("Location: login.php");
        exit;
    }
}

function logout() {
    // Cerrar la sesión
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
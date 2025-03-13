<?php
session_start();

// Guardar la última fecha de inicio en una cookie antes de destruir la sesión
if (isset($_SESSION["nombre_usuario"]) && isset($_SESSION["ultimo_inicio"])) {
    $userName = $_SESSION["nombre_usuario"];
    $ultimoLogin = "ultimo_inicio_" . $userName;
    setcookie($ultimoLogin, $_SESSION["ultimo_inicio"], time() + (86400 * 30), "/"); // Expira en 30 días
}

// Destruir la sesión y redirigir al login
session_destroy();
header("Location: ../login/login.php");
exit();
?>

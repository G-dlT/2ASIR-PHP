<?php
session_start();
session_destroy(); // Destruye la sesión
header("Location: ../login/login.php"); // Redirige al login
exit();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula de Alumnos Antiguos</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
session_start();
include '../includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consultar si el usuario existe
    $sql = "SELECT id_usuario, id_profesor, contrasena, rol, nombre_usuario FROM Usuarios WHERE nombre_usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);

        if (password_verify($password, $fila['contrasena'])) {
            $_SESSION['id_usuario'] = $fila['id_usuario'];
            $_SESSION['rol'] = $fila['rol'];
            $_SESSION['id_profesor'] = $fila['id_profesor'];
            $_SESSION['nombre_usuario'] = $fila['nombre_usuario'];

            // Guardar la fecha del último inicio de sesión en sesión
            $_SESSION["ultimo_inicio"] = date('d-m-Y H:i:s');

            // Redirigir según el rol
            if ($fila['rol'] == 'admin') {
                header("Location: ../interfazAdmin/land2.php");
            } else {
                header("Location: ../interfazProfesores/landProf.php");
            }
            exit();
        } else {
            header("Location: login.php?error=1"); // Contraseña incorrecta
            exit();
        }
    } else {
        header("Location: login.php?error=2"); // Usuario no encontrado
        exit();
    }
}
?>





<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

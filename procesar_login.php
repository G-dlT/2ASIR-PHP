<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula de Alumnos Antiguos</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
session_start();
include 'includes/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Consultar si el usuario existe
    $sql = "SELECT id_usuario, id_profesor, contrasena, rol FROM Usuarios WHERE nombre_usuario = '$usuario'"; // Cambié 'usuario' por 'nombre_usuario' y 'password' por 'contrasena'
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);

        // Verificar la contraseña (esto es si usas PASSWORD_HASH para almacenar la contraseña)
        if (password_verify($password, $fila['contrasena'])) { // Cambié 'password' por 'contrasena'
            $_SESSION['id_usuario'] = $fila['id_usuario'];
            $_SESSION['rol'] = $fila['rol']; // Guardamos el rol del usuario
            $_SESSION['id_profesor'] = $fila['id_profesor']; // Guardamos el ID del profesor si aplica
            $_SESSION['nombre_usuario'] = $fila['nombre_usuario']; // Guardamos el Nombre de usuario
            // Redirigir al panel correspondiente
            if ($fila['rol'] == 'admin') {
                header("Location: interfazAdmin/land2.php");
            } else {
                header("Location: interfazProfesores/landProf.php");
            }
            exit();
        } else {
            // Si la contraseña es incorrecta
            header("Location: login.php?error=1"); // Redirige a login con error
            exit();
        }
    } else {
        // Si el usuario no se encuentra
        header("Location: login.php?error=2"); // Redirige a login con error
        exit();
    }
}
?>



<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

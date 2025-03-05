<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Asignaturas y Profesores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
session_start();
include 'includes/conexion.php'; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $dni = $_POST['dni'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    // Verificar si el DNI existe en la tabla de Profesores
    $sql_profesor = "SELECT id_profesor FROM Profesores WHERE dni = '$dni'";
    $resultado_profesor = mysqli_query($conexion, $sql_profesor);

    if ($resultado_profesor && mysqli_num_rows($resultado_profesor) > 0) {
        // Si el profesor existe, proceder con el registro del usuario
        $fila_profesor = mysqli_fetch_assoc($resultado_profesor);
        $id_profesor = $fila_profesor['id_profesor'];

        // Encriptar la contraseña con password_hash()
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar el nuevo usuario en la tabla Usuarios
        $sql_insert = "INSERT INTO Usuarios (id_profesor, nombre_usuario, contrasena, rol) 
                       VALUES ('$id_profesor', '$nombre_usuario', '$hashed_password', 'profesor')";

        if (mysqli_query($conexion, $sql_insert)) {
            // Redirigir a la página de login después de un registro exitoso
            header("Location: login.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($conexion);
        }
    } else {
        // Si el DNI no existe en la tabla de Profesores, mostrar mensaje de error
        header("Location: registroUsuarios.php?error=1");
        exit();
    }
}
?>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

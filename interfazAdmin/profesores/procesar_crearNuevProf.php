<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<?php
// Incluir el archivo de conexión
include('../../includes/conexion.php');

// Verificar que los datos fueron enviados
if (!empty($_POST['dni']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['id_especialidad'])) {
    $dni = mysqli_real_escape_string($conexion, $_POST['dni']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $id_especialidad = (int) $_POST['id_especialidad'];

    // Comprobar si el DNI ya existe
    $sql_check_dni = "SELECT COUNT(*) FROM Profesores WHERE dni = ?";
    $stmt_check = mysqli_prepare($conexion, $sql_check_dni);
    mysqli_stmt_bind_param($stmt_check, "s", $dni);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_bind_result($stmt_check, $dni_existente);
    mysqli_stmt_fetch($stmt_check);
    mysqli_stmt_close($stmt_check);

    if ($dni_existente > 0) {
        echo "<div class='container mt-4'><div class='alert alert-warning'>Error: Ya existe un profesor con el mismo DNI.</div></div>";
    } else {
        // Insertar el nuevo profesor en la base de datos
        $sql_insert = "INSERT INTO Profesores (dni, nombre, apellidos, telefono, email, id_especialidad) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql_insert);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssi", $dni, $nombre, $apellidos, $telefono, $email, $id_especialidad);
            $success = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($success) {
                echo "<div class='container mt-4'><div class='alert alert-success'>Profesor creado exitosamente.</div></div>";
            } else {
                echo "<div class='container mt-4'><div class='alert alert-danger'>Error al crear el profesor.</div></div>";
            }
        } else {
            echo "<div class='container mt-4'><div class='alert alert-danger'>Error en la preparación de la consulta.</div></div>";
        }
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-warning'>Debe completar todos los campos.</div></div>";
}

// Cerrar conexión
mysqli_close($conexion);

// Redirigir después de 3 segundos
echo "<meta http-equiv='refresh' content='3;url=crearFiltroProfesor.php'>";
?>


<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
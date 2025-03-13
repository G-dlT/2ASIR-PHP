<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula de Alumnos Antiguos</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php
// Incluir el archivo de conexión
include('../../includes/conexion.php'); // Ruta actualizada

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_profesor = (int) $_POST['f_id_profesor'];
    $dni = !empty($_POST['f_dni']) ? mysqli_real_escape_string($conexion, $_POST['f_dni']) : null;
    $nombre = !empty($_POST['f_nombre']) ? mysqli_real_escape_string($conexion, $_POST['f_nombre']) : null;
    $apellidos = !empty($_POST['f_apellidos']) ? mysqli_real_escape_string($conexion, $_POST['f_apellidos']) : null;
    $id_especialidad = !empty($_POST['f_id_especialidad']) ? (int) $_POST['f_id_especialidad'] : null;
    $telefono = !empty($_POST['f_telefono']) ? mysqli_real_escape_string($conexion, $_POST['f_telefono']) : null;
    $email = !empty($_POST['f_email']) ? mysqli_real_escape_string($conexion, $_POST['f_email']) : null;

    // Construir la consulta SQL
    $sql = "UPDATE Profesores SET ";
    $updates = [];

    if ($dni) {
        $updates[] = "dni = '$dni'";
    }
    if ($nombre) {
        $updates[] = "nombre = '$nombre'";
    }
    if ($apellidos) {
        $updates[] = "apellidos = '$apellidos'";
    }
    if ($id_especialidad) {
        $updates[] = "id_especialidad = '$id_especialidad'";
    }
    if ($telefono) {
        $updates[] = "telefono = '$telefono'";
    }
    if ($email) {
        $updates[] = "email = '$email'";
    }

    // Si no hay campos para actualizar, mostrar un mensaje
    if (empty($updates)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-warning' role='alert'>No se proporcionaron datos para actualizar.</div>";
        echo "<a href='modFiltroProf.php' class='btn btn-secondary'>Volver a Modificar</a>";
        echo "</div>";
        exit;
    }

    // Unir las actualizaciones en la consulta
    $sql .= implode(", ", $updates);
    $sql .= " WHERE id_profesor = '$id_profesor'";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Datos del profesor modificados correctamente.</div>";
        echo "<a href='modFiltroProf.php' class='btn btn-secondary'>Volver a Modificar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al modificar los datos del profesor: " . mysqli_error($conexion) . "</div>";
        echo "<a href='modFiltroProf.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
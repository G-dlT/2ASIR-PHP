<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<?php
// Incluir el archivo de conexión
include('../includes/conexion.php'); // Ruta actualizada

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_alumno = (int) $_POST['f_id_alumno'];

    // Consulta para eliminar el alumno de la tabla Alumnos
    $sql = "DELETE FROM Alumnos WHERE id_alumno = '$id_alumno'";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Alumno eliminado correctamente.</div>";
        echo "<a href='eliminarFiltroAlum.php' class='btn btn-secondary'>Volver a Eliminar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar el alumno: " . mysqli_error($conexion) . "</div>";
        echo "<a href='eliminarFiltroAlum.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
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

    // Consulta para eliminar el profesor de la tabla Profesores
    $sql = "DELETE FROM Profesores WHERE id_profesor = '$id_profesor'";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Profesor eliminado correctamente.</div>";
        echo "<a href='elimFiltroProf.php' class='btn btn-secondary'>Volver a Eliminar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar el profesor: " . mysqli_error($conexion) . "</div>";
        echo "<a href='elimFiltroProf.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
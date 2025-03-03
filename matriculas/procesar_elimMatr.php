<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alumnos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php
// Incluir el archivo de conexión
include('../includes/conexion.php');

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_matricula = (int) $_POST['f_id_matricula'];

    // Consulta para eliminar la matrícula de la tabla Matriculas
    $sql = "DELETE FROM Matriculas WHERE id_matricula = '$id_matricula'";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Matrícula eliminada correctamente.</div>";
        echo "<a href='eliminarFiltroMatr.php' class='btn btn-secondary'>Volver a Eliminar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al eliminar la matrícula: " . mysqli_error($conexion) . "</div>";
        echo "<a href='eliminarFiltroMatr.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>



<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
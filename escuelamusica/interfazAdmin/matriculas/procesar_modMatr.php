<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alumnos</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php
// Incluir el archivo de conexión
include('../../includes/conexion.php');

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_matricula = (int) $_POST['f_id_matricula'];
    $id_alumno = (int) $_POST['f_id_alumno'];
    $curso_escolar = mysqli_real_escape_string($conexion, $_POST['f_curso_escolar']);
    $nivel = mysqli_real_escape_string($conexion, $_POST['f_nivel']);
    $id_especialidad = (int) $_POST['f_id_especialidad'];

    // Consulta para actualizar los datos en la tabla Matriculas
    $sql = "UPDATE Matriculas 
            SET id_alumno = '$id_alumno', curso_escolar = '$curso_escolar', nivel = '$nivel', id_especialidad = '$id_especialidad' 
            WHERE id_matricula = '$id_matricula'";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Matrícula modificada correctamente.</div>";
        echo "<a href='modificarFiltroMatr.php' class='btn btn-secondary'>Volver a Modificar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al modificar la matrícula: " . mysqli_error($conexion) . "</div>";
        echo "<a href='modificarFiltroMatr.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
mysqli_close($conexion);
?>



<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
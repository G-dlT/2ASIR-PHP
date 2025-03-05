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

// Verificar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_alumno = (int) $_POST['f_id_alumno'];
    $nivel = mysqli_real_escape_string($conexion, $_POST['f_nivel']);
    $curso = mysqli_real_escape_string($conexion, $_POST['f_curso']);
    $id_especialidad = (int) $_POST['f_id_especialidad'];

    // Consulta para insertar los datos en la tabla Matriculas
    $sql = "INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) VALUES ('$id_alumno', '$nivel', '$curso', '$id_especialidad')";

    if (mysqli_query($conexion, $sql)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-success' role='alert'>Matrícula insertada correctamente.</div>";
        echo "<a href='matrAlum2.php' class='btn btn-secondary'>Volver a Insertar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger' role='alert'>Error al insertar la matrícula: " . mysqli_error($conexion) . "</div>";
        echo "<a href='matrAlum2.php' class='btn btn-secondary'>Volver a Intentar</a>";
        echo "</div>";
    }
}

// Cerrar conexión
// mysqli_close($conexion);
?>


<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
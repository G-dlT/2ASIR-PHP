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

// Comprobar si se han enviado los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar y sanitizar entrada
    if (isset($_POST['id_alumno']) && !empty($_POST['id_alumno']) &&
        isset($_POST['f_nivel']) && !empty($_POST['f_nivel']) &&
        isset($_POST['f_curso_escolar']) && !empty($_POST['f_curso_escolar']) &&
        isset($_POST['f_id_especialidad']) && !empty($_POST['f_id_especialidad'])) {

        // Sanitizar entradas
        $id_alumno = mysqli_real_escape_string($conexion, $_POST['id_alumno']);
        $nivel = (int) $_POST['f_nivel']; // Asegurar que es un número entero
        $curso_escolar = mysqli_real_escape_string($conexion, $_POST['f_curso_escolar']);
        $id_especialidad = (int) $_POST['f_id_especialidad']; // Asegurar que es un número entero

        // Consulta SQL de inserción en la tabla Matriculas
        $sql = "INSERT INTO Matriculas (id_alumno, nivel, curso_escolar, id_especialidad) 
                VALUES ('$id_alumno', '$nivel', '$curso_escolar', '$id_especialidad')";
        
        $resultado = mysqli_query($conexion, $sql);

        // Comprobar si la consulta se ejecutó correctamente
        if ($resultado) {
            // Obtener el nombre del alumno
            $sql_alumno = "SELECT nombre, apellidos FROM Alumnos WHERE id_alumno = '$id_alumno'";
            $resultado_alumno = mysqli_query($conexion, $sql_alumno);
            $alumno = mysqli_fetch_assoc($resultado_alumno);
            $nombre_alumno = $alumno['nombre'] . ' ' . $alumno['apellidos'];

            // Obtener el nombre de la especialidad
            $sql_especialidad = "SELECT nombre FROM Especialidades WHERE id_especialidad = '$id_especialidad'";
            $resultado_especialidad = mysqli_query($conexion, $sql_especialidad);
            $especialidad = mysqli_fetch_assoc($resultado_especialidad);
            $nombre_especialidad = $especialidad['nombre'];

            echo "<div class='alert alert-success' role='alert'>Alumno con ID: $id_alumno matriculado correctamente.</div>";
            echo "<div class='alert alert-info' role='alert'>
            Detalles de la matrícula: <br>
            Nombre del Alumno: $nombre_alumno <br>
            Nivel: $nivel <br>
            Curso Escolar: $curso_escolar <br>
            Especialidad: $nombre_especialidad</div>";
            echo '<a href="intDatosAlum.php" class="btn btn-secondary">Ingresar nuevo alumno</a>';
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error al matricular al alumno: " . mysqli_error($conexion) . "</div>";
            echo '<a href="intDatosAlum.php" class="btn btn-secondary">Ingresar nuevo alumno</a>';
        }

    } else {
        echo "<div class='alert alert-warning' role='alert'>Faltan datos obligatorios. Por favor, complete todos los campos.</div>";
    }

    // Cerrar conexión
    mysqli_close($conexion);
}
?>

<!-- Scripts de Bootstrap -->
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
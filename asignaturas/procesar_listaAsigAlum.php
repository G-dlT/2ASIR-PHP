<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Alumnos por Asignatura Colectiva</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
// Incluir el archivo de conexión
include('../includes/conexion.php'); // Asegúrate de que la ruta sea correcta

// Inicializar variables
$id_asignatura = !empty($_POST['f_id_asignatura']) ? (int) $_POST['f_id_asignatura'] : null;
$curso_escolar = !empty($_POST['f_curso_escolar']) ? mysqli_real_escape_string($conexion, $_POST['f_curso_escolar']) : null;

// Construir la consulta SQL
$sql = "SELECT 
            a.id_alumno,
            a.nombre,
            a.apellidos,
            m.nivel,
            m.curso_escolar,
            e.nombre AS especialidad,
            asg2.nombre AS nombreAsignatura
        FROM 
            Matriculas m
        JOIN 
            Alumnos a ON m.id_alumno = a.id_alumno
        JOIN 
            Asignaciones asg ON m.id_matricula = asg.id_matricula
        JOIN 
            Asignaturas asg2 ON asg.id_asignatura = asg2.id_asignatura
        JOIN 
            Especialidades e ON m.id_especialidad = e.id_especialidad
        WHERE 
            LOWER(asg2.nombre) = LOWER((SELECT DISTINCT(nombre) FROM Asignaturas WHERE id_asignatura = '$id_asignatura')) 
            AND m.curso_escolar = '$curso_escolar'";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='container mt-4'>";
    echo "<h2>Resultados de la Búsqueda</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID Alumno</th><th>Nombre</th><th>Apellidos</th><th>Nivel</th><th>Curso Escolar</th><th>Especialidad</th><th>Asignatura</th></tr></thead>";
    echo "<tbody>";

    // Mostrar los resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['nivel'] . "</td>";
        echo "<td>" . $row['curso_escolar'] . "</td>";
        echo "<td>" . $row['especialidad'] . "</td>";
        echo "<td>" . $row['nombreAsignatura'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<a href='listaFiltroAsigAlum.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-warning' role='alert'>No se encontraron alumnos que coincidan con los criterios de búsqueda.</div>";
    echo "<a href='listaFiltroAsigAlum.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
}

// Cerrar conexión
mysqli_close($conexion);
?>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
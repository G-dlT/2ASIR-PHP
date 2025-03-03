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

// Inicializar variables
$dni = !empty($_POST['f_dni']) ? mysqli_real_escape_string($conexion, $_POST['f_dni']) : null;
$id_alumno = !empty($_POST['f_id_alumno']) ? (int) $_POST['f_id_alumno'] : null;
$curso_escolar = !empty($_POST['f_curso_escolar']) ? mysqli_real_escape_string($conexion, $_POST['f_curso_escolar']) : null;
$nivel = !empty($_POST['f_nivel']) ? mysqli_real_escape_string($conexion, $_POST['f_nivel']) : null;
$id_especialidad = !empty($_POST['f_id_especialidad']) ? (int) $_POST['f_id_especialidad'] : null;

// Construir la consulta SQL
$sql = "SELECT M.id_matricula, A.id_alumno, A.nombre, A.apellidos, M.curso_escolar, M.nivel, E.nombre AS especialidad
        FROM Matriculas M
        JOIN Alumnos A ON M.id_alumno = A.id_alumno
        JOIN Especialidades E ON M.id_especialidad = E.id_especialidad
        WHERE 1=1"; // Para facilitar la concatenación de condiciones

// Agregar condiciones a la consulta según los filtros proporcionados
if ($dni) {
    $sql .= " AND A.dni = '$dni'";
}
if ($id_alumno) {
    $sql .= " AND A.id_alumno = '$id_alumno'";
}
if ($curso_escolar) {
    $sql .= " AND M.curso_escolar = '$curso_escolar'";
}
if ($nivel) {
    $sql .= " AND M.nivel = '$nivel'";
}
if ($id_especialidad) {
    $sql .= " AND M.id_especialidad = '$id_especialidad'";
}

// Agregar la cláusula ORDER BY para ordenar los resultados
$sql .= " ORDER BY E.nombre, A.id_alumno, M.nivel";

$resultado = mysqli_query($conexion, $sql);

// Comprobar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='container mt-4'>";
    echo "<h2>Resultados de la Búsqueda</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID Matrícula</th><th>ID Alumno</th><th>Nombre</th><th>Apellidos</th><th>Curso Escolar</th><th>Nivel</th><th>Especialidad</th></tr></thead>";
    echo "<tbody>";

    // Mostrar los resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_matricula'] . "</td>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['curso_escolar'] . "</td>";
        echo "<td>" . $row['nivel'] . "</td>";
        echo "<td>" . $row['especialidad'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<a href='buscarFiltromatr.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-warning' role='alert'>No se encontraron matrículas que coincidan con los criterios de búsqueda.</div>";
    echo "<a href='buscarFiltromatr.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
}

// Cerrar conexión
mysqli_close($conexion);
?>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
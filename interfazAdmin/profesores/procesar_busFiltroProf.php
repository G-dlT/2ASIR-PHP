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
include('../../includes/conexion.php'); // Ruta actualizada

// Inicializar variables
$id_profesor = !empty($_POST['f_id_profesor']) ? (int) $_POST['f_id_profesor'] : null;
$dni = !empty($_POST['f_dni']) ? mysqli_real_escape_string($conexion, $_POST['f_dni']) : null;
$nombre = !empty($_POST['f_nombre']) ? mysqli_real_escape_string($conexion, $_POST['f_nombre']) : null;
$apellidos = !empty($_POST['f_apellidos']) ? mysqli_real_escape_string($conexion, $_POST['f_apellidos']) : null;
$id_especialidad = !empty($_POST['f_id_especialidad']) ? (int) $_POST['f_id_especialidad'] : null;

// Construir la consulta SQL
$sql = "SELECT P.id_profesor, P.nombre, P.apellidos, E.nombre AS especialidad
        FROM Profesores P
        LEFT JOIN Especialidades E ON P.id_especialidad = E.id_especialidad
        WHERE 1=1"; // Para facilitar la concatenación de condiciones

// Agregar condiciones a la consulta según los filtros proporcionados
if ($id_profesor) {
    $sql .= " AND P.id_profesor = '$id_profesor'";
}
if ($dni) {
    $sql .= " AND P.dni = '$dni'";
}
if ($nombre) {
    $sql .= " AND P.nombre LIKE '%$nombre%'";
}
if ($apellidos) {
    $sql .= " AND P.apellidos LIKE '%$apellidos%'";
}
if ($id_especialidad) {
    $sql .= " AND E.id_especialidad = '$id_especialidad'";
}

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='container mt-4'>";
    echo "<h2>Resultados de la Búsqueda</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID Profesor</th><th>Nombre</th><th>Apellidos</th><th>Especialidad</th></tr></thead>";
    echo "<tbody>";

    // Mostrar los resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_profesor'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . ($row['especialidad'] ? $row['especialidad'] : 'No asignada') . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<a href='buscarFiltroProf.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-warning' role='alert'>No se encontraron profesores que coincidan con los criterios de búsqueda.</div>";
    echo "<a href='buscarFiltroProf.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
}

// Cerrar conexión
mysqli_close($conexion);
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
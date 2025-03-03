<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Asignaturas y Profesores</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<?php
// Incluir el archivo de conexión
include('../includes/conexion.php'); // Ruta actualizada

// Inicializar variables
$id_asignatura = !empty($_POST['f_id_asignatura']) ? (int) $_POST['f_id_asignatura'] : null;
$id_profesor = !empty($_POST['f_id_profesor']) ? (int) $_POST['f_id_profesor'] : null;
$id_especialidad = !empty($_POST['f_id_especialidad']) ? (int) $_POST['f_id_especialidad'] : null;
$nivel = !empty($_POST['f_nivel']) ? (int) $_POST['f_nivel'] : null;

// Construir la consulta SQL
$sql = "SELECT 
            A.id_asignatura AS id_asig,
            A.nombre AS nombre_asignatura,
            A.nivel,
            P.id_profesor AS id_prof,
            P.nombre AS nombre_profesor,
            P.apellidos AS apellido_profesor,
            E.nombre AS especialidad_profesor
        FROM 
            Asignaturas A
        JOIN 
            Profesores P ON A.id_profesor = P.id_profesor
        JOIN 
            Especialidades E ON P.id_especialidad = E.id_especialidad
        WHERE 1=1"; // Para facilitar la concatenación de condiciones

// Agregar condiciones a la consulta según los filtros proporcionados
if ($id_asignatura) {
    $sql .= " AND A.id_asignatura = '$id_asignatura'";
}
if ($id_profesor) {
    $sql .= " AND P.id_profesor = '$id_profesor'";
}
if ($id_especialidad) {
    $sql .= " AND E.id_especialidad = '$id_especialidad'";
}
if ($nivel) {
    $sql .= " AND A.nivel = '$nivel'";
}

// Ordenar los resultados
$sql .= " ORDER BY A.nivel, A.nombre";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='container mt-4'>";
    echo "<h2>Resultados de la Búsqueda</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID Asignatura</th><th>Nombre Asignatura</th><th>Nivel</th><th>ID Profesor</th><th>Nombre Profesor</th><th>Apellidos Profesor</th><th>Especialidad</th></tr></thead>";
    echo "<tbody>";

    // Mostrar los resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_asig'] . "</td>";
        echo "<td>" . $row['nombre_asignatura'] . "</td>";
        echo "<td>" . $row['nivel'] . "</td>";
        echo "<td>" . $row['id_prof'] . "</td>";
        echo "<td>" . $row['nombre_profesor'] . "</td>";
        echo "<td>" . $row['apellido_profesor'] . "</td>";
        echo "<td>" . $row['especialidad_profesor'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<a href='listasFiltroAsigProf.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-warning' role='alert'>No se encontraron asignaturas que coincidan con los criterios de búsqueda.</div>";
    echo "<a href='listasFiltroAsigProf.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
}

// Cerrar conexión
mysqli_close($conexion);
?>


<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
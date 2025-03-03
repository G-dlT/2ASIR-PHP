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

// Inicializar la consulta
$sql = "SELECT * FROM Alumnos WHERE 1=1"; // 1=1 para facilitar la concatenación de condiciones

// Verificar y agregar condiciones según los campos enviados
if (!empty($_POST['f_nombre'])) {
    $nombre = mysqli_real_escape_string($conexion, $_POST['f_nombre']);
    $sql .= " AND nombre LIKE '%$nombre%'";
}

if (!empty($_POST['f_dni'])) {
    $dni = mysqli_real_escape_string($conexion, $_POST['f_dni']);
    $sql .= " AND dni = '$dni'";
}

if (!empty($_POST['f_apellidos'])) {
    $apellidos = mysqli_real_escape_string($conexion, $_POST['f_apellidos']);
    $sql .= " AND apellidos LIKE '%$apellidos%'";
}

if (!empty($_POST['f_telefono'])) {
    $telefono = mysqli_real_escape_string($conexion, $_POST['f_telefono']);
    $sql .= " AND telefono = '$telefono'";
}

if (!empty($_POST['f_email'])) {
    $email = mysqli_real_escape_string($conexion, $_POST['f_email']);
    $sql .= " AND email = '$email'";
}

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Comprobar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
    echo "<div class='container mt-4'>";
    echo "<h2 class='text-center mb-4'>Resultados de la Búsqueda</h2>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID</th><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th></tr></thead>";
    echo "<tbody>";

    // Mostrar los resultados
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['id_alumno'] . "</td>";
        echo "<td>" . $row['dni'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['telefono'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "<a href='buscarFiltroAlum.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-warning' role='alert'>No se encontraron alumnos que coincidan con los criterios de búsqueda.</div>";
    echo "<a href='buscarFiltroAlum.php' class='btn btn-secondary'>Volver a Buscar</a>";
    echo "</div>";
}

// Cerrar conexión
// mysqli_close($conexion);
?>




<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
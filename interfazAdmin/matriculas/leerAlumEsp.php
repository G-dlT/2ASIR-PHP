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

// Inicializar variables
$dni = !empty($_POST['f_dni']) ? $_POST['f_dni'] : null;
$id_especialidad = !empty($_POST['f_id_especialidad']) ? (int) $_POST['f_id_especialidad'] : null;

// Verificar si se ha enviado el formulario
if ($dni || $id_especialidad) {
    // Consulta para obtener los alumnos matriculados según el DNI o la especialidad seleccionada
    $sql = "SELECT 
                A.*, 
                E.nombre AS especialidad 
            FROM 
                Alumnos A
            JOIN 
                Matriculas M ON A.id_alumno = M.id_alumno
            JOIN 
                Especialidades E ON M.id_especialidad = E.id_especialidad
            WHERE 
                1=1"; // Para facilitar la concatenación de condiciones

    // Agregar condición para el DNI si se proporciona
    if ($dni) {
        $sql .= " AND A.dni = '$dni'";
    }

    // Agregar condición para la especialidad si se proporciona
    if ($id_especialidad) {
        $sql .= " AND M.id_especialidad = '$id_especialidad'";
    }

    $resultado = mysqli_query($conexion, $sql);

    // Comprobar si se obtuvieron resultados
    if (mysqli_num_rows($resultado) > 0) {
        echo "<div class='container mt-4'>";
        echo "<h2 class='text-center mb-4'>Resultados de la Búsqueda</h2>";
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th>ID</th><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th><th>Especialidad</th></tr></thead>";
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
            echo "<td>" . $row['especialidad'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "<a href='buscarAlumEsp.php' class='btn btn-secondary'>Volver a Buscar</a>";
        echo "</div>";
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-warning' role='alert'>No se encontraron alumnos que coincidan con los criterios de búsqueda.</div>";
        echo "<a href='buscarAlumEsp.php' class='btn btn-secondary'>Volver a Buscar</a>";
        echo "</div>";
    }
} else {
    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-danger' role='alert'>Por favor, introduzca al menos un criterio de búsqueda (DNI o Especialidad).</div>";
    echo "<a href='buscarAlumEsp.php' class='btn btn-primary'>Volver a Buscar</a>";
    echo "<a href='landmin.php' class='btn btn-secondary'>Volver a inicio</a>";
    echo "</div>";
}

// Cerrar conexión
mysqli_close($conexion);
?>



<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
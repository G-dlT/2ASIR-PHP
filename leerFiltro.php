<?php
// Incluir el archivo de conexión (si es necesario)
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes Filtrado</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Listado de Estudiantes Filtrado</h2>

<?php

// Verificar si se ha enviado el formulario por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Inicializar las variables de los filtros
    $filtros = [];  // array para guardar los filtros
    
    // Comprobar los filtros recibidos
    
        // comprueba nombre en $_POST 
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {   
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $filtros[] = "nombre LIKE '%$nombre%'"; // guardo en filtros la condición para la consulta de MySQL
    }
     // comprueba edad en $_POST 
    if (isset($_POST['edad']) && !empty($_POST['edad'])) {
        $edad = (int) $_POST['edad']; // Asegurarse de que la edad sea un número
        $filtros[] = "edad = $edad";
    }
     // comprueba curso en $_POST 
    if (isset($_POST['curso']) && !empty($_POST['curso'])) {
        $curso = mysqli_real_escape_string($conexion, $_POST['curso']);
        $filtros[] = "curso LIKE '%$curso%'";
    }
     // comprueba promociona en $_POST 
    if (isset($_POST['promociona']) ) {
        $promociona =  $_POST['promociona']; // casteo para asegurarse de que promociona sea 0 o 1
        $filtros[] = "promociona = $promociona";
    }

    // Si se ha recibido al menos un filtro
    if (count($filtros) > 0) {
        // Construir la consulta con los filtros seleccionados
        $query = "SELECT id, nombre, edad, curso, promociona FROM alumnos WHERE " . implode(' AND ', $filtros);
        $resultado = mysqli_query($conexion, $query);

        // Verificar si la consulta fue exitosa
        if (mysqli_num_rows($resultado) == 0) {
            echo "<div class='alert alert-warning' role='alert'>No se encontraron resultados para los filtros proporcionados.</div>";
        } else {
            // Mostrar los resultados en formato de tabla
            echo "<table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Curso</th>
                            <th>Promociona</th>
                        </tr>
                    </thead>
                    <tbody>";

            // Recorrer cada fila de resultados y mostrarla
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nombre'] . "</td>
                        <td>" . $row['edad'] . "</td>
                        <td>" . $row['curso'] . "</td>
                        <td>" . $row['promociona'] . "</td>
                    </tr>";
            }

            echo "</tbody></table>";
        }
    } else {
        echo "<div class='alert alert-warning' role='alert'>No se proporcionaron filtros para la búsqueda.</div>";
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>Acceso no permitido. El formulario debe enviarse mediante POST.</div>";
}

?>
        
        <!-- Botón para volver -->
        <a href="buscarFiltro.php" class="btn btn-secondary mt-3">Volver al filtro de búsqueda</a>
        <a href="opciones.php" class="btn btn-primary mt-3">Volver a Opciones</a>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<?php
// Incluir el archivo de conexión
include('conexion.php');

// Comprobamos que hemos llegado al archivo a través de un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verificar si el ID se ha recibido y no está vacío
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = (int) $_POST['id']; // Convertimos el ID a entero para evitar problemas

        // Consultamos el registro del alumno antes de eliminarlo
        $query = "SELECT * FROM alumnos WHERE id = $id";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            // Almacenamos el registro en una variable
            $alumno = mysqli_fetch_assoc($resultado);
            
            // El alumno existe, proceder a eliminar
            $sql = "DELETE FROM alumnos WHERE id = $id";
            $eliminar = mysqli_query($conexion, $sql);

            if ($eliminar) {
                // Si la eliminación fue exitosa
                echo "<div class='alert alert-success' role='alert'>
                    El alumno con ID: $id y nombre: " . htmlspecialchars($alumno['nombre']) . " ha sido eliminado correctamente.</div>";
            } else {
                // Si hubo un error al eliminar
                echo "<div class='alert alert-danger' role='alert'>
                    Error al eliminar el alumno: " . mysqli_error($conexion) . "</div>";
            }
        } else {
            // Si no se encuentra el alumno con ese ID
            echo "<div class='alert alert-warning' role='alert'>
                    No se encontró un alumno con el ID: $id.</div>";
        }
    } else {
        // Si no se recibe el ID
        echo "<div class='alert alert-warning' role='alert'>
                Faltó el ID del alumno. Por favor, ingréselo.</div>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>

<!-- Botones para redirigir -->
<div class="mt-4">
    <a href="leerTodos.php" class="btn btn-primary">Ver Todos los Alumnos</a>
    <a href="opciones.php" class="btn btn-secondary">Volver a Opciones</a>
</div>

</div>

<!-- Scripts de Bootstrap -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

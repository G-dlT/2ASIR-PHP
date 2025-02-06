<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Eliminar Alumno</h2>

    <!-- Formulario para enviar el ID del alumno a eliminar -->
    <form action="eliminar.php" method="POST">
        <div class="mb-3">
            <label for="id" class="form-label">Eliminar alumno cuyo ID sea:</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Introduce el ID del alumno a eliminar" required>
        </div>
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

    <!-- Botones para redirigir -->
    <div class="mt-4">
        <a href="leerTodos.php" class="btn btn-primary">Ver Todos los Alumnos</a>
        <a href="eliminarFiltro.php" class="btn btn-secondary">Volver a Eliminar Alumno</a>
        <a href="opciones.php" class="btn btn-secondary">Volver a Opciones</a>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
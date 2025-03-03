<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Alumno</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Eliminar Alumno</h2>
        <form action="procesar_elimAlum.php" method="POST">
            <div class="mb-3">
                <label for="f_id_alumno" class="form-label">ID del Alumno:</label>
                <input type="number" class="form-control" id="f_id_alumno" name="f_id_alumno" required placeholder="Introduce el ID del alumno">
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Alumno</button>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesor de una Asignatura</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Modificar Profesor de una Asignatura</h2>

    <form action="procesar_modAsigProf.php" method="POST">
        <div class="mb-3">
            <label for="id_asignatura" class="form-label">ID de la Asignatura</label>
            <input type="number" class="form-control" name="id_asignatura" required>
        </div>

        <div class="mb-3">
            <label for="id_profesor" class="form-label">ID del Nuevo Profesor</label>
            <input type="number" class="form-control" name="id_profesor" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

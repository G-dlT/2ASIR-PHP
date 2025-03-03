<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Profesor</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Eliminar Profesor</h2>
        <form action="procesar_elimFiltroProf.php" method="POST">
            <div class="mb-3">
                <label for="f_id_profesor" class="form-label">ID del Profesor:</label>
                <input type="number" class="form-control" id="f_id_profesor" name="f_id_profesor" required placeholder="Introduce el ID del profesor">
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Profesor</button>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
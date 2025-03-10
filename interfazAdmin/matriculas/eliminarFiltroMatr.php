<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Matrícula</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Eliminar Matrícula</h2>
        <form action="procesar_elimMatr.php" method="POST">
            <div class="mb-3">
                <label for="f_id_matricula" class="form-label">ID de Matrícula:</label>
                <input type="number" class="form-control" id="f_id_matricula" name="f_id_matricula" required placeholder="Introduce el ID de la matrícula">
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Matrícula</button>
        </form>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
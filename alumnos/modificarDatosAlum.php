<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos del Alumno</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Modificar Datos del Alumno</h2>
        <form action="procesar_modAlum.php" method="POST">
            <div class="mb-3">
                <label for="f_id_alumno" class="form-label">ID del Alumno:</label>
                <input type="number" class="form-control" id="f_id_alumno" name="f_id_alumno" required placeholder="Introduce el ID del alumno">
            </div>
            <div class="mb-3">
                <label for="f_dni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="f_dni" name="f_dni" placeholder="Introduce el DNI del alumno">
            </div>
            <div class="mb-3">
                <label for="f_nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="f_nombre" name="f_nombre" placeholder="Introduce el nombre del alumno">
            </div>
            <div class="mb-3">
                <label for="f_apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="f_apellidos" name="f_apellidos" placeholder="Introduce los apellidos del alumno">
            </div>
            <div class="mb-3">
                <label for="f_telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="f_telefono" name="f_telefono" placeholder="Introduce el teléfono del alumno">
            </div>
            <div class="mb-3">
                <label for="f_email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="f_email" name="f_email" placeholder="Introduce el email del alumno">
            </div>
            <button type="submit" class="btn btn-primary">Modificar Alumno</button>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
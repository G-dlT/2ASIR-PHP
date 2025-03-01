<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alumnos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Buscar Alumnos</h2>

        <!-- Formulario para buscar alumno por cada una de las columnas de la tabla alumnos -->
        <form action="leerFiltroAlum.php" method="POST">
            <div class="mb-3">
                <label for="f_nombreAlumno" class="form-label">Nombre :</label>
                <input type="text" class="form-control" id="f_nombreAlumno" name="f_nombre" placeholder="Introduce el nombre del alumno">
            </div>
            <div class="mb-3">
                <label for="f_dniAlumno" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="f_dniAlumno" name="f_dni" placeholder="Introduce el DNI del alumno">
            </div>
            <div class="mb-3">
                <label for="f_apellidosAlumno" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="f_apellidosAlumno" name="f_apellidos" placeholder="Introduce los apellidos del alumno">
            </div>
            <div class="mb-3">
                <label for="f_telefonoAlumno" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="f_telefonoAlumno" name="f_telefono" placeholder="Introduce el teléfono del alumno">
            </div>
            <div class="mb-3">
                <label for="f_emailAlumno" class="form-label">Email:</label>
                <input type="email" class="form-control" id="f_emailAlumno" name="f_email" placeholder="Introduce el email del alumno">
            </div>
            <button type="submit" class="btn btn-primary">Ver</button>
            <a href="landmin.php" class="btn btn-primary">Volver a Opciones</a>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
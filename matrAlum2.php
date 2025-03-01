<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Matrícula</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Insertar Matrícula</h2>

        <!-- Formulario para insertar matrícula -->
        <form action="procesar_matr2.php" method="POST">
            <div class="mb-3">
                <label for="f_id_alumno" class="form-label">ID del Alumno:</label>
                <input type="number" class="form-control" id="f_id_alumno" name="f_id_alumno" required placeholder="Introduce el ID del alumno">
            </div>
            <div class="mb-3">
                <label for="f_nivel" class="form-label">Nivel:</label>
                <input type="text" class="form-control" id="f_nivel" name="f_nivel" required placeholder="Introduce el nivel">
            </div>
            <div class="mb-3">
                <label for="f_curso" class="form-label">Curso:</label>
                <input type="text" class="form-control" id="f_curso" name="f_curso" required placeholder="Introduce el curso">
            </div>
            <div class="mb-3">
                <label for="f_id_especialidad" class="form-label">Seleccione la Especialidad:</label>
                <select class="form-control" id="f_id_especialidad" name="f_id_especialidad" required>
                    <option value="">Seleccione una especialidad</option>
                    <?php
                    // Incluir el archivo de conexión
                    include('conexion.php');

                    // Obtener las especialidades
                    $sql_especialidades = "SELECT id_especialidad, nombre FROM Especialidades";
                    $resultado_especialidades = mysqli_query($conexion, $sql_especialidades);

                    // Mostrar las especialidades en el select
                    while ($especialidad = mysqli_fetch_assoc($resultado_especialidades)) {
                        echo "<option value='" . $especialidad['id_especialidad'] . "'>" . $especialidad['nombre'] . "</option>";
                    }

                    // Cerrar conexión
                    mysqli_close($conexion);
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Insertar Matrícula</button>
            <a href="opciones.php" class="btn btn-secondary">Volver a Opciones</a>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
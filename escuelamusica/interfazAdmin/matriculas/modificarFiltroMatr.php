<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Matrícula</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Modificar Matrícula</h2>
        <form action="procesar_modMatr.php" method="POST">
            <div class="mb-3">
                <label for="f_id_matricula" class="form-label">ID de Matrícula:</label>
                <input type="number" class="form-control" id="f_id_matricula" name="f_id_matricula" required placeholder="Introduce el ID de la matrícula">
            </div>
            <div class="mb-3">
                <label for="f_id_alumno" class="form-label">ID del Alumno:</label>
                <input type="number" class="form-control" id="f_id_alumno" name="f_id_alumno" required placeholder="Introduce el ID del alumno">
            </div>
            <div class="mb-3">
                <label for="f_curso_escolar" class="form-label">Curso Escolar:</label>
                <input type="text" class="form-control" id="f_curso_escolar" name="f_curso_escolar" required placeholder="Introduce el curso escolar">
            </div>
            <div class="mb-3">
                <label for="f_nivel" class="form-label">Nivel:</label>
                <input type="text" class="form-control" id="f_nivel" name="f_nivel" required placeholder="Introduce el nivel">
            </div>
            <div class="mb-3">
                <label for="f_id_especialidad" class="form-label">Especialidad:</label>
                <select class="form-control" id="f_id_especialidad" name="f_id_especialidad" required>
                    <option value="">Seleccione una especialidad</option>
                    <?php
                    // Incluir el archivo de conexión
                    include('../../includes/conexion.php');

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
            <button type="submit" class="btn btn-primary">Modificar Matrícula</button>
        </form>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
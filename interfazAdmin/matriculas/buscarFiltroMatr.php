<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Matrículas</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Buscar Matrículas</h2>
        <form action="leerFiltroMatr.php" method="POST">
            <div class="mb-3">
                <label for="f_dni" class="form-label">DNI del Alumno (opcional):</label>
                <input type="text" class="form-control" id="f_dni" name="f_dni" placeholder="Introduce el DNI del alumno">
            </div>
            <div class="mb-3">
                <label for="f_id_alumno" class="form-label">ID del Alumno (opcional):</label>
                <input type="number" class="form-control" id="f_id_alumno" name="f_id_alumno" placeholder="Introduce el ID del alumno">
            </div>
            <div class="mb-3">
                <label for="f_curso_escolar" class="form-label">Curso Escolar (opcional):</label>
                <input type="text" class="form-control" id="f_curso_escolar" name="f_curso_escolar" placeholder="Introduce el curso escolar">
            </div>
            <div class="mb-3">
                <label for="f_nivel" class="form-label">Nivel (opcional):</label>
                <input type="text" class="form-control" id="f_nivel" name="f_nivel" placeholder="Introduce el nivel">
            </div>
            <div class="mb-3">
                <label for="f_id_especialidad" class="form-label">Especialidad (opcional):</label>
                <select class="form-control" id="f_id_especialidad" name="f_id_especialidad">
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
            <button type="submit" class="btn btn-primary">Buscar</button>
            
        </form>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
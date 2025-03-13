<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Alumnos por Especialidad</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Buscar Alumnos por Especialidad o DNI</h2>

        <!-- Formulario para buscar alumnos por especialidad o DNI -->
        <form action="leerAlumEsp.php" method="POST">
            <div class="mb-3">
                <label for="f_dni" class="form-label">DNI del Alumno (opcional):</label>
                <input type="text" class="form-control" id="f_dni" name="f_dni" placeholder="Introduce el DNI del alumno">
            </div>
            <div class="mb-3">
                <label for="f_especialidad" class="form-label">Seleccione la Especialidad (opcional):</label>
                <select class="form-control" id="f_especialidad" name="f_id_especialidad">
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
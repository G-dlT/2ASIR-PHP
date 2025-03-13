<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Profesores</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Buscar Profesores</h2>
        <form action="procesar_busFiltroProf.php" method="POST">
            <div class="mb-3">
                <label for="f_id_profesor" class="form-label">ID del Profesor (opcional):</label>
                <input type="number" class="form-control" id="f_id_profesor" name="f_id_profesor" placeholder="Introduce el ID del profesor">
            </div>
            <div class="mb-3">
                <label for="f_dni" class="form-label">DNI (opcional):</label>
                <input type="text" class="form-control" id="f_dni" name="f_dni" placeholder="Introduce el DNI del profesor">
            </div>
            <div class="mb-3">
                <label for="f_nombre" class="form-label">Nombre (opcional):</label>
                <input type="text" class="form-control" id="f_nombre" name="f_nombre" placeholder="Introduce el nombre del profesor">
            </div>
            <div class="mb-3">
                <label for="f_apellidos" class="form-label">Apellidos (opcional):</label>
                <input type="text" class="form-control" id="f_apellidos" name="f_apellidos" placeholder="Introduce los apellidos del profesor">
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
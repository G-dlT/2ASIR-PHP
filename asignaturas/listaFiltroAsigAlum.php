<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Alumnos por Asignatura Colectiva</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Filtrar Alumnos por Asignatura Colectiva</h2>
        <form action="procesar_listaAsigAlum.php" method="POST">
            <div class="form-group">
                <label for="f_id_asignatura">Asignatura Colectiva:</label>
                <select class="form-control" id="f_id_asignatura" name="f_id_asignatura" required>
                    <option value="">Seleccione una asignatura</option>
                    <?php
                    // Incluir el archivo de conexión
                    include('../includes/conexion.php');

                    // Obtener las asignaturas colectivas
                    $sql_asignaturas = "SELECT id_asignatura, nombre FROM Asignaturas ";
                    $resultado_asignaturas = mysqli_query($conexion, $sql_asignaturas);

                    // Mostrar las asignaturas en el select
                    while ($asignatura = mysqli_fetch_assoc($resultado_asignaturas)) {
                        echo "<option value='" . $asignatura['id_asignatura'] . "'>" . $asignatura['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="f_curso_escolar">Curso Escolar:</label>
                <input type="text" class="form-control" id="f_curso_escolar" name="f_curso_escolar" placeholder="Introduce el curso escolar (ej. 2023-2024)" required>
            </div>

            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="../opciones.php" class="btn btn-secondary">Volver a Opciones</a>
        </form>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
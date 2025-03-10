<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Asignaturas y Profesores</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Filtrar Asignaturas y Profesores</h2>
        <form action="procesar_listaAsigProf2.php" method="POST">
            <div class="form-group">
                <label for="f_nivel">Nivel:</label>
                <select class="form-control" id="f_nivel" name="f_nivel" >
                    <option value="">Seleccione un nivel</option>
                    <option value="1">1º</option>
                    <option value="2">2º</option>
                    <option value="3">3º</option>
                    <option value="4">4º</option>
                </select>
            </div>

            <div class="form-group">
                <label for="f_id_asignatura">Asignatura:</label>
                <select class="form-control" id="f_id_asignatura" name="f_id_asignatura" >
                    <option value="">Seleccione una asignatura</option>
                    <?php
                    // Incluir el archivo de conexión
                    include('../../includes/conexion.php');

                    // Obtener las asignaturas
                    $sql_asignaturas = "SELECT id_asignatura, nombre FROM Asignaturas";
                    $resultado_asignaturas = mysqli_query($conexion, $sql_asignaturas);

                    // Mostrar las asignaturas en el select
                    while ($asignatura = mysqli_fetch_assoc($resultado_asignaturas)) {
                        echo "<option value='" . $asignatura['id_asignatura'] . "'>" . $asignatura['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="f_id_profesor">Profesor:</label>
                <select class="form-control" id="f_id_profesor" name="f_id_profesor" >
                    <option value="">Seleccione un profesor</option>
                    <?php
                    // Obtener los profesores
                    $sql_profesores = "SELECT id_profesor, nombre, apellidos FROM Profesores";
                    $resultado_profesores = mysqli_query($conexion, $sql_profesores);

                    // Mostrar los profesores en el select
                    while ($profesor = mysqli_fetch_assoc($resultado_profesores)) {
                        echo "<option value='" . $profesor['id_profesor'] . "'>" . $profesor['nombre'] . " " . $profesor['apellidos'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="f_id_especialidad">Especialidad:</label>
                <select class="form-control" id="f_id_especialidad" name="f_id_especialidad" >
                    <option value="">Seleccione una especialidad</option>
                    <?php
                    // Obtener las especialidades
                    $sql_especialidades = "SELECT id_especialidad, nombre FROM Especialidades";
                    $resultado_especialidades = mysqli_query($conexion, $sql_especialidades);

                    // Mostrar las especialidades en el select
                    while ($especialidad = mysqli_fetch_assoc($resultado_especialidades)) {
                        echo "<option value='" . $especialidad['id_especialidad'] . "'>" . $especialidad['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
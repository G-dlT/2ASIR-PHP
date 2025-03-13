<?php
session_start();
include '../../includes/conexion.php'; // Asegúrate de que la ruta sea correcta

if (!isset($_GET['nombre'])) {
    die("No se ha pasado el nombre de la asignatura.");
}

$nombre_asignatura = $_GET['nombre'];

// Asegúrate de que el profesor está autenticado
if (!isset($_SESSION['id_profesor'])) {
    header("Location: login.php");
    exit();
}

$id_profesor = $_SESSION['id_profesor'];

// Consulta para obtener los datos de los alumnos matriculados
$sql = "
    SELECT 
        a.id_alumno,
        a.nombre,
        a.apellidos,
        m.nivel,
        m.curso_escolar,
        e.nombre AS especialidad,
        p.nombre AS p_nombre,
        p.id_especialidad,
        asg2.nombre AS nombreAsignatura,
        asg.id_asignacion,
        asg.nota_trimestre1,
        asg.nota_trimestre2,
        asg.nota_trimestre3
    FROM 
        Matriculas m
    JOIN 
        Alumnos a ON m.id_alumno = a.id_alumno 
    JOIN 
        Asignaciones asg ON m.id_matricula = asg.id_matricula
    JOIN 
        Asignaturas asg2 ON asg.id_asignatura = asg2.id_asignatura
    JOIN 
        Especialidades e ON m.id_especialidad = e.id_especialidad
    JOIN 
        Profesores p ON p.id_especialidad = e.id_especialidad
    WHERE 
        LOWER(asg2.nombre) LIKE LOWER('%$nombre_asignatura%') AND asg2.id_profesor = $id_profesor
";

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota_trimestre1'])) {
    // Actualizar las notas en la base de datos cuando se envíe el formulario
    foreach ($_POST['id_asignacion'] as $key => $id_asignacion) {
        $nota1 = $_POST['nota_trimestre1'][$key];
        $nota2 = $_POST['nota_trimestre2'][$key];
        $nota3 = $_POST['nota_trimestre3'][$key];

        // Validar que las notas sean numéricas y estén dentro de un rango
        if (is_numeric($nota1) && is_numeric($nota2) && is_numeric($nota3)) {
            $sql_update = "UPDATE Asignaciones SET
                            nota_trimestre1 = '$nota1',
                            nota_trimestre2 = '$nota2',
                            nota_trimestre3 = '$nota3'
                          WHERE id_asignacion = '$id_asignacion'";

            mysqli_query($conexion, $sql_update);
        } 
    }

    echo '<div class="alert alert-success">Las notas se han actualizado correctamente.</div>';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos - <?= htmlspecialchars($nombre_asignatura) ?></title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    

    <div class="container" style="margin-top: 120px;">
        <h2>Asignatura: <?= htmlspecialchars($nombre_asignatura) ?></h2>
        <form method="POST" action="">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Nivel</th>
                        <th>Curso Escolar</th>
                        <th>Especialidad</th>
                        <th>Profesor</th>
                        <th>Nota Trimestre 1</th>
                        <th>Nota Trimestre 2</th>
                        <th>Nota Trimestre 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['nombre']) ?></td>
                            <td><?= htmlspecialchars($fila['apellidos']) ?></td>
                            <td><?= htmlspecialchars($fila['nivel']) ?></td>
                            <td><?= htmlspecialchars($fila['curso_escolar']) ?></td>
                            <td><?= htmlspecialchars($fila['especialidad']) ?></td>
                            <td><?= htmlspecialchars($fila['p_nombre']) ?></td>

                            <!-- Notas de los alumnos -->
                            <td><input type="number" name="nota_trimestre1[]" value="<?= htmlspecialchars($fila['nota_trimestre1']) ?>" class="form-control" step="0.1"></td>
                            <td><input type="number" name="nota_trimestre2[]" value="<?= htmlspecialchars($fila['nota_trimestre2']) ?>" class="form-control" step="0.1"></td>
                            <td><input type="number" name="nota_trimestre3[]" value="<?= htmlspecialchars($fila['nota_trimestre3']) ?>" class="form-control" step="0.1"></td>

                            <!-- Campo oculto para el id_asignacion -->
                            <input type="hidden" name="id_asignacion[]" value="<?= htmlspecialchars($fila['id_asignacion']) ?>">
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Actualizar Notas</button>
        </form>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
//mysqli_close($conexion);
?>

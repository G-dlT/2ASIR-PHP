<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<?php
// Incluir el archivo de conexión
include('../includes/conexion.php');

// Compruebo que he entrado en introducir.php por llamada POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verificar y sanitizar entrada
    if (isset($_POST['f_dni']) && !empty($_POST['f_dni']) &&
        isset($_POST['f_nombre']) && !empty($_POST['f_nombre']) &&
        isset($_POST['f_apellidos']) && !empty($_POST['f_apellidos']) &&
        isset($_POST['f_telefono']) &&
        isset($_POST['f_email']) &&
        isset($_POST['f_nombre_padre']) &&
        isset($_POST['f_telefono_padre']) &&
        isset($_POST['f_email_padre'])) {

        // Sanitizar entradas
        $dni = mysqli_real_escape_string($conexion, $_POST['f_dni']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['f_nombre']);
        $apellidos = mysqli_real_escape_string($conexion, $_POST['f_apellidos']);
        $telefono = mysqli_real_escape_string($conexion, $_POST['f_telefono']);
        $email = mysqli_real_escape_string($conexion, $_POST['f_email']);
        $nombre_padre = mysqli_real_escape_string($conexion, $_POST['f_nombre_padre']);
        $telefono_padre = mysqli_real_escape_string($conexion, $_POST['f_telefono_padre']);
        $email_padre = mysqli_real_escape_string($conexion, $_POST['f_email_padre']);

        // Consulta SQL de inserción
        $sql = "INSERT INTO Alumnos (dni, nombre, apellidos, telefono, email, nombre_padre, telefono_padre, email_padre) 
                VALUES ('$dni', '$nombre', '$apellidos', '$telefono', '$email', '$nombre_padre', '$telefono_padre', '$email_padre')";
        
        $resultado = mysqli_query($conexion, $sql);

        // Comprobar si la consulta se ejecutó correctamente
        if ($resultado) {
            // Obtener el ID del alumno insertado
            $id_alumno = mysqli_insert_id($conexion);
            echo "<div class='alert alert-success' role='alert'>
            Alumno con nombre: $nombre $apellidos insertado correctamente.</div>";
            ?>

            <h3 class="mt-4">Matricular Alumno</h3>
            <form action="procesar_matricula.php" method="POST">
                <!--Introduce el valor del id del alumno en un input invisible  -->
                <input type="hidden" name="id_alumno" value="<?php echo $id_alumno; ?>"> 

                <div class="form-group">
                    <label for="f_nivel">Nivel:</label>
                    <select class="form-control" id="f_nivel" name="f_nivel" required>
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="f_curso_escolar">Curso Escolar:</label>
                    <input type="text" class="form-control" id="f_curso_escolar" name="f_curso_escolar" required placeholder="Ej: 2023-2024">
                </div>

                <div class="form-group">
                    <label for="f_id_especialidad">Especialidad:</label>
                    <select class="form-control" id="f_id_especialidad" name="f_id_especialidad" required>
                    <option value="">Seleccione una especialidad</option>
                    <?php
                    // Incluir el archivo de conexión
                    // include('../includes/conexion.php');

                    // Obtener las especialidades
                    $sql_especialidades = "SELECT id_especialidad, nombre FROM Especialidades";
                    $resultado_especialidades = mysqli_query($conexion, $sql_especialidades);

                    // Mostrar las especialidades en el select
                    while ($especialidad = mysqli_fetch_assoc($resultado_especialidades)) {
                        echo "<option value='" . $especialidad['id_especialidad'] . "'>" . $especialidad['nombre'] . "</option>";
                    }

                    // Cerrar conexión
                    // mysqli_close($conexion);
                    ?>
                </select>
                </div>

                <button type="submit" class="btn btn-primary">Matricular Alumno</button>
                <a href="landmin.php" class="btn btn-secondary">Volver a Inicio</a>
            </form>

            <?php
        } else {
                echo "<div class='alert alert-danger' role='alert'>Error al insertar el alumno: " . mysqli_error($conexion) . "</div>";
        }

    } else {
        echo "<div class='alert alert-warning' role='alert'>Faltan datos obligatorios. Por favor, complete todos los campos.</div>";
    }

    // Cerrar conexión
    // mysqli_close($conexion);
}
?>

<!-- Scripts de Bootstrap -->
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
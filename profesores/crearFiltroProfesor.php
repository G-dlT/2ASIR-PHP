<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Profesor</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
// Incluir el archivo de conexión
include('../includes/conexion.php');

// Obtener las especialidades de la base de datos
$sql = "SELECT id_especialidad, nombre FROM Especialidades";
$resultado = mysqli_query($conexion, $sql);
?>

<div class="container mt-4">
    <h2>Crear Nuevo Profesor</h2>
    <form action="procesar_crearNuevProf.php" method="POST">
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" required maxlength="9">
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" required maxlength="15">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <select class="form-control" name="id_especialidad" required>
                <option value="">Seleccione una especialidad</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)): ?>
                    <option value="<?= $row['id_especialidad'] ?>"><?= $row['nombre'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Crear Profesor</button>
        <a href="listasFiltroAsigProf.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
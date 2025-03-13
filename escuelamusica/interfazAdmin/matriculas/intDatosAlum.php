<?php
// Incluir el archivo de conexión (si es necesario)
include('../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducir Alumno</title>
    
    <!-- Link al CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h2 class="mb-4">Datos Alumno</h2>
<form action="matrAlum.php" method="POST">
    <div class="form-group">
        <label for="f_dni">DNI:</label>
        <input type="text" class="form-control" id="f_dni" name="f_dni" required>
    </div>
    
    <div class="form-group">
        <label for="f_nombre">Nombre:</label>
        <input type="text" class="form-control" id="f_nombre" name="f_nombre" required>
    </div>
    
    <div class="form-group">
        <label for="f_apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="f_apellidos" name="f_apellidos" required>
    </div>
    
    <div class="form-group">
        <label for="f_telefono">Teléfono:</label>
        <input type="text" class="form-control" id="f_telefono" name="f_telefono">
    </div>
    
    <div class="form-group">
        <label for="f_email">Email:</label>
        <input type="email" class="form-control" id="f_email" name="f_email">
    </div>
    
    <div class="form-group">
        <label for="f_nombre_padre">Nombre del Padre:</label>
        <input type="text" class="form-control" id="f_nombre_padre" name="f_nombre_padre">
    </div>
    
    <div class="form-group">
        <label for="f_telefono_padre">Teléfono del Padre:</label>
        <input type="text" class="form-control" id="f_telefono_padre" name="f_telefono_padre">
    </div>
    
    <div class="form-group">
        <label for="f_email_padre">Email del Padre:</label>
        <input type="email" class="form-control" id="f_email_padre" name="f_email_padre">
    </div>
    
    <button type="submit" class="btn btn-primary">Siguiente</button>
    
</form>

</div>

<!-- Scripts de Bootstrap -->
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
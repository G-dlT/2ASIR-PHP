<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Estudiante</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Buscar Alumnos</h2>

        <!-- Formulario para buscar alumno por cada una de las columnas de la tabla alumnos -->
        <form action="leerFiltro.php" method="POST">
            <div class="mb-3">
                <label for="nombreAlumno" class="form-label">Ver alumnos cuyo nombre sea:</label>
                <input type="text" class="form-control" id="nombreAlumno" name="nombre" placeholder="Introduce el nombre del alumno" >
            </div>
            <div class="mb-3">
                <label for="edadAlumno" class="form-label">Ver alumnos cuya edad sea:</label>
                <input type="number" class="form-control" id="edadAlumno" name="edad" placeholder="Introduce la edad del alumno">
            </div>
            
            <!-- Campo para el curso del alumno -->
            <div class="mb-3">
                <label for="cursoAlumno" class="form-label">Ver alumnos cuyo curso sea:</label>
                <input type="text" class="form-control" id="cursoAlumno" name="curso" placeholder="Introduce el curso del alumno">
            </div>
            
            <!-- Campo para saber si el alumno promociona -->
            <div class="mb-3">
                <label for="promocionaAlumno" class="form-label">Ver alumnos que promocionan:</label>
                <select class="form-control" id="promocionaAlumno" name="promociona">
                    <option value="">Seleccione una opción</option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Ver</button>
            <a href="opciones.php" class="btn btn-secondary">Volver a Opciones</a>
        </form>

        
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones - Alumnos</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Opciones de Datos</h1>
        
        <!-- Sección Leer Datos -->
        <div class="card my-4">
            <div class="card-header">
                <h3>Matriculas</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="intDatosAlum.php" class="btn btn-primary">Nuevo ingreso</a>
                    <a href="opcionMatriculas.php" class="btn btn-primary">Alumno del centro</a>
                </div>

            </div>
        </div>
		<div class="card my-4">
            <div class="card-header">
                <h3>Alumnos</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="buscarFiltroAlum.php" class="btn btn-primary">Consultar datos de Alumnos</a>
                    <a href="opcionMatriculas.php" class="btn btn-primary">Modificar datos de Alumnos</a>
                </div>

            </div>
        </div>
        <div class="card my-4">
            <div class="card-header">
                <h3>Profesores</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="leerTodos.php" class="btn btn-primary">Consultar datos Profesores</a>
                    <a href="opcionMatriculas.php" class="btn btn-primary">Modificar datos Profesores</a>
                </div>
            </div>
        </div>
		<div class="card my-4">
            <div class="card-header">
                <h3>Asignaturas</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="leerTodos.php" class="btn btn-primary">Listas de Alumnos</a>
                    <a href="opcionMatriculas.php" class="btn btn-primary">Listas por fitro</a>
                    <a href="opcionMatriculas.php" class="btn btn-primary">Asignar profesor</a>
                </div>

            </div>
        </div>
        


     


    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>




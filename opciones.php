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
                <h3>Leer Datos</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="leerTodos.php" class="btn btn-primary">Todos los Alumnos</a>
                    <a href="buscarFiltro.php" class="btn btn-primary">Buscar por fitro</a>
                </div>

            </div>
        </div>
        

        <!-- Sección Insertar Datos -->
        <div class="card my-4">
            <div class="card-header">
                <h3>Insertar Datos de Alumnos</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="mb-3">
                        <a href="introducirDatos.php" class="btn btn-primary">Introducir Datos Alumnos</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Sección Eliminar Datos -->
         <div class="card my-4">
                <div class="card-header">
                    <h3>Elimnar Datos</h3>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <div class="mb-3">
                        <a href="eliminarFiltro.php" class="btn btn-primary">Eliminar Alumnos</a>
                    </div>
                </div>
                </div>
        </div>
    
    </div>


     


    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

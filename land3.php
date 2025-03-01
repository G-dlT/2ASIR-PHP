<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones - Alumnos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="container-fluid d-flex justify-content-between">
            <span class="navbar-brand">Escuela de Música</span>
            <div class="d-flex align-items-center">
                <span class="text-dark me-3">Usuario: Nombre de Usuario</span>
                <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
    
    <div class="d-flex">
        <nav class="bg-secondary text-white p-3 vh-100" style="width: 250px; position: fixed;">
            <h3 class="border-bottom pb-2">Matriculas</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('intDatosAlum.php')">Nuevo ingreso</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('matriculasAlum2.php')">Alumno del centro</a></li>
            </ul>

            <h3 class="border-bottom pb-2 mt-3">Alumnos</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('buscarFiltroAlum.php')">Consultar datos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Modificar datos</a></li>
            </ul>

            <h3 class="border-bottom pb-2 mt-3">Profesores</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('leerTodos.php')">Consultar datos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Modificar datos</a></li>
            </ul>

            <h3 class="border-bottom pb-2 mt-3">Asignaturas</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('leerTodos.php')">Listas de Alumnos</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Listas por filtro</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Asignar profesor</a></li>
            </ul>
        </nav>

        <div class="container-fluid" style="margin-left: 270px; padding: 20px;">
            <iframe id="contentFrame" class="w-100 vh-100 border-0 rounded shadow" src="https://www.miconservatorio.es/manuelcastillo"></iframe>
        </div>
    </div>
    
    <script>
        function changeIframeSrc(page) {
            document.getElementById('contentFrame').src = page;
        }
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
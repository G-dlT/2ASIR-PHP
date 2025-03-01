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
    <header class="bg-light p-3 w-100 ">
        <div class="container">
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img src="ruta/a/tu/foto.jpg" alt="Logo" style="height: 50px;"> <!-- Cambia la ruta a tu imagen -->
                </div>
                <h1>Escuela de Música</h1>
                <div>
                    <span class="me-3">Usuario: Nombre de Usuario</span>
                    <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex">
        <!-- navbar -->
        <nav class="sidebar bg-light p-3" style="width: 250px; height: 100vh; position: fixed;">
            <h3>Matriculas</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('intDatosAlum.php')">Nuevo ingreso</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculasAlum2.php')">Alumno del centro</a></li>
            </ul>

            <h3>Alumnos</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('buscarFiltroAlum.php')">Consultar datos de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Modificar datos de Alumnos</a></li>
            </ul>

            <h3>Profesores</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('leerTodos.php')">Consultar datos Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Modificar datos Profesores</a></li>
            </ul>

            <h3>Asignaturas</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('leerTodos.php')">Listas de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Listas por filtro</a></li>
                <li><a href="#" onclick="changeIframeSrc('opcionMatriculas.php')">Asignar profesor</a></li>
            </ul>
        </nav>
        <!-- iframe body -->
        <div class="container-fluid" style="margin-left: 270px; padding: 20px;">
            <iframe id="contentFrame" class="w-100 vh-100 border-0 rounded shadow" src="https://www.miconservatorio.es/manuelcastillo"></iframe>
        </div>
    </div>

    <script>
        function changeIframeSrc(page) {
            document.getElementById('contentFrame').src = page;
        }
    </script>

    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
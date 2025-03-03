<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escuela de Música</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light p-3 w-100 " style="position: fixed;">
        <div class="container">
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img src="logo.jpg" alt="Logo" style="height: 50px;"> <!-- Cambia la ruta a tu imagen -->
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
        <!-- ---MENU LATERAL---  -->
        <nav class="sidebar bg-light p-3" style="width: 250px; height: 100vh; position: fixed;">
            <h3>Matriculas</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('matriculas/intDatosAlum.php')">Nuevo ingreso</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/matriculasAlum2.php')">Alumno del centro</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/buscarFiltroMatr.php')">Consultar matriculas</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/modificarMatriculas.php')">Modificar matriculas</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/eliminarMatricula.php')">Eliminar matriculas</a></li>
            </ul>

            <h3>Alumnos</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('matriculas/buscarFiltroAlum.php')">Consultar datos de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('alumnos/modificarDatosAlumnos.php')">Modificar datos de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('alumnos/eliminarAlumno.php')">Eliminar Alumnos</a></li>
            </ul>

            <h3>Profesores</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('profesores/crearFiltroProfesor.php')">Añadir Nuevo Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/buscarFiltroProf.php')">Consultar datos Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/modificarDatosProfes.php')">Modificar datos Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/eliminarDatosProfes.php')">Eliminar Profesores</a></li>
            </ul>

            <h3>Asignaturas</h3>
            <ul class="list-unstyled">               
                <li><a href="#" onclick="changeIframeSrc('asignaturas/listaFiltroAsigAlum.php')">Listados de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('asignaturas/listasFiltroAsigProf.php')">Listas Asignatura - Profesor </a></li>
                <li><a href="#" onclick="changeIframeSrc('asignaturas/modificarProfesorAsignatura.php')">Asignar profesor a una asignatura</a></li>
            </ul>
        </nav>
        
        <!-- ---iframe "BODY"--- -->
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
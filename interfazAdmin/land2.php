<?php
session_start();

// Asegurar que el usuario es admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../login/login.php");
    exit();
}

// Obtener el último inicio de sesión desde la cookie
$userName = $_SESSION["nombre_usuario"];
$ultimoLogin = "ultimo_inicio_" . $userName;
$ultimo_inicio = isset($_COOKIE[$ultimoLogin]) ? $_COOKIE[$ultimoLogin] : "Primera vez o sin registros recientes.";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escuela de Música</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light p-3 w-100 " style="position: fixed;">
        <div class="container">
            
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img src="../logo.jpg" alt="Logo" style="height: 50px;"> <!-- Cambia la ruta a tu imagen -->
                </div>
                <h1>Escuela de Música</h1>
                <div>
                     <span class="me-3">Usuario: admin</span>
                     <p class="text-muted small">Último inicio de sesión: <?= $ultimo_inicio ?></p>
                     <a href="../includes/cerrarSesion.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex ">
        <!-- ---MENU LATERAL---  -->
        <nav class="sidebar bg-light p-3" style="width: 250px; height: 100vh; position: fixed; margin-left: 15px; margin-top: 100px;">
            <h3>Matriculas</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('matriculas/intDatosAlum.php')"        class="text-decoration-none ">Nuevo ingreso</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/matriculasAlum2.php')"     class="text-decoration-none ">Alumno del centro</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/buscarFiltroMatr.php')"    class="text-decoration-none ">Consultar matriculas</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/modificarMatriculas.php')" class="text-decoration-none ">Modificar matriculas</a></li>
                <li><a href="#" onclick="changeIframeSrc('matriculas/eliminarMatricula.php')"   class="text-decoration-none ">Eliminar matriculas</a></li>
            </ul>

            <h3>Alumnos</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('matriculas/buscarFiltroAlum.php')"    class="text-decoration-none ">Consultar datos de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('alumnos/modificarDatosAlumnos.php')"  class="text-decoration-none ">Modificar datos de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('alumnos/eliminarAlumno.php')"         class="text-decoration-none ">Eliminar Alumnos</a></li>
            </ul>

            <h3>Profesores</h3>
            <ul class="list-unstyled">
                <li><a href="#" onclick="changeIframeSrc('profesores/crearFiltroProfesor.php')" class="text-decoration-none ">Añadir Nuevo Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/buscarFiltroProf.php')"    class="text-decoration-none ">Consultar datos Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/modificarDatosProfes.php')" class="text-decoration-none ">Modificar datos Profesores</a></li>
                <li><a href="#" onclick="changeIframeSrc('profesores/eliminarDatosProfes.php')" class="text-decoration-none ">Eliminar Profesores</a></li>
            </ul>

            <h3>Asignaturas</h3>
            <ul class="list-unstyled">               
                <li><a href="#" onclick="changeIframeSrc('asignaturas/listaFiltroAsigAlum.php')"         class="text-decoration-none ">Listados de Alumnos</a></li>
                <li><a href="#" onclick="changeIframeSrc('asignaturas/listasFiltroAsigProf.php')"        class="text-decoration-none ">Listas Asignatura - Profesor </a></li>
                <li><a href="#" onclick="changeIframeSrc('asignaturas/modificarProfesorAsignatura.php')" class="text-decoration-none ">Asignar profesor a una asignatura</a></li>
            </ul>
        </nav>
        
        <!-- ---iframe "BODY"--- -->
        <div class="container-fluid" style="margin-left: 270px; margin-top: 60px; padding: 20px;">
            <iframe id="contentFrame" class="w-100 vh-100 border-0 rounded shadow" src="https://www.miconservatorio.es/manuelcastillo" style="margin-top:100px;"></iframe>
        </div>
    </div>

    <script>
        function changeIframeSrc(page) {
            document.getElementById('contentFrame').src = page;
        }
    </script>

    <!-- Scripts de Bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>



 
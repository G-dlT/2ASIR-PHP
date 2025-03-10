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


include '../includes/conexion.php'; // Asegúrate de que la ruta sea correcta



if (!isset($_SESSION['id_profesor'])) {
    header("Location: login.php");
    exit();
}

$id_profesor = $_SESSION['id_profesor'];

// Consulta para obtener el nombre del profesor
$sql_profesor = "SELECT concat(nombre, apellidos) AS nombre FROM Profesores WHERE id_profesor = $id_profesor";
$resultado_profesor = mysqli_query($conexion, $sql_profesor);

if ($fila_profesor = mysqli_fetch_assoc($resultado_profesor)) {
    $nombre_profesor = $fila_profesor['nombre'];
} else {
    $nombre_profesor = "Desconocido"; // En caso de error
}



if (!isset($_SESSION['id_profesor'])) {
    header("Location: login.php");
    exit();
}

$id_profesor = $_SESSION['id_profesor'];

// Obtener asignaturas de tutorías (individuales)
$sql_tutorias = "
    SELECT DISTINCT nombre 
    FROM Asignaturas 
    WHERE tipo = 'Individual' AND id_profesor = $id_profesor";
$result_tutorias = mysqli_query($conexion, $sql_tutorias);

if (!$result_tutorias) {
    die("Error al obtener las asignaturas de tutorías: " . mysqli_error($conexion));
}

// Obtener asignaturas colectivas para el profesor
$sql_colectivas = "
    SELECT DISTINCT nombre 
    FROM Asignaturas 
    WHERE tipo = 'Colectiva' AND id_profesor = $id_profesor";
$result_colectivas = mysqli_query($conexion, $sql_colectivas);

if (!$result_colectivas) {
    die("Error al obtener las asignaturas colectivas: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Escuela de Música</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-light p-3 w-100" style="position: fixed;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <img src="../logo.jpg" alt="Logo" style="height: 50px;">
                </div>
                <h1>Escuela de Música</h1>
                <div>
                    <span class="me-3">Usuario: <?= htmlspecialchars($nombre_profesor) ?></span>
                    <p class="text-muted small">Último inicio de sesión: <?= $ultimo_inicio ?></p>
                    <a href="../includes/cerrarSesion.php" class="btn btn-danger " >Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex">
        <nav class="sidebar bg-light p-3" style="width: 250px; height: 100vh; position: fixed; margin-top: 100px;">
            <h3>Asignaturas</h3>
            <ul class="list-unstyled">
                <li><strong>Tutorías</strong></li>
                <?php while ($fila = mysqli_fetch_assoc($result_tutorias)) : ?>
                    <!-- Mostrar solo el nombre de la asignatura en tutorías -->
                    <li><a href="#" onclick="changeIframeSrc('tutorias/listaTutor.php?nombre=<?= urlencode($fila['nombre']) ?>')" class="text-decoration-none"><?= $fila['nombre'] ?></a></li>
                    <?php endwhile; ?>

                <li><strong>Colectivas</strong></li>
                <?php while ($fila = mysqli_fetch_assoc($result_colectivas)) : ?>
                    <!-- Mostrar solo el nombre de la asignatura en colectivas -->
                    <li><a href="#" onclick="changeIframeSrc('colectivas/listasColectivas.php?nombre=<?= $fila['nombre'] ?>')" class="text-decoration-none"><?= $fila['nombre'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </nav>

        <div class="container-fluid" style="margin-left: 270px; margin-top: 100px; padding: 20px;">
            <iframe id="contentFrame" class="w-100 vh-100 border-0 rounded shadow" src="https://www.miconservatorio.es/manuelcastillo" style="margin-top: 600px;"></iframe>
        </div>
    </div>

    <script>
        function changeIframeSrc(page) {
            document.getElementById('contentFrame').src = page;
        }
    </script>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

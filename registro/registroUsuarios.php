<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Escuela de Música</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <div class="card-header bg-primary text-white text-center">
                <h4>Registro de Profesor</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="procesar_registro.php">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI del Profesor</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Registrar</button>
                </form>

                <?php
                // Mostrar alertas de error si existen
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo '<div class="alert alert-danger mt-3">El DNI del profesor no existe en la base de datos. Póngase en contacto con el administrador.</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>

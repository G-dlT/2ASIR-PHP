<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Escuela de Música</title>
    <!-- Link al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f3f5;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
        }

        .login-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .login-btn {
            background-color: #007bff;
            border: none;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .register-btn {
            background-color: #6c757d;
            border: none;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
        }

        .register-btn:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container login-container">
        <div class="card login-card">
            <div class="card-header text-center login-card-header">
                <h4>Iniciar Sesión</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="procesar_login.php">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="login-btn">Iniciar Sesión</button>

                    <!-- Botón de registro -->
                    <a href="registroUsuarios.php" class="btn register-btn mt-3">Registrarse</a>
                </form>

                <?php
                session_start();
                // Mostrar alertas de error si existen
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo '<div class="alert alert-danger mt-3">Contraseña incorrecta.</div>';
                    } elseif ($_GET['error'] == 2) {
                        echo '<div class="alert alert-danger mt-3">Usuario no encontrado.</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

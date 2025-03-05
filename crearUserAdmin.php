<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost:3306"; // Nombre del servidor
$usuario = "root";            // Usuario de la base de datos
$contrasena = "root";         // Contraseña del usuario de la base de datos
$nombre_base_datos = "escuelamusica5"; // Nombre de la base de datos

// Establecer la conexión
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $nombre_base_datos);

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Datos del usuario administrador
$nombre_usuario = "admin";  // Nombre de usuario
$contrasena_admin = "admin";  // Contraseña en texto claro
$rol = "admin";  // Rol del usuario

// Crear el hash de la contraseña
$hashed_contrasena = password_hash($contrasena_admin, PASSWORD_DEFAULT);

// Consulta para insertar el usuario administrador
$query = "INSERT INTO usuarios (nombre_usuario, contrasena, rol) VALUES ('$nombre_usuario', '$hashed_contrasena', '$rol')";

// Ejecutar la consulta de inserción
if (mysqli_query($conexion, $query)) {
    echo "Usuario administrador insertado correctamente.";
} else {
    echo "Error al insertar el usuario: " . mysqli_error($conexion);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<?php
// ESTE ARCHIVO SOLO CREA UN USUARIO ADMINISTRATIVO PARA LA INTERFAZ D
// Configuración de la conexión a la base de datos
include('includes/conexion.php');

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Datos del usuario administrador
$nombre_usuario = "admin";  // Nombre de usuario
$contrasena_admin = "admin";  // Contraseña en texto claro
$rol = "admin";  // Rol del usuario: admin

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

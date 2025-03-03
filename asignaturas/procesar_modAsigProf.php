<?php
// Incluir el archivo de conexión
include('../includes/conexion.php');

// Verificar si se enviaron los datos
if (!empty($_POST['id_asignatura']) && !empty($_POST['id_profesor'])) {
    $id_asignatura = (int) $_POST['id_asignatura'];
    $id_profesor = (int) $_POST['id_profesor'];

    // Actualizar la asignatura con el nuevo profesor
    $sql_update = "UPDATE Asignaturas SET id_profesor = ? WHERE id_asignatura = ?";
    $stmt = mysqli_prepare($conexion, $sql_update);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $id_profesor, $id_asignatura);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($success) {
            echo "<div class='container mt-4'><div class='alert alert-success'>La asignatura se actualizó correctamente.</div></div>";
        } else {
            echo "<div class='container mt-4'><div class='alert alert-danger'>Error al actualizar la asignatura.</div></div>";
        }
    } else {
        echo "<div class='container mt-4'><div class='alert alert-danger'>Error en la preparación de la consulta.</div></div>";
    }
} else {
    echo "<div class='container mt-4'><div class='alert alert-warning'>Debe seleccionar una asignatura y un profesor.</div></div>";
}

// Cerrar conexión
mysqli_close($conexion);

// Redirigir después de 3 segundos
echo "<meta http-equiv='refresh' content='3;url=modFiltroAsigProf.php'>";
?>

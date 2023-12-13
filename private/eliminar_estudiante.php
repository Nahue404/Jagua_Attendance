<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el ID y la matrícula del estudiante desde el formulario
    $estudiante_id = $_POST['id'];
    $matricula = $_POST['matricula'];

    // Conectar a la base de datos
    $servidor = "localhost";
    $usuario = "Admin";
    $password = "neojumper112u";
    $base_de_datos = "jagua_attendance";

    $conexion = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Consulta preparada para eliminar al estudiante
    $query = "DELETE FROM estudiantes WHERE id = ?";
    
    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $query);

    if (!$stmt) {
        die("Error en la consulta preparada: " . mysqli_error($conexion));
    }

    // Vincular el parámetro ID a la consulta preparada
    mysqli_stmt_bind_param($stmt, "i", $estudiante_id);

    // Ejecutar la consulta preparada
    if (mysqli_stmt_execute($stmt)) {
        // La eliminación fue exitosa
        header("Location: lista_alumnos.php?mensaje=Estudiante eliminado con éxito&type=exito");
        exit();
    } else {
        // Si la eliminación falla, mostrar un mensaje de error
        echo "Error al eliminar el estudiante: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    // Si no se realiza una solicitud POST, redirigir de vuelta a la página de lista de alumnos con un mensaje de error
    header("Location: lista_alumnos.php?mensaje=Solicitud no válida&type=error");
    exit();
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servidor = "localhost";
    $usuario = "Admin";
    $password = "neojumper112u";
    $base_de_datos = "jagua_attendance";

    $conexion = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Obtener los datos del formulario
    $estudiante_id = $_POST["estudiante_id"];
    $matricula = $_POST["matricula"];
    $nombre = $_POST["nombre"];
    $carrera_id = $_POST["carrera"];
    $apellido = $_POST["apellido"];
    $turno_id = $_POST["turno"];
    $semestre = $_POST["semestre"];

    // Actualizar los datos en la base de datos
    $query = "UPDATE estudiantes SET matricula = '$matricula', nombre = '$nombre', carrera_id = $carrera_id, apellido = '$apellido', turno_id = $turno_id, semestre = $semestre WHERE id = $estudiante_id";

    if (mysqli_query($conexion, $query)) {
        // Los cambios se guardaron correctamente, redirige a exito_editaralumno.php con mensaje de éxito
        header("Location: exito_editaralumno.php?tipo=exito&mensaje=Los cambios se guardaron correctamente.");
        exit();
    } else {
        echo "Error al guardar los cambios: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>

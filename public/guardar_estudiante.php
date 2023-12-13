<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "Admin";
$password = "neojumper112u";
$base_de_datos = "jagua_attendance";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos del formulario están configurados
    if (isset($_POST["matricula"], $_POST["nombre"], $_POST["carrera_id"], $_POST["apellido"], $_POST["turno_id"], $_POST["semestre"])) {
        // Recibir datos del formulario
        $matricula = $_POST["matricula"];
        $nombre = $_POST["nombre"];
        $carrera_id = $_POST["carrera_id"];
        $apellido = $_POST["apellido"];
        $turno_id = $_POST["turno_id"];
        $semestre = $_POST["semestre"];

        // Verificar si la matrícula ya existe en la base de datos
        $matricula_query = "SELECT * FROM estudiantes WHERE matricula = '$matricula'";
        $matricula_result = mysqli_query($conexion, $matricula_query);

        if (mysqli_num_rows($matricula_result) > 0) {
            // La matrícula ya existe, redirige a advertencia.php
            header("Location: advertencia.php");
            exit();
        } else {
            // La matrícula no existe, insertar el nuevo registro
            $insert_query = "INSERT INTO estudiantes (matricula, nombre, carrera_id, apellido, turno_id, semestre) 
                             VALUES ('$matricula', '$nombre', $carrera_id, '$apellido', $turno_id, $semestre)";
            
            if (mysqli_query($conexion, $insert_query)) {
                // Redirigir a una página de éxito
                header("Location: exito.php");
                exit();
            } else {
                // Manejar otros errores de inserción si los hubiera
                echo "Error al guardar los datos: " . mysqli_error($conexion);
            }
        }
    } else {
        // Alguno de los campos no está configurado
        echo "Por favor, complete todos los campos en el formulario.";
    }
}

// Cerrar la conexión a la base de datos (al final del script)
mysqli_close($conexion);
?>

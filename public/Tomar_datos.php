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

$alumno = null; // Variable para almacenar los datos del alumno
$mostrar_boton_subir_foto = true; // Variable para controlar la visibilidad del botón

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir la matrícula del formulario
    $matricula = $_POST["matricula_hidden"];

    // Consultar si el alumno existe en la base de datos
    $consulta = "SELECT * FROM estudiantes WHERE matricula = '$matricula'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // El alumno está en el sistema, obtener sus datos
        $alumno = mysqli_fetch_assoc($resultado);

        // Consultar si hay imágenes asociadas a la matrícula
        $consulta_imagenes = "SELECT * FROM imagenes WHERE nombre = '{$alumno["matricula"]}'";
        $resultado_imagenes = mysqli_query($conexion, $consulta_imagenes);

        if (mysqli_num_rows($resultado_imagenes) > 0) {
            // Se encontraron imágenes, el botón no debe aparecer
            $mostrar_boton_subir_foto = false;
        }
    } else {
        // El alumno no está en el sistema, mostrar un mensaje de error
        $error_message = "El alumno no está en el sistema. Por favor, verifique la matrícula.";
    }
}

// Cerrar la conexión a la base de datos (al final del script)
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tomar fotografía</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('../Fondo/VerificarAlumno.png');
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Estilo para el formulario */
        .formulario {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Estilo para los campos de entrada */
        input {
            padding: 10px;
            margin: 5px;
            border: 2px solid #333;
            border-radius: 5px;
        }

        /* Estilo para el cuadro de datos del alumno */
        .cuadro-datos {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: <?php echo ($alumno !== null) ? 'block' : 'none'; ?>; /* Mostrar si se encuentra un alumno */
        }

        /* Estilo para el mensaje de error */
        .mensaje-error {
            color: red;
            margin-top: 20px;
            display: <?php echo (isset($error_message)) ? 'block' : 'none'; ?>; /* Mostrar si hay un mensaje de error */
        }

        .botones {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-top: 30px; /* Separación desde arriba aumentada */
            margin-right: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Cambiar color cuando pasas el puntero sobre el botón */
        .botones:hover,
        button:hover {
            background-color: #333;
            color: #fff;
        }

        /* Cambiar color cuando presionas el botón */
        .botones:active,
        button:active {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Formulario para verificar alumno -->
    <div class="formulario">
        <!-- Mensaje de error -->
        <p class="mensaje-error"><?php echo isset($error_message) ? $error_message : ''; ?></p>
        <!-- Cuadro de datos del alumno -->
        <div class="cuadro-datos">
            <?php if ($alumno !== null) : ?>
                <h1>Datos del Alumno</h1>
                <p>Matrícula: <?php echo $alumno["matricula"]; ?></p>
                <p>Nombre: <?php echo $alumno["nombre"]; ?></p>
                <p>Carrera: <?php echo $alumno["carrera"]; ?></p>
                <p>Apellido: <?php echo $alumno["apellido"]; ?></p>
                <p>Turno: <?php echo $alumno["turno"]; ?></p>
                <p>Semestre: <?php echo $alumno["semestre"]; ?></p>
                <!-- Mostrar el botón para subir foto si es necesario -->
                <?php if ($mostrar_boton_subir_foto) : ?>
                    <a href="loginFoto.php" class="botones">Subir foto</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- Botón para volver al menú -->
        <a href="Tomarfotografia.php" class="botones">Volver</a>
    </div>
</body>
</html>
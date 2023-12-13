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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir la matrícula del formulario
    $matricula = $_POST["matricula"];

    // Consultar si el alumno existe en la base de datos
    $consulta = "SELECT estudiantes.matricula, estudiantes.nombre, carreras.nombre AS carrera, estudiantes.apellido, turnos.nombre AS turno, estudiantes.semestre FROM estudiantes
    LEFT JOIN carreras ON estudiantes.carrera_id = carreras.id
    LEFT JOIN turnos ON estudiantes.turno_id = turnos.id
    WHERE estudiantes.matricula = '$matricula'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        // El alumno está en el sistema, obtener sus datos
        $alumno = mysqli_fetch_assoc($resultado);
    } 
    else {
        // El alumno no está en el sistema, establecer un mensaje de error
        $error_message = "El alumno no está en el sistema.";
    }
}

// Cerrar la conexión a la base de datos (al final del script)
mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar Alumno</title>
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

        /* Estilo para el botón */
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Cambiar color cuando presionas el botón "Verificar" */
        button:active {
            background-color: #333;
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

        /* Estilo para el botón de volver al menú */
        .boton-menu {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-top: 30px;
            margin-right: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Cambiar color cuando pasas el puntero sobre el botón */
        .boton-menu:hover,
        button:hover {
            background-color: #333;
            color: #fff;
        }

        /* Cambiar color cuando presionas el botón */
        .boton-menu:active,
        button:active {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Formulario para verificar alumno -->
    <div class="formulario">
        <h1>Verificar Alumno</h1>
        <form method="post" action="verificar_datos.php">
            <label for="matricula">Ingrese su matrícula:</label>
            <input type="text" id="matricula" name="matricula" required>
            <button type="submit">Verificar</button>
        </form>
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
            <?php endif; ?>
        </div>
        <!-- Botón para volver al menú -->
        <a href="menu.php" class="boton-menu">Volver al menú</a>
    </div>
</body>
</html>

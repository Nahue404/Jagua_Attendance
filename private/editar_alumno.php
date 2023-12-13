<!DOCTYPE html>
<html>
<head>
    <title>Editar Alumno</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('../Fondo/VerificarAlumno.png');
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Estilo para el título */
        .titulo {
            font-family: 'Montserrat', sans-serif;
            font-size: 50px;
            color: #000;
            margin-top: -170px;
            text-align: center;
        }

        /* Estilo para el botón de volver al menú */
        .boton-volver {
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
        .boton-volver:hover {
            background-color: #333;
            color: #fff;
        }

        /* Cambiar color cuando presionas el botón */
        .boton-volver:active {
            background-color: #000;
            color: #fff;
        }

        /* Estilo para el cuadro de datos del alumno */
        .cuadro-datos {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: <?php echo ($estudiante !== null) ? 'block' : 'none'; ?>; /* Mostrar si se encuentra un estudiante */
        }
    </style>
</head>
<body>
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

    // Verificar si se proporciona un ID válido
    if (isset($_GET["id"])) {
        $estudiante_id = $_GET["id"];
    } else {
        echo "ID de estudiante no válido.";
        exit;
    }

    // Consultar la base de datos para obtener los datos del estudiante
    $consulta = "SELECT estudiantes.*, carreras.nombre AS nombre_carrera, turnos.nombre AS nombre_turno FROM estudiantes 
                 LEFT JOIN carreras ON estudiantes.carrera_id = carreras.id
                 LEFT JOIN turnos ON estudiantes.turno_id = turnos.id
                 WHERE estudiantes.id = $estudiante_id";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        echo "Error al obtener los datos del estudiante.";
        exit;
    }

    if (mysqli_num_rows($resultado) == 0) {
        echo "No se encontró al estudiante.";
        exit;
    }

    $estudiante = mysqli_fetch_assoc($resultado);

    // Obtener las carreras
    $carreras = array();
    $carrerasQuery = "SELECT id, nombre FROM carreras";
    $carrerasResult = mysqli_query($conexion, $carrerasQuery);
    while ($carrera = mysqli_fetch_assoc($carrerasResult)) {
        $carreras[] = $carrera;
    }

    // Obtener los turnos
    $turnos = array();
    $turnosQuery = "SELECT id, nombre FROM turnos";
    $turnosResult = mysqli_query($conexion, $turnosQuery);
    while ($turno = mysqli_fetch_assoc($turnosResult)) {
        $turnos[] = $turno;
    }
    ?>

    <h1>Editar Alumno</h1>

    <form action="procesar_edicion.php" method="POST" class="cuadro-datos">
        <input type="hidden" name="estudiante_id" value="<?php echo $estudiante_id; ?>">
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" value="<?php echo $estudiante['matricula']; ?>"><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $estudiante['nombre']; ?>"><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $estudiante['apellido']; ?>"><br>
        <label for="carrera">Carrera:</label>
        <select id="carrera" name="carrera">
            <?php foreach ($carreras as $carrera) : ?>
                <option value="<?php echo $carrera['id']; ?>" <?php if ($carrera['id'] == $estudiante['carrera_id']) echo "selected"; ?>>
                    <?php echo $carrera['nombre']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label for="turno">Turno:</label>
        <select id="turno" name="turno">
            <?php foreach ($turnos as $turno) : ?>
                <option value="<?php echo $turno['id']; ?>" <?php if ($turno['id'] == $estudiante['turno_id']) echo "selected"; ?>>
                    <?php echo $turno['nombre']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <label for="semestre">Semestre:</label>
        <input type="text" id="semestre" name="semestre" value="<?php echo $estudiante['semestre']; ?>"><br>
        <input type="submit" value="Guardar cambios">
    </form>

    <a href="lista_alumnos.php" class="boton-volver">Volver</a>

    <?php
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    ?>
</body>
</html>

<?php
// Iniciar o reanudar la sesión
session_start();

// Verificar si el usuario no está autenticado y redirigirlo al inicio de sesión
if (!isset($_SESSION['usuario_autenticadoL']) || $_SESSION['usuario_autenticadoL'] !== true) {
    header("Location: loginLista.php?destino=private/lista_alumnos.php");
    exit;
}

$servidor = "localhost";
$usuario = "Admin";
$password = "neojumper112u";
$base_de_datos = "jagua_attendance";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Consulta de estudiantes:
$query = "SELECT estudiantes.matricula, estudiantes.apellido, estudiantes.nombre, carreras.nombre as carrera, turnos.nombre as turno, estudiantes.semestre, estudiantes.id
          FROM estudiantes
          LEFT JOIN carreras ON estudiantes.carrera_id = carreras.id
          LEFT JOIN turnos ON estudiantes.turno_id = turnos.id";

$resultado = mysqli_query($conexion, $query);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
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

        .enlace-amarillo {
            color: #EE9322;
        }

        
        .boton-eliminar {
            padding: 5px 10px;
            background-color: #DD5353;
            color: #FFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .boton-eliminar:hover {
            background-color: #B73E3E;
        }

    </style>
</head>
<body>
    <h1 class="titulo">Lista de Alumnos</h1>
    <table border="1">
        <tr>
            <th>Matrícula</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Carrera</th>
            <th>Turno</th>
            <th>Semestre</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
            <tr>
                <td><?php echo $fila["matricula"]; ?></td>
                <td><?php echo $fila["apellido"]; ?></td>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["carrera"]; ?></td>
                <td><?php echo $fila["turno"]; ?></td>
                <td><?php echo $fila["semestre"]; ?></td>
                <td>
                    <a href="editar_alumno.php?id=<?php echo $fila["id"]; ?>" class="enlace-amarillo">Editar</a>
                    <!-- Formulario para eliminar con confirmación -->
                    <div style="display: inline-block;">
                        <form action="eliminar_estudiante.php" method="post" onsubmit="return confirmarEliminar('<?php echo $fila['id']; ?>', '<?php echo $fila['matricula']; ?>')">
                            <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                            <input type="hidden" name="matricula" value="<?php echo $fila['matricula']; ?>">
                            <button type="submit" class="boton-eliminar">Eliminar</button>
                        </form>
                    </div>
                </td>
                <script>
                    function confirmarEliminar(estudianteId, matricula) {
                        return confirm('¿Estás seguro de que deseas eliminar el registro del estudiante con matrícula ' + matricula + '?');
                    }
                </script>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Botón para descargar como Excel -->
    <form action="descargar_excel.php" method="post">
        <input type="submit" value="Descargar como excel">
    </form>

    <!-- Botón para volver al menú -->
    <a href="TomarAsistencia.php?cerrar_sesionL=true" class="boton-volver">Volver</a>
</body>
</html>


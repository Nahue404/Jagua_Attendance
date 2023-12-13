<?php
session_start();

// Verificar si se proporcionó el parámetro 'cerrar_sesion'
if (isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion'] === 'true') {
    // Cerrar la sesión
    $_SESSION['usuario_autenticado'] = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jagua Attendance</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('../Fondo/Menu.png');
            background-size: cover; /* Ajusta la imagen de fondo al tamaño de la pantalla */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 75vh;
        }

        .logo {
            max-width: 30%; /* Ajusta el logo al ancho del contenedor */
        }

        .titulo {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem; /* Utiliza tamaños de fuente responsivos */
            color: #000;
            text-align: center;
        }

        .botones {
            margin-top: -20px;
            display: flex;
            flex-wrap: wrap; /* Permite que los botones se envuelvan a la siguiente línea en pantallas pequeñas */
            justify-content: center; /* Centra los botones en la pantalla */
        }

        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin: 5px; /* Espaciado entre los botones */
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        .boton:hover {
            background-color: #333;
            color: #fff;
        }

        .boton:active {
            background-color: #000;
            color: #fff;
        }

    </style>
</head>
<body>
    <img src="../Fondo/Logo.png" alt="Logo" class="logo">
    <h1 class="titulo">JAGUA<br>ATTENDANCE</h1>
    <h2 id="fecha"></h2>
    <script>
        setInterval(() => {
            let fecha = new Date();
            let fechaHora = fecha.toLocaleString();
            document.getElementById("fecha").textContent = fechaHora; // Corrección aquí
        }, 1000);
    </script>
    <div class="botones">
        <a href="login.php?destino=private/TomarAsistencia.php" class="boton">Tomar asistencia</a>
        <a href="AgregarEstudiante.php" class="boton">Agregar Estudiante</a>
        <a href="VerificarAlumno.php" class="boton">Verificar datos</a>
    </div>
</body>
</html>

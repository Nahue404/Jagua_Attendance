<?php
// Iniciar sesión si aún no se ha iniciado
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: ../login.php");
    exit;
}
// Verificar si se proporcionó el parámetro 'cerrar_sesion'
if (isset($_GET['cerrar_sesionL']) && $_GET['cerrar_sesionL'] === 'true') {
    // Cerrar la sesión
    $_SESSION['usuario_autenticadoL'] = false;
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tomar Asistencia</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('../Fondo/TomarAsistencia.png');
            background-size: cover;
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
            text-align: center;
            margin-top: -50px;
        }

        /* Estilo para el contenedor de botones */
        .botones {
            margin-top: 60px;
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }

        /* Estilo para los botones */
        .boton {
            display: block; 
            padding: 20px 30px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-bottom: 30px;
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
        
        /* Media Query para ajustar el título y los botones en pantallas más pequeñas */
        @media (max-width: 768px) {
        .titulo {
            font-size: 30px;
        }

        .botones {
            margin-top: 30px;
        }

        .boton {
            padding: 8px 16px;
            margin-bottom: 20px;
        }
    }
    </style>
</head>
<body>
    <!-- Título -->
    <h1 class="titulo">Tomar Asistencia</h1>

    <div class="botones">
         <!-- Botones -->
        <a href="https://faceapi-6ff36.web.app/identificar" class="boton">Tomar Asistencia</a>
        <a href="loginLista.php" class="boton">Lista de Estudiantes</a>
        <a href="../public/menu.php?cerrar_sesion=true" class="boton">Volver al menu</a>
    </div>
</body>
</html>
<?php
$mensaje = ""; // Variable para almacenar mensajes

// Iniciar o reanudar la sesión
session_start();

// Verificar si se proporcionó la contraseña correcta y establecer $_SESSION['usuario_autenticado']
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];

    // Verificar la contraseña aquí
    if ($codigo === "unida12") {
        // Contraseña correcta, establecer una variable de sesión
        $_SESSION['usuario_autenticado'] = true;

        // Redirigir al usuario al destino
        header("Location: ../private/TomarAsistencia.php");
        exit; // Detener la ejecución del script
    } else {
        // Contraseña incorrecta, mostrar un mensaje de error
        $mensaje = "Código de Acceso Incorrecto. Intenta nuevamente.";
    }
}

// Verificar si se cerró la sesión y establecer $_SESSION['usuario_autenticado'] en false
if (isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion'] === 'true') {
    $_SESSION['usuario_autenticado'] = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; 
            font-family: 'Montserrat', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Estilo para el Logo */
        .logo {
            max-width: 350px;
            margin-top: -50px;
        }

        /* Estilo para el título */
        .titulo {
            font-family: 'Montserrat', sans-serif;
            font-size: 35px;
            color: #000;
            margin-top: 9px;
            text-align: center;
        }

        /* Estilo para el formulario */
        .formulario {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center; 
        }

        /* Estilo para los campos de entrada */
        input {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #333;
            border-radius: 5px;
        }

        /* Estilo para el botón de inicio de sesión */
        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-right: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s; 
        }

        button:hover {
            background-color: #333;
            color: #fff;
        }

        button:active {
            background-color: #000;
            color: #fff;
        }

        /* Estilo para el botón "Volver al menú" */
        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-top: 20px;
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
        /* Estilo para el mensaje de error */
        p.error-message {
            color: red;
        }
    </style> 
</head>
<body>
    <!-- Logo -->
    <img src="../Fondo/Logo.png" alt="Logo" class="logo">

    <!-- Título -->
    <h1 class="titulo">JAGUA<br>ATTENDANCE</h1>

    <div class="formulario">
        <h2>Iniciar Sesión</h2>
        <form action="" method="POST"> 
            <label for="codigo">Código de Acceso:</label>
            <input type="password" id="codigo" name="codigo" required>
            <button type="submit">Iniciar Sesión</button>
            <a href="menu.php" class="boton">Volver al menú</a>
        </form>
        <!-- Mostrar mensaje de error si es necesario -->
        <p class="error-message"><?php echo $mensaje; ?></p>
    </div>
</body>
</html>
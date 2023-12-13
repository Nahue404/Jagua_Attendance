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

        /* Estilo para el botón de volver al menú */
        .boton-menu {
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
        <!-- Botón para volver al menú -->
        <a href="menu.php" class="boton-menu">Volver al menu</a>
    </div>
</body>
</html>
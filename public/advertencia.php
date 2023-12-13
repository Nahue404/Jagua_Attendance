<!DOCTYPE html>
<html>
<head>
    <title>Advertencia de Matrícula</title>
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

        /* Estilo para el símbolo de advertencia */
        .advertencia {
            color: #FFD700; /* Color amarillo */
            font-size: 100px;
            margin-bottom: 20px;
        }

        /* Estilo para el mensaje de advertencia */
        .mensaje-advertencia {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Estilo para el botón de volver al menú */
        .boton-volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Cambiar color cuando pasas el puntero sobre el botón */
        .boton-volver:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Símbolo de advertencia -->
    <div class="advertencia">&#9888;</div>

    <!-- Mensaje de advertencia -->
    <div class="mensaje-advertencia">
        ¡Advertencia! La matrícula ya existe en la base de datos.
    </div>

    <!-- Botón para volver al menú -->
    <a href="menu.php" class="boton-volver">Volver al Menú</a>
</body>
</html>

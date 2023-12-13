<!DOCTYPE html>
<html>
<head>
    <title>Agregar Estudiante</title>
    <link rel="icon" href="Fondo/JaguaGrade.ico" type="image/x-icon">
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

        /* Estilo para el check de éxito */
        .check-exito {
            color: #4CAF50; /* Color verde */
            font-size: 100px;
            margin-bottom: 20px;
            animation: checkScale 0.5s ease-in-out; /* Aplicar animación */
        }

        /* Definir la animación con @keyframes */
        @keyframes checkScale {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        /* Estilo para el mensaje de éxito */
        .mensaje-exito {
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
    <!-- Check de éxito -->
    <div class="check-exito">&#10004;</div>

    <!-- Mensaje de éxito -->
    <div class="mensaje-exito">
        Los datos se guardaron correctamente.
    </div>

    <!-- Botón para volver al menú -->
    <a href="menu.php" class="boton-volver">Volver al Menú</a>
</body>
</html>

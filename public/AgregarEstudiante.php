<!DOCTYPE html>
<html>
<head>
    <title>Agregar Estudiante</title>
    <link rel="icon" href="../Fondo/JaguaGrade.ico" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('../Fondo/AgregarEstudiante.png');
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
            margin-top: -40px;
            text-align: center;
        }

        /* Estilo para el contenedor de formularios */
        .formularios {
            display: flex;
            flex-direction: row; 
            margin-top: 20px; 
            justify-content: flex-end; 
            margin-top: 50px; 
        }

        /* Estilo para los formularios */
        .formulario {
            margin-right: -300px; 
            margin-left: 320px; 
        }

        /* Estilo para los input */
        input {
            padding: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
        }

        /* Estilo para el contenedor de botones */
        .botones {
            margin-top: 180px;
        }

        /* Estilo para los botones */
        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            color: #000;
            text-decoration: none;
            margin-left: 20px; /* Mueve los botones hacia la izquierda */
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            transition: background-color 0.3s, color 0.3s; 
        }

        /* Cambiar color cuando pasas el puntero sobre el botón */
        .boton:hover {
            background-color: #333;
            color: #fff;
        }

        /* Cambiar color cuando presionas el botón */
        .boton:active {
            background-color: #000;
            color: #fff;
        }

        /* Estilo para los input */
        input {
            padding: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
        }

        .dos-formulario select {
            padding: 10px;
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            height: 50px;
        }
         /* Estilo para los formularios 2*/
         .dos-formularios {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            justify-content: flex-end; 
            margin-top: 50px; 
        }

        /* Estilo para los nuevos formularios */
        .dos-formulario {
            margin-right: -300px; 
            margin-left: 346px; 
        }

        .tres-formulario select {
            padding: 10px; 
            border: 2px solid #333;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            height: 40px; 
        }
         /* Estilo para los formularios 2*/
         .tres-formularios {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            justify-content: flex-end; 
            margin-top: 50px; 
        }

        /* Estilo para los nuevos formularios */
        .tres-formulario {
            margin-right: -216px;
            margin-left: 316px; 
        }
    </style>
    <script>
        // JavaScript para validar el formulario
        function validarFormulario() {
            var numeroMatricula = document.getElementById("numeroMatricula").value;
            var nombre = document.getElementById("nombre").value;
            var carrera = document.getElementById("carrera").value;
            var apellido = document.getElementById("apellido").value;
            var turno = document.getElementById("turno").value;
            var semestre = document.getElementById("semestre").value;

            if (numeroMatricula === "" || nombre === "" || carrera === "" || apellido === "" || turno === "" || semestre === "") {
                alert("Por favor, complete todos los campos.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1 class="titulo">Agregar Nuevo Estudiante</h1>
    <form method="post" action="guardar_estudiante.php" onsubmit="return validarFormulario();">
        <div class="formularios">
            <div class="formulario">
                <label for="numeroMatricula">Matrícula:</label>
                <input type="number" id="numeroMatricula" name="matricula">
            </div>
            <div class="formulario">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>
        </div>

        <div class="dos-formularios">
            <div class="dos-formulario">
                <label for="carrera">Carrera:</label>
                <select id="carrera" name="carrera_id">
                    <option value="1">Ing. Informática</option>
                    <option value="2">Ing. en Sistemas</option>
                </select>
            </div>
            <div class="dos-formulario">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido">
            </div>
        </div>

        <div class="tres-formularios">
            <div class="tres-formulario">
                <label for="turno">Turno:</label>
                <select id="turno" name="turno_id">
                    <option value="1">Mañana</option>
                    <option value="2">Noche</option>
                </select>
            </div>
            <div class="tres-formulario">
                <label for="semestre">Semestre:</label>
                <select id="semestre" name="semestre">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>

        </div>
        <!-- Contenedor de botones -->
        <div class="botones">
            <!-- Botón para guardar datos -->
            <a href="loginAgregarE.php" class="boton">Capturar rostro</a>
            <input type="submit" value="Guardar datos" class="boton">
            <a href="menu.php" class="boton">Volver al menú</a>
        </div>
    </form>
</body>
</html>

<?php
require '../vendor/autoload.php'; // Incluye la carga automática de PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "Admin";
$password = "neojumper112u";
$base_de_datos = "jagua_attendance";

$conexion = mysqli_connect($servidor, $usuario, $password, $base_de_datos);

if (!$conexion) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Consultar la base de datos para obtener los datos de los estudiantes
$consulta = "SELECT estudiantes.matricula, estudiantes.nombre, carreras.nombre AS carrera, estudiantes.apellido, turnos.nombre AS turno, estudiantes.semestre FROM estudiantes
LEFT JOIN carreras ON estudiantes.carrera_id = carreras.id
LEFT JOIN turnos ON estudiantes.turno_id = turnos.id";

$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die("Error al obtener los datos de los estudiantes.");
}

// Crear una instancia de PhpSpreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar encabezados de columna
$sheet->setCellValue('A1', 'Matrícula');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Carrera');
$sheet->setCellValue('D1', 'Apellido');
$sheet->setCellValue('E1', 'Turno');
$sheet->setCellValue('F1', 'Semestre');

// Llenar la hoja de cálculo con los datos de los estudiantes
$row = 2; // Comenzar desde la segunda fila
while ($fila = mysqli_fetch_assoc($resultado)) {
    $sheet->setCellValue('A' . $row, $fila['matricula']);
    $sheet->setCellValue('B' . $row, $fila['nombre']);
    $sheet->setCellValue('C' . $row, $fila['carrera']);
    $sheet->setCellValue('D' . $row, $fila['apellido']);
    $sheet->setCellValue('E' . $row, $fila['turno']);
    $sheet->setCellValue('F' . $row, $fila['semestre']);
    $row++;
}

// Crear un objeto de escritura para Excel (Xlsx)
$writer = new Xlsx($spreadsheet);

// Configurar las cabeceras para descargar el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="estudiantes.xlsx"');
header('Cache-Control: max-age=0');

// Enviar el archivo al navegador
$writer->save('php://output');

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

<?php
session_start();

include('/xampp/htdocs/Login_v2/vendor/autoload.php');

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

if ($conexion) {
    // Check if the idActividad is set in the URL
    if (isset($_GET['idActividad'])) {
        // Get the idActividad from the URL
        $idActividad = $_GET['idActividad'];

        // Consulta SQL to get the data from the database for a specific activity
        $sql = "SELECT t.matritea, t.teachNames, a.actNombre, p.perPeriodo, c.carreNombre, s.matristu, s.stunNames, s.stuLastNames, s.stuCare 
        FROM teachers t 
        INNER JOIN actividad a ON t.matritea = a.teachers_matritea 
        INNER JOIN inscripciones i ON a.idActividad = i.Actividad_idActividad 
        INNER JOIN students s ON i.students_matristu = s.matristu 
        INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo 
        INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera
        WHERE a.idActividad = ?";

        // Prepare the query
        $stmt = mysqli_prepare($conexion, $sql);

        // Verify if the query was prepared successfully
        if ($stmt) {
            // Bind the idActividad parameter
            mysqli_stmt_bind_param($stmt, "s", $idActividad);

            // Execute the query
            mysqli_stmt_execute($stmt);

            // Get the result
            $result = mysqli_stmt_get_result($stmt);

            $excel = new Spreadsheet();
            $hojaActiva = $excel->getActiveSheet();
            $hojaActiva->setTitle("Alumnos");
            
            //INICIO DE LA HOJA DE EXCEL
            $hojaActiva->setCellValue('A1', 'Ingenieria');
            $hojaActiva->setCellValue('B1', 'Docente');
            $hojaActiva->setCellValue('C1', 'Nombre de la Actividad');
            $hojaActiva->setCellValue('D1', 'Tipo de Actividad');
            $hojaActiva->setCellValue('E1', 'Periodo');

            // Aplicar bordes a las celdas de título
            $borderStyleTitle = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

            $hojaActiva->getStyle('A1:E1')->applyFromArray($borderStyleTitle);
            //FINAL DE LA FILA 1 DE EXCEL

            //INICIO DE LA FILA 2 DE EXCEL
            $fila = 2;

            // Define el estilo de borde para las celdas de datos
            $borderStyle = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

            while ($rows = mysqli_fetch_assoc($result)) {
                $hojaActiva->getColumnDimension('A')->setWidth(20);
                $hojaActiva->setCellValue('A' . $fila, $rows['stuCare']);
                $hojaActiva->getColumnDimension('B')->setWidth(15);
                $hojaActiva->setCellValue('B' . $fila, $rows['teachNames']);
                $hojaActiva->getColumnDimension('C')->setWidth(30);
                $hojaActiva->setCellValue('C' . $fila, $rows['actNombre']);
                $hojaActiva->getColumnDimension('D')->setWidth(20);
                $hojaActiva->setCellValue('D' . $fila, $rows['carreNombre']);
                $hojaActiva->getColumnDimension('E')->setWidth(12);
                $hojaActiva->setCellValue('E' . $fila, $rows['perPeriodo']);
                
                 // Aplicar bordes a las celdas de datos obtenidos de la base de datos
                $hojaActiva->getStyle('A' . $fila . ':E' . $fila)->applyFromArray($borderStyle);

                $borderStyleTitle = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => 'FF000000'],
                        ],
                    ],
                ];      

            }
            //FINAL DE LA FILA 2 DE EXCEL

            //INICIO DE LA FILA 3 DE EXCEL 
            $hojaActiva->setCellValue('A3', 'Matrícula Estudiante');
            $hojaActiva->setCellValue('B3', 'Nombre de Estudiante');
            $hojaActiva->setCellValue('C3', 'Apellido Estudiante');

            $hojaActiva->getStyle('A3:C3')->applyFromArray($borderStyleTitle);
            //FINAL DE FILA 3 DE EXCEL

            $fila = 4; // Empezar en la fila 4

            $borderStyle = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ];

            // Ingresar datos en la fila 4
            mysqli_data_seek($result, 0); // Rebobinar el puntero del conjunto de resultados al principio

            while ($rows1 = mysqli_fetch_assoc($result)) {
                $hojaActiva->getColumnDimension('A')->setWidth(20);
                $hojaActiva->setCellValue('A' . $fila, $rows1['matristu']);
                $hojaActiva->getColumnDimension('B')->setWidth(20);
                $hojaActiva->setCellValue('B' . $fila, $rows1['stunNames']);
                $hojaActiva->getColumnDimension('C')->setWidth(20);
                $hojaActiva->setCellValue('C' . $fila, $rows1['stuLastNames']);

                // Aplicar bordes a las celdas de datos obtenidos de la base de datos
                $hojaActiva->getStyle('A' . $fila . ':C' . $fila)->applyFromArray($borderStyle);

                $fila++;
            }
         
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Alumnos.xlsx"');
            header('Cache-Control: max-age=0');

            $writer = IOFactory::createWriter($excel, 'Xlsx');
            $writer->save('php://output');
            mysqli_stmt_close($stmt);
            mysqli_close($conexion);
            exit();
        } else {
            echo 'Error al preparar la consulta.';
        }
    } else {
        echo 'Error al conectar a la base de datos.';
    }
}
?>
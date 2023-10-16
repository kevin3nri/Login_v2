<?php
session_start();

include('/xampp/htdocs/Login_v2/TCPDF-main/tcpdf.php');

// Define las variables para los márgenes y el tamaño de la página
$left = 10; // Margen izquierdo en milímetros
$top = 10; // Margen superior en milímetros
$right = 10; // Margen derecho en milímetros
$bottom = 0; // Margen inferior en milímetros
$width = 210; // Ancho de la página en milímetros (tamaño A4 por ejemplo)
$height = 297; // Alto de la página en milímetros (tamaño A4 por ejemplo)

// Crear una instancia de TCPDF y establecer el tamaño de la página
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins($left, $top, $right);
$pdf->SetAutoPageBreak(true, $bottom);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Establecer el título del documento
$pdf->SetTitle('Anexo XV. Constancia de Cumplimiento de Actividades Complementarias');

// Agregar una página
$pdf->AddPage();

// Agregar imagen en la parte superior izquierda
$imagenIzquierda = '../imagenespdf/imagen1.png'; // Ruta de la imagen izquierda
$xIzquierda = 10; // Posición X de la imagen izquierda
$yIzquierda = 2; // Posición Y de la imagen izquierda
$anchoIzquierda = 60; // Ancho de la imagen izquierda (en milímetros)
$pdf->Image($imagenIzquierda, $xIzquierda, $yIzquierda, $anchoIzquierda);

// Agregar imagen en la parte superior derecha
$imagenDerecha = '../imagenespdf/imagen6.png'; // Ruta de la imagen derecha
$xDerecha = 127; // Posición X de la imagen derecha
$yDerecha = 2; // Posición Y de la imagen derecha
$anchoDerecha = 75; // Ancho de la imagen derecha (en milímetros)
$pdf->Image($imagenDerecha, $xDerecha, $yDerecha, $anchoDerecha);

// Agregar un salto de línea
$pdf->Ln(10);

// Definir el estilo CSS para la tabla con márgenes
$estiloTabla = 'border: 1px solid #000; margin: 10px;'; // Ajusta el valor de margen según tus necesidades

$html = '<table border="1" cellpadding="5" style="width:100%; ' . $estiloTabla . '">
            <tr>
                <td colspan="3" style="text-align:center;"><b>Anexo XVI. Constancia de Cumplimiento de Actividades Complementaria</b></td>
            </tr>
            <tr>
                <td style="width:22%; text-align:center;"><b>Fecha: 13/01/2020</b></td>
                <td style="width:62%; text-align:center;"><b>Referencia a la Norma ISO 9001:2015 (8.2.2, 8.5.1)</b></td>
                <td style="width:16%; text-align:center;"><b>Revisión: 0</b></td>
            </tr>
        </table>';

// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');

$texto_adicional = '<div style="text-align:center; margin-top:20px;">
                        <b>ANEXO XVI. CONTANCIA DE CUMPLIMIENTO DE ACTIVIDAD COMPLEMENTARIA.</b>
                    </div>';

$pdf->writeHTML($texto_adicional, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(10);

// Agregar más texto subrayado
$texto_subrayado = '<div style="text-align:left; text-indent: 0px;">
<b><u>LCDA. VERONICA SÁNCHEZ LARA</u></b>
                    </div>';

$pdf->writeHTML($texto_subrayado, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(2);

// Agregar más texto 
$texto_left = '<div style="text-align:left; text-indent: 0px;">
<b>Jefa del Departamento de Control Escolar del Tecnologico de Estudios Superiores de Chalco.</b>
                </div>';

$pdf->writeHTML($texto_left, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(2);

// Agregar más texto 
#$texto_left = '<div style="text-align:left; text-indent: 0px;">
#<b>Superiores de Chalco.</b>
#            </div>';

#$pdf->writeHTML($texto_left, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(2);

// Agregar más texto 
$texto_left = '<div style="text-align:left; text-indent: 0px;">
<b>PRESENTE</b>
            </div>';

$pdf->writeHTML($texto_left, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(10);

// Obtén los datos de la URL
$idActividad = $_GET['idActividad'];
$matristu = $_GET['matristu'];
##$desempenio = $_POST['desempenio'];

//Conexion a la base de datos y al proyecto
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

// Recuperar los datos de MySQL
$sql = "SELECT t.matritea, t.teachNames, t.teachUser, t.teachClue, a.idActividad, a.actNombre, p.perPeriodo, c.carreNombre, i.idInscripciones, s.matristu, s.stunNames, s.stuLastNames, s.stuCare, d.idDesempenio, d.desenombre, d.desevalor 
FROM teachers t 
INNER JOIN actividad a ON t.matritea = a.teachers_matritea 
INNER JOIN desempenio d ON a.idActividad = d.Actividad_idActividad 
INNER JOIN inscripciones i ON a.idActividad = i.Actividad_idActividad 
INNER JOIN students s ON i.students_matristu = s.matristu 
INNER JOIN periodo p ON a.Periodo_idPeriodo = p.idPeriodo
INNER JOIN carrera c ON a.carrera_idcarrera = c.idcarrera
WHERE t.teachNames = ? AND a.idActividad = ? AND s.matristu = ?";

$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "sss", $_SESSION['teachNames'], $idActividad, $matristu);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);


//agrega los datos que tienen tilde en la base de datos en mayusculas
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $teachNames = mb_strtoupper($row['teachNames'], 'UTF-8');
    $stunNames = mb_strtoupper($row['stunNames'],'UTF-8' );
    $stuLastNames = mb_strtoupper($row['stuLastNames'], 'UTF-8');
    $matristu = mb_strtoupper($row['matristu'], 'UTF-8');
    $stuCare = mb_strtoupper($row['stuCare'], 'UTF-8');
    $actNombre = mb_strtoupper($row['actNombre'], 'UTF-8');
    $perPeriodo = mb_strtoupper($row['perPeriodo'], 'UTF-8');
    $desenombre = mb_strtoupper($row['desenombre'], 'UTF-8');
    $desevalor = mb_strtoupper($row['desevalor'], 'UTF-8');

//Agrega el texto al documento que esta alineado a 1.5 extrae datos de la base de datos como nombre del docente,nombre y apellido del alumno,carrera del alumno, nombre de la actividad,nombre y valor del desempeño, periodo y como dato final esta en estatico el numero de crédito de la actividad
$texto_izquierda = '<div style="text-align:justify; text-indent: 0px; line-height: 1.5; word-wrap: break-word;">
El que suscribe <b>'.$teachNames.'</b>, por este medio se permite hacer de su conocimiento que el estudiante <b>'.$stunNames.'</b> <b>'.$stuLastNames.'</b> con
    número de control <b>'.$matristu.'</b> de la carrera de <b>'.$stuCare.'</b> ha cumplido
    su actividad complementaria <b>'.$actNombre.'</b> con el taller "<b>DESARROLLO TECNOLÓGICO</b>" con el nivel de 
    <b>'.$desenombre.'</b> y un valor numérico de <b>'.$desevalor.'</b>, durante el período escolar <b>'.$perPeriodo.'</b> con un valor
    curricular de <b>1</b> crédito.
</div>';

$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    El que suscribe <b>' . $teachNames . '</b>, por este medio se permite
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

// Agregar el valor seleccionado del select en el PDF
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    hacer de su conocimiento que el estudiante <b>'.$stunNames.'</b> <b>'.$stuLastNames.'</b> con
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento agrega la matricula y la carrera del alumno
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    número de control <b>'.$matristu.'</b> de la carrera de <b>'.$stuCare.'</b> 
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento agrega el nombre de la actividad complementaria
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    ha cumplido su actividad complementaria <b>'.$actNombre.'</b>
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento agrega el taller y el nivel
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    con el taller "<b>DESARROLLO TECNOLOGICO</b>" con el nivel de 
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento agrega el valor numerico y el periodo
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">
#    <b>'.$desenombre.'</b> y un valor numerico de <b>'.$desevalor.'</b>, durante el período escolar <b>'.$perPeriodo.'</b> con un
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; line-height: 1.5; margin-bottom: 10px; word-wrap: break-word;">

#valor curricular de <b>1</b> crédito.
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

// Agregar un salto de línea
$pdf->Ln(10);

//texto del documento donde se modificara la hora y fecha del documento
$texto_izquierda = '<div style="text-align:justify; text-indent: 0px; ">
Se extiende la presente en la <b>Candelaria Tlapala Chalco, México</b> a los   dias de de 2023.
</div>';

$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

//texto del documento para el año
#$texto_izquierda = '<div style="text-align:justify; text-indent: 35px; ">
#    de 2023.<b></b>
#</div>';

#$pdf->writeHTML($texto_izquierda, true, false, false, false, '');

// Agregar un salto de línea
$pdf->Ln(16);

//texto del documento para el año
$texto_izquierda = '<div style="text-align:center; text-indent: 0px; ">
    <b>ATENTAMENTE</b>
</div>';

$pdf->writeHTML($texto_izquierda, true, false, false, false, '');


// Agregar un salto de línea
$pdf->Ln(40);

// Cuadro de texto para la firma del jefe de división y docente
$html = '<table cellpadding="5" style="width:100%;">
            <tr>
                <td style="width:50%; text-align:center;"><b><u>' . $teachNames . '</u></b><br><b>Profesor Responsable</b></td>
                <td style="width:50%; text-align:center;"><b><u>L.I. MARINO ZUÑIGA DOMÍNGUEZ</u></b><br><b>Vo.Bo. del Jefe de División de Ingeniería Informática</b></td>
            </tr>
        </table>';

// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(2);

//texto para el jefe del departamento correspondiente
$texto_subrayado = '<div style="text-align:left; font-size: 10px">
                        c.c.p Jefe(a) de Departamento correspondiente
                    </div>';

$pdf->writeHTML($texto_subrayado, true, false, true, false, '');

// Luego, define la ubicación y dimensiones de la imagen
$imagenIzquierda = '../imagenespdf/imagen3.png'; // Ruta de la imagen
$anchoImagen = 25; // Ancho de la imagen en milímetros
$altoImagen = 20; // Alto de la imagen en milímetros
$posXImagen = 0; // Posición X de la imagen en milímetros (ajusta según tus necesidades)
$posYImagen = $pdf->getPageHeight() - $bottom - $altoImagen; // Posición Y de la imagen (en la parte inferior izquierda de la página)

// Agrega la imagen al PDF
$pdf->Image($imagenIzquierda, $posXImagen, $posYImagen, $anchoImagen, $altoImagen);

// Agregar un salto de línea
$pdf->Ln(15);

// Definir el pie de página
$pdf->SetFont('helvetica', 'I', 11);
$pdf->Cell(0, 10, 'Página ' . $pdf->getAliasNumPage() . ' de ' . $pdf->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');

// Agregar un salto de línea
$pdf->Ln(10);

// Texto a la izquierda de la leyenda de toda hoja
$texto_izquierda = '<div style="text-align:left; font-size: 11px;">
                        <b>Toda copia en Papel es un “Documento No Controlado” a excepción del original</b>
                    </div>';

// Escribir el texto a la izquierda
$pdf->writeHTML($texto_izquierda, true, false, true, false, '');

// Agregar un salto de línea
$pdf->Ln(3.2);

// Agregar texto en la parte inferior derecha
$texto_subrayado = '<div style="text-align:right; font-size: 8px;">
    <b>SECRETARÍA DE EDUCACIÓN</b>
</div>';

$pdf->writeHTML($texto_subrayado, true, false, true, false, '');

//se agrega texto que va al final de la hoja del lado derecho de la hoja
$texto_subrayado = '<div style="text-align:right; font-size: 8px;">
    SUBSECRETARÍA DE EDUCACIÓN SUPERIOR Y NORMAL  
</div>';

$pdf->writeHTML($texto_subrayado, true, false, true, false, '');

//se agrega texto que va al final de la hoja del lado derecho de la hoja
$texto_subrayado = '<div style="text-align:right; font-size: 8px;">    
    TECNOLÓGICO DE ESTUDIOS SUPERIORES DE CHALCO   
</div>';

$pdf->writeHTML($texto_subrayado, true, false, true, false, '');

// Definir el estilo CSS para el cuadro gris sin bordes, márgenes ni padding
$estiloCuadroGris = 'background-color: #616161; color: #ffffff; text-align: center; margin: 0; padding: 0; line-height: 0.7;';

// Definir el estilo CSS para el texto con tamaño de fuente reducido, sin margen ni padding y sin espacio entre líneas
$estiloTexto = 'font-size: 9pt; margin: 0; padding: 0; line-height: 0.6;';

// Crear el cuadro gris con los textos
$texto_estilo = '<div style="' . $estiloCuadroGris . '">
                    <p style="' . $estiloTexto . '">Carretera federal México-Cuautla s/n, col. La Candelaria Tlapala, C.P. 56641, Chalco, Estado de México.</p>
                    <p style="' . $estiloTexto . '">Tels. 59821088 y 59821089 | teschalco@hotmail.com</p>
                </div>';

// Escribir el HTML en el PDF
$pdf->writeHTML($texto_estilo, true, false, true, false, '');

//no se encuentran resultados
} else {
        echo '<script>
            alert("No se encontraron resultados ingresa primero el desempeño para el alumno antes de continuar");
            window.location = "../../docentegenerapdf.php";
            </script>
        ';
}

// Salida del PDF
$pdf->Output('Constancia de Actividad complementaria '.$stunNames.' '.$stuLastNames.' '.$actNombre.'.pdf', 'I');

// Cerrar la conexión a la base de datos
$conexion->close();
?>
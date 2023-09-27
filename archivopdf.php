<?php
include('TCPDF-main/tcpdf.php');

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF();

// Establecer el título del documento
$pdf->SetTitle('Mi Primer PDF');

// Agregar una página
$pdf->AddPage();

// Configurar el contenido del PDF
$html = '<h1>Mi Primer PDF con TCPDF</h1>';
$html .= '<p>Este es un ejemplo básico de cómo crear un archivo PDF en PHP utilizando TCPDF.</p>';

// Agregar el contenido al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Finalizar el PDF y generar el archivo
$pdf->Output('mi_primer_pdf.pdf', 'I'); // 'I' para mostrar en el navegador, 'D' para descargar el archivo
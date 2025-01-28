<?php

require __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;

// Instancia de Dompdf
$dompdf = new Dompdf();

// Contenido HTML para el PDF
$html = '<h1>Voy a generar un documento pdf a partir de una html</h1>';

// Cargar el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Renderizar el HTML como PDF
$dompdf->render();

// Enviar el PDF al navegador para descargar o visualizar
$dompdf->stream("documento.pdf", array("Attachment" => false));
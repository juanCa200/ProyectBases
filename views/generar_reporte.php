
<?php if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el código del curso desde el formulario
    $cod_cur = $_POST['cod_cur'];
    ob_clean();


    // Incluir el archivo del controlador y obtener los datos necesarios
    require_once "../controllers/controllerGeneral.php";
    $obj = new controllerGeneral();
    $estudiantes = $obj->obtenerEstudiantesPorCurso($cod_cur);
    $notas = $obj->obtenerNotasPorCurso($cod_cur);
    
require_once('../views/tcpdf/tcpdf.php');

// Crear instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Agregar una nueva página
$pdf->AddPage();


// Definir contenido HTML para el reporte
$html = '<h1>Tabla de Notas</h1>';
$html .= '<hr style="border: none; border-top: 2px solid black; margin: 20px 0; width: 80%;">';
$html .= '<table class="data-table">';
$html .= '<thead>';
$html .= '<tr style="background-color: #CCC; font-weight: bold;">';
$html .= '<th style="border: 1px solid #000; padding:15px"></th>';
foreach ($notas as $nota) {
    $html .= '<th style="border: 1px solid #000; background-color: #F7CCBA; ">'. '<span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $nota['descrip_nota'] . '</span></th>';
}
$html .= '<th style="border: 1px solid #000; padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Definitiva</th>';
$html .= '</tr>';
$html .= '<tr style="background-color: #f2f2f2;">';
$html .= '<th style="border: 1px solid #000; padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codigo</th>';
$sumaPorcentajes=0;
foreach ($notas as $nota) {
    $html .= '<th style="border: 1px solid #000; padding: 5px; background-color:#D5D35D;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $nota['porcentaje']*100 . '%</th>';
    $porcentaje = $nota['porcentaje'] * 100;
    $sumaPorcentajes += $porcentaje;
}
$html .= '<th style="border: 1px solid #000; padding-left: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $sumaPorcentajes . '%</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
foreach ($estudiantes as $cod_est => $estudiante) {
    $definitiva = 0; // Inicializar la variable $definitiva antes del bucle
    $html .= '<tr>';
    $html .= '<td style="border: 1px solid #000; padding: 5px;">&nbsp;&nbsp;&nbsp;' . $cod_est . '</td>';
    foreach ($notas as $nota) {
        $html .= '<td style="border: 1px solid #000; padding-left: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $descrip_nota = $nota['descrip_nota'];
        if (isset($estudiante['notas'][$descrip_nota])) {
            $nota_estudiante = $estudiante['notas'][$descrip_nota]['valor'];
            $porcentaje = $nota['porcentaje'];
            $definitiva += $nota_estudiante * $porcentaje;
            $html .= $nota_estudiante . '<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        }
        $html .= '</td>';
    }
    $html .= '<td style="border: 1px solid #000; padding-left: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $definitiva . '</td>';
    $html .= '</tr>';
}
$html .= '</tbody>';
$html .= '</table>';



// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el archivo PDF
$pdf->Output('reporte.pdf', 'I');
}
?>

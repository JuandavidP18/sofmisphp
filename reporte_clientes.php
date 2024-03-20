<?php
require_once('biblioteca/tcpdf/tcpdf.php');
require_once('conexion.php');

if (isset($_GET['submit'])) {
    $dateRange = explode(" - ", $_GET['daterange']);
    $startDate = date('Y-m-d', strtotime($dateRange[0]));
    $endDate = date('Y-m-d', strtotime($dateRange[1]));

    // Consulta para obtener los clientes registrados en el rango de fechas especificado
    $query = "SELECT * FROM clientes WHERE fecha_creacion BETWEEN '$startDate' AND '$endDate'";
    $result = $conexion->query($query);

    // Crear PDF
    $pdf = new TCPDF();
    $pdf->SetTitle('Reporte de Clientes');
    $pdf->AddPage();
    
    // Generar contenido del PDF
    $content = '<h1>Reporte de Clientes</h1>';
    $content .= '<table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Identificación</th>
                        <th>Email</th>
                        <th>Fecha de Creación</th>
                    </tr>';

    while ($row = $result->fetch_assoc()) {
        $content .= '<tr>';
        $content .= '<td>' . $row['nombre'] . '</td>';
        $content .= '<td>' . $row['identificacion'] . '</td>';
        $content .= '<td>' . $row['email'] . '</td>';
        $content .= '<td>' . $row['fecha_creacion'] . '</td>';
        $content .= '</tr>';
    }

    $content .= '</table>';

    // Escribir contenido en el PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    // Salida del PDF
    $pdf->Output('reporte_clientes.pdf', 'D');
    exit;
}
?>

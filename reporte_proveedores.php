<?php
require_once('biblioteca/tcpdf/tcpdf.php');
require_once('conexion.php');

if (isset($_GET['submit'])) {
    $dateRange = explode(" - ", $_GET['daterange']);
    $startDate = date('Y-m-d', strtotime($dateRange[0]));
    $endDate = date('Y-m-d', strtotime($dateRange[1]));

    // Consulta para obtener los proveedores registrados en el rango de fechas especificado
    $query = "SELECT * FROM proveedores WHERE fecha_creacion BETWEEN '$startDate' AND '$endDate'";
    $result = $conexion->query($query);

    // Crear PDF
    $pdf = new TCPDF();
    $pdf->SetTitle('Reporte de Proveedores');
    $pdf->AddPage();
    
    // Generar contenido del PDF
    $content = '<h1>Reporte de Proveedores</h1>';
    $content .= '<table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo electrónico</th>
                    </tr>';

    while ($row = $result->fetch_assoc()) {
        $content .= '<tr>';
        $content .= '<td>' . $row['nombre'] . '</td>';
        $content .= '<td>' . $row['direccion'] . '</td>';
        $content .= '<td>' . $row['telefono'] . '</td>';
        $content .= '<td>' . $row['correo'] . '</td>';
        $content .= '</tr>';
    }

    $content .= '</table>';

    // Escribir contenido en el PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    // Salida del PDF
    $pdf->Output('reporte_proveedores.pdf', 'D');
    exit;
}
?>

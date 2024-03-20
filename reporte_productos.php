<?php
require_once('biblioteca/tcpdf/tcpdf.php');
require_once('conexion.php');

if (isset($_GET['submit'])) {
    $dateRange = explode(" - ", $_GET['daterange']);
    $startDate = date('Y-m-d', strtotime($dateRange[0]));
    $endDate = date('Y-m-d', strtotime($dateRange[1]));

    // Consulta para obtener los productos registrados en el rango de fechas especificado
    $query = "SELECT * FROM productos WHERE fecha_creacion BETWEEN '$startDate' AND '$endDate'";
    $result = $conexion->query($query);

    // Crear PDF
    $pdf = new TCPDF();
    $pdf->SetTitle('Reporte de Productos');
    $pdf->AddPage();
    
    // Generar contenido del PDF
    $content = '<h1>Reporte de Productos</h1>';
    $content .= '<table border="1">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>';

    while ($row = $result->fetch_assoc()) {
        $content .= '<tr>';
        $content .= '<td>' . $row['nombre'] . '</td>';
        $content .= '<td>' . $row['precio'] . '</td>';
        $content .= '<td>' . $row['stock'] . '</td>';
        $content .= '</tr>';
    }

    $content .= '</table>';

    // Escribir contenido en el PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    // Salida del PDF
    $pdf->Output('reporte_productos.pdf', 'D');
    exit;
}
?>

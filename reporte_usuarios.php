<?php
require_once('biblioteca/tcpdf/tcpdf.php');
require_once('conexion.php');

if (isset($_GET['submit'])) {
    $dateRange = explode(" - ", $_GET['daterange']);
    $startDate = date('Y-m-d', strtotime($dateRange[0]));
    $endDate = date('Y-m-d', strtotime($dateRange[1]));

    // Consulta para obtener los usuarios registrados en el rango de fechas especificado
    $query = "SELECT * FROM usuarios WHERE fecha_creacion BETWEEN '$startDate' AND '$endDate'";
    $result = $conexion->query($query);

    // Crear PDF
    $pdf = new TCPDF();
    $pdf->SetTitle('Reporte de Usuarios');
    $pdf->AddPage();
    
    // Aquí puedes generar el contenido del PDF con los datos de los usuarios obtenidos en $result

    // Ejemplo de generación de contenido
    $content = '<h1>Reporte de Usuarios</h1>';
    while ($row = $result->fetch_assoc()) {
        $content .= '<p>Nombre de usuario: ' . $row['nombre_usuario'] . ', Correo electrónico: ' . $row['correo_electronico'] . '</p>';
    }

    // Escribir contenido en el PDF
    $pdf->writeHTML($content, true, false, true, false, '');
    
    // Salida del PDF
    $pdf->Output('reporte_usuarios.pdf', 'D');
    exit;
}
?>

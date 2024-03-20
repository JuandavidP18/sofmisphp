<?php
// Incluir la biblioteca TCPDF
require_once('biblioteca/tcpdf/tcpdf.php');

// Crear una instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Tu Nombre');
$pdf->SetTitle('Detalles de la Venta');
$pdf->SetSubject('Detalles de la Venta');
$pdf->SetKeywords('Venta, Detalles, PDF');

// Establecer márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT, true);

// Establecer el modo de subconjunto de fuentes
$pdf->setFontSubsetting(true);

// Agregar una página
$pdf->AddPage();

// Contenido del PDF
$html = '<h1>Detalles de la Venta</h1>';

// Obtener el ID de la venta desde la solicitud GET
if (!isset($_GET['venta_id']) || !is_numeric($_GET['venta_id'])) {
    die("ID de venta no proporcionado o inválido.");
}

$venta_id = $_GET['venta_id'];

// Consulta para obtener los detalles de la venta
include 'conexion.php'; // Incluir el archivo de conexión

$query_detalles_venta = "SELECT ventas.codigo_venta, ventas.fecha_venta, clientes.nombre AS nombre_cliente, usuarios.nombre_usuario AS nombre_usuario
    FROM ventas 
    INNER JOIN clientes ON ventas.cliente_id = clientes.id 
    INNER JOIN usuarios ON ventas.usuario_id = usuarios.id
    WHERE ventas.id = $venta_id";

$resultado_detalles_venta = mysqli_query($conexion, $query_detalles_venta);

// Verificar si se encontraron detalles de la venta
if (!$resultado_detalles_venta || mysqli_num_rows($resultado_detalles_venta) == 0) {
    die("No se encontraron detalles de la venta.");
}

// Obtener los datos de la venta
$detalles_venta = mysqli_fetch_assoc($resultado_detalles_venta);
$codigo_venta = $detalles_venta['codigo_venta'];
$fecha_venta = $detalles_venta['fecha_venta'];
$nombre_cliente = $detalles_venta['nombre_cliente'];
$nombre_usuario = $detalles_venta['nombre_usuario'];

$html .= '<p><strong>Cliente:</strong> ' . $nombre_cliente . '</p>';
$html .= '<p><strong>Fecha de Venta:</strong> ' . $fecha_venta . '</p>';
$html .= '<p><strong>Vendedor:</strong> ' . $nombre_usuario . '</p>';
$html .= '<p><strong>Código de Venta:</strong> ' . $codigo_venta . '</p>';

// Consulta para obtener los detalles de los productos comprados en esta venta
$query_detalles_productos = "SELECT productos.nombre AS nombre_producto, detalle_venta.cantidad, detalle_venta.precio_unitario
    FROM detalle_venta
    INNER JOIN productos ON detalle_venta.producto_id = productos.id
    WHERE detalle_venta.venta_id = $venta_id";

$resultado_detalles_productos = mysqli_query($conexion, $query_detalles_productos);

// Verificar si se encontraron detalles de productos
if (!$resultado_detalles_productos || mysqli_num_rows($resultado_detalles_productos) == 0) {
    die("No hay detalles de productos para esta venta.");
}

$html .= '<table border="1">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>#</th>';
$html .= '<th>Nombre Producto</th>';
$html .= '<th>Cantidad</th>';
$html .= '<th>Precio Unitario</th>';
$html .= '<th>Subtotal</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$contador = 1;
$total_venta = 0;

while ($detalle_producto = mysqli_fetch_assoc($resultado_detalles_productos)) {
    $nombre_producto = $detalle_producto['nombre_producto'];
    $cantidad = $detalle_producto['cantidad'];
    $precio_unitario = $detalle_producto['precio_unitario'];
    $sub_total = $cantidad * $precio_unitario;

    $html .= '<tr>';
    $html .= '<td>' . $contador . '</td>';
    $html .= '<td>' . $nombre_producto . '</td>';
    $html .= '<td>' . $cantidad . '</td>';
    $html .= '<td>' . '$' . number_format($precio_unitario, 2) . '</td>';
    $html .= '<td>' . '$' . number_format($sub_total, 2) . '</td>';
    $html .= '</tr>';

    $contador++;
    $total_venta += $sub_total;
}

$html .= '</tbody>';
$html .= '</table>';

$html .= '<p><strong>Total de la Venta:</strong> ' . '$' . number_format($total_venta, 2) . '</p>';

// Escribir el contenido HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Cerrar y generar el PDF
$pdfContent = $pdf->Output('detalles_venta.pdf', 'S');

// Devolver el contenido del PDF generado como respuesta
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="detalles_venta.pdf"');
echo $pdfContent;
?>

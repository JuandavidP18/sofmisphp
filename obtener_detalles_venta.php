<?php
include 'conexion.php';

// Verificar si se ha proporcionado un ID de venta
if (!isset($_GET['venta_id'])) {
    echo "ID de venta no proporcionado.";
    exit();
}

// Obtener el ID de la venta desde la solicitud
$venta_id = $_GET['venta_id'];

// Consulta para obtener los detalles de la venta
$query_detalles_venta = "SELECT ventas.codigo_venta, ventas.fecha_venta, clientes.nombre AS nombre_cliente, usuarios.nombre_usuario AS nombre_usuario
    FROM ventas 
    INNER JOIN clientes ON ventas.cliente_id = clientes.id 
    INNER JOIN usuarios ON ventas.usuario_id = usuarios.id
    WHERE ventas.id = $venta_id";

$resultado_detalles_venta = mysqli_query($conexion, $query_detalles_venta);

// Verificar si se encontraron detalles de la venta
if (!$resultado_detalles_venta || mysqli_num_rows($resultado_detalles_venta) == 0) {
    echo "No se encontraron detalles de la venta.";
    exit();
}

// Obtener los datos de la venta
$detalles_venta = mysqli_fetch_assoc($resultado_detalles_venta);
$codigo_venta = $detalles_venta['codigo_venta'];
$fecha_venta = $detalles_venta['fecha_venta'];
$nombre_cliente = $detalles_venta['nombre_cliente'];
$nombre_usuario = $detalles_venta['nombre_usuario'];

// Consulta para obtener los detalles de los productos comprados en esta venta
$query_detalles_productos = "SELECT productos.nombre AS nombre_producto, detalle_venta.cantidad, detalle_venta.precio_unitario
    FROM detalle_venta
    INNER JOIN productos ON detalle_venta.producto_id = productos.id
    WHERE detalle_venta.venta_id = $venta_id";

$resultado_detalles_productos = mysqli_query($conexion, $query_detalles_productos);

// Verificar si se encontraron detalles de productos
if (!$resultado_detalles_productos || mysqli_num_rows($resultado_detalles_productos) == 0) {
    echo "No hay detalles de productos para esta venta.";
    exit();
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-header"> Factura <strong><?php echo $fecha_venta; ?></strong> <span class="float-end">
                    <strong>Status:</strong> terminado</span> </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <h6>Cliente:</h6>
                        <div> <strong><?php echo $nombre_cliente; ?></strong> </div>
                    </div>
                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <h6>Vendedor:</h6>
                        <div> <strong><?php echo $nombre_usuario; ?></strong> </div>
                    </div>
                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                        <div class="row align-items-center">
                            <div class="col-sm-9">
                                <div class="brand-logo mb-3">
                                    <img class="logo-abbr me-2" width="50" src="images/logo.png" alt="">
                                    <img class="logo-compact" width="110" src="page-error-404.html" alt="">
                                </div>
                                <span>Codigo de venta: <strong class="d-block"><?php echo $codigo_venta; ?></strong>
                            </div>
                            <div class="col-sm-3 mt-3"> <img src="images/qr.png" alt="" class="img-fluid width110"> </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th class="right">Precio Unitario</th>
                                <th class="center">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_venta = 0;
                            $contador = 1;
                            while ($detalle_producto = mysqli_fetch_assoc($resultado_detalles_productos)) {
                                $nombre_producto = $detalle_producto['nombre_producto'];
                                $cantidad = $detalle_producto['cantidad'];
                                $precio_unitario = $detalle_producto['precio_unitario'];
                                $sub_total = $cantidad * $precio_unitario;
                                $total_venta += $sub_total;
                            ?>
                                <tr>
                                    <td class="center"><?php echo $contador; ?></td>
                                    <td class="left"><?php echo $nombre_producto; ?></td>
                                    <td class="left"><?php echo $cantidad; ?></td>
                                    <td class="right"><?php echo '$' . number_format($precio_unitario, 2); ?></td>
                                    <td class="right"><?php echo '$' . number_format($sub_total, 2); ?></td>
                                </tr>
                            <?php
                                $contador++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5"> </div>
                    <div class="col-lg-4 col-sm-5 ms-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left"><strong>Total</strong></td>
                                    <td class="right"><strong><?php echo '$' . number_format($total_venta, 2); ?></strong><br>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


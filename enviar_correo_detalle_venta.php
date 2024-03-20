<?php
    // Incluir la biblioteca PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'biblioteca/PHPMailer-master/src/Exception.php';
    require 'biblioteca/PHPMailer-master/src/PHPMailer.php';
    require 'biblioteca/PHPMailer-master/src/SMTP.php';

    // Incluir el archivo de conexión
    include 'conexion.php';

    // Función para generar un código aleatorio
    function generarCodigo($longitud = 6) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo;
    }

    // Verificar si se ha enviado el correo electrónico
    if(isset($_POST['email']) && isset($_POST['venta_id'])) {
        $email = $_POST['email'];
        $ventaId = $_POST['venta_id'];

        // Consulta para obtener los detalles de la venta
        $query_venta = "SELECT ventas.*, clientes.nombre AS nombre_cliente, usuarios.nombre_usuario AS nombre_vendedor FROM ventas 
                        INNER JOIN clientes ON ventas.cliente_id = clientes.id 
                        INNER JOIN usuarios ON ventas.usuario_id = usuarios.id
                        WHERE ventas.id = $ventaId";
        $resultado_venta = $conexion->query($query_venta);

        if ($resultado_venta->num_rows > 0) {
            $venta = $resultado_venta->fetch_assoc();
            $nombreCliente = $venta['nombre_cliente'];
            $nombreVendedor = $venta['nombre_vendedor'];
            $fechaVenta = date('d/m/Y', strtotime($venta['fecha_venta']));
            $totalVenta = $venta['total_venta'];

            // Consulta para obtener los detalles de los productos comprados en esta venta
            $query_detalles = "SELECT productos.nombre AS nombre_producto, detalle_venta.cantidad, detalle_venta.precio_unitario 
                                FROM detalle_venta
                                INNER JOIN productos ON detalle_venta.producto_id = productos.id
                                WHERE detalle_venta.venta_id = $ventaId";
            $resultado_detalles = $conexion->query($query_detalles);

            $productos = '';
            while ($detalle = $resultado_detalles->fetch_assoc()) {
                $nombreProducto = $detalle['nombre_producto'];
                $cantidad = $detalle['cantidad'];
                $precioUnitario = $detalle['precio_unitario'];
                $subtotal = $cantidad * $precioUnitario;
                $productos .= "$nombreProducto: $cantidad (Precio unitario: $precioUnitario, Subtotal: $subtotal)\n";
            }

            // Enviar el correo electrónico
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Cambiar por el servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'juandavidsierrapinzon@gmail.com'; // Cambiar por tu correo electrónico
                $mail->Password = 'sdcreiwwnrxizxbu'; // Cambiar por tu contraseña de correo electrónico
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('juandavidsierrapinzon@gmail.com', 'SOFMIS'); // Cambiar por tu correo electrónico y nombre
                $mail->addAddress($email); // Añadir el correo electrónico del destinatario
                $mail->isHTML(true);

                $mail->Subject = 'Detalles de la venta';
                $mail->Body = "
                    <h1>Detalles de la venta</h1>
                    <p><strong>Cliente:</strong> $nombreCliente</p>
                    <p><strong>Fecha de venta:</strong> $fechaVenta</p>
                    <p><strong>Vendedor:</strong> $nombreVendedor</p>
                    <p><strong>Productos:</strong></p>
                    <p>$productos</p>
                    <p><strong>Total de la venta:</strong> $totalVenta</p>
                ";

                $mail->send();
                echo 'Correo electrónico enviado correctamente.';
            } catch (Exception $e) {
                echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
            }
        } else {
            echo "No se encontró la venta con el ID proporcionado.";
        }
    } else {
        echo "Los parámetros necesarios no fueron proporcionados.";
    }
?>

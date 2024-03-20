<?php
include 'conexion.php';

// Establecer la zona horaria a Bogotá, Colombia
date_default_timezone_set('America/Bogota');

// Verificar si se envió el formulario de venta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cliente_nombre = $_POST['Nombre'];
    $cliente_identificacion = $_POST['Identificacion'];
    $cliente_email = $_POST['email'];
    $total_venta = $_POST['total_venta'];
    $metodo_pago = $_POST['paymentMethod'];

    // Obtener el ID del usuario actualmente autenticado
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        // Si no hay una sesión activa, redirigir al usuario al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }
    $usuario_id = $_SESSION['usuario_id'];

    // Verificar que $total_venta sea un número
    if (!is_numeric($total_venta)) {
        echo "El valor de total_venta no es válido.";
        exit();
    }

    // Escapar caracteres especiales en $metodo_pago para evitar problemas de SQL injection
    $metodo_pago_escaped = mysqli_real_escape_string($conexion, $metodo_pago);

    // Verificar si el cliente ya existe en la base de datos
    $query_cliente = "SELECT id FROM clientes WHERE identificacion = '$cliente_identificacion'";
    $resultado_cliente = mysqli_query($conexion, $query_cliente);
    if (mysqli_num_rows($resultado_cliente) > 0) {
        // Si el cliente existe, obtener su ID
        $fila_cliente = mysqli_fetch_assoc($resultado_cliente);
        $cliente_id = $fila_cliente['id'];
    } else {
        // Si el cliente no existe, insertarlo en la base de datos
        $query_insertar_cliente = "INSERT INTO clientes (nombre, identificacion, email) VALUES ('$cliente_nombre', '$cliente_identificacion', '$cliente_email')";
        if (mysqli_query($conexion, $query_insertar_cliente)) {
            $cliente_id = mysqli_insert_id($conexion);
        } else {
            echo "Error al registrar el cliente: " . mysqli_error($conexion);
            exit(); // Terminar el script si hay un error al registrar el cliente
        }
    }

    // Generar un código único de venta
    $codigo_venta = "SOF" . date("Ymd") . "-" . sprintf("%04d", rand(0, 9999));

    // Verificar si el código generado ya existe en la base de datos
    // Si existe, generar otro código único
    $query_check_codigo = "SELECT COUNT(*) AS count FROM ventas WHERE codigo_venta = '$codigo_venta'";
    $result_check_codigo = mysqli_query($conexion, $query_check_codigo);
    $row_check_codigo = mysqli_fetch_assoc($result_check_codigo);
    $count = $row_check_codigo['count'];

    // Si el código generado ya existe, generar otro código único
    while ($count > 0) {
        $codigo_venta = "SOF" . date("Ymd") . "-" . sprintf("%04d", rand(0, 9999));
        $query_check_codigo = "SELECT COUNT(*) AS count FROM ventas WHERE codigo_venta = '$codigo_venta'";
        $result_check_codigo = mysqli_query($conexion, $query_check_codigo);
        $row_check_codigo = mysqli_fetch_assoc($result_check_codigo);
        $count = $row_check_codigo['count'];
    }

    // Insertar la venta en la base de datos
    $query_venta = "INSERT INTO ventas (codigo_venta, fecha_venta, total_venta, medio_pago, cliente_id, usuario_id) VALUES ('$codigo_venta', NOW(), $total_venta, '$metodo_pago_escaped', $cliente_id, $usuario_id)";

    if (mysqli_query($conexion, $query_venta)) {
        // Obtener el ID de la venta insertada
        $venta_id = mysqli_insert_id($conexion);

        // Verificar si se enviaron productos en el formulario
        if (isset($_POST['productos']) && is_array($_POST['productos'])) {
            foreach ($_POST['productos'] as $producto) {
                // Obtener el ID del producto y la cantidad desde el formulario
                $producto_id = $producto['id'];
                $cantidad = $producto['cantidad'];
                $precio_unitario = $producto['precio'];

                // Verificar si el producto existe en la base de datos
                $query_producto = "SELECT id, stock FROM productos WHERE id = $producto_id";
                $resultado_producto = mysqli_query($conexion, $query_producto);
                if (mysqli_num_rows($resultado_producto) > 0) {
                    // Obtener el stock actual del producto
                    $fila_producto = mysqli_fetch_assoc($resultado_producto);
                    $stock_actual = $fila_producto['stock'];

                    // Verificar si hay suficiente stock para la venta
                    if ($stock_actual >= $cantidad) {
                        // Calcular el nuevo stock después de la venta
                        $nuevo_stock = $stock_actual - $cantidad;

                        // Actualizar el stock del producto en la base de datos
                        $query_actualizar_stock = "UPDATE productos SET stock = $nuevo_stock WHERE id = $producto_id";
                        if (!mysqli_query($conexion, $query_actualizar_stock)) {
                            echo "Error al actualizar el stock del producto: " . mysqli_error($conexion);
                        }
                    } else {
                        echo "No hay suficiente stock disponible para el producto con ID $producto_id.";
                    }

                    // Insertar el producto en la tabla detalle_venta
                    $query_insertar_producto = "INSERT INTO detalle_venta (venta_id, producto_id, cantidad, precio_unitario) VALUES ($venta_id, $producto_id, $cantidad, $precio_unitario)";
                    if (!mysqli_query($conexion, $query_insertar_producto)) {
                        echo "Error al registrar el producto en la venta: " . mysqli_error($conexion);
                    }
                } else {
                    echo "El producto con ID $producto_id no existe en la base de datos.";
                }
            }
        }

        // Redirigir al usuario a la página de ventas.php
        header("Location: ventas.php");
        exit();
    } else {
        echo "Error al registrar la venta: " . mysqli_error($conexion);
    }
}
?>

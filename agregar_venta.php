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

    // Insertar la venta en la base de datos
    $query_venta = "INSERT INTO ventas (fecha_venta, total_venta, medio_pago, cliente_id, usuario_id) VALUES (NOW(), $total_venta, '$metodo_pago_escaped', $cliente_id, $usuario_id)";

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
                $query_producto = "SELECT id FROM productos WHERE id = $producto_id";
                $resultado_producto = mysqli_query($conexion, $query_producto);
                if (mysqli_num_rows($resultado_producto) > 0) {
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

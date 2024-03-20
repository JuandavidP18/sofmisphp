<?php
include 'conexion.php';

// Verificar si se recibió el ID del producto
if (isset($_POST['productoId'])) {
    // Obtener el ID del producto desde la solicitud AJAX
    $productoId = $_POST['productoId'];

    // Consultar la base de datos para obtener el stock del producto con el ID dado
    $query = "SELECT stock FROM productos WHERE id = $productoId";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si se encontró el producto y obtener su stock
    if ($fila = mysqli_fetch_assoc($resultado)) {
        $stock = $fila['stock'];
        echo $stock; // Devolver el stock como respuesta a la solicitud AJAX
    } else {
        echo '0'; // Si no se encontró el producto, devolver 0 como stock
    }
} else {
    echo '0'; // Si no se recibió el ID del producto, devolver 0 como stock
}
?>

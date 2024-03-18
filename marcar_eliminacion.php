<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el ID del producto a marcar como eliminado
    $producto_id = $_POST['id_producto'];
    // Obtener la fecha y hora actual en la zona horaria de Bogotá, Colombia
    date_default_timezone_set('America/Bogota');
    $fecha_hora_eliminacion = date('Y-m-d H:i:s');

    // Consulta SQL para actualizar el estado del producto y registrar la fecha de eliminación
    $sql = "UPDATE Productos SET eliminacion='Si', fecha_eliminacion='$fecha_hora_eliminacion' WHERE id='$producto_id'";

    // Ejecutar la consulta de actualización
    if ($conexion->query($sql)) {
        // Redirigir al usuario a la página de productos
        header("Location: inventario.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    } else {
        echo "Error al marcar el producto como eliminado: " . $conexion->error;
    }
}
?>

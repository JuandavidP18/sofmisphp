<?php
// Verificar si se recibió un ID de producto válido
if (isset($_POST['id_producto']) && !empty($_POST['id_producto'])) {
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';
    
    // Obtener el ID del producto a eliminar
    $id_producto = $_POST['id_producto'];
    
    // Consulta SQL para eliminar el producto
    $sql = "DELETE FROM productos WHERE id = ?";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($sql);
    
    if ($stmt) {
        // Vincular parámetros
        $stmt->bind_param('i', $id_producto);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Producto eliminado exitosamente
            header("Location: inventario_inactivo.php");
            exit();
        } else {
            // Error al ejecutar la consulta
            echo "Error al eliminar el producto: " . $stmt->error;
        }
        
        // Cerrar la declaración
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error en la preparación de la consulta: " . $conexion->error;
    }
    
    // Cerrar la conexión
    $conexion->close();
} else {
    // Si no se recibió un ID de producto válido
    echo "ID de producto no válido.";
}
?>

<?php
// Función para realizar la eliminación automática de productos
function eliminarProductosMarcados() {
    global $conexion; // Acceder a la variable global $conexion
    
    // Establecer la zona horaria a Bogotá, Colombia
    date_default_timezone_set('America/Bogota');
    
    // Obtener la fecha y hora actual en el formato deseado (YYYY-MM-DD HH:MM:SS)
    $fecha_actual = date('Y-m-d H:i:s');

    // Calcular la fecha de hace 30 días
    $fecha_limite = date('Y-m-d', strtotime('-30 days'));

    // Consultar los productos marcados como eliminados y cuya fecha de eliminación haya pasado 30 días
    $sql = "DELETE FROM Productos WHERE eliminacion='si' AND fecha_eliminacion < '$fecha_limite'";
    if ($conexion->query($sql) === TRUE) {
        echo "Eliminación automática realizada con éxito.";
    } else {
        echo "Error al realizar la eliminación automática: " . $conexion->error;
    }
}

// Conectar a la base de datos
include 'conexion.php';

// Bucle de ejecución que se repite cada 12 horas
while (true) {
    // Ejecutar la función para eliminar productos marcados
    eliminarProductosMarcados();

    // Esperar 12 horas antes de la próxima ejecución
    sleep(12 * 60 * 60); // 12 horas * 60 minutos * 60 segundos
}
?>

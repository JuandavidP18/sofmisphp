<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si el índice 'term' está definido en la solicitud GET
if(isset($_GET['term'])) {
    // Obtener el término de búsqueda desde la solicitud AJAX
    $term = $_GET['term'];

    // Consulta para buscar productos que coincidan con el término de búsqueda en varios campos
    $query = "SELECT * FROM productos WHERE nombre LIKE '%$term%' OR codigo LIKE '%$term%' OR marca LIKE '%$term%'";

    $resultado = mysqli_query($conexion, $query);

    // Crear un array para almacenar los resultados
    $productos = array();

    // Iterar sobre los resultados y agregarlos al array
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $productos[] = $fila['nombre']; // Aquí puedes personalizar qué información mostrar
    }

    // Devolver los resultados como un JSON
    echo json_encode($productos);

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
    exit; // Salir del script después de devolver los resultados JSON
}
?>
    
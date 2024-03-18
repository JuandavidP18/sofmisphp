<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el ID del producto
    $producto_id = $_POST['producto_id'];

    // Array para almacenar las actualizaciones a realizar
    $actualizaciones = [];

    // Verificar y agregar las actualizaciones para cada campo
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $actualizaciones[] = "nombre='$nombre'";
    }
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        $actualizaciones[] = "categoria='$categoria'";
    }
    if (isset($_POST['marca'])) {
        $marca = $_POST['marca'];
        $actualizaciones[] = "marca='$marca'";
    }
    if (isset($_POST['precio'])) {
        $precio = $_POST['precio'];
        $actualizaciones[] = "precio=$precio";
    }

    // Verificar si se ha seleccionado un proveedor
    if (isset($_POST['proveedor'])) {
        $proveedor_id = $_POST['proveedor'];
        $actualizaciones[] = "proveedor_id=$proveedor_id";
    }

    // Verificar si se ha cargado una nueva imagen
    if ($_FILES['imagen_nueva']['name'] != '') {
        // Ruta de almacenamiento de la imagen
        $carpeta_imagenes = "imagenes_productos/";

        // Nombre de archivo único basado en el timestamp actual
        $nombre_imagen = $categoria . "_" . $nombre . "_" . uniqid() . ".png";

        // Ruta completa del archivo
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;

        // Mover la imagen a la carpeta de destino
        if (!move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $ruta_imagen)) {
            echo "Error al subir la imagen.";
            exit(); // Detener el script si hay un error
        }

        // Agregar la actualización de la imagen al array de actualizaciones
        $actualizaciones[] = "imagen='$ruta_imagen'";
    }


    // Verificar si se han enviado datos de stock
    if (isset($_POST['accion_stock']) && isset($_POST['cantidad_stock'])) {
        $accion_stock = $_POST['accion_stock'];
        $cantidad_stock = intval($_POST['cantidad_stock']); // Convertir a entero

        // Verificar la acción de stock y agregar la actualización correspondiente
        if ($accion_stock == "agregar") {
            $actualizaciones[] = "stock=stock+$cantidad_stock";
        } elseif ($accion_stock == "quitar") {
            $actualizaciones[] = "stock=stock-$cantidad_stock";
        }
    }

    // Construir la consulta SQL de actualización
    $sql_update = "UPDATE Productos SET " . implode(", ", $actualizaciones) . " WHERE id=$producto_id";

    // Ejecutar la consulta de actualización
    if ($conexion->query($sql_update)) {
        // Redirigir al usuario a la página de productos
        header("Location: inventario.php");
        exit(); // Asegurar que el script se detenga después de la redirección
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}

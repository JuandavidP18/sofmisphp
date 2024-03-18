<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Iniciar la sesión
session_start();

// Verificar si hay una sesión activa
if (!isset($_SESSION['usuario_id'])) {
    // Si no hay una sesión activa, redirigir al usuario al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores del formularioF
    $nombre_producto = $_POST['nombre_producto'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $proveedor_id = $_POST['proveedor_id'];
    $usuario_id = $_POST['usuario_id']; // Obtener el ID del usuario de la sesión

    // Generar el código único para el producto
    $codigo = substr($categoria, 0, 1) . sprintf('%04d', mt_rand(0, 9999)); // Primer letra de la categoría y 4 números aleatorios

    // Generar un nombre único para la imagen basado en la categoría, el nombre del producto y un código único
    $nombre_imagen = $categoria . "_" . $nombre_producto . "_" . uniqid() . ".png"; // Cambia la extensión según tu necesidad

    // Ruta completa de la imagen
    $carpeta_imagenes = "imagenes_productos/"; // Especifica la ruta donde deseas guardar las imágenes
    $ruta_imagen = $carpeta_imagenes . $nombre_imagen;

    // Subir la imagen al servidor
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
        // La imagen se ha subido correctamente, ahora insertamos el producto en la base de datos

        // Obtener la fecha y hora actual en Bogotá, Colombia
        $fecha_creacion = new DateTime("now", new DateTimeZone('America/Bogota'));
        $fecha_creacion = $fecha_creacion->format('Y-m-d H:i:s');

        // Consulta SQL para insertar el producto en la base de datos
        $sql = "INSERT INTO Productos (nombre, imagen, marca, precio, stock, categoria, proveedor_id, codigo, fecha_creacion, estado, usuario_id) 
                                        VALUES ('$nombre_producto', '$ruta_imagen', '$marca', $precio, $stock, '$categoria', $proveedor_id, '$codigo', '$fecha_creacion', 'Activo', $usuario_id)";

        if ($conexion->query($sql) === TRUE) {
            header("Location: productos.php");
            exit(); 
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al registrar el producto: ' . $conexion->error . '</div>';
        }
    } else {
        // Hubo un error al subir la imagen
        echo "Error al subir la imagen.";
    }
}

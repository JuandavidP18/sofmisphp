<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $proveedor_id = $_POST['proveedor_id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $telefono_local = isset($_POST['telefono_local']) ? $_POST['telefono_local'] : null;
    $estado = $_POST['estado'];
    $correo = $_POST['correo'];

    // Actualizar los datos del proveedor en la base de datos
    $sql = "UPDATE Proveedores SET nombre='$nombre', direccion='$direccion', telefono='$telefono', telefono_local='$telefono_local', estado='$estado', correo='$correo' WHERE id=$proveedor_id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: proveedores.php");
        exit();
    } else {
        echo "Error al actualizar el proveedor: " . $conexion->error;
    }
}
?>

<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Iniciar la sesión
session_start();

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];

    // Consultar la información del usuario en la base de datos
    $consulta_usuario = "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'";
    $resultado_usuario = $conexion->query($consulta_usuario);

    if ($resultado_usuario->num_rows == 1) {
        $usuario = $resultado_usuario->fetch_assoc();

        // Verificar si la cuenta está habilitada
        if ($usuario['cuenta_habilitada']) {
            // Verificar la contraseña
            if (password_verify($contrasena, $usuario['contrasena'])) {
                // Iniciar sesión y redirigir al dashboard o a donde sea necesario
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
                // Redirigir al dashboard o a la página deseada
                header("Location: dashboard.php");
                exit();
            } else {
                echo "La contraseña es incorrecta.";
            }
        } else {
            echo "La cuenta aún no ha sido habilitada. Por favor, espere a que se habilite su cuenta.";
        }
    } else {
        echo "No se encontró ninguna cuenta asociada a ese correo electrónico.";
    }
}

// Cerrar conexión
$conexion->close();
?>

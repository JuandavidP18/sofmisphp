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
                // Iniciar sesión y redirigir según el rol
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];

                if ($usuario['rol'] == 'administrador') {
                    // Redirigir al panel de administrador
                    echo json_encode(["redirect" => "dashboard_admin.php"]);
                    exit();
                } elseif ($usuario['rol'] == 'cajero') {
                    // Redirigir al panel de cajero
                    echo json_encode(["redirect" => "dashboard_cajero.php"]);
                    exit();
                } else {
                    // Rol desconocido, puedes manejar esto según tus necesidades
                    echo json_encode(["error" => "Rol de usuario desconocido."]);
                    exit();
                }
            } else {
                // Devolver un error de contraseña incorrecta
                echo json_encode(["error" => "La contraseña es incorrecta."]);
                exit();
            }
        } else {
            // Devolver un error de cuenta no habilitada
            echo json_encode(["error" => "La cuenta aún no ha sido habilitada. Por favor, espere a que se habilite su cuenta."]);
            exit();
        }
    } else {
        // Devolver un error de cuenta no encontrada
        echo json_encode(["error" => "No se encontró ninguna cuenta asociada a ese correo electrónico."]);
        exit();
    }
}

// Cerrar conexión
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow: Plantilla de Bootstrap 5 para administradores de Fillow Saas">
    <meta property="og:title" content="Fillow: Plantilla de Bootstrap 5 para administradores de Fillow Saas">
    <meta property="og:description" content="Fillow: Plantilla de Bootstrap 5 para administradores de Fillow Saas">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- TÍTULO DE LA PÁGINA -->
    <title>Inicio</title>

    <!-- ICONOS FAVICONS -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/mio.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <div class="nombre_logo">
                                            <a href="recuperar.php"><img class="logo" src="images/logo.png" alt=""></a>
                                            <h1>SOFMIS</h1>
                                        </div>
                                    </div>
                                    <h4 class="text-center mb-4">Registra tu cuenta</h4>
                                    <form action="registrar.php" method="post" id="formulario">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Nombre de usuario</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre_usuario" id="nombre-usuario" required>
                                            <div id="mensaje-usuario" style="color: red; display: none;">El nombre de usuario no debe superar los 50 caracteres.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Correo Electrónico</strong></label>
                                            <input type="email" class="form-control" placeholder="Ingresa tu Correo" name="correo_electronico" id="correo" required>
                                            <div id="mensaje-correo" style="color: red; display: none;">El correo no debe superar los 64 caracteres.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input type="password" class="form-control" name="contrasena" id="contrasena" required>
                                            <div id="mensaje-contrasena" style="color: red; display: none;">La contraseña no debe superar los 10 caracteres.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Código de Registro</strong></label>
                                            <select class="form-control" name="rol" value="rol" required>
                                                <option value="cajero">Cajero</option>
                                                <option value="administrador">Administrador</option>
                                            </select>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Regístrame</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>¿Ya tienes una cuenta? <a class="text-primary" href="login.php">Inicia sesión</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
document.getElementById('formulario').addEventListener('submit', function(event) {
    var nombreUsuarioInput = document.getElementById('nombre-usuario');
    var nombreUsuario = nombreUsuarioInput.value.trim();
    if (nombreUsuario.length > 40) {
        event.preventDefault();
        document.getElementById('mensaje-usuario').style.display = 'block';
    } else {
        document.getElementById('mensaje-usuario').style.display = 'none';
    }

    var correoInput = document.getElementById('correo');
    var correo = correoInput.value.trim();
    if (correo.length > 64) {
        event.preventDefault();
        document.getElementById('mensaje-correo').style.display = 'block';
    } else {
        document.getElementById('mensaje-correo').style.display = 'none';
    }

    var contrasenaInput = document.getElementById('contrasena');
    var contrasena = contrasenaInput.value.trim();
    if (contrasena.length > 10) {
        event.preventDefault();
        document.getElementById('mensaje-contrasena').style.display = 'block';
    } else {
        document.getElementById('mensaje-contrasena').style.display = 'none';
    }
});
</script>
    <!--**********************************
    Scripts
***********************************-->
    <!-- Vendedores necesarios -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>
<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Encriptar la contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos con cuenta deshabilitada por defecto
    $sql = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena, rol, cuenta_habilitada) VALUES ('$nombre_usuario', '$correo_electronico', '$contrasena_encriptada', '$rol', 0)";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

// Cerrar conexión
$conexion->close();
?>
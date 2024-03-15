<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
// Incluir el archivo de conexión
include 'conexion.php';

// Inicializar la variable de mensaje de error
$mensaje_error = "";

// Obtener el correo electrónico de la URL
$email = isset($_GET['email']) ? $_GET['email'] : '';

// Verificar si se ha enviado el código
if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Consultar si el código coincide con uno válido en la base de datos
    $consulta_codigo = "SELECT * FROM codigos_recuperacion WHERE codigo = '$codigo' AND correo_electronico = '$email' AND fecha_expiracion > NOW()";
    $resultado_codigo = $conexion->query($consulta_codigo);

    if ($resultado_codigo->num_rows > 0) {
        // El código es válido, redirigir al usuario a cambiar_contrasena.php
        header("Location: cambiar_contraseña.php?email=$email");
        exit(); // Asegurar que se detenga la ejecución del script después de la redirección
    } else {
        // El código no es válido, establecer el mensaje de error en JavaScript
        $mensaje_error = "El código ingresado no es válido o ha expirado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Cosigo</title>

    <!-- FAVICONS ICON -->
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
                                    <h4 class="text-center mb-4">Ingresa el Código de Verificación </h4>
                                    <h4></h4>
                                    <form action="codigo_verificacion.php?email=<?php echo htmlspecialchars($email); ?>" method="POST" id="formulario-codigo">
                                        <div class="mb-3">
                                            <label><strong>Código de Verificación</strong></label>
                                            <input type="text" class="form-control" name="codigo" id="codigo" maxlength="6" required>
                                            <div id="mensaje-error" style="color: red; display: <?php echo $mensaje_error ? 'block' : 'none'; ?>"><?php echo $mensaje_error; ?></div>
                                            <br>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">VERIFICAR</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('formulario-codigo').addEventListener('submit', function(event) {
            var codigoInput = document.getElementById('codigo');
            var codigo = codigoInput.value.trim();
            if (codigo.length > 6) {
                event.preventDefault();
                document.getElementById('mensaje-error-submit').style.display = 'block';
            } else {
                document.getElementById('mensaje-error-submit').style.display = 'none';
            }
        });
    </script>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>

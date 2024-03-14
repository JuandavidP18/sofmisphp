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
                                        <a href="codigo_verificacion.php"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <body>
                                        <div class="container">
                                            <h2>Cambiar Contraseña</h2>
                                            <form action="cambiar_contraseña.php" method="POST">
                                                <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"> <!-- Pasar el email como parámetro -->
                                                <div class="form-group">
                                                    <label for="contrasena">Nueva Contraseña:</label>
                                                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                                                    <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                            </form>
                                        </div>
                                    </body>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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
<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se han enviado los datos del formulario
if(isset($_POST['email'], $_POST['contrasena'], $_POST['confirmar_contrasena'])) {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    // Verificar si las contraseñas coinciden
    if($contrasena === $confirmar_contrasena) {
        // Hash de la contraseña
        $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $actualizar_contrasena = "UPDATE usuarios SET contrasena = '$hashed_contrasena' WHERE correo_electronico = '$email'";
        if($conexion->query($actualizar_contrasena) === TRUE) {
            // Redireccionar al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit();
        } else {
            echo 'Error al cambiar la contraseña: ' . $conexion->error;
        }
    } else {
        echo 'Las contraseñas no coinciden. Por favor, inténtalo de nuevo.';
    }
} else {
    echo 'Se requieren todos los campos para cambiar la contraseña.';
}
?>

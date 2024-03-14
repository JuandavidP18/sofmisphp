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
    <title>Panel de Administración</title>
    
    <!-- ICONOS FAVICONS -->
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
                                        <a href="codigo_verificacion.php"><img src="images/logo_2.png" alt="" height="100px" ></a>
                                    </div>
                                    <form action="iniciar.php" method="POST">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Correo Electrónico</strong></label>
                                            <input type="email" class="form-control" name="correo_electronico" placeholder="Correo Electrónico" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Recordar mi preferencia</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                                        </div>
                                    </form>
                                    <!-- Fin del formulario de inicio de sesión -->
                                    <div class="new-account mt-3">
                                        <p>¿No tienes una cuenta? <a class="text-primary" href="registrar.php">Regístrate</a></p>
                                    </div>
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
    <!-- Vendedores necesarios -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>

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
                                    <h4 class="text-center mb-4">BIENVENIDOS</h4>
                                    <form action="iniciar.php" method="POST" id="formulario-iniciar">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Correo Electrónico</strong></label>
                                            <input type="email" class="form-control" name="correo_electronico" id="correo-iniciar" placeholder="Correo Electrónico" required>
                                            <div id="mensaje-correo-iniciar" style="color: red; display: none;">El correo no debe superar los 64 caracteres.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Contraseña</strong></label>
                                            <input type="password" class="form-control" name="contrasena" id="contrasena-iniciar" placeholder="Contraseña" required>
                                            <div id="mensaje-contrasena-iniciar" style="color: red; display: none;">La contraseña no debe superar los 10 caracteres.</div>
                                            <div id="mensaje-error" style="color: red; display: none;">Correo o contraseña incorrecta.</div>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
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
    <script>
        document.getElementById('formulario-iniciar').addEventListener('submit', function(event) {
            event.preventDefault();

            var correoIniciar = document.getElementById('correo-iniciar').value.trim();
            var contrasenaIniciar = document.getElementById('contrasena-iniciar').value.trim();

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'iniciar.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        document.getElementById('mensaje-error').style.display = 'block';
                    } else {
                        // Redirigir al dashboard u otra página de inicio de sesión exitosa
                        window.location.href = response.redirect;
                    }
                }
            };
            xhr.send('correo_electronico=' + encodeURIComponent(correoIniciar) + '&contrasena=' + encodeURIComponent(contrasenaIniciar));
        });
    </script>
    <script>
        document.getElementById('formulario-iniciar').addEventListener('submit', function(event) {
            var correoIniciarInput = document.getElementById('correo-iniciar');
            var correoIniciar = correoIniciarInput.value.trim();
            if (correoIniciar.length > 64) {
                event.preventDefault();
                document.getElementById('mensaje-correo-iniciar').style.display = 'block';
            } else {
                document.getElementById('mensaje-correo-iniciar').style.display = 'none';
            }

            var contrasenaIniciarInput = document.getElementById('contrasena-iniciar');
            var contrasenaIniciar = contrasenaIniciarInput.value.trim();
            if (contrasenaIniciar.length > 10) {
                event.preventDefault();
                document.getElementById('mensaje-contrasena-iniciar').style.display = 'block';
            } else {
                document.getElementById('mensaje-contrasena-iniciar').style.display = 'none';
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
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
                                        <a href="codigo_verificacion.php"><img src="images/logo_2.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Verificar Código</h4>
                                    <form action="codigo_verificacion.php" method="POST"> <!-- Cambiado el action -->
                                        <div class="mb-3">
                                            <label><strong>Código de Verificación</strong></label>
                                            <input type="text" class="form-control" name="codigo">
                                        </div>
                                        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"> <!-- Agregado campo oculto para pasar el email -->
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

// Verificar si se ha enviado el código y el correo electrónico
if(isset($_POST['codigo'], $_POST['email'])) {
    $codigo = $_POST['codigo'];
    $email = $_POST['email'];

    // Consultar si el código coincide con uno válido en la base de datos
    $consulta_codigo = "SELECT * FROM codigos_recuperacion WHERE codigo = '$codigo' AND correo_electronico = '$email' AND fecha_expiracion > NOW()";
    $resultado_codigo = $conexion->query($consulta_codigo);

    if ($resultado_codigo->num_rows > 0) {
        // El código es válido, redirigir al usuario a cambiar_contrasena.php
        header("Location: cambiar_contraseña.php?email=$email");
        exit();
    } else {
        // El código no es válido
        echo "El código ingresado no es válido o ha expirado.";
    }
}
?>

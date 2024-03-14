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
	<title>Admin Dashboard</title>
	
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
                                        <a href="recuperar.php"><img src="images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Forgot Password</h4>
                                    <form action="recuperar.php" method="POST"> <!-- Modificado el action -->
                                        <div class="mb-3">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" required> <!-- Añadido el atributo name -->
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
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
// Incluir la biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'biblioteca/PHPMailer-master/src/Exception.php';
require 'biblioteca/PHPMailer-master/src/PHPMailer.php';
require 'biblioteca/PHPMailer-master/src/SMTP.php';

// Incluir el archivo de conexión
include 'conexion.php';

// Función para generar un código aleatorio
function generarCodigo($longitud = 6) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

// Verificar si se ha enviado el correo electrónico
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    // Consultar si el correo electrónico está registrado en la base de datos
    $consulta_usuario = "SELECT * FROM usuarios WHERE correo_electronico = '$email'";
    $resultado_usuario = $conexion->query($consulta_usuario);

    if ($resultado_usuario->num_rows > 0) {
        // El correo electrónico está registrado en la base de datos
        // Generar un código único
        $codigo = generarCodigo();

        // Almacenar el código en la base de datos con una fecha de expiración (60 minutos)
        $fecha_expiracion = date('Y-m-d H:i:s', strtotime('+60 minutes'));
        $guardar_codigo = "INSERT INTO codigos_recuperacion (codigo, correo_electronico, fecha_expiracion) VALUES ('$codigo', '$email', '$fecha_expiracion')";
        $conexion->query($guardar_codigo);

        // Enviar el código por correo electrónico
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Cambiar por el servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'juandavidsierrapinzon@gmail.com'; // Cambiar por tu correo electrónico
            $mail->Password = 'sdcreiwwnrxizxbu'; // Cambiar por tu contraseña de correo electrónico
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('juandavidsierrapinzon@gmail.com', 'SOFMIS'); // Cambiar por tu correo electrónico y nombre
            $mail->addAddress($email); // Añadir el correo electrónico del destinatario
            $mail->isHTML(true);

            $mail->Subject = 'Código de verificación';
            $mail->Body = 'Tu código de verificación es: ' . $codigo;

            $mail->send();

            // Redireccionar al formulario de ingreso de código de verificación
            header("Location: codigo_verificacion.php?email=$email");
            exit();
        } catch (Exception $e) {
            echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
        }
    } else {
        // El correo electrónico no está registrado en la base de datos
        echo "El correo electrónico no está registrado en nuestra base de datos.";
    }
}
?>

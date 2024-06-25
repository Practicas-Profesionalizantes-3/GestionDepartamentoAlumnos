<?php
include('config/bd.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHP-mailer/Exception.php';
require 'PHP-mailer/PHPMailer.php';
require 'PHP-mailer/SMTP.php';

$errores = '';
$enviado = '';

if (isset($_POST['submit'])) {
    $correo = $_POST['email'];

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores .= "Por favor ingresa un correo electrónico válido.<br />";
    } else {
        $sentencia = $conexion->prepare("SELECT * FROM `usuarios` WHERE `usuarios`.`email` = :email");
        $sentencia->bindParam(':email', $correo);
        $sentencia->execute();
        $registros = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($registros) {
            $id_usuario = $registros['id_usuario'];

            // Crear instancia de PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configuración del servidor
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.office365.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'maximilianojlopez@hotmail.com';
                $mail->Password = 'Mailen13082019';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Destinatario
                $mail->setFrom('maximilianojlopez@hotmail.com');
                $mail->addAddress($correo);

                // Contenido del correo electrónico
                $mail->isHTML(true);
                $mail->Subject = 'Restablecer password';
                $mail->Body = '
                <p>Por favor, haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                <p><a href="http://localhost/GestionDepartamentoAlumnos/login/nuevo_pass.php?id=' . $id_usuario . '">Restablecer contraseña</a></p>
                ';

                // Enviar correo electrónico
                $mail->send();
                $enviado = 'Correo electrónico enviado con éxito.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errores .= 'No se encontró ningún usuario con ese correo electrónico.';
        }
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Instituto Tecnológico Beltran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="scss/style.css">
</head>

<body class="img js-fullheight" style="background-image: url(images/4.jpg);">
    <section class="ftco-section shadow">
        <div class="login-wrap p-0">
            <div class="overflow-hidden">
                <img src="../img/nuevologo.png" alt="Logo" class="login-wrap-img">
            </div>
            <hr class="mb-5">
            <h2>Restablecer Contraseña</h2>
            <!-- Nuevo contenedor -->
            <div class="form-container mt-5">
                <form action="recuperar.php" class="signin-form" id="formulario" method="post">
                    <div class="form-group">
                        <input id="username" type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="form-control btn btn-primary submit px-3 mt-3">Enviar</button>
                        <button type="button" name="cancelar" class="form-control btn btn-primary submit px-3 mt-2" onclick="window.location.href='index.html'">Cancelar</button>
                    </div>

                    <!-- Mostrar errores o mensaje de éxito -->
                    <?php if (!empty($errores)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $errores; ?>
                        </div>
                    <?php elseif (!empty($enviado)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $enviado; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div> <!-- Fin del nuevo contenedor -->
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
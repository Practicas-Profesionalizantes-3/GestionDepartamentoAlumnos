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
                <p><a href="http://localhost/GestionDepartamentoAlumnos/Cartelera/Cartelera/login/nuevo_pass.php?id=' . $id_usuario . '">Restablecer contraseña</a></p>
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

// Mostrar errores o mensaje de éxito
if (!empty($errores)) {
    echo $errores;
} else {
    echo $enviado;
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Instituto Tecnológico Beltran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body class="img js-fullheight" style="background-image: url(images/4.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Instituto Tecnológico Beltran </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"> Reestablecer la Contraseña</h3>

		      	<form action="recuperar.php" method="post">
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo Institucional" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="form-control btn btn-primary submit px-3 mt-4">Enviar</button>
                        <a name="" id="" class="form-control btn btn-primary submit px-3 mt-4" href="index.php" role="button">Cancelar</a>
                    </div>
                </form>

			</div>
		</div>
	</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>


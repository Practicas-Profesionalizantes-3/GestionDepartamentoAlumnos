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

<body style="background-image: url(images/4.jpg);">
    <section class="ftco-section">
        <div class="login-wrap p-0">
            <div class="overflow-hidden">
                <img src="../img/nuevologo.png" alt="Logo" class="login-wrap-img">
            </div>
            <hr class="mb-5">
            <h2>Restablecer Contraseña</h2>
            <!-- Nuevo contenedor -->
            <div class="form-container mt-5">
                <form action="PHP-mailer/SendMailPassword.php" signin-form" id="formulario" method="post">
                    <div class="form-group">
                        <input id="username" type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="form-control btn btn-primary submit px-3 mt-3">Enviar</button>
                        <button type="button" name="cancelar" class="form-control btn btn-primary submit px-3 mt-2" onclick="window.location.href='index.html'">Cancelar</button>
                    </div>

                    <!-- Mostrar errores o mensaje de éxito -->
                    <!-- <?php if (!empty($errores)): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo $errores; ?>
                                            </div>
                                        <?php elseif (!empty($enviado)): ?>
                                            <div class="alert alert-success" role="alert">
                                                <?php echo $enviado; ?>
                                            </div>
                                        <?php endif; ?> -->
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
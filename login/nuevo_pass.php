<?php
    if (isset($_GET['id'])) {
		$id_usuario = $_GET['id'];
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

<body  style="background-image: url(images/4.jpg);">
    <section class="ftco-section">
        <div class="login-wrap p-0">
            <div class="overflow-hidden">
                <img src="../img/nuevologo.png" alt="Logo" class="login-wrap-img">
            </div>
            <hr class="mb-5">
            <h2>Ingrese su nueva contraseña</h2>
            <!-- Nuevo contenedor -->
            <div class="form-container mt-5">
                <form action="new_pass.php" method="post">
					<input type="hidden" name="id_usuario">
		      		<div class="form-group">
					  <input type="password" id="password-field" name="new_password" id="new_password" class="form-control" placeholder="Nueva contraseña">
					  <input type="password" id="password-field" name="confirm_password" id="confirm_password" class="form-control mt-3" placeholder="Confirmar contraseña" > 
					  <input type="hidden" name="id_usuario" value="<?php $id_usuario = $_GET['id'];;?>">	    
					  <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">   
					</div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" name="submit" class="form-control btn btn-primary submit px-3 mt-3">Modificar</button>
                        <button type="button" name="cancelar" class="form-control btn btn-primary submit px-3 mt-2" onclick="window.location.href='index.html'">Cancelar</button>
                    </div>
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
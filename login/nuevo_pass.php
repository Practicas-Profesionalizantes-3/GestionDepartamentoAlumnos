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
	<link rel="stylesheet" href="css/styles.css">	
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
		      	<h3 class="mb-4 text-center">Ingrese su nueva contraseña</h3>
		      	<form action="new_pass.php" method="post">
				  <input type="hidden" name="id_usuario">
		      		<div class="form-group">
					  <input type="password" id="password-field" name="new_password" id="new_password" class="form-control" placeholder="Nueva contraseña">
					  <input type="hidden" name="id_usuario" value="<?php $id_usuario = $_GET['id'];;?>">	    
					  <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">        
					  <div class="form-group">
						<button type="submit" name="submit" class="form-control btn btn-primary submit px-3 mt-4">Restablecer</button>
	            	</div>
				
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
					</div>
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


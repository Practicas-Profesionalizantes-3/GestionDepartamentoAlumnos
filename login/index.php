<!doctype html>
<html lang="es">

<head>
    <title>Instituto Tecnológico Beltran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <style>
        .form-container {
            background-color: #fff; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        .form-control {
  background-color: #f7f7f7 !important; /* Color de fondo de los inputs */
  border: 1px solid #000 !important; /* Borde de los inputs en negro */
  color: #000 !important; /* Color del texto dentro de los inputs en negro */
}

.form-control::placeholder {
  color: #000 !important; /* Color del texto placeholder en negro */
}
input.form-control {
  background-color: #f7f7f7 !important; /* Color de fondo de los inputs */
  border: 1px solid #000 !important; /* Borde de los inputs en negro */
  color: #000 !important; /* Color del texto dentro de los inputs en negro */
}
.text-md-right a {
    color: #337ab7;
}
    </style>
</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
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
                        <h3 class="mb-4 text-center"> Ingresar al campus</h3>

                        <!-- The Modal -->
                        <div id="myModal" class="modalSuccess">

                            <!-- Modal content -->
                            <div class="modalSuccess-content">
                                <div class="modalSuccess-body">
                                    <div class="loader"></div>
                                </div>
                            </div>

                        </div>
                        <div class="form-container"> <!-- Nuevo contenedor -->
                            <form class="signin-form" id="formulario">
                                <div class="form-group">
                                    <input id="username" type="text" class="form-control" placeholder="Usuario (Correo)"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" placeholder="Password"
                                        required>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"
                                        style="cursor: pointer;"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Entrar</button>
                                    <label style="color: rgb(0, 0, 0); font-weight: bold; display: none;" id="errorMessage"></label>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                    </div>
                                    <div class="text-md-right">
                                        <a href="recuperar.php" style="color: #337ab7;">Olvidaste la Contraseña?</a>
                                        <a href="../index.php" style="color: #337ab7;">Volver</a>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- Fin del nuevo contenedor -->
                    </div>
                </div>
            </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="index.js"></script>

</body>

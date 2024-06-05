<!DOCTYPE html>
<br lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">  
    <link rel="stylesheet" href="css/bootstrap.min.css">        
    <link rel="stylesheet" href="slick/slick.min.css">          
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="css/templatemo-upright.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="nav-div" class="tm-sidebar">
        <button id="nav-toggle-aparecer" class="btn nav-toggle"><i class="fa-solid fa-bars"></i></button> 
        <nav id="side-nav" class="side-nav tm-nav">
            <!-- BOTON DESAPARECER -->
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
            <div>
                <!-- BOTON APARECER -->
                <div class="mb-3">
                    <button id="nav-toggle-desaparecer" class="btn nav-toggle"><i class="fa-solid fa-bars"></i></button>
                </div>
                <!-- LOGO -->
                <div class="logo">
                    <img src="img/logo.png" alt="">
                </div>
                <!-- INICIO -->
                <div class="nav-item">                                
                    <a href="#home" class="nav-link current">
                        <div class="triangle-right"></div>
                        <i class="fas fa-home nav-icon"></i>
                        Inicio
                    </a>
                </div>
                <!-- CALENDARIO -->
                <div class="nav-item dropdown">
                    <a href="#calendario" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fas fa-images nav-icon"></i>
                        Calendario
                    </a>
                </div>
                <!-- CARRERAS -->
                <div class="nav-item">
                    <a href="carreras.html" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fas fa-user-friends nav-icon"></i>
                        Carreras
                    </a>
                </div>
                <!-- TRAMITES -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fa-solid fa-receipt nav-icon"></i>
                        Tramites
                    </a>
                </div>
                <!-- NOTIFICACIONES -->
                <div class="nav-item dropdown">
                    <a href="#notificaciones" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fa-solid fa-bell nav-icon"></i>
                        Notificaciones
                    </a>
                </div>
                <!-- CHAT -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fas fa-comments nav-icon"></i>
                        Chat
                    </a>
                </div>
                <!-- CREAR ANUNCIO -->
                <div class="nav-item dropdown">
                    <a href="nuevo_evento.html" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fa-solid fa-receipt nav-icon"></i>
                        Crear anuncio
                    </a>
                </div>
                <!-- CONTACTO -->
                <div class="nav-item">
                    <a href="#contact" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fas fa-envelope nav-icon"></i>
                        Contacto
                    </a>
                </div>
                <!-- CAMPUS VIRTUAL -->
                <div>
                    <a href="login/index.html" class="nav-link">
                        <div class="triangle-right"></div>
                        <i class="fa-solid fa-right-to-bracket nav-icon"></i>
                        Campus
                    </a>
                </div>
            </div>
        </nav>
    </div>
    
    <!-- Crear Anuncios -->
    <div class="tm-main" >
        <div class="container" id="create-anuncio"><br>
            <section id="home" class="tm-section">
                <div class="card">
                    <div class="card-header">
                        <h2 class="tm-text-primary text-center">Crear Anuncio</h2>
                    </div>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen:</label>
                                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
                            </div>
                            <div class="mb-3">
                                <label for="fechaDesde" class="form-label">fecha Desde:</label>
                                <input type="date" class="form-control" name="fechaDesde" id="fechaDesde" placeholder="fechaDesde" >
                            </div>
                            <div class="mb-3">
                                <label for="fechaHasta" class="form-label">fecha Hasta:</label>
                                <input type="date" class="form-control" name="fechaHasta" id="fechaHasta" placeholder="fechaHasta" >
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Crear</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                                <a name="" id="" class="btn btn-danger" href="index.html" role="button">Cancelar</a>
                            </div>
                        </form>
                    </div>    
                </div>   
            </section>     
        </div>    
    </div>            

    <!-- Footer -->
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <img src="img/inst.png" alt="logo" style="height: 10%">
                        </div>
                        <p style="color: white">Centro de Tecnología e Innovación Avellaneda-Buenos Aires - Argentina</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/institutobeltran" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/instbeltran/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/#!/CentroBeltran" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/channel/UC_XbNNufdrjoXTo4oaLjnaQ" target="_blank"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="single-footer-widget">
                        <h2 style="color: white">Contacto</h2>
                        <span style="color: white"><i class="fa fa-phone" ></i>(+54.11) 4265.0247 / 4265.0342 / 4203.0222 / 4203.0134</span>
                        <span style="color: white"><i class="fa fa-envelope"></i>informes@ibeltran.com.ar</span>
                        <span style="color: white"><i class="fa fa-globe"></i>www.ibeltran.com.ar</span>
                        <span style="color: white"><i class="fa fa-map-marker"></i>Av. Belgrano 1191, Avellaneda – Buenos Aires – Argentina.</span>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm">
                    <div class="single-footer-widget">
                        <h2 style="color: white">Enlaces útiles</h2>
                        <ul class="footer-list">
                            <li><a href="autoridades.php">Autoridades</a></li>
                            <li><a href="inscripcion_telefonica.php">Inscripción Telefonica</a></li>
                            <li><a href="trabaja_nosotros.php">Trabaja con Nosotros</a></li>
                            <li><a href="contacto.php">Informes y Consultas</a></li>
                            <li><a href="index.php">Términos y condiciones</a></li>
                            <li><a href="index.php">Política de Privacidad</a></li>
                        </ul>
                    </div>
                </div>   
            </div>
        </div>
    </div> <!-- Fin del Footer -->
    
    <!--Footer Area Start-->
    <footer class="footer-area bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-7">
                    <span class="text-light">Prohibida la reproducción total ó parcial de imágenes y textos. Todos los derechos reservados.</span>
                </div>
                <div class="col-md-6 col-sm-5">
                    <div class="column-right">
                        <span class="text-light">Política de Privacidad. Términos y condiciones.</span>
                    </div>
                </div>
            </div>
        </div>
    </footer> <!--End of Footer Area-->              

    <script src="js/app.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js"></script>          <!-- https://jquery.com/ -->
    <script src="js/jquery.singlePageNav.min.js"></script>  <!-- https://github.com/ChrisWojcik/single-page-nav -->
    <script src="js/parallax/parallax.min.js"></script>     <!-- https://pixelcog.github.io/parallax.js/ -->
    <script src="js/imagesloaded.pkgd.min.js"></script>     <!-- https://imagesloaded.desandro.com/ -->
    <script src="js/isotope.pkgd.min.js"></script>          <!-- https://isotope.metafizzy.co/ -->
    <script src="js/jquery.magnific-popup.min.js"></script> <!-- https://dimsemenov.com/plugins/magnific-popup/ -->
    <script src="slick/slick.min.js"></script>              <!-- https://kenwheeler.github.io/slick/ -->
    <script src="js/templatemo-script.js"></script> 
</body>
</html>
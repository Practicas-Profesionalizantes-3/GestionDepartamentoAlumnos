<?php
session_start();

?>
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
    <div class="container-fluid">
        <div class="row">
            <!-- Leftside bar -->
            <div id="tm-sidebar" class="tm-sidebar">
                <nav class="tm-nav">
                    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <div class="">
                            <img src="img/ITB.png" alt="">
                        </div>
                        <id="tm-main-nav">
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
                             <!-- CARTELERA -->
                             <div class="nav-item dropdown">
                                <a href="#cartelera" class="nav-link">
                                    <div class="triangle-right"></div>
                                    <i class="fa fa-calendar-check-o nav-icon" aria-hidden="true"></i>
                                    Cartelera
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
                                <?php
                                if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
                                ?>
                                    <a href="login/index.php" class="nav-link">
                                        <div class="triangle-right"></div>
                                        <i class="fa-solid fa-right-to-bracket nav-icon"></i>
                                        <span id="loginButton">Campus</span>
                                    </a>
                                <?php
                                } else {
                                    session_destroy();
                                ?>
                                    <a href="login/index.php" class="nav-link">
                                        <div class="triangle-right"></div>
                                        <i class="fa-solid fa-right-to-bracket nav-icon"></i>
                                        <span id="loginButton">Cerrar sesión</span>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                    </div>
                </nav>
            </div>

            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <div class="tm-parallax" data-parallax="scroll" data-image-src="img/img-01.jpg"></div>
                    <section id="home" class="tm-section">
                        <h2 class="tm-text-primary" style="text-align: center;">Centro de Tecnológia e Innovación</h2>
                        <hr class="mb-5">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="mb-5"><span class="tm-text-primary">Cartelera de Alumnos Noticias & Novedades</span></h2>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6 tm-col-home mb-4">
                                <div class="tm-text-container">
                                    <div class="room-item shadow rounded overflow-hidden">
                                        <div class="position-relative">
                                            <img class="img-fluid" src="img/20240430194758.jpeg" alt="">
                                        </div>
                                        <div class="p-4 mt-2">

                                            <div class="d-flex justify-content-between mb-3">
                                                <h5 class="mb-0" style="font-weight: bold;">CLASE MAGISTRAL DE NUESTRO RECTOR DR. ING. GUSTAVO AGOSTI</h5>
                                            </div>
                                            <p class="text-body mb-3">Se realizará el jueves 2 de mayo a las 15hs en el Aula 58, piso 5to.
                                                Destinado a estudiantes de 2º y 3º año de la Tecnicatura Superior en Enfermería.
                                                Esta oportunidad representa una experiencia enriquecedora que les permitirá adquirir nuevos conocimientos y alcanzar mayores niveles en su formación profesional.</p>
                                            <div class="d-flex justify-content-between">
                                                <p class="rounded py-2 px-4 bg-primary text-light">Fecha Desde</p>
                                                <p class="rounded py-2 px-4 bg-danger text-light">Fecha Hasta</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>-->
                    </section>
                </div>



                <!-- Fin Notificaciones -->

                <!-- Calendario Academico -->
                <!-- <hr class="tm-hr-short mb-5">
                <div class="tm-main">
                    <div class="container" id="calendario">
                        <section id="home" class="tm-section">
                            <h2 class="tm-text-primary">Calendario Academico 2024</h2>
                            <hr class="mb-2">
                            <div>
                                <p style="font-size: 1.1rem;">El Calendario Escolar 2024 aprobado por la Dirección General de Cultura y
                                    Educación de la Provincia de Buenos Aires, para todos los niveles, ciclos y modalidades de la
                                    educación, en establecimientos dependientes de la misma, y considerando
                                    Que resulta necesario aprobar institucionalmente el calendario académico
                                    a efectos de organizar procedimientos, plazos y trámites a realizar por los estudiantes y docentes
                                    para las actividades que comprenden: curso inicial, comienzo de cada cuatrimestre, los llamados a
                                    exámenes, períodos de receso y feriados dispuestos por autoridad competente.</p>
                            </div>
                            <hr class="mb-2">
                            <iframe src="https://calendar.google.com/calendar/embed?height=800&wkst=1&ctz=America%2FArgentina%2FBuenos_Aires&bgcolor=%233F51B5&title=Calendario%20Academico&showTitle=0&showPrint=0&showCalendars=0&showTz=0&src=ZXMuYXIjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%230B8043" style="border:solid 1px #100638" width="900" height="700" frameborder="0" scrolling="yes"></iframe>
                        </section>
                    </div>
                </div> -->
            </div> <!-- .tm-main -->

        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <!-- Contact section -->
    <div class="container mt-4">
        <div id="contact" style="margin-left: 12px;">
            <h2 class="tm-text-primary">Contactanos</h2>
            <hr class="mb-5">
            <div class="row">
                <div class="col-xl-6 tm-contact-col-l mb-4">
                    <form id="contact-form" action="" method="POST" class="tm-contact-form">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control rounded-0" placeholder="Nombre" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control rounded-0" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <input type="asunto" name="asunto" class="form-control rounded-0" placeholder="Asunto" required />
                        </div>
                        <div class="form-group">
                            <textarea rows="8" style="resize: none;" name="message" class="form-control rounded-0" placeholder="Mensaje" required=></textarea>
                        </div>

                        <div class="form-group tm-text-right">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-6 tm-contact-col-r">
                    <!-- Map -->
                    <div class="mapouter mb-4">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="520" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d290.0371856197937!2d-58.3631523232107!3d-34.66994942321495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a33348525b8105%3A0x688c2224c9769fa1!2sInstituto%20Tecnol%C3%B3gico%20Beltr%C3%A1n!5e0!3m2!1ses-419!2sar!4v1713374033358!5m2!1ses-419!2sar" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>

                    <!-- Address -->
                    <address class="mb-4">
                        Av. Manuel Belgrano 1191 <br>
                        Avellaneda, Buenos Aires, Argentina
                    </address>

                    <!-- Links -->
                    <ul class="tm-contact-links mb-4">
                        <li class="mb-2">
                            <a href="tel:0100200340">
                                <i class="fas fa-phone mr-2 tm-contact-link-icon"></i>
                                Tel:(+54.11) 4265.0247
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@company.com">
                                <i class="fas fa-at mr-2 tm-contact-link-icon"></i>
                                Email: informes@ibeltran.com.ar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Copyright -->
    <div class="tm-section-wrap tm-copyright row">
        <div class="col-12">
            <div class="text-right">
                Copyright 2020 Upright Company
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js"></script> <!-- https://jquery.com/ -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
    <script src="js/parallax/parallax.min.js"></script> <!-- https://pixelcog.github.io/parallax.js/ -->
    <script src="js/imagesloaded.pkgd.min.js"></script> <!-- https://imagesloaded.desandro.com/ -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- https://isotope.metafizzy.co/ -->
    <script src="js/jquery.magnific-popup.min.js"></script> <!-- https://dimsemenov.com/plugins/magnific-popup/ -->
    <script src="slick/slick.min.js"></script> <!-- https://kenwheeler.github.io/slick/ -->
    <script src="js/templatemo-script.js"></script>
</body>

</html>
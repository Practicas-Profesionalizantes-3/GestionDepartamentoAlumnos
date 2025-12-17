<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras - Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo-fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
</head>

<body>
    <!-- Include Perfil -->
    <?php include("../includes/perfil.php"); ?>

    <!-- Include notificaciones -->
    <?php include("../includes/notificaciones.php");?>

    <div class="container-fluid">
        <div class="row">
            <!-- Include Navbar -->
            <?php include("../includes/navbar.php"); ?>

            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <div class="container">
                        <h2 class="tm-text-primary mt-3 mb-4">Autoridades del Instituto Superior De Formación Técnica N° 197</h2>
                        <!--Text Area Start-->
                        <div class="text-area pt-110 pb-100">
                            <div class="container">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <section>
                                                <div class="container py-3">
                                                    <div class="card">
                                                    <div class="row ">
                                                        <div class="col-md-4">
                                                            <img src="../img/agosti.jpg" class="w-100">
                                                        </div>
                                                        <div class="col-md-8 px-3">
                                                            <div class="card-block px-3">
                                                            <h4 class="card-title">Rector Institucional<br>
                                                                Gustavo O AGOSTI, Dr. Ing. Prof.<br><br></h4>
                                                            <p class="card-text">Unidad Integral de Educación Técnico Profesional de Avellaneda<br> 
                                                                    Dirección General de Cultura y Educación de la Provincia de Buenos Aires<br>
                                                                    rectoria@ibeltran.com.ar <br></p>
                                                            
                                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgosti">
                                                                    Palabras del Rector Institucional
                                                                </button>

                                                            </div>
                                                        </div>

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </section>

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p><br><br><br>
                                                                    <span class="style1"><strong>Vice Rectora Institucional<br /> María V ROCA, Prof.</strong><br />Unidad Integral de Educación Técnico Profesional de Avellaneda<br />Dirección General de Cultura y Educación de la Provincia de Buenos Aires</span><br>vicerectoria@ibeltran.com.ar</span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Secretario Ejecutivo del Consejo Asesor<br /> Néstor RIBET, Dr.</strong><br />Unidad Integral de Educación Técnico Profesional de Avellaneda<br />Dirección General de Cultura y Educación de la Provincia de Buenos Aires</span><br>consejoasesor@ibeltran.com.ar</span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Secretaria de Extensión Técnico Profesional <br /> María V ROCA, Prof.</strong><br />Unidad Integral de Educación Técnico Profesional de Avellaneda<br />Dirección General de Cultura y Educación de la Provincia de Buenos Aires</span><br>secretaria_ex@ibeltran.com.ar</span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Secretario de Investigación y Desarrollo <br />Alejandro SZER, Lic. Prof.</strong><br />Unidad Integral de Educación Técnico Profesional de Avellaneda<br />Dirección General de Cultura y Educación de la Provincia de Buenos Aires</span><br>secretario_id@ ibeltran.com.ar </span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Presidente de la Asociación Civil DISAL <br /> Marcelo R Hermida, Dr.  </strong><br />Desarrollo e Inclusión Social para América Latina <br />Asociación Civil </span><br>disal@ibeltran.com.ar </span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Secretario General de la Unión Obrera Metalúrgica, Seccional Avellaneda <br /> Daniel G. Daporta </strong><br />Unión Obrera Metalúrgica de la República Argentina <br />Seccional Avellaneda </span><br>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                    
                                                        <div class="col-md-12">
                                                            <blockquote>
                                                                <p>
                                                                    <span class="style1"><strong>Director del Centro de Formación Profesional 411 de Avellaneda <br /> Martín A Valanci, Lic.</strong><br />Centro de Formación Profesional N° 411 de Avellaneda <br />Dirección General de Cultura y Educación de la Provincia de Buenos Aires</span><br>direccion411@ibeltran.com.ar</span>
                                                                </p>
                                                            </blockquote>
                                                        </div>
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of Text Area-->

                    <!-- Modal Palabras del Rector -->
                    <div class="modal fade modal-agosti" id="modalAgosti" tabindex="" aria-labelledby="modalAgostiLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAgostiLabel">Nuestra Posición</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>

                        <div class="modal-body">
                            <p>
                            La Unión Obrera Metalúrgica Seccional Avellaneda en conjunto con Asociación Civil Desarrollo e Inclusión Social para América Latina – DISAL –, trabajan genuinamente con el compromiso de fortalecer a nuestro país y los pueblos latinoamericanos, construyendo lazos de confianza para el sostén de los proyectos asumidos.
                            </p>

                            <p>
                            Nuestra gestión tiene como fin la articulación positiva desde el sector educativo con los sectores productivos, tecnológicos y científicos, con diferentes organizaciones e instituciones, nacionales e internacionales, para que en un continuo y sincero diálogo, los agentes involucrados puedan trabajar en forma mancomunada para el bien de la sociedad.
                            </p>

                            <p>
                            La principal meta de nuestra Institución es lograr un sistema de vida bueno, justo y feliz, que favorezca a todas las personas por igual y para que cada una de ellas pueda alcanzar la gratificación de la educación, el trabajo y la salud.
                            </p>

                            <p>
                            Nuestros proyectos se erigen sobre la base de los principios de justicia y equidad social, la promoción de la competitividad productiva, el respeto de la democracia y la defensa de la unidad nacional.
                            </p>

                            <p>
                            De este modo, trabajamos desde la situación actual pero con la firme convicción de estar problematizando los rasgos factibles que atravesarán a nuestra comunidad, instituyendo aportes sustanciales al proyecto político, económico y cultural que dará forma a nuestro país.
                            </p>

                            <p>
                            Sin embargo, cada uno de los que participamos en el resurgimiento de nuestro país debemos poner nuestro esfuerzo y aportar nuestras visiones y creencias para complejizar el abordaje.
                            </p>

                            <p>
                            Cuando la equidad y la unidad nacional son los cimientos de las políticas sociales, culturales y económicas, el país crece al ritmo del devenir histórico y crece haciendo historia.
                            </p>

                            <p>
                            No tenemos duda alguna que nuestro país volverá a ser potencia mundial en la presente década.
                            </p>

                            <p class="mt-4">
                            <strong>
                                Gustavo O AGOSTI, Dr. Ing. Prof.<br>
                                Rector Institucional<br>
                                Instituto Tecnológico BELTRÁN
                            </strong>
                            </p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>

                    </div>
                </div>
                </div>

                    </div> <!-- End of container -->
                </div> <!-- .tm-section-wrap -->
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    




    <!-- Include Footer -->
    <?php include("../includes/footer.php"); ?>
    
    <script src="../js/perfil.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/notificaciones.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>
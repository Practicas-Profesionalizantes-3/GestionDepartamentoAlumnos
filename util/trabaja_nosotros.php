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
                        <h2 class="tm-text-primary mt-3 mb-4">Trabaja con nosotros</h2>

                        <!--Text Area Start-->
                        <div class="text-area pt-110 pb-100">
                            <div class="container">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <p>
                                                En el Instituto Tecnológico Beltrán apostamos al desarrollo profesional, la iniciativa, la adaptabilidad y el trabajo en equipo como pilares fundamentales de nuestra comunidad educativa. Entendemos la educación como un proceso dinámico, en constante evolución, que requiere compromiso, vocación y una mirada innovadora orientada al futuro.
                                                <br /><br />

                                                Nuestra institución promueve un ambiente de trabajo colaborativo, basado en el respeto mutuo, la responsabilidad y la mejora continua. Buscamos personas con iniciativa, capacidad de adaptación y vocación por la enseñanza y la gestión educativa, que deseen involucrarse activamente en los proyectos institucionales y aportar ideas que enriquezcan nuestra propuesta académica.
                                                <br /><br />

                                                Valoramos especialmente la formación permanente, el compromiso ético y la capacidad de trabajar en equipo, entendiendo que el crecimiento individual potencia el crecimiento colectivo. En el Instituto Tecnológico Beltrán fomentamos el intercambio de conocimientos, la capacitación constante y el desarrollo de habilidades que permitan afrontar los desafíos actuales del ámbito educativo y tecnológico.
                                                <br /><br />

                                                Formar parte de nuestra institución implica integrarse a un equipo de trabajo comprometido con la excelencia académica, el acompañamiento cercano a los estudiantes y la construcción de un espacio educativo inclusivo y de calidad. Ofrecemos un entorno laboral que incentiva el crecimiento profesional, la participación activa y el desarrollo de nuevas competencias.
                                                <br /><br />

                                                Si estás interesado/a en formar parte del Instituto Tecnológico Beltrán y compartir nuestros valores, te invitamos a enviarnos tu currículum vitae a 
                                                <strong>cv@ibeltran.com.ar</strong>. Nos pondremos en contacto para conocerte y evaluar futuras oportunidades laborales acordes a tu perfil.
                                            </p>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of Text Area-->


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
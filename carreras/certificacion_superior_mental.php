<?php
    //API - CARRERAS
    $combo_carreras_url = "http://localhost/api/api-Alumnos/carreras.php";
    $response_carreras = file_get_contents($combo_carreras_url);
    $data_carreras = json_decode($response_carreras, true);
    session_start();

    // Array para mapear el id_carrera con sus íconos específicos
    $iconos_carreras = [
        1 => "bi bi-laptop", // Análisis De Sistemas
        2 => "bi bi-rulers", // Diseño Industrial
        3 => "bi bi-heart-pulse", // Enfermería
        4 => "bi bi-file-medical", // Radiología
        5 => "bi bi-shield-lock", // Higiene Y Seguridad En El Trabajo
        6 => "bi bi-camera-video", // Comunicación Multimedial
        7 => "bi bi-calculator", // Administración Contable
        8 => "bi bi-briefcase", // Administración De Pequeñas Y Medianas Empresas
        9 => "bi bi-clipboard-heart", // Certificación Superior En Salud Mental
        10 => "bi bi-bar-chart-line" // Tecnicatura Superior En Ciencia De Datos E Intelig...
    ];

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
                    <!-- Carreras -->
                    <div class="container">
                        <h2 class="tm-text-primary mt-3 mb-4">Carreras del Instituto Superior De Formación Técnica N° 197</h2>
                        <!-- Certificación: Especialización de Enfermería en Salud Mental -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-clipboard-heart career-icon"></i> Certificación Superior Especialización de Enfermería en Salud Mental</h1>
                            <p class="lead">
                                <strong>Título:</strong> Certificación Superior Especialización de Enfermería en Salud Mental<br>
                                <strong>Modalidad:</strong> Bimodal<br>
                                <strong>Duración:</strong> 1 año<br>
                                <strong>Cantidad de horas:</strong> 384 horas<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion_43_17_sup_salud_mental.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                N° 43/17 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            <p class="text-justify">
                                La formación superior en Enfermería está basada en conocimientos científicos, y proporciona una perspectiva holística, respecto de los sujetos y de los procesos de intervención inherentes a su campo, la enfermería en salud mental requiere de una capacitación específica para poder proporcionar los cuidados correspondientes, enriqueciendo y actualizando la formación básica.
                            </p>
                            <p class="text-justify">
                                Durante el desarrollo de la certificación profesional se busca profundizar y especializar las competencias del perfil profesional.
                            </p>
                            <p class="fw-semibold text-dark mb-3">La/el enfermera/o en salud mental debe desarrollar las siguientes competencias:</p>
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="border-0">1. Analizar críticamente las políticas, modelos de atención y prácticas de enfermería en salud mental.</li>
                                <li class="border-0">2. Analizar la práctica de enfermería en función del modelo que subyace.</li>
                                <li class="border-0">3. Reconocer el campo de los Derechos de los sujetos en general y de los personas con padecimiento mental en particular.</li>
                                <li class="border-0">4. Valorar la función del enfermero como una estrategia de cuidado sobre el malestar psíquico, orientándola a pensar al sujeto en la particularidad de su historia, en la singularidad de los síntomas y en los malestares propios de su época.</li>
                                <li class="border-0">5. Desarrollar actividades de promoción, prevención, recuperación y rehabilitación de la salud en los tres niveles de atención, con especial énfasis en la atención de los grupos vulnerables de la población.</li>
                                <li class="border-0">6. Diagnosticar, diseñar e implementar, como integrante del equipo interdisciplinario, programas de educación para la salud, con el propósito de mantener y mejorar la salud de las personas, familias y comunidad, realizando actividades de educación permanente en salud.</li>
                                <li class="border-0">7. Planificar e implementar el cuidado de las personas con padecimiento psíquico en forma conjunta con los niveles de conducción, los Servicios de Cuidados Generales e Intermedios, Centros Quirúrgicos y de Atención Ambulatoria, como así también, servicios de salud comunitarios.</li>
                                <li class="border-0">8. Implementar actividades de capacitación y promoción de la salud en el área de salud mental y uso problemático de sustancias para los sujetos de atención.</li>
                                <li class="border-0">9. Adquirir herramientas para asesorar a los equipos de salud en temas relacionado con el cuidado enfermero de las personas con padecimiento mental.</li>
                                <li class="border-0">10. Gestionar programas y proyectos en el campo de salud mental.</li>
                                <li class="border-0">11. Gestionar e implementar proyectos de capacitación continua profesional en el campo de salud mental.</li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Impacto en el Área Profesional</h3>
                            <p class="text-justify">
                                El egresado de la certificación podrá insertarse con mayor dominio de los saberes propios de los ámbitos de salud que aborden la salud mental tanto a nivel de la promoción, prevención y asistencia.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Requisito de Ingreso</h3>
                            <p class="text-justify">
                                Ser egresado de una carrera de formación superior tales como enfermería profesional, enfermería universitaria y/o licenciatura en enfermería.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>
                            <p class="text-justify mb-4">
                                La estructura curricular de este curso se presenta en módulos, cada uno de los cuales, consta de una carga horaria que comprende la teoría y las prácticas específicas.
                            </p>

                            <div class="row g-4">
                                <div class="col-md-12">
                                <h5 class="fw-semibold border-boton-car text-dark">Módulos</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><strong>I-</strong> GESTIÓN, MODELOS DE ATENCIÓN E INVESTIGACIÓN EN SALUD MENTAL</li>
                                    <li class="mb-2"><strong>II-</strong> CICLOS VITALES Y SALUD MENTAL</li>
                                    <li class="mb-2"><strong>III-</strong> CRISIS Y EMERGENCIAS EN SALUD MENTAL</li>
                                    <li class="mb-2"><strong>IV-</strong> ABORDAJES ACTUALES DEL PADECIMIENTO MENTAL</li>
                                    <li class="mb-0"><strong>V-</strong> PRÁCTICAS PROFESIONALIZANTES</li>
                                </ul>
                                </div>
                            </div>
                            </div>
                        </section>
                        <!-- Botón Volver -->
                        <div class="text-center mt-3">
                            <a href="../carreras.php">
                                <i class="bi bi-arrow-left-circle me-2"></i>Volver a las carreras
                            </a>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>
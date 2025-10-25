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
                        <!-- Carrera: Técnicatura Superior en Higiene y Seguridad en el Trabajo -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-shield-lock career-icon"></i> Técnicatura Superior en Higiene y Seguridad en el Trabajo</h1>
                            <p class="lead">
                                <strong>Título:</strong> Técnico Superior en Higiene y Seguridad en el Trabajo<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> 3 años<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion%20320-13%20TS%20Higiene%20y%20Seguridad%20en%20el%20Trabajo.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                320/13 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    La Argentina ha sido pionera en el desarrollo de legislación sobre salud laboral. El constante avance científico y tecnológico en el área disciplinar, hacen necesario la creación de un perfil profesional capaz de un asesoramiento integral en higiene y seguridad a todos los niveles de una organización pública y/o privada.
                                </p>
                                <p class="text-justify">
                                    Es por ello, que la Tecnicatura en Seguridad e Higiene propone la formación integral de los estudiantes, con una mirada sistémica, que les proporcione las herramientas pertinentes para desempeñarse en los Servicios de Seguridad e Higiene, colaborando con el Ingeniero o Licenciado Especialista en Higiene y Seguridad.
                                </p>
                                <p class="text-justify mb-0">
                                    En igual modo, el egresado se encontrará capacitado para formar equipos de seguridad, aplicar planes de evacuación y demás medidas para la emergencia.
                                </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional y Competencia General</h3>
                            <p>
                                El Técnico Superior en Seguridad e Higiene en el Trabajo es un profesional competente para la organización, la planificación y organización de actividades, el diseño, la gestión de los recursos de los servicios, la evaluación y control y la capacitación en aspectos inherentes a la higiene y seguridad en el trabajo.
                            </p>
                            <p>
                                Puede diseñar, inspeccionar y controlar equipos y elementos de protección personal y colectiva, como así también; instalaciones en ambientes de trabajo en los que se desarrollen actividades con riesgos.
                            </p>
                            <p class="mb-0">
                                Realiza el análisis, evaluación y control de situaciones en las que existen contaminantes. Colabora en la implementación y desarrollo programas de trabajo en materia de higiene y seguridad laboral y programas de capacitación para la prevención y la protección de riesgos laborales.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Planes de Estudio y Correlatividades de las diferentes carreras correspondientes según el año de ingreso de cada estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron en el año 2014 – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20Higiene%20y%20Seguridad%20320-2014.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                                <li>• Para alumnos que ingresaron a partir del año 2015 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20Higiene%20y%20Seguridad%20320-2015.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                                <li>• Para alumnos que ingresaron a partir del año 2017 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TEHST%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Administración de las Organizaciones</li>
                                    <li>Psicología Laboral</li>
                                    <li>Física I</li>
                                    <li>Química I</li>
                                    <li>Medios de Representación</li>
                                    <li>Medicina del Trabajo I</li>
                                    <li>Seguridad I</li>
                                    <li>Derecho del Trabajo</li>
                                    <li>Práctica Profesionalizante</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Estadística</li>
                                    <li>Física II</li>
                                    <li>Química II</li>
                                    <li>Inglés Técnico</li>
                                    <li>Ergonomía</li>
                                    <li>Seguridad II</li>
                                    <li>Higiene Laboral y Medio Ambiente I</li>
                                    <li>Medicina del Trabajo II</li>
                                    <li>Práctica Profesionalizante II</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Comunicación y Administración de Medios</li>
                                    <li>Capacitación de Personal</li>
                                    <li>Seguridad III</li>
                                    <li>Higiene Laboral y Medio Ambiente II</li>
                                    <li>Control de la Contaminación</li>
                                    <li>Práctica Profesionalizante III</li>
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
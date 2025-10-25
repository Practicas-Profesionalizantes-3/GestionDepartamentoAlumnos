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
                        <!-- Carrera: Tecnicatura Superior en Enfermería -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-heart-pulse career-icon"></i> Tecnicatura Superior en Enfermería</h1>
                            <p class="lead">
                                <strong>Título:</strong> Enfermero<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> 3 años<br>
                                <strong>Cantidad de horas:</strong> 2148 horas<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion%20854-16%20Enfermeria.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                854/16 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    La Tecnicatura Superior en Enfermería tiene como principal propósito formar profesionales generalistas con preparación científica, humana y capacitación suficiente para valorar, identificar, actuar y evaluar las necesidades de salud y de cuidados de las personas, de las familias y la comunidad durante todo el proceso de salud-enfermedad.
                                </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            <p>
                                El Enfermero/a está capacitado para el ejercicio profesional en relación de dependencia y en forma libre, desarrollando, brindando y gestionando los cuidados de enfermería autónomos e interdependientes para la promoción, prevención, recuperación y rehabilitación de la persona, la familia, grupo y comunidad hasta el nivel de cuidados intermedios, en los ámbitos comunitario y hospitalario; gestionando su ámbito de trabajo y participando en estudios de investigación-acción.
                            </p>

                            <h5 class="fw-semibold mt-4 text-dark">Funciones</h5>
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="border-0">✔ Desarrollar, brindar y gestionar los cuidados de enfermería autónomos e interdependientes para la promoción, prevención, recuperación y rehabilitación de la persona, la familia, grupo y comunidad hasta el nivel de cuidados intermedios, en los ámbitos comunitario y hospitalario.</li>
                                <li class="border-0">✔ Gestionar su ámbito de trabajo y participar en estudios de investigación-acción.</li>
                            </ul>

                            <h5 class="fw-semibold mt-4 text-dark">La organización curricular aborda ejes que se orientan a:</h5>
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="border-0">✔ La promoción de la salud</li>
                                <li class="border-0">✔ La prevención de la enfermedad</li>
                                <li class="border-0">✔ La resolución de los problemas de salud, ofreciendo cuidados de calidad y una práctica basada en la evidencia científica, para mejorar la salud de la población y contribuir al desarrollo humano</li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Planes de Estudio y Correlatividades de las diferentes carreras correspondientes según el año de ingreso de cada estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron a partir del año 2019 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TECEN%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>PSICOLOGÍA</li>
                                    <li>TEORÍAS SOCIOCULTURALES DE LA SALUD</li>
                                    <li>CONDICIONES Y MEDIO AMBIENTE DEL TRABAJO</li>
                                    <li>SALUD PÚBLICA I</li>
                                    <li>BIOLOGÍA HUMANA</li>
                                    <li>FUNDAMENTOS DEL CUIDADO</li>
                                    <li>CUIDADOS DE LA SALUD CENTRADOS EN LA COMUNIDAD Y LA FAMILIA</li>
                                    <li>PRÁCTICA PROFESIONALIZANTE I</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>COMUNICACIÓN EN CIENCIAS DE LA SALUD</li>
                                    <li>INGLÉS</li>
                                    <li>INTRODUCCIÓN A LA METODOLOGÍA DE INVESTIGACIÓN EN SALUD</li>
                                    <li>NUTRICIÓN Y DIETOTERAPIA</li>
                                    <li>SALUD PÚBLICA II</li>
                                    <li>FARMACOLOGÍA EN ENFERMERÍA</li>
                                    <li>ENFERMERÍA MATERNO INFANTIL</li>
                                    <li>ENFERMERÍA DEL ADULTO Y DEL ADULTO MAYOR I</li>
                                    <li>PRÁCTICA PROFESIONALIZANTE II</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>ORGANIZACIÓN Y GESTIÓN DE SERVICIOS DE ENFERMERÍA</li>
                                    <li>ASPECTOS BIOÉTICOS Y LEGALES DE LA PROFESIÓN</li>
                                    <li>ENFERMERÍA EN SALUD MENTAL</li>
                                    <li>ENFERMERÍA DEL ADULTO Y DEL ADULTO MAYOR II</li>
                                    <li>ENFERMERÍA COMUNITARIA Y PRÁCTICA EDUCATIVA EN SALUD</li>
                                    <li>ENFERMERÍA EN EMERGENCIAS Y CATÁSTROFES</li>
                                    <li>PRÁCTICA PROFESIONALIZANTE III</li>
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
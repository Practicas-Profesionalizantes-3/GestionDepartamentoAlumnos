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
                        <!-- Carrera: Tecnicatura Superior en Administración de Pequeñas y Medianas Empresas -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-briefcase career-icon"></i> Tecnicatura Superior en Administración de Pequeñas y Medianas Empresas</h1>
                            <p class="lead">
                                <strong>Título:</strong> Técnico Superior en Administración de Pequeñas y Medianas Empresas<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> 3 años<br>
                                <strong>Cantidad de horas:</strong> 1824 horas<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion%20458-23%20Administracion%20empresas.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                458/23 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            <p class="text-justify">
                                La/El Técnica/o Superior en Administración de PYMES estará capacitada/o para desarrollar procesos técnico específicos en planeamiento, organización, gestión, y control de los sistemas y áreas comerciales, operacionales de producción, económico-financieras, de recursos humanos, sistemas de información y sistemas de toma de decisiones estratégicas de las empresas, en forma interna y externa, presencial y remota, en interacción con el entorno.
                            </p>
                            <p class="text-justify mb-0">
                                Estas capacidades serán desarrolladas según las incumbencias y las normas técnicas y legales que rigen su campo profesional.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Áreas de Competencia</h3>
                            <p class="text-justify">
                                La/El Técnica/o Superior en Administración de PYMES podrá insertarse en organizaciones públicas o privadas, independientemente del tamaño, sector, naturaleza y complejidad. Podrá ejercer funciones en cargos o puestos de departamentos técnicos y de gestión, en la administración de recursos humanos, dentro de entidades y organizaciones de diverso tipo.
                            </p>
                            <p class="text-justify">
                                Asimismo, podrá integrar instituciones de la comunidad, de bien público, organizaciones gremiales, cámaras de comercio o de empresas y emprendimientos de la economía social como cooperativas. Dentro del sector privado, podrá ser parte en entornos de recursos humanos, planificación organizacional, gestión y análisis de proyectos.
                            </p>
                            <p class="text-justify mb-0">
                                También podrá acogerse a ofertas laborales de agencias consultoras y/u otras organizaciones.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Planes de Estudio y Correlatividades de la carrera según el año de ingreso de cada estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron a partir del año 2024 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20Administraci%C3%B3n%20PYME%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                                <li>• Para alumnos que ingresaron a partir del año 2021 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20Administraci%C3%B3n%20PYME%20-%202022.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Fundamentos de Matemática</li>
                                    <li>Derecho</li>
                                    <li>Inglés I</li>
                                    <li>Principios Administración</li>
                                    <li>Economía</li>
                                    <li>Principios de Contabilidad</li>
                                    <li>Gestión de Información para Administración</li>
                                    <li>Prácticas Profesionalizantes 1: Aproximación al campo laboral</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Matemática Financiera</li>
                                    <li>Inglés II</li>
                                    <li>Contabilidad de Gestión</li>
                                    <li>Derecho Laboral</li>
                                    <li>Derecho Comercial</li>
                                    <li>Tecnologías y Sistemas para Administración</li>
                                    <li>Costos y Planificación</li>
                                    <li>Administración del Personal</li>
                                    <li>Prácticas Profesionalizantes 2: Diseño de Proyectos de Administración</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Teoría y Técnica Tributaria</li>
                                    <li>Marketing Estratégico y Operativo</li>
                                    <li>Administración Estratégica y Control de Gestión</li>
                                    <li>Administración de las Operaciones</li>
                                    <li>Negocios Internacionales</li>
                                    <li>Finanzas de Empresas</li>
                                    <li>Prácticas Profesionalizantes 3: Gestión e Implementación de Proyectos de Administración</li>
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
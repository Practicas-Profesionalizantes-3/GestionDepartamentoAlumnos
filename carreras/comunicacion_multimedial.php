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
                        <!-- Carrera: Tecnicatura Superior en Comunicación Multimedial -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-camera-video career-icon"></i> Tecnicatura Superior en Comunicación Multimedial</h1>
                            <p class="lead">
                                <strong>Título:</strong> Técnico Superior en Comunicación Multimedial<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> 3 años<br>
                                <strong>Cantidad de horas:</strong> 1824 horas<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion%206179-03%20Comunicacion%20Multimedial.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                6179/03 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    Las nuevas tecnologías de la información y la comunicación están produciendo inusitados cambios en todos los aspectos de la vida social actual.
                                </p>
                                <p class="text-justify mb-0">
                                    La relación hombre máquina se intensifica permanentemente, crece la cantidad de computadoras y sus aplicaciones vinculadas con la comunicación posibilitan cada día más la interactividad. Esta nueva forma de comunicación abre horizontes desconocidos para el desarrollo humano.
                                </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            <p>
                                Implica la habilidad para la gestión integral de proyectos y el conocimiento de la legislación vigente sobre derechos de autor y propiedad intelectual. El Técnico en Comunicación Multimedial podrá desempeñarse de manera independiente o en relación de dependencia en todo tipo de emprendimiento que requieran la producción de sistemas multimediales de difusión, propaganda, publicidad o comunicación institucional.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Áreas de Competencia</h3>
                            <p>
                                El Técnico Superior en Comunicación Multimedial estará capacitado para desarrollar actividades profesionales, individualmente o integrando equipos de trabajo, en lo referente a interpretación, transformación y transmisión de información a través de la aplicación de tecnologías multimediales y la utilización de aplicaciones informáticas en medios de comunicación.
                            </p>
                            <p class="mb-0">
                                Mediante la interacción con profesionales de áreas artísticas estará capacitado para diseñar, compaginar y producir publicaciones visuales y gráficas.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Planes de Estudio y Correlatividades de la carrera según el año de ingreso de cada estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron a partir del año 2020 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TECUM%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Algebra</li>
                                    <li>Análisis Matemático</li>
                                    <li>Inglés Técnico I</li>
                                    <li>Administración de las Organizaciones</li>
                                    <li>Metodología de la Investigación</li>
                                    <li>Introducción a la Programación</li>
                                    <li>Fundamentos de Fotografía, Imagen y Sonido</li>
                                    <li>Comunicación</li>
                                    <li>Diseño de Información Conceptual</li>
                                    <li>Laboratorio de Medios Digitales I</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Probabilidad y Estadística</li>
                                    <li>Análisis Matemático II</li>
                                    <li>Inglés Técnico II</li>
                                    <li>Programación Web</li>
                                    <li>Medios Audiovisuales</li>
                                    <li>Medios Editoriales</li>
                                    <li>Laboratorio de Medios Digitales II</li>
                                    <li>Espacio de Definición Institucional</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Investigación Operativa</li>
                                    <li>Economía Empresarial</li>
                                    <li>Inglés Técnico III</li>
                                    <li>Marketing Aplicado</li>
                                    <li>Edición de Video</li>
                                    <li>Proyecto</li>
                                    <li>Práctica Profesional</li>
                                    <li>Espacio de Definición Institucional</li>
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
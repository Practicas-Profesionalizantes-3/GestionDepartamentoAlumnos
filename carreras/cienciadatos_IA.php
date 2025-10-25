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
                        <!-- Carrera: Tecnicatura Superior en Ciencia de Datos e Inteligencia Artificial -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-bar-chart-line career-icon"></i> Tecnicatura Superior en Ciencia de Datos e Inteligencia Artificial</h1>
                            <p class="lead">
                                <strong>Título:</strong> Técnico/A Superior En Ciencia De Datos E Inteligencia Artificial<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> Tres años<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Anexo%20I%20Res%202730-22%20Cs%20deDatos%20e%20Inteligencia%20Artificial.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                2730/22 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    Los cambios producidos en el mundo de la ciencia y, especialmente en el campo de la tecnología, se han reflejado en el ámbito socioeconómico en general y del trabajo en particular, inaugurando nuevas perspectivas en los sistemas organizacionales, en los regímenes de empleo y en la producción industrial y tecnológica.
                                </p>
                                <p class="text-justify">
                                    Actualmente, el mercado se enfoca en el análisis de datos para optimizar sus recursos y resultados, revelar tendencias y generar información que las organizaciones pueden utilizar para tomar mejores decisiones y crear productos y servicios más innovadores. El aumento del rendimiento de las/os trabajadoras/es y de la capacidad productiva de las empresas es el principal beneficio de la implantación de la Inteligencia Artificial.
                                </p>
                                <p class="text-justify mb-0">
                                    Los datos y su manipulación, lo mismo que la inteligencia artificial, constituyen un fenómeno global de fuerte impacto real y potencial. Se han convertido en una de las disciplinas más importantes en la actualidad, y se encuentra en permanente avance, ya que el consumo de datos por parte de la sociedad es cada vez mayor y la necesidad de dar soluciones a problemas cotidianos con la tecnología como intermediaria en la resolución de los problemas se vuelve imprescindible.
                                </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            
                            <h5 class="fw-semibold text-dark">Competencia General</h5>
                            <p class="text-justify">
                                La/El Técnica/o Superior en Ciencia de Datos e Inteligencia Artificial estará capacitada/o para realizar proyectos de innovación que involucren actividades tanto del campo de la Ciencia de Datos como de la IA. Estará calificada/o para pensar con criterio estadístico situaciones de trabajo que involucren una amplia cantidad de datos, comprendiendo el ciclo de trabajo de la Ciencia de Datos dentro de una organización o para un/a cliente/a particular.
                            </p>
                            <p class="text-justify mb-0">
                                Para ello, deberá conocer las técnicas específicas para explorar, limpiar y preparar diversas fuentes de datos antes de su procesamiento.
                            </p>

                            <h5 class="fw-semibold mt-4 text-dark">Áreas de Competencia</h5>
                            <p class="text-justify">
                                Si bien la/el Técnica/o Superior en Ciencia de Datos e IA trabaja en la adquisición, captura, adecuación y disponibilidad de datos, una parte importante de su trabajo radica en la capacidad de diseñar visualizaciones de información acertadas y comunicar eficazmente los hallazgos obtenidos, traduciéndolos de manera comprensible a los roles no especializados de la organización y/o clientes.
                            </p>
                            <p class="fw-semibold text-dark mb-3">De este modo, las funciones del Técnico Superior en Ciencia de Datos e IA, son:</p>
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="border-0">✔ <strong>Diseñar proyectos:</strong> Analizar los datos disponibles y las especificaciones del proyecto y determinar los que mejor se adecuen a la solución, interpretando las necesidades propias del proceso de negocio.</li>
                                <li class="border-0">✔ <strong>Diseñar soluciones que involucren análisis de datos:</strong> se analizan los datos a utilizar desde el punto de vista del ciclo de trabajo de la ciencia de datos y se diseñan e implementan las diversas técnicas que permitan la creación de diferentes modelos.</li>
                                <li class="border-0">✔ <strong>Desarrollar sistemas de inteligencia artificial:</strong> que además involucren Visión Artificial o Procesamiento de Habla. En esta función se realiza el desarrollo del sistema y se trabaja con diferentes estructuras de archivos y datos.</li>
                                <li class="border-0">✔ <strong>Realizar tareas de mantenimiento y optimización del sistema:</strong> Interpretar las nuevas especificaciones del cliente. Analizar los cambios a realizar en el sistema. Especificar el nuevo diseño.</li>
                                <li class="border-0">✔ <strong>Organizar y gestionar proyectos:</strong> podrá organizar el trabajo en relación a los requisitos técnicos, los recursos humanos, los costos y las formas de comercialización, determinar tiempos de trabajo, evaluar presupuestos y herramientas de software disponibles.</li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Área Ocupacional</h3>
                            <p class="text-justify">
                                La/el Técnica/o Superior en Ciencia de Datos e Inteligencia Artificial podrá insertarse en organizaciones para coordinar equipos de trabajo y dirigir emprendimientos de pequeña o mediana envergadura de servicios propios de su campo, cumpliendo en todos los casos con el manejo adecuado de la información, consideraciones éticas y principios de usabilidad.
                            </p>
                            <p class="text-justify mb-0">
                                También está habilitado para desarrollar las funciones que se describen en el perfil profesional relacionadas con el diseño y desarrollo de sistemas y/o modelos que involucren el campo de la ciencia de datos e IA.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Plan de Estudios y Correlatividades según el año de ingreso del estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron a partir del año 2024 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TSCIA%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Lógica Computacional</li>
                                    <li>Administración y Gestión de Base de Datos</li>
                                    <li>Elementos de Análisis Matemático</li>
                                    <li>Estadística y Probabilidades para Gestión de Datos</li>
                                    <li>Inglés para Ciencia de Datos e IA 1</li>
                                    <li>Inglés para Ciencia de Datos e IA 2</li>
                                    <li>Técnicas de Programación</li>
                                    <li>PP1: Aproximación al Campo Laboral</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Desarrollo de Sistemas de Inteligencia Artificial</li>
                                    <li>Modelizado de Minería de datos</li>
                                    <li>Técnicas de Procesamiento del habla</li>
                                    <li>Procesamiento de Aprendizaje Automático</li>
                                    <li>Ciencia de Datos</li>
                                    <li>PP: Análisis y Exploración de Datos</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Gestión de Proyectos</li>
                                    <li>Taller de Comunicación</li>
                                    <li>Seminario de Actualización</li>
                                    <li>Técnicas de Procesamiento Digital de Imágenes</li>
                                    <li>P: Modelizado de Sistemas de IA</li>
                                    <li>PP: Proyecto Integrador</li>
                                    <li>Tecnología y Ambiente</li>
                                    <li>Trabajo, Tecnología y sociedad</li>
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
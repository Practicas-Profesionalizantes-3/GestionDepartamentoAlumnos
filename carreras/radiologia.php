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
                        <!-- Carrera: Tecnicatura Superior en Tecnología en Salud con Especialidad en Radiología -->
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                            <h1 class="fw-bold text-uppercase titulo-primary mb-3"><i class="bi bi-file-medical career-icon"></i> Tecnicatura Superior en Tecnología en Salud con Especialidad en Radiología</h1>
                            <p class="lead">
                                <strong>Título:</strong> Técnico Superior en Radiología<br>
                                <strong>Nivel:</strong> Terciario<br>
                                <strong>Modalidad:</strong> Presencial<br>
                                <strong>Duración:</strong> 3 años<br>
                                <strong>Cantidad de horas:</strong> 1952 horas<br>
                                <strong>Resolución:</strong>
                                <a href="https://www.ibeltran.com.ar/archivos/Resolucion%205308-24%20Radiologia.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                5308/24 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                </a>
                            </p>
                            </div>
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    La actualización de la presente Tecnicatura Superior se fundamenta en los permanentes avances de la ciencia y la tecnología y en la complejidad del campo de la salud, que impactan significativamente en la formación y desarrollo profesional de las/os Técnicas/os Superiores en Radiología. En este sentido, se propone integrar la complejidad de los procesos tecnológicos y las experiencias socialmente validadas de atención en salud en sus distintos niveles, con las competencias de la/el Técnica/o Superior en Radiología para la resignificación de la práctica.
                                </p>
                                <p class="text-justify mb-0">
                                    De este modo se pretende redefinir el eje de la formación de la/el futura/a Técnica/o Superior, centrado en la atención de la persona. Desde esta concepción se espera que su intervención profesional se desarrolle desde una perspectiva inter y transdisciplinaria desde el ámbito de su saber específico.
                                </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                            <p>
                                El/la Técnico/a Superior en Radiología está capacitado/a para: atender a la persona en la producción de imágenes, mediante técnicas y tecnologías que emplean generadores de radiación ionizante y/o no ionizante. También puede llevar a cabo la realización del tratamiento radiante a través de la aplicación de teleterapia y efectuar la promoción y control de prácticas radiosanitarias en los ámbitos donde se desempeña.
                            </p>
                            <p>
                                Asimismo, este profesional promociona las medidas de seguridad y participa en acciones de formación continua e investigación.
                            </p>

                            <h5 class="fw-semibold mt-4 text-dark">Alcance del Perfil Profesional</h5>
                            <p>
                                La/El Técnica/o Superior en Radiología está capacitada/o para desempeñarse esencialmente en el ámbito de la salud y en ámbitos relacionados con la especialidad, en los cuales atiende a las personas mediante la manipulación y el uso de equipamiento emisor de radiación que emplea para la obtención de imágenes para el diagnóstico, para guiar tratamientos y para la aplicación de teleterapia. En el desarrollo de estas actividades propicia la promoción de buenas prácticas radiosanitarias, la prevención de efectos nocivos de las radiaciones y la protección radiológica de la persona, los integrantes del equipo de salud, el resto de las personas del público y el medio ambiente circundante.
                            </p>
                            <p>
                                Asimismo, posee competencias transversales a todos los profesionales del sector Salud que le permiten asumir una responsabilidad integral del proceso en el que interviene y trabajar interdisciplinariamente. Por otra parte, participa en la toma de definiciones estratégicas en el marco de un equipo que acompaña a los estamentos jerárquicos. También gestiona las actividades específicas y los recursos de los cuales es responsable.
                            </p>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Área Ocupacional</h3>
                            <p>
                                Su área ocupacional es primordialmente la de Salud. El/la Técnico/a Superior en Radiología se desempeña en el sector salud y en el marco de instituciones educativas y empresas. Se pueden citar:
                            </p>
                            <ul class="list-group list-group-flush list-unstyled">
                                <li class="border-0">✔ Efectores de Salud</li>
                                <li class="border-0">✔ Comités de ética profesional</li>
                                <li class="border-0">✔ Empresas relacionadas con la especialidad</li>
                                <li class="border-0">✔ Programas comunitarios relacionados con la especialidad</li>
                                <li class="border-0">✔ Instituciones Educativas</li>
                                <li class="border-0">✔ Entidades o instituciones dedicadas a la investigación y administración del sistema de gestión de calidad</li>
                                <li class="border-0">✔ Otras instituciones relacionadas con la especialidad donde se desarrollen actividades afines</li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4 mb-5">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                            <p>
                                Planes de Estudio y Correlatividades de las diferentes carreras correspondientes según el año de ingreso de cada estudiante:
                            </p>
                            <ul class="list-unstyled">
                                <li>• Para alumnos que ingresaron a partir del año 2021 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TERA%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                                <li>• Para alumnos que ingresaron a partir del año 2025 inclusive – 
                                <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TERA%20-%202025.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                </li>
                            </ul>
                            </div>

                            <div class="border-0 rounded-4 p-4">
                            <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                            <div class="row g-4">
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Comunicación en Salud</li>
                                    <li>Salud Pública 1</li>
                                    <li>Inglés</li>
                                    <li>Fundamentos de Biología y Anatomía</li>
                                    <li>Fundamentos de Ciencias Exactas</li>
                                    <li>Radiofísica 1</li>
                                    <li>Práctica Profesionalizante 1</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Trabajo, Tecnología y Sociedad</li>
                                    <li>Metodología de la Investigación</li>
                                    <li>Salud Pública 2</li>
                                    <li>Salud y Seguridad de los Trabajadores</li>
                                    <li>Radiofísica 2</li>
                                    <li>Tomografía computada</li>
                                    <li>Fisiopatología</li>
                                    <li>Tecnologías Radiológicas en Radiodiagnóstico</li>
                                    <li>Práctica Profesionalizante 2</li>
                                </ul>
                                </div>
                                <div class="col-md-4">
                                <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                <ul class="list-unstyled mb-0">
                                    <li>Bioética</li>
                                    <li>Informática en Salud</li>
                                    <li>Investigación en Servicios de Salud</li>
                                    <li>Resonancia Magnética</li>
                                    <li>Tecnologías Radiológicas Especiales</li>
                                    <li>Radioterapia</li>
                                    <li>Práctica Profesionalizante 3</li>
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
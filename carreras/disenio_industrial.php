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
        3 => "bi bi-heart-pulse",
        4 => "bi bi-file-medical",
        5 => "bi bi-shield-lock",
        6 => "bi bi-camera-video",
        7 => "bi bi-calculator",
        8 => "bi bi-briefcase",
        9 => "bi bi-clipboard-heart",
        10 => "bi bi-bar-chart-line"
    ];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras - Instituto Tecnológico Beltrán</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo-fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <!-- Sección principal -->
                <div class="tm-section-wrap">
                    <div class="container">
                        <h2 class="tm-text-primary mt-3 mb-4">Carreras del Instituto Superior De Formación Técnica N° 197</h2>
                        
                        <section class="py-5 text-dark">
                            <div class="text-center mb-5">
                                <h1 class="fw-bold text-uppercase titulo-primary mb-3">
                                    <i class="bi bi-rulers career-icon"></i> Tecnicatura Superior en Diseño Industrial
                                </h1>
                                <p class="lead">
                                    <strong>Título:</strong> Técnico Superior en Diseño Industrial<br>
                                    <strong>Nivel:</strong> Terciario<br>
                                    <strong>Modalidad:</strong> Presencial<br>
                                    <strong>Duración:</strong> 3 años<br>
                                    <strong>Cantidad de horas:</strong> 1920 horas<br>
                                    <strong>Resolución:</strong>
                                    <a href="https://www.ibeltran.com.ar/archivos/Resolucion%203803-06%20Diseno%20Industrial.pdf" target="_blank" class="text-decoration-none fw-semibold">
                                        3803/06 - Dirección General de Cultura y Educación de la Provincia de Buenos Aires
                                    </a>
                                </p>
                            </div>

                            <!-- Fundamentación -->
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Fundamentación</h3>
                                <p class="text-justify">
                                    La reconversión técnico-productiva, especialmente tras la crisis de 2001, junto a políticas orientadas a la
                                    revalorización de la PyME, transformaron el escenario nacional en una tierra de oportunidades para el Diseño Industrial.
                                </p>
                                <p class="text-justify">
                                    Se desarrolla un nuevo esquema productivo, apoyado en la innovación y la educación técnica, que demanda profesionales
                                    capaces de diseñar productos industriales, impulsar la calidad e innovación, y fortalecer la economía nacional en los
                                    mercados globalizados.
                                </p>
                                <p class="text-justify mb-0">
                                    Esta carrera promueve una formación integral, atenta a las nuevas tecnologías y a las demandas del sector productivo,
                                    permitiendo ampliar los campos de acción técnico-profesional en un medio industrial en crecimiento.
                                </p>
                            </div>

                            <!-- Perfil Profesional -->
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Perfil Profesional</h3>
                                <h5 class="fw-semibold text-dark">Competencia General</h5>
                                <p>
                                    El Técnico Superior en Diseño Industrial está capacitado para diseñar productos industriales y su herramental
                                    complementario, planificando y gestionando su desarrollo dentro de los procesos industriales.
                                </p>

                                <h5 class="fw-semibold mt-4 text-dark">Áreas de Competencia</h5>
                                <ul class="list-group list-group-flush list-unstyled">
                                    <li>✔ Planificación del desarrollo de procesos productivos industriales.</li>
                                    <li>✔ Desarrollo de herramental complementario (utilajes, dispositivos, matricería, etc.).</li>
                                    <li>✔ Diseño de productos industriales.</li>
                                    <li>✔ Gestión de desarrollos y procesos productivos.</li>
                                </ul>
                            </div>

                            <!-- Área Ocupacional -->
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Área Ocupacional</h3>
                                <p>
                                    El Técnico Superior en Diseño Industrial podrá desempeñarse de forma autónoma o en relación de dependencia en
                                    empresas industriales, departamentos de diseño, investigación y desarrollo, o como consultor externo brindando
                                    servicios de diseño y planificación de procesos productivos.
                                </p>
                            </div>

                            <!-- Plan de Estudios -->
                            <div class="border-0 rounded-4 p-4 mb-5">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Plan de Estudios</h3>
                                <p>
                                    Planes y correlatividades según el año de ingreso del estudiante:
                                </p>
                                <ul class="list-unstyled">
                                    <li>• Ingresantes desde 2015 – 
                                    <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades_DI_16.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                    </li>
                                    <li>• Ingresantes desde 2017 – 
                                    <a href="https://www.ibeltran.com.ar/archivos/planes/Estructura%20Curricular%20y%20Correlatividades%20-%20TECDI%20-%202024.pdf" target="_blank" class="fw-semibold text-decoration-none">Descargar</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Estructura Curricular -->
                            <div class="border-0 rounded-4 p-4">
                                <h3 class="titulo-primary fw-bold mb-3 border-titulo-carreras">Estructura Curricular</h3>

                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <h5 class="fw-semibold border-boton-car text-dark">1er Año</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li>Inglés I</li>
                                            <li>Arte y Técnica I</li>
                                            <li>Física I</li>
                                            <li>Matemática I</li>
                                            <li>Diseño Industrial I</li>
                                            <li>Morfología I</li>
                                            <li>Gráfica Digital y Modelado 3D I</li>
                                            <li>Producción Industrial I</li>
                                            <li>Espacio de Definición Institucional I</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="fw-semibold border-boton-car text-dark">2do Año</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li>Arte y Técnica II</li>
                                            <li>Inglés II</li>
                                            <li>Física II</li>
                                            <li>Diseño Industrial II</li>
                                            <li>Morfología II</li>
                                            <li>Gráfica Digital y Modelado 3D II</li>
                                            <li>Producción Industrial II</li>
                                            <li>Práctica Profesional I</li>
                                            <li>Metodologías de Investigación y Desarrollo</li>
                                            <li>Espacio de Definición Institucional II</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="fw-semibold border-boton-car text-dark">3er Año</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li>Arte y Técnica III</li>
                                            <li>Inglés III</li>
                                            <li>Diseño Industrial III</li>
                                            <li>Morfología III</li>
                                            <li>Gráfica Digital y Modelado 3D III</li>
                                            <li>Producción Industrial III</li>
                                            <li>Práctica Profesional II</li>
                                            <li>Sociología de las Organizaciones</li>
                                            <li>Propiedad Industrial</li>
                                            <li>Espacio de Definición Institucional III</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Botón Volver -->
                            <div class="text-center mt-4">
                                <a href="../carreras.php" class="fw-semibold text-decoration-none">
                                    <i class="bi bi-arrow-left-circle me-2"></i>Volver a las carreras
                                </a>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include("../includes/footer.php"); ?>

    <script src="../js/perfil.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/notificaciones.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
</html>
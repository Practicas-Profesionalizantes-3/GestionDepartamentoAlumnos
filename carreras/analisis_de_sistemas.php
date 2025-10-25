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
                    <!--Text Area Start-->

                                    <div class="text-area pt-110 pb-100 mt-3">
                                        <div class="container">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="page-header">
                                                            <h1>
                                                                TECNICATURA SUPERIOR EN ANÁLISIS DE SISTEMAS<br> 
                                                                <small>TITULO: ANALISTA DE SISTEMAS<br />
                                                                NIVEL: Terciario
                                                                <br />
                                                                MODALIDAD: Presencial
                                                                <br />
                                                                DURACIÓN: 3 años
                                                                <br />
                                                                CANTIDAD DE HORAS: 1856 horas
                                                                <br />
                                                                Resolución: 
                                                                <a href="archivos/Resolucion TSAS -6790-19.pdf" target="_blank">6790/19 de la Dirección General de Cultura y Educación de la Provincia de Buenos Aires.</a>
                                                                <br /></small>
                                                            </h1>
                                                        </div>
                                                        <p>
                                                            <strong>FUNDAMENTACIÓN DE LA TECNICATURA SUPERIOR EN ANÁLISIS DE SISTEMAS</strong>

                                                            <br /><br />
                                                            Desde hace décadas, la informática se ha instalado en nuestra sociedad como un sistema que colabora con el estudio del procesamiento de la información. En efecto, se ha reconocido su colaboración en las diversas prácticas y funciones que involucran al sujeto en relación con grandes cantidades de información. El profesional en Análisis de Sistemas se encuentra relacionado con cualquier tipo de organización que incluya sistemas de información y requiera de su análisis para la toma de decisiones en relación a procesos industriales, administrativos, económicos, escolares, entre otros. Por ello, se propone una formación específica en lo que respecta al ámbito de la informática, los sistemas de información, programación, software, entre otros; que colaboran con el conocimiento del marco organizacional en el que pueden desarrollarse profesionalmente. Asimismo, la carrera contempla aquellos saberes que les permitan comprender los avances científico-tecnológicos para que logren un perfeccionamiento continuo.
                                                            <br />
                                                            <br />
                                                            <strong>PERFIL PROFESIONAL</strong>
                                                            <br />        
                                                            <br />
                                                            <strong>COMPETENCIA GENERAL</strong>
                                                            <br />
                                                            El Analista de Sistemas estará capacitado para planificar y gestionar un proyecto de desarrollo, así como también para diagnosticar problemas y diseñar soluciones informáticas de las organizaciones que así lo requieran. Estas competencias serán desarrolladas según las incumbencias y las normas técnicas y legales que rigen su campo.

                                                            <br />           
                                                            <br />
                                                            <strong>ÁREAS DE COMPETENCIA</strong>
                                                            <br />
                                                            Las funciones profesionales que aquí se presentan, requieren -del técnico superior- el dominio de un saber hacer complejo en el que se movilizan conocimientos, valores, actitudes y habilidades de carácter tecnológico, social, ético y personal que definen su identidad profesional. De este modo, son funciones del Técnico Superior en Análisis de Sistemas:
                                                            <br />
                                                            <ul>
                                                            <li>Planificar, dirigir, realizar y/o evaluar proyectos de sistemas de información.    </li>
                                                            <li>Identificar y diagnosticar problemas de una organización para diseñar y proyectar posibles soluciones informáticas.    </li>
                                                            <li>Organizar, dirigir y controlar las áreas técnicas relacionadas con los sistemas de información.     </li>
                                                            <li>Actuar como interlocutores entre el área técnica y las demás áreas de la organización.     </li>
                                                            <li>Elaborar propuestas de capacitación para la utilización de sistemas de información. </li>
                                                            <li>Gestionar desde el diseño y el desarrollo, hasta la operación y el mantenimiento de proyectos asociados a los sistemas de información. </li>
                                                            <li>Participar en el análisis, diseño, construcción, integración y evolución de soluciones informáticas</li>
                                                            <li>Realizar tareas de auditoría, arbitraje, peritaje y tasaciones relacionados con los sistemas de información.</li>
                                                            </ul>
                                                            <br /><strong>ÁREA OCUPACIONAL</strong>
                                                            <br />
                                                            El Analista de Sistemas podrá desempeñarse en todo tipo de organizaciones que requieran una persona o grupo de personas que dirijan el análisis, diseño e implementación de sistemas de información. Asimismo, podrá trabajar de forma independiente, actuando como consultor para la realización de proyectos relacionados con el análisis, diseño, implementación y/ o seguimiento de sistemas de información. También podrá actuar como auditor de sistemas de información, administrador de bases de datos, miembro de un equipo de aseguramiento de calidad, líder de equipo de pruebas de sistemas y/o conducir grupos de trabajos en estas áreas.

                                                            <br/><br /><br/>
                                                            <strong>PLAN DE ESTUDIO</strong>
                                                            <br />
                                                            Plan de Estudios y Correlatividades según el año de ingreso del estudiante.
                                                            <br />
                                                            • TSAS (Resol. 6790/19) ingresantes 2020en adelante.  <a href="archivos/planes/Estructura Curricular y Correlatividades - TSAS - 2024.pdf" target="_blank">
                                                            <strong>Descargar</strong></a>.
                                                            <br />
                                                            • TECAS (Resol. 5817/03) ingresantes 2017, 2018 y 2019.  <a href="archivos/planes/Estructura Curricular y Correlatividades - Analista de Sistemas -2017.pdf" target="_blank">
                                                            <strong>Descargar</strong></a>.
                                                            <br />
                                                            • TECAS (Resol. 5817/03) ingresantes 2015 y 2016.  <a href="archivos/planes/Estructura Curricular y Correlatividades - Analista de Sistemas -2015.pdf" target="_blank">
                                                            <strong>Descargar</strong></a>.
                                                            <br />
                                                            • TECAS (Resol. 5817/03) ingresantes 2012,2013 y 2014.   <a href="archivos/planes/Estructura Curricular y Correlatividades - Analista de Sistemas -2012-2013-2014.pdf" target="_blank">
                                                            <strong>Descargar</strong></a>.


                                                            <br /><br /><br />
                                                            <strong>ESTRUCTURA CURRICULAR</strong><br /><br />
                                                            <ul><h5>1er Año</h5><br>
                                                                <li>Inglés I</li>
                                                                <li>Ciencia, Tecnología y Sociedad</li>
                                                                <li>Análisis Matemático I</li>
                                                                <li>Álgebra</li>
                                                                <li>Algoritmos y estructuras de datos I</li>
                                                                <li>Sistemas y Organizaciones</li>
                                                                <li>Arquitectura de Computadores</li>
                                                                <li>Prácticas Profesionalizantes I</li>                                            
                                                            </ul>
                                                            <br>
                                                            <br>

                                                            <ul><h5>2do Año</h5><br>
                                                                <li>Inglés II</li>
                                                                <li>Análisis Matemático II</li>
                                                                <li>Estadística</li>
                                                                <li>Ingeniería de Software I</li>
                                                                <li>Algoritmos y Estructuras de Datos II</li>
                                                                <li>Sistemas Operativos</li>
                                                                <li>Base de Datos</li>
                                                                <li>Prácticas Profesionalizantes II</li>
                                                            </ul>
                                                            <br><br>

                                                            <ul><h5>3er Año</h5><br>
                                                                <li>Inglés III</li>
                                                                <li>Aspectos Legales de la Profesión</li>
                                                                <li>Seminario de Actualización</li>
                                                                <li>Redes y Comunicaciones</li>
                                                                <li>Ingeniería de Software II</li>
                                                                <li>Algoritmos y Estructuras de Datos III</li>  
                                                                <li>Prácticas Profesionalizantes III</li>
                                                            </ul>
                                                            
                                                            <br><br>
                    
                                                        </p>
                                                        <br />
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End of Text Area-->

                    </div>
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

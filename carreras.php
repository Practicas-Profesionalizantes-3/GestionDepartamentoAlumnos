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
    <link rel="shortcut icon" href="img/logo-fav.png" type="image/x-icon"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-upright.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->

</head>

<body>
    <!-- Include Perfil -->
    <?php include("includes/perfil.php"); ?>

    <!-- Include notificaciones -->
    <?php include("includes/notificaciones.php");?>

    <div class="container-fluid">
        <div class="row">
            <!-- Include Navbar -->
            <?php include("includes/navbar.php"); ?>

            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <!-- Carreras -->
                    <div class="container">
                        <h2 class="tm-text-primary mt-3 mb-4">Carreras del Instituto Superior De Formación Técnica N° 197</h2>
                        <section class="p-5 rounded">
                            <ul class="list-group list-group-flush">
                                <?php foreach ($data_carreras as $carrera): ?>
                                    <?php
                                    // Obtener el ícono correspondiente al id_carrera o usar un ícono por defecto
                                    $icono = isset($iconos_carreras[$carrera["id_carrera"]]) ? $iconos_carreras[$carrera["id_carrera"]] : "bi bi-book";
                                    ?>
                                    <li class="d-flex justify-content-between align-items-center li-carreras">
                                        <span>
                                            <i class="<?php echo $icono; ?> text-primary me-2"></i>
                                            <a href="<?php echo $carrera["url"]; ?>" class="text-dark fw-bold"  target="_blank"><?php echo $carrera["descripcion"]; ?></a>
                                        </span>
                                        <i class="bi bi-bookmark-star-fill text-primary"></i>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
    
                            <hr class="my-4">
                            <p class="text-muted">
                                Dirección General de Cultura y Educación, Provincia de Buenos Aires<br>
                                Resolución de Creación N° 3293 del 12 de Octubre del 2011<br>
                                Títulos Terciarios OFICIALES
                            </p>
                            <p class="text-muted">La Educación Superior:
                                <br>
                                Los cambios producidos en el mundo de la ciencia y especialmente, en el campo de la tecnología, se han reflejado en el ámbito de la economía y del trabajo, inaugurando nuevas perspectivas en los sistemas organizacionales, en los regímenes de trabajo y en la producción industrial y tecnológica. Los avances en este campo, a la par de modificar las relaciones entre trabajo y producción, han invadido otras esferas de la vida social, lo que ha llevado a una necesaria reflexión sobre la calidad de vida humana, en el marco de un mundo altamente tecnificado y de profundos desequilibrios sociales.
                                <br>
                                En La Ley de Educación Superior se formulan entre otros los siguientes objetivos:
                                <br>
                                a) Formar científicos, profesionales y técnicos que se caractericen por la solidez de su formación y por su compromiso con la sociedad de que forman parte.
                                <br>
                                b) Garantizar crecientes niveles de calidad y excelencia en todas las opciones institucionales del sistema.
                                <br>
                                c) Articular la oferta educativa de los diferentes tipos de instituciones que la integran.
                                <br>
                                d) Promover una adecuada diversificación de los estudios de nivel superior, que atiendan tanto a las expectativas y demandas de la población como los requerimientos del sistema cultural y de la estructura productiva”.
                                <br>
                                e) Propender a la formación profesional en distintas carreras técnicas que tengan vinculación directa con las necesidades socio-económicas y los requerimientos de empleo de la región.
                            </p>
                            <p class="text-muted">INSTITUTO TECNOLÓGICO BELTRÁN
                                Avenida Belgrano 1191, Avellaneda, Buenos Aires, Argentina.
                                Instituto Superior de Formación Técnica 197
                                Contacto: Secretaría, secretaria197@ibeltran.com.ar
                                (011) 4265.0247 / 4265.0342 / 4203.0222 / 4203.0134
                            </p>   
                        </section>
                    </div>
                </div> <!-- .tm-section-wrap -->
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    
    <!-- Include Footer -->
    <?php include("includes/footer.php"); ?>
    
    <script src="js/perfil.js"></script>
    <script src="js/index.js"></script>
    <script src="js/notificaciones.js"></script>
    <script src="js/navbar.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>

<?php
    session_start();
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
                    <div class="container">
                        <h2 class="tm-text-primary mt-3 mb-4">Inscripción Telefonica Permamente</h2>

                        <!--Text Area Start-->
                        <div class="text-area pt-110 pb-100">
                            <div class="container">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="page-header">
                                                <h1>
                                                    El Centro de Capacitación DISAL-UOM<br> <small>mantiene la pre-inscripción telefónica durante todo el año.</small><br>
                                                </h1>
                                            </div>
                                            <p>
                                            Las personas interesadas en participar en los cursos de capacitación profesional podrán comunicarse con nuestras ejecutivas de capacitación al 4203-0222/4265-0247/4265-0342/de lunes a viernes de 09:00 a 18:00 hs. También se les brindará respuestas y mayor información respecto a la oferta educativa. 

                                            <br />
                                            <br />
                                            Las acciones de capacitación surgen en el marco del Plan Integral para la Promoción del Empleo “Más y Mejor Trabajo” promovido por el Ministerio de Trabajo, Empleo y Seguridad Social de la Nación, la Unión Obrera Metalúrgica, Seccional Avellaneda, y la Asociación civil Desarrollo e Inclusión Social para América Latina (DISAL). 

                                            <br />
                                            <br />
                                            Nuestros objetivos se centran en formar a trabajadores ocupados y/o desocupados en oficios vinculados a la industria metalmecánica, informática y automatización, que deseen insertarse en el mercado laboral formal, a jóvenes que buscan su primer empleo como así también recalificar a trabajadores que anhelan optimizar sus competencias y adaptarse a las nuevas tecnologías productivas, en el marco de un contexto centrado en el progreso tecnológico dinámico.

                                            <br />
                                            <br />
                                            Todos los capacitados obtendrán sus respectivas Constancias avaladas por los tres organismos de renombre. 

                                            <br /><br />
                                            <strong>Oferta Curricular:<br />
                                            <br />
                                            Metalmecánica y Metalurgia
                                            </strong>
                                            <br />
                                            <br />
                                            •  Operario Múltiple
                                            <br />
                                            •  Electricista Nivel Inicial
                                            <br />
                                            •  Electricista Nivel Calificado
                                            <br />
                                            •  Tornero Nivel Inicial
                                            <br />
                                            •  Tornero Nivel Calificado
                                            <br />
                                            •  Fresador Nivel Inicial
                                            <br />
                                            •  Fresador Nivel Calificado
                                            <br />
                                            •  Soldador Nivel Inicial
                                            <br />
                                            •  Soldador Nivel Calificado
                                            <br /><br />

                                            <strong>Automación</strong><br />
                                            <br />                                    
                                            •   Operador de Control Numérico Computarizado
                                            <br />
                                            •  Operador de Controladores Lógicos Programables
                                            <br /><br />
                                            <strong>Informática </strong>
                                            <br />
                                            <br />
                                            •  Diseño Proyectual Asistido por Computadora 
                                            <br />
                                            •  Informática Softwre Básico<br />
                                            •  Informática Hardware <br />
                                            •  Modelado 3D <br />
                                            
                                            <br /><strong> Oficios Digitales </strong>                                   
                                            <br />
                                            <br />
                                            •  Instalación de antenas y decodificadores de tv digital terrestre para hogares.
                                            <br />
                                            •  Montaje de decodificadores (set top boxes) de tv digital terrestre.
                                            <br />
                                            •  Montaje y reparación de decodificadores de tv digital terrestre.
                                            <br />
                                            •  Desarrollo de software para tv digital.
                                            <br />
                                                                                
                                            </p>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of Text Area-->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>
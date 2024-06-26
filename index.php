<?php
session_start();
?>

<!DOCTYPE html>
<br lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/bootstrap.min.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/slick/slick.min.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/slick/slick-theme.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/templatemo-upright.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/style.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/includes/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Include Navbar -->
            <?php
            include("includes/navbar2.php");
            ?>

            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <!-- Include Cartelera -->
                    <?php
                    $_SESSION['mostrar_opciones_cartelera'] = 'opciones1';
                    include("includes/cartelera.php")
                    ?>

                    <!-- Include Contacto -->
                    <?php
                    include("includes/contacto.php")
                    ?>


                </div> <!-- .tm-section-wrap -->
                <!-- Include Footer -->
                <?php
                include("includes/footer.php")
                ?>
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->




    <script src="/gestiondepartamentoalumnos/js/index.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="/gestiondepartamentoalumnos/js/jquery-3.4.1.min.js"></script> <!-- https://jquery.com/ -->
    <script src="/gestiondepartamentoalumnos/js/parallax/parallax.min.js"></script> <!-- https://pixelcog.github.io/parallax.js/ -->
    <script src="/gestiondepartamentoalumnos/js/imagesloaded.pkgd.min.js"></script> <!-- https://imagesloaded.desandro.com/ -->
    <script src="/gestiondepartamentoalumnos/js/isotope.pkgd.min.js"></script> <!-- https://isotope.metafizzy.co/ -->
    <script src="/gestiondepartamentoalumnos/js/jquery.magnific-popup.min.js"></script> <!-- https://dimsemenov.com/plugins/magnific-popup/ -->
    <script src="/gestiondepartamentoalumnos/slick/slick.min.js"></script> <!-- https://kenwheeler.github.io/slick/ -->
    <script src="/gestiondepartamentoalumnos/js/templatemo-script.js"></script>
</body>

</html>
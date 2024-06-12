<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);
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
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="slick/slick.min.css">
    <link rel="stylesheet" href="slick/slick-theme.css">
    <link rel="stylesheet" href="css/templatemo-upright.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Include Navbar -->
            <?php
            include("includes/navbar.php");
            ?>

            <div class="cartelera">
                <!-- Home section -->
                    <?php
                    $_SESSION['mostrar_opciones_cartelera'] = 'opciones2';
                    include("includes/cartelera.php")
                    ?>
                    


                <!-- Include Footer -->
                <div style="margin-top: 550px;">
                    <?php
                    include("includes/footer.php")
                    ?>
                </div>
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->




    <script src="js/index.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js"></script> <!-- https://jquery.com/ -->
    <script src="js/jquery.singlePageNav.min.js"></script> <!-- https://github.com/ChrisWojcik/single-page-nav -->
    <script src="js/parallax/parallax.min.js"></script> <!-- https://pixelcog.github.io/parallax.js/ -->
    <script src="js/imagesloaded.pkgd.min.js"></script> <!-- https://imagesloaded.desandro.com/ -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- https://isotope.metafizzy.co/ -->
    <script src="js/jquery.magnific-popup.min.js"></script> <!-- https://dimsemenov.com/plugins/magnific-popup/ -->
    <script src="slick/slick.min.js"></script> <!-- https://kenwheeler.github.io/slick/ -->
    <script src="js/templatemo-script.js"></script>
</body>

</html>
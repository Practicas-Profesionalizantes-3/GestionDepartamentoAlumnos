<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Trámite</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
</head>

<body>
    <!-- Include del Navbar -->
    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5">
        <h1 class="tm-text-primary text-center">Detalle del Trámite</h1>
        <div id="tramite-detalle" class="card mt-3 w-75 m-auto">
            <div class="card-body">
                <!-- Los datos del trámite se mostrarán aquí mediante JavaScript -->
            </div>
        </div>
        <div class="text-center">
            <!-- Botón para regresar a la lista de trámites -->
            <a href="mis_tramites.php" class="btn btn-secondary mt-3 text-center">Volver</a>
        </div>
    </div>
    
    <script src="../js/index.js"></script>
    <script src="js/tramite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>

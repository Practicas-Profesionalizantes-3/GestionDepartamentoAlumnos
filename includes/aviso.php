<?php
// Obtener los datos enviados por GET y POST
$aviso_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : null;
$titulo = isset($_POST['titulo']) && !empty($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : 'Sin título';
$descripcion = isset($_POST['descripcion']) && !empty($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : 'Sin descripción';
$imagen = isset($_POST['imagen']) && !empty($_POST['imagen']) ? "data:image/jpeg;base64," . $_POST['imagen'] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
$fecha = isset($_POST['fecha']) && !empty($_POST['fecha']) ? htmlspecialchars($_POST['fecha']) : 'Sin fecha';
$adjunto = isset($_POST['adjunto']) && !empty($_POST['adjunto']) ? $_POST['adjunto'] : null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
</head>
<body>
    <!-- Include del Navbar -->
    <?php include("../includes/navbar.php"); ?>

    <div class="container mt-5">
        <div class="aviso-completo  bg-light">
            <!-- Botón para volver a la página anterior -->
            <a href="javascript:void(0);" onclick="window.history.back();" class="volver">&times;</a>

            <!-- Título del aviso -->
            <h1 class="text-center mb-3"><?= $titulo; ?></h1>

            <!-- Imagen del aviso -->
            <img src="<?= $imagen; ?>" alt="<?= htmlspecialchars($titulo); ?>" class="img-aviso img-fluid">

            <!-- Descripción del aviso -->
            <p class="descripcion-completa"><?= $descripcion; ?></p>

            <!-- Contenedor para la fecha y la descarga del adjunto -->
            <div class="fecha-descarga-container">
                <?php if (!empty($adjunto)) : ?>
                    <div class="descargar-adjunto">
                        <a href="data:application/pdf;base64,<?= $adjunto; ?>" download="<?= $titulo; ?>.pdf">
                            Descargar adjunto
                        </a>
                    </div>
                <?php endif; ?>
                <p class="fecha"><?= $fecha; ?></p>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

    <!-- Opcional: JS para Bootstrap (si no lo tienes en tu proyecto) -->
    <script src="../js/index.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5Pil2tXdHhjTvQ9lQS6yIiwnyF3vухQ9Etqkibi1DwYLPSAOxocnipl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0J9d9n00bu9XR4GQ6fhY7xQpfPtcp7tF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>

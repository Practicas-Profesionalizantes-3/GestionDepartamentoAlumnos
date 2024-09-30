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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="aviso-completo">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

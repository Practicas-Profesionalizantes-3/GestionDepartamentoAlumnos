<?php
// Obtener los datos enviados por POST
$titulo = isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : 'Sin título';
$descripcion = isset($_POST['descripcion']) ? htmlspecialchars($_POST['descripcion']) : 'Sin descripción';
$imagen = isset($_POST['imagen']) && !empty($_POST['imagen']) ? "data:image/jpeg;base64," . $_POST['imagen'] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
$fecha = isset($_POST['fecha']) ? htmlspecialchars($_POST['fecha']) : 'Sin fecha';
$adjunto = isset($_POST['adjunto']) ? $_POST['adjunto'] : '';
?>


    <title><?= $titulo; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="aviso-completo">
            <a href="javascript:void(0);" onclick="window.history.back();" class="volver">&times;</a>

            <h1 class="mb-3"><?= $titulo; ?></h1>
            <img src="<?= $imagen; ?>" alt="<?= $titulo; ?>" class="img-aviso">
            <p class="descripcion-completa"><?= $descripcion; ?></p>

            <div class="fecha-descarga-container">
                <?php if (!empty($adjunto)) : ?>
                    <div class="descargar-adjunto">
                        <a href="data:application/pdf;base64,<?= $adjunto; ?>" download="<?= $titulo; ?>" class="btn btn-primary">Descargar adjunto</a>
                    </div>
                <?php endif; ?>
                <p class="fecha"><?= $fecha; ?></p>
            </div>
        </div>
    </div>
    <?php
        include("footer.php")
    ?>
</body>
</html>
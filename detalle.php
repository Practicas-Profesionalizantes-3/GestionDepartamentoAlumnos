<?php
    $aviso_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Inicializar datos por defecto
    $titulo = 'Sin título';
    $descripcion = 'Sin descripción';
    $imagen = "sin imagen"; // Imagen por defecto
    $fecha = 'Sin fecha';
    $adjunto = '';

    // Si existe un aviso_id, obtener datos de la API
    if ($aviso_id) {
        // Obtener el registro de la notificación
        $url = "http://localhost/api/api-Alumnos/cartelera.php?id_notificacion=" . urlencode($aviso_id);
        $response = file_get_contents($url);
        
        // Verificar si se obtuvo una respuesta
        if ($response !== false) {
            $data = json_decode($response, true);
            
            if (isset($data['data']) && is_array($data['data'])) {
                foreach ($data['data'] as $anuncio) {
                    if ($anuncio['id_aviso'] == $aviso_id) {
                        $titulo = htmlspecialchars($anuncio['titulo']);
                        $descripcion = htmlspecialchars($anuncio['descripcion']);
                        $fecha = htmlspecialchars($anuncio['fecha_publicacion']);
                        $imagen_base64 = $anuncio['imagen'];
                        $imagen = "<img src='data:image/jpeg;base64," . $imagen_base64 . "' alt='Imagen' class='img-aviso'>";
                        $adjunto = $anuncio['adjunto'];
                    }
                }
            } else {
                echo "No se encontraron datos en la respuesta de la API.";
            }
        } else {
            echo "No se pudo obtener la respuesta de la API.";
        }
    }

    // Mostrar el aviso dependiendo del ID
    if ($aviso_id) {
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Aviso - <?= $titulo; ?></title>
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
        <?php include("includes/perfil.php");?>

        <!-- Include notificaciones -->
        <?php include("includes/notificaciones.php");?>

        
        <div class="container-fluid">
            <div class="row">
                <!-- Include Navbar -->
                <?php include("includes/navbar.php");?>
                
                <div class="tm-main">
                    <!-- Home section -->
                    <div class="tm-section-wrap">
                        <div class="mt-5">
                            <div class="aviso-completo bg-light">
                                <a href="javascript:void(0);" onclick="location.href='index.php'" class="volver">&times;</a>
                                <h1 class="mb-3 text-center" style="color: black;"><?= $titulo; ?></h1>
                                <?= $imagen; ?>
                                <p class="descripcion-completa" style="color: black;"><?= $descripcion; ?></p>
                
                                <div class="fecha-descarga-container">
                                    <p class="fecha"><?= date('d-m-Y H:i', strtotime($fecha)); ?></p>
                                    <?php if (!empty($adjunto)): ?>
                                        <div>
                                            <a href="data:application/pdf;base64,<?= $adjunto; ?>" download="<?= $titulo; ?>" class="btn btn-primary">Descargar adjunto</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .tm-section-wrap -->
                </div> <!-- .tm-main -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        
        
        <script src="js/perfil.js"></script>
        <script src="js/index.js"></script>
        <script src="js/navbar.js"></script>
        <script src="js/notificaciones.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    </body>
    </html>
<?php
}
?>

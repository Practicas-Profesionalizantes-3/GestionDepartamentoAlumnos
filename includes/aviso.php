<?php
$aviso_id = isset($_POST['id']) ? intval($_POST['id']) : null;

if ($aviso_id) {
    // Llamar a la API para obtener los datos del aviso
    $api_url = 'http://localhost/api/api-Alumnos/cartelera.php?id_aviso=' . $aviso_id;
    $response = file_get_contents($api_url);
    $aviso_data = json_decode($response, true);

    // Verifica si la respuesta fue exitosa y extrae los datos
    if ($aviso_data && $aviso_data['success'] === true) {
        // Convertir el JSON en la clave "data" a un array
        $data = $aviso_data['data'];

        // Verifica si se obtuvieron datos
        if (!empty($data)) {
            // Asignar los datos del aviso a las variables
            $titulo = htmlspecialchars($data[0]['titulo']); // Obtener el primer aviso
            $descripcion = htmlspecialchars($data[0]['descripcion']);
            $imagen = !empty($data[0]['imagen']) ? "data:image/jpeg;base64," . $data[0]['imagen'] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
            $fecha = htmlspecialchars($data[0]['fecha_publicacion']);
            $adjunto = isset($data[0]['adjunto']) ? $data[0]['adjunto'] : '';
        } else {
            // Aviso no encontrado
            $titulo = 'Aviso no encontrado';
            $descripcion = 'El aviso solicitado no existe o ha sido eliminado.';
            $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
            $fecha = '';
            $adjunto = '';
        }
    } else {
        // Error al obtener el aviso
        $titulo = 'Error al obtener aviso';
        $descripcion = 'No se pudo obtener el aviso. Inténtelo más tarde.';
        $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
        $fecha = '';
        $adjunto = '';
    }
} else {
    // ID del aviso no especificado
    $titulo = 'ID de aviso no especificado';
    $descripcion = 'No se ha proporcionado un ID de aviso válido.';
    $imagen = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s";
    $fecha = '';
    $adjunto = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
</head>
<body>
    <!-- Include Navbar -->
    <?php include("navbar.php");?>

    <div class="container mt-5">
        <div class="aviso-completo bg-light">
            <a href="javascript:void(0);" onclick="window.history.back();" class="volver">&times;</a>

            <h1 class="mb-3 text-center" style="color: black;"><?= $titulo; ?></h1>
            <img src="<?= $imagen; ?>" alt="<?= $titulo; ?>" class="img-aviso">
            <p class="descripcion-completa" style="color: black;"><?= $descripcion; ?></p>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5Pil2tXdHhjTvQ9lQS6yIiwnyF3vухQ9Etqkibi1DwYLPSAOxocnipl" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0J9d9n00bu9XR4GQ6fhY7xQpfPtcp7tF" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
</html>

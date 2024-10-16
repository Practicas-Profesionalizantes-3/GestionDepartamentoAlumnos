<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Inicializamos la variable de datos en caso de que no haya respuesta válida de la API
$data = [];

// Obtener los datos de la API
$response = @file_get_contents($api_url_tramites); // Usar @ para suprimir errores de advertencia

// Verificamos si la respuesta no es falsa (indica error en la conexión o fallo en la API)
if ($response !== false) {
    // Intentamos decodificar el JSON
    $tramites = json_decode($response, true);

$items_per_page = 4; // Número de filas por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual
$offset = ($page - 1) * $items_per_page; // Desplazamiento

// Obtener el total de tramites
$total_tramites = count($data);

// Calcular el total de páginas
$total_pages = ceil($total_tramites / $items_per_page);

// Obtener los tramites para la página actual
$current_page_tramites = array_slice($data, $offset, $items_per_page);
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SwettAlert -->
</head>

<body>
    <!-- Include del Navbar -->
    <?php include("../includes/navbar.php"); ?>

    <div class="mb-5 mt-3">
        <h1 class="tm-text-primary">Mis tramites</h1>
    </div>

    <div class="listadoAvisos">
        <a type="button" class="btn btn-primary btn-volver" href="index.php" role="button">Volver</a>
    </div>

    <div class="tm-section-wrap">
        <div class="row justify-content-center">
            <?php foreach ($current_page_tramites as $datos) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 container-mis-tramites">
                    <h2 class="titulo"><?php echo $datos['tipo_tramite']; ?></h2>
                    <p class="subtitle"><?php echo $datos['descripcion']; ?></p>
                    <div class="actions">
                        <label class="responsable">Responsable: <?php echo $datos['responsable']; ?></label>
                    </div>
                    <div class="info">
                        <label class="estado"><?php echo $datos['estado_tramite']; ?></label>
                        <label class="estado"><?php echo $datos['fecha_creacion']; ?></label>
                    </div>
                    <div class="text-center mt-auto"> <!-- Cambié mt-2 a mt-auto -->
                        <a href="detalle_tramite.php?id=<?php echo $datos['id_tramite']; ?>" class="btn btn-info">Ver completo</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Paginación -->
    <nav>
        <ul class="pagination justify-content-center mt-3">
            <?php if ($page > 1) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $total_pages) : ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

    <script>
        function verTramite(datos) {
            // Almacenar los datos del trámite en sessionStorage
            sessionStorage.setItem('tramiteDetalle', JSON.stringify(datos));
            // Redirigir a la página de detalle
            window.location.href = 'detalle_tramite.php';
        }
    </script>
    
    <script src="js/validar.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/index.js"></script>
    <script src="js/delete.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
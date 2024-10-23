<?php
session_start();

// URL de la API para obtener los tipos de trámites
$api_url_tramites = 'http://localhost/api/api-Alumnos/tramites.php';

// Inicializar la variable de tramites
$data = [];

// Obtener los datos de la API
$response = @file_get_contents($api_url_tramites); // Añadimos @ para evitar warnings si hay fallo

// Verificar si la respuesta es válida
if ($response !== false) {
    $tramites = json_decode($response, true);

    // Verificar si el JSON se decodificó correctamente y es un array
    if (json_last_error() === JSON_ERROR_NONE && is_array($tramites)) {
        $data = $tramites;
    }
}
// Función para generar el HTML del trámite
function generar_tramite_html($datos) {
    // Verificar si todas las claves necesarias están presentes
    if (!isset($datos['id_tramite'], $datos['tipo_tramite'], $datos['descripcion'], $datos['estado_tramite'], $datos['responsable'], $datos['nombre'], $datos['apellido'], $datos['fecha_creacion'])) {
        return "<p>Faltan datos en el trámite.</p>";
    }

    // Clase de color basada en el estado del trámite
    $clase_estado = strtolower(str_replace(' ', '-', $datos['estado_tramite'])); // Reemplazar espacios por guiones

    return "
    <div class='container_tramites_dpto {$clase_estado}' draggable='true' ondragstart='drag(event)' id='tramite-{$datos['id_tramite']}'>
        <h4 class='titlulo_tramites_dpto'>{$datos['tipo_tramite']}</h4>
        <p class='subtitle_tramites_dpto'>{$datos['descripcion']}</p>
        <div class='actions-tramites_dpto'>
            <label class='responsable_tramites_dpto'>Responsable: {$datos['responsable']}</label>
        </div>
        <div class='d-flex justify-content-between'>
            <label class='estado_tramites_dpto'>Estado: {$datos['estado_tramite']}</label>
            <label class='avatar_dpto'>Usuario: {$datos['nombre']} {$datos['apellido']}</label>
        </div>
        <div class='d-flex justify-content-between'>
            <label class='comentarios'>Comentarios: {$datos['comentarios']}</label>
        </div>
        <div class='d-flex justify-content-between'>
            <p class='fecha_dpto'>" . date('d-m-Y H:i', strtotime($datos['fecha_creacion'])) . "</p>
        </div>
        <div class='d-flex justify-content-between align-items-center'>
            <div>
                <button class='btn btn-comentar' onclick='comentarTramite({$datos['id_tramite']}); return false;'>💬 Comentar</button>
            </div>
            <div>
                <button class='btn btn-secondary' onclick='imprimirTarjeta({$datos['id_tramite']})'>🖨️ Imprimir</button>
            </div>
        </div>
    </div>";
}

// Manejo de la paginación
$items_per_page = 100; // Número de filas por página
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
<html>
<head>
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

    <!-- Include Perfil -->
    <?php include("../includes/perfil.php");?>

    <div class="tm-section-wrap ">
        <!-- Include Navbar -->
        <?php include("../includes/navbar.php"); ?>

        <div class="mb-5 mt-3">
            <h1 class="tm-text-primary">Tramites</h1>
        </div>

        <div class="listadoAvisos">
            <a type="button" class="btn btn-primary btn-volver" href="index.php" role="button">Volver</a>
        </div>

        <div class="buscador">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <div class="input-group" style="max-width: 600px;">
                        <input class="form-control barra" type="text" id="search-input" name="search-input" placeholder="Buscar tramites por tipos de tramites, nombre o apellido del alumno">
                        <button type="submit" name="buscar" class="btn btn-primary btn-primary-buscar">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <?php
            if (isset($_POST['buscar'])) {
                $search_term = strtolower($_POST['search-input']); // Convertir el término de búsqueda a minúsculas
            
                // Filtrar los trámites que coincidan con el término de búsqueda en 'tipo_tramite', 'nombre' o 'apellido'
                $data = array_filter($data, function ($item) use ($search_term) {
                    // Convertir los textos a minúsculas para hacer la comparación
                    return strpos(strtolower($item['tipo_tramite']), $search_term) !== false ||
                        strpos(strtolower($item['nombre']), $search_term) !== false ||
                        strpos(strtolower($item['apellido']), $search_term) !== false;
                });
            }
            
            // Obtener los tramites para la página actual después de aplicar el filtro (si corresponde)
            $current_page_tramites = array_slice($data, $offset, $items_per_page);
            
        ?>
        <div class="row justify-content-center">
            <?php 
            $estados = ['Pendiente' => 'pendiente', 'En Proceso' => 'en-proceso', 'Completado' => 'terminado'];
            foreach ($estados as $estado => $id_columna) { 
                // Variable para verificar si hay trámites en el estado actual
                $hay_tramites = false; ?>
                <div class="col-lg-3 col-md-3 col-sm-12 div-estado" id="<?php echo htmlspecialchars($id_columna); ?>" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h2 class="estado-tramite"><?php echo htmlspecialchars($estado); ?></h2>
                    <?php 
                    // Verificar si existen trámites para el estado actual
                    if (is_array($current_page_tramites) && count($current_page_tramites) > 0) {
                        foreach ($current_page_tramites as $datos) {
                            // Verificamos que exista la clave 'estado_tramite' en $datos
                            if (isset($datos['estado_tramite']) && $datos['estado_tramite'] === $estado) {
                                echo generar_tramite_html($datos);
                                $hay_tramites = true; // Se encontró al menos un trámite
                            }
                        }
                    }
                    
                    // Mostrar el mensaje si no hay trámites
                    if (!$hay_tramites) {
                        echo "<p>No hay trámites ". strtolower($estado) . ".</p>";
                    }
                    ?>
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
    
    
    <script src="js/tramite_comentarios.js"></script>
    <script src="js/tramites_dpto.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/perfil.js"></script>
    <script src="js/validar-dpto.js"></script>
    <script src="js/delete.js"></script>
    <script src="js/imprimir.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5Pil2tXdHhjTvQ9lQS6yIiwnyF3vухQ9Etqkibi1DwYLPSAOxocnipl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0J9d9n00bu9XR4GQ6fhY7xQpfPtcp7tF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>


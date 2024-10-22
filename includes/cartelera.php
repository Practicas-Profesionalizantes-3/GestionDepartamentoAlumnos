<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

// Intentar obtener el contenido de la API
$response = @file_get_contents($api_url);

// Verificar si la respuesta es válida y se pudo decodificar correctamente
if ($response !== false) {
    $data = json_decode($response, true);

    // Verificar que la decodificación JSON fue exitosa y que la estructura contiene 'data'
    if (json_last_error() === JSON_ERROR_NONE && isset($data["data"])) {
        $avisos = $data["data"];
    } else {
        // Si hay un error en la decodificación o no existe 'data', inicializar $avisos como un arreglo vacío
        $avisos = [];
    }
} else {
    // Si no se pudo obtener la respuesta de la API, inicializar $avisos como un arreglo vacío
    $avisos = [];
}

$datos = $avisos;
$fecha_actual = date('Y-m-d');

// Filtrar los datos según la fecha de vencimiento y el estado
$datos_filtrados = array_filter($avisos, function ($item) use ($fecha_actual) {
    return ($item['fecha_vencimiento'] >= $fecha_actual) && ($item["estado"] != "Inactivo");
});

$datos = $datos_filtrados;

// Verificar si hay opciones en la sesión para limitar el número de avisos mostrados
if (isset($_SESSION['mostrar_opciones_cartelera'])) {
    $mostrar_opciones = $_SESSION['mostrar_opciones_cartelera'];
    if ($mostrar_opciones == "opciones1") {
        $datos_filtrados = array_slice($datos_filtrados, 0, 4);
        $datos = $datos_filtrados;
    }
}
?>

<section class="container-md">
    <?php
    if (isset($_SESSION['mostrar_opciones_cartelera'])) {
        $mostrar_opciones = $_SESSION['mostrar_opciones_cartelera'];
        if ($mostrar_opciones == "opciones1") {
    ?>
            <h2 class="tm-text-primary">Centro de Tecnológia e Innovación</h2>
            <hr class="mb-5">
    <?php
        }
    }
    ?>
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h2 class="mb-5"><span class="tm-text-primary">Cartelera de Alumnos - Noticias & Novedades</span></h2>
    </div>

    <div class="buscador">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="d-flex justify-content-center align-items-center mb-5">
                <div class="input-group" style="max-width: 600px;">
                    <input class="form-control barra" type="text" id="search-input" name="search-input" placeholder="Buscar anuncio por título o descripción...">
                    <button type="submit" name="buscar" class="btn btn-primary btn-primary-buscar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['buscar'])) {
        $search_term = strtolower($_POST['search-input']);

        $datos_filtrados = array_filter($datos, function ($item) use ($search_term) {
            return strpos(strtolower($item['titulo']), $search_term) !== false ||
                strpos(strtolower($item['descripcion']), $search_term) !== false;
        });

        $datos = $datos_filtrados;
    }
    ?>

    <div class="row justify-content-center">
        <?php if ($datos) : ?>
            <?php foreach ($datos as $index => $item) : ?>
                <div class="col-lg-4 tm-col-home mb-4" data-wow-delay="0.1s">
                    <div class="position-relative border-cartelera" id="cartelera-<?php echo $index; ?>">
                        <div class="img-cartelera mb-3">
                            <img class="img-cartelera-item" src="<?= $item["imagen"] != "" ? "data:image/jpeg;base64," . $item["imagen"] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s" ?>" />
                        </div>
                        <hr style="width: 50%;" class="d-flex m-auto">
                        <div class="img-container mt-3">
                            <div class="overlay">
                                <h5 class="mb-3 cartelera-titulo"><?php echo htmlspecialchars($item['titulo']); ?></h5>

                                <!-- Contenedor de descripción -->
                                <div class="descripcion-container">
                                    <p class="cartelera-desc text-truncate" id="desc-<?php echo $index; ?>">
                                        <?php
                                        echo htmlspecialchars(substr($item['descripcion'], 0, 45));
                                        if (strlen($item['descripcion']) > 45) echo "...";
                                        ?>
                                    </p>

                                    <!-- Contenedor para la descripción completa -->
                                    <p id="full-desc-<?php echo $index; ?>" style="display: none;">
                                        <?php echo htmlspecialchars($item['descripcion']); ?>
                                    </p>

                                    <!-- Mostrar el botón de descargar adjunto si existe -->
                                    <?php if (!empty($item["adjunto"])) : ?>
                                        <div class="descargar-adjunto" style="display: none;" id="descargar-adjunto-<?php echo $index; ?>">
                                            <a href="data:application/pdf;base64,<?= $item["adjunto"]; ?>" download="<?= htmlspecialchars($item["titulo"]); ?>">Descargar adjunto</a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Contenedor para los botones -->
                                <div class="botones-container">
                                    <?php if (strlen($item['descripcion']) > 100) : ?>
                                        <button class="btn btn-primary" onclick="toggleDescription(<?php echo $index; ?>)" id="toggle-btn-<?php echo $index; ?>">Ver Más</button>
                                    <?php endif; ?>
                                </div>

                                <!-- Contenedor para la fecha, ahora siempre visible -->
                                <div class="fecha-container">
                                    <p><?php echo date('d-m-Y H:i', strtotime($item['fecha_publicacion'])); ?></p>                               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
        function toggleDescription(index) {
            var card = document.getElementById('cartelera-' + index);
            var desc = document.getElementById('desc-' + index);
            var fullDesc = document.getElementById('full-desc-' + index);
            var btn = document.getElementById('toggle-btn-' + index);
            var descargarAdjunto = document.getElementById('descargar-adjunto-' + index);
            var imgContainer = card.querySelector('.img-container'); // Find the img-container element

            if (card.classList.contains('expanded')) {
                card.classList.remove('expanded');
                imgContainer.classList.remove('expanded'); // Remove expanded class from img-container
                fullDesc.style.display = 'none';
                desc.style.display = 'block';
                btn.innerText = 'Ver Más';
                descargarAdjunto.style.display = 'none';
            } else {
                card.classList.add('expanded');
                imgContainer.classList.add('expanded'); // Add expanded class to img-container
                fullDesc.style.display = 'block';
                desc.style.display = 'none';
                btn.innerText = 'Ver Menos';
                descargarAdjunto.style.display = 'block';
            }
        }
    </script>
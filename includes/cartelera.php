<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);
$avisos = json_decode($data["data"], true);
$datos = $avisos;
$fecha_actual = date('Y-m-d');
$datos_filtrados = array_filter($avisos, function ($item) use ($fecha_actual) {
    return ($item['fecha_vencimiento'] >= $fecha_actual) && ($item["estado"] != "Inactivo");
});

$datos = $datos_filtrados;
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
            $search_term = strtolower($_POST['search-input']); // Convertir el término de búsqueda a minúsculas
            
            $datos_filtrados = array_filter($datos, function ($item) use ($search_term) {
                // Convertir los textos de 'titulo' y 'descripcion' a minúsculas para hacer la comparación
                return strpos(strtolower($item['titulo']), $search_term) !== false || 
                    strpos(strtolower($item['descripcion']), $search_term) !== false;
            });
            
            $datos = $datos_filtrados;
        }
    ?>

 
    <div class="row">
        <?php if ($datos) : ?>
            <?php foreach ($datos as $item) : ?>
                <div class="col-lg-4 tm-col-home mb-4" data-wow-delay="0.1s">
                    <div class="position-relative border-cartelera">
                        <div class="img-cartelera mb-3">
                            <img class="img-cartelera-item" src="<?= $item["imagen"] != "" ? "data:image/jpeg;base64," . $item["imagen"] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s" ?>" />
                        </div>
                        <hr style="width: 50%;" class="d-flex m-auto">
                        <div class="img-container">
                            <div class="overlay">
                                <div>
                                    <h5 class="mb-3 cartelera-titulo"><?php echo htmlspecialchars($item['titulo']); ?></h5>
                                    <p class="cartelera-desc"><?php echo htmlspecialchars($item['descripcion']); ?></p>
                                    <div class="fecha-container">
                                        <p><?php echo htmlspecialchars($item['fecha_publicacion']) ?></p>
                                    </div>
                                    <div class="descargar-adjunto">
                                        <a href="data:application/pdf;base64,<?= $item["adjunto"]; ?>" download="<?= htmlspecialchars($item["titulo"]); ?>">Descargar adjunto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div> <!--Fin de cartelera.row-->
</section> <!--Fin de section-->
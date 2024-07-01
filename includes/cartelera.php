<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);
$datos = $data;
$fecha_actual = date('Y-m-d');
$datos_filtrados = array_filter($data, function ($item) use ($fecha_actual) {
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

    <div class="row">
        <?php if ($datos) : ?>
            <?php foreach ($datos as $item) : ?>
                <div class="col-lg-6 tm-col-home mb-4 shadow" data-wow-delay="0.1s">
                    <div class="position-relative">
                        <div class="img-cartelera">
                            <img class="img-cartelera-item" src="<?= $item["imagen"] != "" ? "data:image/jpeg;base64," . $item["imagen"] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s" ?>" />
                        </div>
                        <div class="img-container">
                            <div class="overlay">
                                <div>
                                    <h5 class="mb-3 cartelera-titulo"><?php echo htmlspecialchars($item['titulo']); ?></h5>
                                    <p class="cartelera-desc"><?php echo htmlspecialchars($item['descripcion']); ?></p>
                                    <div class="fecha-container">
                                        <p><?php echo htmlspecialchars($item['fecha_publicacion']) . "/" . htmlspecialchars($item['fecha_vencimiento']); ?></p>
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
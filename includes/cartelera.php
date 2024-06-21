<?php
$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);
$datos = $data;
if (isset($_SESSION['mostrar_opciones_cartelera'])) {
    $mostrar_opciones = $_SESSION['mostrar_opciones_cartelera'];
    if ($mostrar_opciones == "opciones1") {

        $fecha_actual = date('Y-m-d');
        $datos_filtrados = array_filter($data, function ($item) use ($fecha_actual) {
            return isset($item['fecha_vencimiento']) && $item['fecha_vencimiento'] >= $fecha_actual;
        });

        $datos_filtrados = array_slice($datos_filtrados, 0, 4);
        $datos = $datos_filtrados;
    }
}


?>

<link rel="stylesheet" href="includes/style.css">
<section id="home" class="tm-section">
    <?php
    if (isset($_SESSION['mostrar_opciones_cartelera'])) {
        $mostrar_opciones = $_SESSION['mostrar_opciones_cartelera'];
        if ($mostrar_opciones == "opciones1") {
    ?>
            <h2 class="tm-text-primary" style="text-align: center;">Centro de Tecnológia e Innovación</h2>
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
                    <div class="tm-text-container">
                        <div class="position-relative">
                            <div class="img-container">
                                <div class="overlay">
                                    <div class="mt-2">
                                        <h5 class="mb-3" style="font-size: 40px;"><?php echo htmlspecialchars($item['titulo']); ?></h5>

                                        <p style="font-size: 25px;"><?php echo htmlspecialchars($item['descripcion']); ?></p>
                                        <div class="fecha-container">
                                            <p><?php echo htmlspecialchars($item['fecha_publicacion']); ?></p>
                                        </div>
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
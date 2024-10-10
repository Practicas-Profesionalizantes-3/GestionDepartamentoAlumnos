<?php
session_start();

if (isset($_GET['id'])) {
    $id_tramite_tipo = htmlspecialchars($_GET['id']);

    $apiUrlTipo = 'http://localhost/api/api-Alumnos/tramites_tipo.php';
    $response = file_get_contents($apiUrlTipo);
    $tiposTramites = json_decode($response, true);

    $tipoTramite = null;
    $descripcion = null;

    foreach ($tiposTramites as $tipo) {
        if ($tipo['id_tramite_tipo'] == $id_tramite_tipo) {
            $tipoTramite = $tipo;
            $descripcion = $tipo['descripcion'];
            break;
        }
    }
} else {
    echo 'Tipo de trámite no encontrado.';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Trámite</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/templatemo-upright.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include('../../includes/navbar.php'); ?>
            <div class="tm-main">
                <div class="tm-section-wrap mt-3 border-dark">
                    <div class="text-center mb-4">
                        <h1>Formulario para <?php echo $descripcion ?></h1>
                    </div>
                    <form class="container mt-5" id="formulario">
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Seleccione su Carrera:</label>
                            <select class="form-control" name="carrera" id="carrera">
                                <option value="1" selected>Ingenieria Informatica</option>
                                <option value="1">Medicina</option>
                                <option value="2">Derecho</option>
                                <option value="2">Administracion de Empresas</option>
                                <option value="2">Tecnicatura en Radiologia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="materia" class="form-label">Materia:</label>
                            <select class="form-control" name="materia" id="materia">
                                <option value="1" selected></option>
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="turno" class="form-label">Seleccione su Turno:</label>
                            <select class="form-control" name="turno" id="turno">
                                <option value="1" selected>Turno Mañana</option>
                                <option value="1">Turno Tarde</option>
                                <option value="2">Turno Noche</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_examen" class="form-label">Fecha de Examen:</label>
                            <input type="date" class="form-control" name="fecha_examen" id="fecha_examen" aria-describedby="helpId" placeholder="Fecha de examen" required value="<?php $hoy = date("Y-m-d");
                                                                                                                                                                                    echo $hoy; ?>">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success" id="enviar-formulario">Enviar</button>

                            <a href="../index.php" class="btn btn-info">Cancelar</a>
                        </div>
                        <input type="text" readonly hidden value="6" id="id_tramite_tipo" />
                    </form>
                </div> <!-- .tm-section-wrap -->
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <div style="margin-top: 225px;">
        <?php include('../../includes/footer.php'); ?>
    </div>

    <script src="../../js/index.js"></script>
    <script src="../../js/navbar.js"></script>
    <script src="../js/create.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
</body>

</html>
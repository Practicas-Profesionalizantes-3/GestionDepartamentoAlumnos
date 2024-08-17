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
}else{
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
                            <label for="nombre" class="form-label">Nombre y Apellido:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI:</label>
                            <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" placeholder="DNI">
                        </div>
                        <div class="mb-3">
                            <label for="carrera" class="form-label">Seleccione su Carrera:</label>
                            <select class="form-control" name="carrera" id="carrera">
                            <option value="1">- -</option>
                            <option value="1">Ingenieria Informatica</option>
                            <option value="1">Medicina</option>
                            <option value="2">Derecho</option>
                            <option value="2">Administracion de Empresas</option>
                            <option value="2">Tecnicatura en Radiologia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="turno" class="form-label">Seleccione su Turno:</label>
                            <select class="form-control" name="turno" id="turno">
                            <option value="1">- -</option>
                            <option value="1">Turno Mañana</option>
                            <option value="1">Turno Tarde</option>
                            <option value="2">Turno Noche</option>
                            </select>
                        </div> <div class="mb-3">
                            <label for="email" class="form-label">Ingrese el mail de su cuenta Office 365:</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_solicitud" class="form-label">Fecha de Solicitud:</label>
                            <input type="date" class="form-control" name="fecha_solicitud" id="fecha_solicitud" aria-describedby="helpId" placeholder="Fecha de solicitud" required value="<?php $hoy = date("Y-m-d"); echo $hoy; ?>">
                        </div>
                        <div class="text-center">
                             <a type="submit" class="btn btn-success" id="enviar-formulario" href="../index.php" role="button">Enviar</a>
                            
                             <button type="submit" class="btn btn-info" onclick="location.href='../index.php'">Cancelar</button>
                        </div>
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
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>
</html>

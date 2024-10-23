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
                            <label for="carrera" class="form-label">Carrera:</label>
                            <select class="form-control" name="carrera" id="carrera">
                                <option value="1" id="carreraTexto"></option>
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
                            <label for="materia" class="form-label">Materia:</label>
                            <select class="form-control" name="materia" id="materia">
                                <option value="1" selected></option>
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Adjuntar archivo (jpeg/png):</label>
                            <input type="file" accept="image/jpeg, image/png" class="form-control" name="adjunto" id="adjunto" aria-describedby="helpId" placeholder="Adjunto">
                            <img id="blah" src="#" alt="your image" style="display: none;" height="150" width="150"/>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success" id="enviar-formulario">Enviar</button>

                            <a href="../index.php" class="btn btn-info">Cancelar</a>
                        </div>
                        <input type="text" readonly hidden value="2" id="id_tramite_tipo" />
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
    <script src="../js/materias.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SwettAlert -->
    <script>
        // Captura los elementos usando jQuery correctamente
        var imgInp = document.getElementById("adjunto");
        var blah = document.getElementById("blah");

        // Escucha el cambio del input de archivo
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                // Cambia la fuente de la imagen y asegúrate de que sea visible
                blah.src = URL.createObjectURL(file);
                blah.style.display = "block"; // Usa .style para manipular CSS en JS puro
            }
        }
    </script>
</body>

</html>
<?php
$combo_aviso_tipo_url = "http://localhost/api/api-Alumnos/aviso_tipo.php";
$response_aviso_tipos = file_get_contents($combo_aviso_tipo_url);
$data_aviso_tipos = json_decode($response_aviso_tipos, true);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/bootstrap.min.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/templatemo-upright.css">
    <link rel="stylesheet" href="/gestiondepartamentoalumnos/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> <!-- Toastify CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> <!-- Toastify JS-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!-- SwettAlert -->
</head>

<body>
    <script>
        var loggedIn = sessionStorage.getItem('loggedIn');
        if (!loggedIn) {
            window.location.href = '../index.php'; // Redirigir al index si no está logueado
        } else {
            var usuario = JSON.parse(sessionStorage.getItem("usuario"));
            console.log(usuario);
            if (usuario.id_usuario_estado != 1) {
                window.location.href = '../index.php';
            }
        }

        $(document).ready(function() {
            var usuario = JSON.parse(sessionStorage.getItem("usuario"));
            $("#nombre").val(usuario.nombre + " " + usuario.apellido); // Establecer el valor del campo id_usuario
            $("#id_usuario").val(usuario.id_usuario);
        });
    </script>

    <?php
    include("../includes/navbar.php");
    ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Agregar nuevo anuncio
            </div>
            <div class="card-body">
                <form id="formulario">
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Usuario" readonly required>
                        <input type="text" class="form-control" name="id_usuario" id="id_usuario" aria-describedby="helpId" placeholder="Usuario" readonly hidden>
                    </div>
                    <div class="mb-3">
                        <label for="id_aviso_tipo" class="form-label">Tipo de aviso:</label>
                        <select class="form-control" name="id_aviso_tipo" id="id_aviso_tipo">
                            <?php foreach ($data_aviso_tipos as $aviso_tipo): ?>
                                <option value="<?php echo $aviso_tipo["id_aviso_tipo"]; ?>">
                                    <?php echo $aviso_tipo["descripcion"]; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                        <input type="date" class="form-control" name="fecha_vencimiento" id="fecha_vencimiento" aria-describedby="helpId" placeholder="Fecha de Vencimiento" required value="<?php $hoy = date("Y-m-d", strtotime("+1 day")); echo $hoy; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="adjunto" class="form-label">Adjunto:</label>
                        <input type="file" accept=".pdf" class="form-control" name="adjunto" id="adjunto" aria-describedby="helpId" placeholder="Adjunto">
                    </div>
                    <div class="mb-3">
                        <label for="fijado" class="form-label">Fijado:</label>
                        <select class="form-control" name="fijado" id="fijado">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <input type="file" accept="image/jpeg, image/png" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
                    </div>
                    <div class="mb-3">
                        <label for="id_aviso_estado" class="form-label">Estado del aviso:</label>
                        <select class="form-control" name="id_aviso_estado" id="id_aviso_estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success mr-2" id="agregar-anuncio">Agregar</button>
                        <button type="button" class="btn btn-info  ml-2" id="cancelar-anuncio">Cancelar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>

    <script src="js/create.js"></script>
    <script src="../js/navbar.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

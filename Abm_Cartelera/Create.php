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
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>

</head>

<body>
    <?php include("../includes/navbar.php"); ?>

    <div class="container">
        <div class="card">
            <div class="card-header">Editar anuncio</div>
            <div class="card-body">
                <?php if ($aviso) { ?>
                <form id="formulario">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id_aviso" value="<?php echo $aviso['id_aviso']; ?>">
                    <div class="mb-3">
                        <label for="id_aviso" class="form-label">Id aviso:</label>
                        <input readonly type="text" class="form-control" value="<?php echo $aviso['id_aviso']; ?>" name="id_aviso" id="id_aviso">
                    </div>
                    <div class="mb-3">
                        <label for="id_aviso_tipo" class="form-label">Tipo de aviso:</label>
                        <select class="form-control" name="id_aviso_tipo" id="id_aviso_tipo">
                            <?php foreach ($data_aviso_tipos as $aviso_tipo) { ?>
                            <option value="<?php echo $aviso_tipo["id_aviso_tipo"]; ?>" <?= $aviso_tipo["descripcion"] == $aviso["aviso_tipo"] ? 'selected="selected"' : ''; ?>>
                                <?php echo $aviso_tipo["descripcion"]; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_usuario" class="form-label">Usuario:</label>
                        <input type="text" class="form-control" value="<?php echo $aviso['usuario']; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo:</label>
                        <input type="text" class="form-control" value="<?php echo $aviso['titulo']; ?>" name="titulo" id="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" class="form-control" value="<?php echo $aviso['descripcion']; ?>" name="descripcion" id="descripcion">
                    </div>
                    <div class="mb-3"> 
                        <label for="fecha_publicacion" class="form-label">Fecha de publicación:</label>
                        <input type="date" class="form-control" value="<?php echo $aviso['fecha_publicacion']; ?>" name="fecha_publicacion" id="fecha_publicacion">
                        <div id="fechaError" class="text-danger" style="display:none;">La nueva fecha de publicación no debe ser anterior a la fecha actual.</div>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de vencimiento:</label>
                        <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($aviso['fecha_vencimiento'])); ?>" name="fecha_vencimiento" id="fecha_vencimiento">
                        <div id="fechaVencimientoError" class="text-danger" style="display:none;">La fecha de vencimiento no puede ser anterior a la fecha de publicación.</div>
                    </div>
                    <div class="mb-3">    
                        <label for="adjunto" class="form-label">Adjunto:</label>
                        <div class="file-containerX">
                            <input type="file" accept=".pdf" class="form-control" name="adjunto" id="adjunto" data-existing="<?= $aviso['adjunto'] ?? ''; ?>">
                            <button type="button" id="eliminar-pdf" class="btn-iconX">
                                <i class="bi bi-x"></i>
                            </button>
                            <?php if ($aviso["adjunto"] != "") { ?>
                                <a href="data:application/pdf;base64,<?= $aviso["adjunto"]; ?>" download="<?= htmlspecialchars($aviso["titulo"]); ?>" class="download-link">Descargar adjunto</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fijado" class="form-label">Fijado:</label>
                        <select class="form-control" name="fijado" id="fijado">
                            <option value="0" <?= $aviso["fijado"] == "0" ? 'selected="selected"' : "" ?>>No</option>
                            <option value="1" <?= $aviso["fijado"] == "1" ? 'selected="selected"' : "" ?>>Si</option>
                        </select>
                    </div>          
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen:</label>
                        <div class="file-containerX">
                            <input type="file" accept="image/jpeg, image/png" class="form-control" name="imagen" id="imagen" data-existing="<?= $aviso['imagen'] ?? ''; ?>">
                            <button type="button" id="eliminar-imagen" class="btn-iconX">
                                <i class="bi bi-x"></i>
                            </button>
                            <?php if ($aviso["imagen"] != "") { ?>
                                <a href="data:image/jpeg;base64,<?= $aviso["imagen"]; ?>" download="<?= htmlspecialchars($aviso["titulo"]) . '.jpg'; ?>">Descargar imagen</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <?php } else { ?>
                <div class="alert alert-danger">Aviso no encontrado.</div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#fecha_publicacion').on('input', function() {
                var selectedDate = $(this).val();
                var hoy = new Date().toISOString().split('T')[0];
                
                if (selectedDate < hoy) {
                    $('#fechaError').show();
                    $(this).val(<?php echo json_encode($aviso['fecha_publicacion']); ?>);
                    
                    setTimeout(function() {
                        $('#fechaError').hide();
                    }, 2000);
                } else {
                    $('#fechaError').hide();
                }
            });

            $('#fecha_vencimiento').on('change', function() {
                var fechaPublicacion = $('#fecha_publicacion').val() + "T00:00";
                var fechaVencimiento = $(this).val();

                if (fechaVencimiento < fechaPublicacion) {
                    $('#fechaVencimientoError').show();
                    $(this).val(fechaPublicacion);
                    
                    setTimeout(function() {
                        $('#fechaVencimientoError').hide();
                    }, 2000);
                } else {
                    $('#fechaVencimientoError').hide();
                }
            });
        });
    </script>
</body>

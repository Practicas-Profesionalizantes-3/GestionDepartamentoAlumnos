<?php

$api_url = 'http://localhost/api/api-Alumnos/cartelera.php';

$response = file_get_contents($api_url);
$data = json_decode($response, true);

$avisos = $data;
echo "<script>console.log(" . $response . ")</script>";
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../slick/slick.min.css">
    <link rel="stylesheet" href="../slick/slick-theme.css">
    <link rel="stylesheet" href="../css/templatemo-upright.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/delete.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        var loggedIn = sessionStorage.getItem('loggedIn');
        if (!loggedIn) {
            window.location.href = '../index.php'; // Redirigir al index si no está logueado
        }
        else{
            var usuario = JSON.parse(sessionStorage.getItem("usuario"));
            console.log(usuario)
            if(usuario.id_usuario_estado != 1){
                window.location.href = '../index.php';
            }
        }
    </script>
    <div class="card container">
        <div class="card-header">
            <a name="" id="" class="btn btn-primary" href="Create.php" role="button">Agrega anuncio</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tipo de aviso</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fecha de publicacion</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Adjunto</th>
                            <th scope="col">Fijado</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Estado del aviso</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($avisos as $datos) { ?>
                            <tr>
                                <td><?php echo $datos['id_aviso']; ?></td>
                                <td><?php echo $datos['aviso_tipo']; ?></td>
                                <td><?php echo $datos['usuario']; ?></td>
                                <td><?php echo $datos['titulo']; ?></td>
                                <td><?php echo $datos['descripcion']; ?></td>
                                <td><?php echo $datos['fecha_publicacion']; ?></td>
                                <td><?php echo $datos['fecha_vencimiento']; ?></td>
                                <td><?php echo $datos['adjunto']; ?></td>
                                <td><?php echo $datos['fijado']; ?></td>
                                <td><img width="70" src="<?= $datos["ubicacion_imagen"] != "" ? $datos["ubicacion_imagen"] : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQheiic81_IfFML2GH1T9qtee4KTajErPLBmg&s" ?>" /></td>
                                <td><?php echo $datos['estado']; ?></td>
                                <td>
                                    <a name="" id="" class="btn btn-info" href="Update.php?id_aviso=<?php echo $datos['id_aviso']; ?>" role="button">Editar</a>

                                    <a name="" id="" class="btn btn-danger" onclick="eliminarAviso(<?= $datos['id_aviso']; ?>)" role="button">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
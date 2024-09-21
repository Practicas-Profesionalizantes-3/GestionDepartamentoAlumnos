<?php
    session_start();
?>

<!DOCTYPE html>
<br lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Tecnologico Beltran</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-upright.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> <!----===== Boxicons CSS ===== -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> <!--<title>Dashboard Sidebar Menu</title>-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Include Perfil -->
    <?php
    include("includes/perfil.php");
    include("includes/notificaciones.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Include Navbar -->
            <?php
            include("includes/navbar.php");
            ?>
            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <h2 class="tm-text-primary">Asistente Virtual</h2>
                    <hr class="mb-5">
                    <div class="chatbot-padre">
                        <div class="chatbot-container">
                            <div class="chatbot-header">
                                <h2>Chatbot</h2>
                            </div>
                            <div class="chatbot-body" id="chatbot-body">
                                <div class="chatbot-message bot">
                                    <p>Hola, en este momento estoy en mantenimiento. Por favor, vuelve más tarde.</p>
                                </div>
                            </div>
                            <div class="chatbot-footer">
                                <input type="text" id="user-input" placeholder="Escribe un mensaje...">
                                <button id="send-button"><i class="fa-regular fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- .tm-section-wrap -->
            </div> <!-- .tm-main -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <!-- Include Footer -->
    <?php
        include("includes/footer.php")
    ?>

    <script src="js/perfil.js"></script>
    <script src="js/index.js"></script>
    <script src="js/chatbot.js"></script>
    <script src="https://kit.fontawesome.com/9de136d298.js" crossorigin="anonymous"></script>
</body>

</html>


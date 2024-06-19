<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    // Verificar sesión con JavaScript
    var loggedIn = sessionStorage.getItem('loggedIn');

    $(document).ready(function() {
        if (loggedIn !== 'true') {
            // Si no está logueado, mostrar botón de inicio de sesión
            $('#texto').text('Campus');
            $('#loginButton').attr('href', 'login/index.html');
        } else {
            // Si está logueado, mostrar botón de cerrar sesión
            $('#texto').text('Cerrar sesión');
            $('#loginButton').on('click', function(e) {

                // Destruir la sesión
                sessionStorage.removeItem('loggedIn');
                sessionStorage.removeItem('usuario');

                // Redirigir al usuario a la página de inicio de sesión
                window.location.href = 'login/index.html';
            });
        }
    });
</script>
<!-- Leftside bar -->
<div id="tm-sidebar" class="tm-sidebar">
    <nav class="tm-nav">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <!-- LOGO -->
            <a href="#home">
                <div class="img-logo">
                    <img src="img/logo.png" alt="">
                    <img src="img/logo2.png" alt="" style="float: right;" class="img-aparecer">
                </div>
            </a>
            <!-- INICIO -->
            <div class="nav-item" id="nav-item">
                <a href="index.php" class="nav-link" id="inicio">
                    <div class="triangle-right"></div>
                    <i class="fas fa-home nav-icon"></i>
                    <span class="text-nav" id="text-inicio">Inicio</span>
                </a>
            </div>
            <!-- CALENDARIO -->
            <div class="nav-item dropdown">
                <a href="#calendario" class="nav-link" id="calendario">
                    <div class="triangle-right"></div>
                    <i class="fas fa-images nav-icon"></i>
                    <span class="text-nav" id="text-calendario">Calendario</span>
                </a>
            </div>
            <!-- CARTELERA -->
            <div class="nav-item dropdown">
                <a href="cartelera.php" class="nav-link" id="cartelera">
                    <div class="triangle-right"></div>
                    <i class="fa fa-calendar-check-o nav-icon" aria-hidden="true"></i>
                    <span class="text-nav" id="text-cartelera">Cartelera</span>
                </a>
            </div>
            <!-- CARRERAS -->
            <div class="nav-item">
                <a href="carreras.html" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fas fa-user-friends nav-icon"></i>
                    <span class="text-nav">Carreras</span>
                </a>
            </div>
            <!-- TRAMITES -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fa-solid fa-receipt nav-icon"></i>
                    <span class="text-nav">Tramites</span>
                </a>
            </div>
            <!-- NOTIFICACIONES -->
            <div class="nav-item dropdown">
                <a href="#notificaciones" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fa-solid fa-bell nav-icon"></i>
                    <span class="text-nav">Notificaciones</span>
                </a>
            </div>
            <!-- CHAT -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fas fa-comments nav-icon"></i>
                    <span class="text-nav">Chat</span>
                </a>
            </div>
            <!-- CREAR ANUNCIO -->
            <div class="nav-item dropdown">
                <a href="Abm_Cartelera/index.php" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fa-solid fa-receipt nav-icon"></i>
                    <span class="text-nav">Crear anuncio</span>
                </a>
            </div>
            <!-- CONTACTO -->
            <div class="nav-item">
                <a href="#contact" class="nav-link">
                    <div class="triangle-right"></div>
                    <i class="fas fa-envelope nav-icon"></i>
                    <span class="text-nav">Contacto</span>
                </a>
            </div>
            <!-- CAMPUS VIRTUAL -->
            <div>
                <div class="nav-item">
                    <a id="loginButton" class="nav-link" style="cursor:pointer">
                        <div class="triangle-right"></div>
                        <i class="fa-solid fa-right-to-bracket nav-icon" style="color: #006699;"></i>
                        <span class="text-nav" id="texto" style="color: #006699;">Campus</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
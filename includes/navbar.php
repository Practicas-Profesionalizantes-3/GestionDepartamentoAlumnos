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
                <a href="nuevo_evento.html" class="nav-link">
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
                <?php
                if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
                ?>
                    <div class="nav-item">
                        <a href="login/index.html" class="nav-link">
                            <div class="triangle-right"></div>
                            <i class="fa-solid fa-right-to-bracket nav-icon"></i>
                            <span id="loginButton" class="text-nav">Campus</span>
                        </a>
                    </div>
                <?php
                } else {
                    session_destroy();
                ?>
                    <div class="nav-item">
                        <a href="login/index.html" class="nav-link">
                            <div class="triangle-right"></div>
                            <i class="fa-solid fa-right-to-bracket nav-icon"></i>
                            <span id="loginButton"  class="text-nav">Cerrar sesión</span>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>
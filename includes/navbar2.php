<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
    <!--<title>Dashboard Sidebar Menu</title>-->
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
                var usuario = JSON.parse(sessionStorage.getItem("usuario"));
                if (usuario.id_usuario_estado == 1) {
                    $("#crear_aviso").show();
                }
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
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="/web/img/ITB.png" alt="Logo ITB">
                </span>

                <div class="text logo-text">
                    <span class="name">Instituto</span>
                    <span class="name">Tecnologico</span>
                    <span class="name">Beltran</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <a href="index.php"; return false;>
                        <i class='icon fas fa-home nav-icon'></i>
                        <span class="text nav-text">Inicio</span>
                    </a>
                </li>
                <li class="search-box">
                    <a>
                        <i class='icon fas fa-calendar nav-icon'></i>
                        <span class="text nav-text">Calendario</span>
                    </a>
                </li>
                <li class="search-box">
                    <a href="cartelera.php">
                        <i class='bx bxs-news icon' style="font-size:100%"></i>
                        <span class="text nav-text" style="padding-left: 8%;">Cartelera</span>
                    </a>
                </li>
                <li class="search-box">
                    <a>
                        <i class='icon fas fa-user-friends nav-icon'></i>
                        <span class="text nav-text">Carreras</span>
                    </a>
                </li>
                <li class="search-box">
                    <a>
                        <i class='icon fas fa-envelope nav-icon'></i>
                        <span class="text nav-text">Tramites</span>
                    </a>
                </li>
                <li class="search-box">
                    <a>
                        <i class='icon fas fa-bell nav-icon'></i>
                        <span class="text nav-text">Notificaciones</span>
                    </a>
                </li>
                <li class="search-box">
                    <a>
                        <i class='icon fas fa-comments nav-icon'></i>
                        <span class="text nav-text">Chat</span>
                    </a>
                </li>
                <li class="search-box">
                    <a href="Abm_Cartelera/index.php">
                        <i class='bx bx-add-to-queue icon' style="font-size: 100%;"></i>
                        <span class="text nav-text" style="padding-left: 8%;">Crear anuncio</span>
                    </a>
                </li>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="login/index.html"id="loginButton" style="margin-top: -48px; cursor:pointer">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text" id="texto">Campus</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>
    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            //   modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })
        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })
        // modeSwitch.addEventListener("click", () => {
        //   body.classList.toggle("dark");
        //   if (body.classList.contains("dark")) {
        //     modeText.innerText = "Light mode";
        //   } else {
        //     modeText.innerText = "Dark mode";
        //   }
        // });
    </script>

</body>

</html>
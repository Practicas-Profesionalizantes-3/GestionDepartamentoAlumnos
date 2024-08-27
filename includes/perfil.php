<?php
// Suponiendo que ya tienes los datos del usuario en la sesión


if(isset($_SESSION['usuario'])) {
    $nombreUsuario = $_SESSION['usuario']['nombre'];
    $emailUsuario = $_SESSION['usuario']['email'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        /* Estilo básico del icono de perfil */
        .profile-icon {
            width: 50px;
            right: 0;
            height: 50px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            font-size: 24px;
            cursor: pointer;
            left: 400px;
        }

        /* Estilo del menú desplegable */
        .profile-dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
        }

        /* Estilo del contenido del menú */
        .profile-dropdown p {
            margin: 0;
            padding: 5px 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="profile-icon" onclick="toggleDropdown()">U</div>
    <div class="profile-dropdown" id="profileDropdown">
        <!-- Los datos del usuario se mostrarán aquí -->
        <p>Nombre: <?php echo $nombreUsuario; ?></p>
        <p>Email: <?php echo $emailUsuario; ?></p>
    </div>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        // Cierra el menú si se hace clic fuera de él
        window.onclick = function(event) {
            if (!event.target.matches('.profile-icon')) {
                var dropdowns = document.getElementsByClassName("profile-dropdown");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>
</html>

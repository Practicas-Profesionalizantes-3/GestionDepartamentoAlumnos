document.addEventListener("DOMContentLoaded", function() {
    // Selecciona todos los elementos con la clase 'nav-item'
    var navItems = document.querySelectorAll('.nav-item');

    // Agrega event listeners para cada item
    navItems.forEach(function(navItem) {
        navItem.addEventListener('mouseover', function() {
            // Muestra el texto cuando el mouse está sobre el item
            var textNav = navItem.querySelector('.text-nav');
            if (textNav) {
                textNav.style.opacity = '1';
            }
        });

        navItem.addEventListener('mouseout', function() {
            // Oculta el texto cuando el mouse sale del item
            var textNav = navItem.querySelector('.text-nav');
            if (textNav) {
                textNav.style.opacity = '0';
            }
        });
    });
});

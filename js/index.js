// Cambiar el tema de la pagina web
document.addEventListener("DOMContentLoaded", function() {
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const sidebar = document.querySelector('.sidebar');

        themeToggle.addEventListener('click', function() {
            body.classList.toggle('dark-theme');
            sidebar.classList.toggle('dark-theme');

            // Guardar la preferencia de tema en localStorage
            if (body.classList.contains('dark-theme')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });

        // Cargar la preferencia de tema desde localStorage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-theme');
            sidebar.classList.add('dark-theme');
        }
});

document.getElementById('toggleTheme').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    const isDarkMode = document.body.classList.contains('dark-mode');
    this.querySelector('.text.nav-text').textContent = isDarkMode ? 'Modo Claro' : 'Modo Oscuro';
});

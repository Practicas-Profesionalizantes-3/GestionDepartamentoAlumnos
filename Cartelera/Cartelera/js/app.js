document.addEventListener('DOMContentLoaded', function() {
    const navToggleAparecer = document.getElementById('nav-toggle-aparecer');
    const navToggleDesaparecer = document.getElementById('nav-toggle-desaparecer');
    const sideNav = document.getElementById('side-nav');
    const divNav = document.getElementById('nav-div');

    const isOpen = false;

    navToggleAparecer.addEventListener('click', function() {
        if (isOpen) {
            sideNav.style.left = '-250px';

        } else {
            sideNav.style.left = '0px';
            divNav.classList.add('tm-sidebar')
        }
        isOpen = !isOpen;
    });
    
    navToggleDesaparecer.addEventListener('click', function () {
        if (!isOpen) {
            sideNav.style.left = '-250px';
            divNav.classList.remove('tm-sidebar')
        } else {
            sideNav.style.left = '0px';

        }
        isOpen = !isOpen; 
    })
});

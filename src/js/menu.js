document.addEventListener('DOMContentLoaded', function() {

    eventListeners();


});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion .navegacion__contenedor');

    // Toggle the class 'mostrar' to show or hide the menu
    navegacion.classList.toggle('navegacion__contenedor--mostrar');
}
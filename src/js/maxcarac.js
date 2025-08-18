document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('mensaje');
    const contador = document.getElementById('mensaje-contador');
    const maxCaracteres = 300;

    // Inicializar contador al cargar la página
    contador.textContent = `${maxCaracteres - textarea.value.length} caracteres restantes`;

    // Evento input para actualizar el contador mientras escribe
    textarea.addEventListener('input', function() {
        const caracteresRestantes = maxCaracteres - textarea.value.length;
        contador.textContent = `${caracteresRestantes} caracteres restantes`;
    });
});
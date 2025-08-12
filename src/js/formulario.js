document.addEventListener("DOMContentLoaded", () => {
    const radioTelefono = document.getElementById("contactar-telefono");
    const radioEmail = document.getElementById("contactar-email");
    const campoTelefono = document.querySelector(".formulario__campo-telefono");
    const campoEmail = document.querySelector(".formulario__campo-email");

    function mostrarCampo() {
        if (radioTelefono.checked) {
            campoTelefono.style.display = "block";
            campoEmail.style.display = "none";
        } else if (radioEmail.checked) {
            campoTelefono.style.display = "none";
            campoEmail.style.display = "block";
        }
    }

    radioTelefono.addEventListener("change", mostrarCampo);
    radioEmail.addEventListener("change", mostrarCampo);
});
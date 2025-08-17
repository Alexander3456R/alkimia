window.addEventListener('load', () => {
    const splash = document.getElementById('splash-screen');
    if (!splash) return;

    tsParticles.load("tsparticles", {
        fullScreen: { enable: false },
        particles: {
            number: { value: 0 },
            color: { value: ["#ffffff", "#FFD700", "#FF69B4"] },
            shape: { type: "circle" },
            opacity: { value: 0.8, random: { enable: true, minimumValue: 0.3 }, animation: { enable: true, speed: 1, minimumValue: 0.3, sync: false } },
            size: { value: 3, random: { enable: true, minimumValue: 1 }, animation: { enable: true, speed: 3, minimumValue: 0.5, sync: false } },
            move: {
                enable: true,
                speed: 3,
                direction: "none",
                outModes: { default: "destroy" },
                random: true
            }
        },
        emitters: [
            {
                position: { x: 50, y: 50 },
                rate: { quantity: 4, delay: 0.05 },
                size: { width: 0, height: 0 },
            }
        ]
    }).then(container => {

        // Ocultar splash después de 3s
        setTimeout(() => {
            splash.classList.add('fade-out');

            // Detener partículas y destruir contenedor al mismo tiempo
            container.destroy();

            setTimeout(() => {
                splash.style.display = 'none';
            }, 500);
        }, 1800);
    });
});

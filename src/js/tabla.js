document.addEventListener('DOMContentLoaded', () => {
    const formularios = document.querySelectorAll('.eliminar-mensaje');

    formularios.forEach(form => {
        form.addEventListener('submit', async e => {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const formData = new FormData(form);

                    const respuesta = await fetch('/admin/mensajes/eliminar', {
                        method: 'POST',
                        body: formData
                    });

                    const resultado = await respuesta.json();

                    if (resultado.resultado) {
                        // Eliminar la fila
                        const fila = form.closest('tr');
                        fila.remove();

                        // Mostrar alerta de éxito
                        Swal.fire({
                            title: 'Eliminado',
                            text: 'El mensaje ha sido eliminado.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Verificar si no quedan mensajes
                        const filasRestantes = document.querySelectorAll('tbody tr').length;

                        if (filasRestantes === 0) {
                            // Esperar a que termine el SweetAlert antes de recargar
                            setTimeout(() => {
                                window.location.reload();
                            }, 1600);
                        }

                    } else {
                        Swal.fire(
                            'Error',
                            resultado.error || 'No se pudo eliminar',
                            'error'
                        );
                    }
                }
            });
        });
    });
});

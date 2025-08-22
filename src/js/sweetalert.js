document.addEventListener('DOMContentLoaded', () => {
    // ✅ ALERTA: FORMULARIOS DE ELIMINAR (productos, mensajes, etc.)
    const formulariosEliminar = document.querySelectorAll('.table__formulario');
    formulariosEliminar.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción lo eliminará definitivamente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form)
                    })
                    .then(res => res.json())
                    .then(data => {
                    if (data.resultado) {
                        Swal.fire('Eliminado!', 'Acción completada.', 'success').then(() => {
                            // 🔥 Recargar la página solo después de cerrar el SweetAlert
                            window.location.reload();
                        });
                    } else {
                        Swal.fire('Error', data.error || 'No se pudo eliminar.', 'error');
                    }
                })

                    .catch(() => Swal.fire('Error', 'Hubo un problema con la petición.', 'error'));
                }
            });
        });
    });

    // ✅ ALERTA: FORMULARIO DE CONTACTO (redirige al home)
    const formularioContacto = document.querySelector('#form-contacto');
    if(formularioContacto && formularioContacto.dataset.exito === "1") {
        Swal.fire({
            title: 'Mensaje enviado',
            text: 'Tu mensaje fue enviado correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.location.href = "/"; // 🔥 Home
        });
    }

    // ✅ ALERTA: CREAR INVENTARIO
const formularioInventarioCrear = document.querySelector('#form-inventario-crear');
if(formularioInventarioCrear && formularioInventarioCrear.dataset.exito === "1") {
    Swal.fire({
        title: 'Inventario añadido',
        text: 'El producto se guardó correctamente',
        icon: 'success',
        confirmButtonText: 'Aceptar'
    }).then(() => {
        window.location.href = "/admin/inventario"; // 🔥 redirigir al index inventario
    });
}


    // ✅ ALERTA: FORMULARIO DE INVENTARIO (editar/crear → redirige a index inventario)
    const formularioInventario = document.querySelector('#form-inventario');
    if(formularioInventario && formularioInventario.dataset.exito === "1") {
        Swal.fire({
            title: 'Guardado',
            text: 'Los cambios se guardaron correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        }).then(() => {
            window.location.href = "/admin/inventario"; // 🔥 index de inventario
        });
    }


    

    // ✅ ALERTA: Por URL (ejemplo ?exito=1 en index)
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('exito') === "1") {
        Swal.fire({
            title: 'Guardado',
            text: 'Los cambios se guardaron correctamente',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    }
});

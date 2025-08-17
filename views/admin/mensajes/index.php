<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<p class="nosotros__descripcion">Mensajes para Alkimia Fashion Boutique</p>

<div class="dashboard__contenedor">
    <?php if(!empty($mensajes)) { ?>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Apellido</th>
                        <th scope="col" class="table__th">Teléfono</th>
                        <th scope="col" class="table__th">Mensaje</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

               <tbody class="table__tbody">
                <?php foreach($mensajes as $mensaje) { ?>
                        <tr class="table__tr">
                            <td class="table__td"><?php echo $mensaje->nombre; ?></td>
                            <td class="table__td"><?php echo $mensaje->apellido; ?></td>
                            <td class="table__td"><?php echo $mensaje->telefono; ?></td>
                            <td class="table__td"><?php echo $mensaje->mensaje; ?></td>

                             <td class="table__td--acciones">
                                <form method="POST" action="/admin/mensajes/eliminar" class="table__formulario eliminar-mensaje">
                                    <input type="hidden" name="id" value="<?php echo $mensaje->id; ?>">
                                    <button class="table__accion table__accion--eliminar" type="submit">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>                
    <?php } else { ?>
        <p class="text-center">No Hay Registros Aún</p>

    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formulariosEliminar = document.querySelectorAll('.eliminar-mensaje');

    formulariosEliminar.forEach(formulario => {
        formulario.addEventListener('submit', function(e) {
            e.preventDefault(); // Evita el envío inmediato

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar formulario
                    fetch(formulario.action, {
                        method: 'POST',
                        body: new FormData(formulario)
                    }).then(response => {
                        // Mostrar mensaje de éxito
                        Swal.fire({
                            title: 'Mensaje eliminado',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            // Recargar página después de cerrar el alert
                            window.location.reload();
                        });
                    }).catch(error => {
                        console.error('Error al eliminar:', error);
                    });
                }
            });
        });
    });
});

</script>
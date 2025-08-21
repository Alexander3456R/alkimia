<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<p class="nosotros__descripcion">Mensajes para Alkimia Fashion Boutique</p>

<div class="dashboard__contenedor">
    <?php if(!empty($mensajes)) { ?>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Fecha</th>
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
                            <td class="table__td"><?php echo date('d/m/Y | H:i:s', strtotime($mensaje->fecha)); ?></td>
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
        <p class="text-center">No Hay Ningun Mensaje Aún</p>

    <?php } ?>

<?php 
    echo $paginacion;
?>
</div>


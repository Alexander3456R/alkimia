<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<p class="nosotros__descripcion">Registrados en Alkimia Fashion Boutique</p>

<div class="dashboard__contenedor">
    <?php if(!empty($usuarios)) { ?>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Apellido</th>
                        <th scope="col" class="table__th">Email</th>
                        <th scope="col" class="table__th">Fecha de Registro</th>
                    </tr>
                </thead>

               <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>
                        <tr class="table__tr">
                            <td class="table__td"><?php echo $usuario->nombre; ?></td>
                            <td class="table__td"><?php echo $usuario->apellido; ?></td>
                            <td class="table__td"><?php echo $usuario->email; ?></td>
                            <td class="table__td"><?php echo date('d/m/Y | H:i:s', strtotime($usuario->fecha_registro)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>                
    <?php } else { ?>
        <p class="text-center">No Hay Usuarios Registrados</p>

    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>
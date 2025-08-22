<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<p class="nosotros__descripcion">Inventario Alkimia Fashion Boutique</p>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/inventario/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Inventario
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($inventario)) { ?>
        <div class="table-wrapper">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Imagen</th>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Descripción</th>
                        <th scope="col" class="table__th">Precio</th>
                        <th scope="col" class="table__th">Disponibles</th>
                        <th scope="col" class="table__th">Acciones</th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($inventario as $producto) { ?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php if($producto->imagen) { ?>
                                    <picture>
                                        <source srcset="/build/img/catalogo/<?php echo $producto->imagen . ".avif"; ?>" type="image/avif">
                                        <source srcset="/build/img/catalogo/<?php echo $producto->imagen . ".webp"; ?>" type="image/webp">
                                        <img class="table__imagen" loading="lazy" width="200" height="300" src="/build/img/catalogo/<?php echo $producto->imagen . ".png"; ?>" alt="Imagen <?php echo $producto->nombre; ?>">
                                    </picture>

                                <?php } else { ?>
                                    <span>Sin imagen</span>
                                <?php } ?>
                            </td>

                            <td class="table__td">
                                <?php echo $producto->nombre; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $producto->descripcion; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $producto->precio; ?>
                            </td>

                            <td class="table__td">
                                <?php echo $producto->disponibles; ?>
                            </td>

                            <td class="table__td--acciones">
                                <a class="table__accion table__accion--editar" href="/admin/inventario/editar?id=<?php echo $producto->id; ?>">
                                    <i class="fa-solid fa-pencil"></i>
                                    Editar
                                </a>

                                <form method="POST" action="/admin/inventario/eliminar" class="table__formulario table__formulario--inventario">
                                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
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
        <p class="text-center">No Hay Inventario Aún</p>
    <?php } ?>
    <?php echo $paginacion; ?>
</div>

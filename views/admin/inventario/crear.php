<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/inventario">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    <?php 
        include_once __DIR__ . '/../../templates/alertas.php'
    ?>

    <form method="POST" id="form-inventario-crear" enctype="multipart/form-data" action="/admin/inventario/crear" class="formulario" data-exito="<?php echo $exito ? '1' : '0'; ?>">

         <div class="formulario__campo">
                    <label for="nombre" class="formulario__label">Producto</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Nombre del producto"
                        id="nombre"
                        name="nombre"
                        value="<?php echo $añadir_inventario->nombre; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="descripcion" class="formulario__label">Descripción</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Descripcion del producto"
                        id="descripcion"
                        name="descripcion"
                        value="<?php echo $añadir_inventario->descripcion; ?>"

                    
                    />
                </div>


                <div class="formulario__campo">
                    <label for="imagen" class="formulario__label">Imagen</label>
                    <input
                        type="file"
                        class="formulario__input"
                        id="imagen"
                        name="imagen"
                        accept="image/png, image/webp, image/jpeg"
                    />
                </div>


                <div class="formulario__campo">
                    <label for="precio" class="formulario__label">Precio</label>
                    <input
                        type="number"
                        step="0.01"
                        class="formulario__input"
                        placeholder="Precio del producto"
                        id="precio"
                        name="precio"
                        value="<?php echo $añadir_inventario->precio; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="disponibles" class="formulario__label">Disponibles</label>
                    <input
                        type="number"
                        class="formulario__input"
                        placeholder="Cantidad disponible"
                        id="disponibles"
                        name="disponibles"
                        value="<?php echo $añadir_inventario->disponibles; ?>"

                    
                    />
                </div>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Cambios">
    </form>
</div>
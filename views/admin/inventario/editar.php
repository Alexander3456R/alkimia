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

    <form method="POST" id="form-inventario" enctype="multipart/form-data" action="/admin/inventario/editar?id=<?php echo $inventario->id; ?>" class="formulario" data-exito="<?php echo $exito ? '1' : '0'; ?>">

         <div class="formulario__campo">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Tu Nombre"
                        id="nombre"
                        name="nombre"
                        value="<?php echo $inventario->nombre; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="descripcion" class="formulario__label">Descripción</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Tu descripcion"
                        id="descripcion"
                        name="descripcion"
                        value="<?php echo $inventario->descripcion; ?>"

                    
                    />
                </div>
                <div class="formulario__campo">
                    <label for="imagen" class="formulario__label">Imagen</label>
                    <?php if(!empty($inventario->imagen)): ?>
                        <picture>
                            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.webp" type="image/webp">
                            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.avif" type="image/avif">
                            <img 
                                src="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.png" 
                                alt="Imagen <?php echo htmlspecialchars($inventario->nombre); ?>" 
                                style="max-width:150px; border-radius:8px; margin-top:10px;">
                        </picture>
                        <?php endif; ?>
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
                        value="<?php echo $inventario->precio; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="disponibles" class="formulario__label">Disponibles</label>
                    <input
                        type="number"
                        class="formulario__input"
                        placeholder="disponibles Disponible"
                        id="disponibles"
                        name="disponibles"
                        value="<?php echo $inventario->disponibles; ?>"

                    
                    />
                </div>
        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Cambios">
    </form>
</div>
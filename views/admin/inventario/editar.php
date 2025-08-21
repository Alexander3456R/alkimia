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

    <form method="POST" id="form-inventario" action="/admin/inventario/editar" class="formulario" data-exito="<?php echo $exito ? '1' : '0'; ?>">

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
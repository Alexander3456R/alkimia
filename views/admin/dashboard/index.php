<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Últimos Registros</h3>

            <?php foreach($registros as $registro) { ?>
                <div class="bloque__contenido">
                    <p 
                        class="bloque__texto"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                    </p>
                </div>
            <?php } ?>
        </div>


        <!-- <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>
            <p class="bloque__texto--cantidad">$ <?php echo $ingresos; ?></p>
        </div> -->

        <div class="bloque">
            <h3 class="bloque__heading">Articulos con menor inventario</h3>
            <?php foreach($menos_disponibles as $articulo) { ?>
                    <div class="bloque__contenido">
                        <p 
                            class="bloque__texto"><?php echo $articulo->nombre . " - " . $articulo->disponibles . ' Disponibles '; ?>
                        </p>
                </div>
            <?php } ?>
        </div>


        <div class="bloque">
            <h3 class="bloque__heading">Articulos con mayor inventario</h3>
            <?php foreach($mas_disponibles as $articulo) { ?>
                    <div class="bloque__contenido">
                        <p 
                            class="bloque__texto"><?php echo $articulo->nombre . " - " . $articulo->disponibles . ' Disponibles '; ?>
                        </p>
                </div>
            <?php } ?>
        </div>




    <div class="bloque">
        <h3 class="bloque__heading">Mensajes</h3>

            <?php if($total_mensajes > 0) { ?>
                <p class="bloque__texto--cantidad">
                    <?php echo $total_mensajes; ?> - Mensajes Nuevos
                </p>
            <?php } else { ?>
                <p class="bloque__texto">No hay mensajes por el momento</p>
            <?php } ?>
        </div>
    </div>
</main>
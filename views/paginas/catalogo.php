<main class="catalogo">
    <h2 class="nosotros__heading"><?php echo $titulo ?></h2>
    <p class="nosotros__descripcion">Conoce el catálogo Alkimia Fashion Boutique</p>

    <div class="catalogo__grid">
        <?php foreach($catalogo as $inventario) { ?>
            <div <?php echo aos_animation(); ?> class="catalogo__producto">
                <a href="/producto?id=<?php echo $inventario->id; ?>">
                    <?php include __DIR__ . '/../templates/catalogo.php'; ?>
                </a>
            </div>
        <?php } ?>
    </div> <!-- Fin clase grid -->

    <!-- Paginación -->
    <div class="paginacion">
        <?php echo $paginacion; ?>
    </div>

    
</main>


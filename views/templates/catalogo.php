<div class="catalogo swiper-slide">
    <picture>
        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.webp" type="image/webp">
        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.png" type="image/png">
        <img class="catalogo__imagen" loading="lazy" width="200" height="300" src="<?php echo $_ENV['HOST'] . '/build/img/catalogo/' . $inventario->imagen; ?>.png" alt="Imagen Catalogo">
    </picture>

    <p class="catalogo__nombre"><?php echo $inventario->nombre; ?></p>
    <p class="catalogo__descripcion"><?php echo $inventario->descripcion; ?></p>
    <p class="catalogo__precio">$<?php echo number_format($inventario->precio, 2); ?></p>
</div>

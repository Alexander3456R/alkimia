<main class="nosotros">
    <h2 class="nosotros__heading"><?php echo $titulo ?></h2>
    <p class="nosotros__descripcion">Conoce sobre Alkimia Fashion Boutique</p>

    <div class="nosotros__grid">
        <div <?php echo aos_animation(); ?> class="nosotros__imagen">
            <picture>
                <source srcset="build/img/nosotros.avif" type="image/avif">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/nosotros.jpg" alt="Imagen sobre DevWebCamp">
            </picture>
        </div>

        <div class="nosotros__contenido">
            <p <?php echo aos_animation(); ?> class="nosotros__texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus libero perferendis error sunt cumque, sequi optio dolorum expedita. Dignissimos libero iusto perspiciatis eius accusamus dolores quo fuga sint ipsa deleniti.</p>
            <p <?php echo aos_animation(); ?> class="nosotros__texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus libero perferendis error sunt cumque, sequi optio dolorum expedita. Dignissimos libero iusto perspiciatis eius accusamus dolores quo fuga sint ipsa deleniti.</p>
        </div>
    </div>
</main>

<section class="comprar">
        <h2 <?php echo aos_animation(); ?> class="comprar__titulo">¿Por qué comprar con nosotros?</h2>
        <div class="comprar__bloques">
            <div <?php echo aos_animation(); ?> class="comprar__bloque">
                <picture>
                    <source srcset="build/img/precio.avif" type="image/avif">
                    <source srcset="build/img/precio.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/precio.png" alt="Imagen sobre DevWebCamp">
                </picture>
                <h3 class="comprar__descripcion comprar__nombre">El mejor precio</h3>
                <p>Pellentesque hendrerit hendrerit mauris, in pretium est. Donec massa nibh,</p>
            </div> <!-- Fin del bloque -->
            

            <div <?php echo aos_animation(); ?> class="comprar__bloque">
                <picture>
                    <source srcset="build/img/gratis.avif" type="image/avif">
                    <source srcset="build/img/gratis.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/gratis.png" alt="Imagen sobre DevWebCamp">
                </picture>
                <h3 class="comprar__descripcion comprar__nombre">Envío Gratis</h3>
                <p>Pellentesque hendrerit hendrerit mauris, in pretium est. Donec massa nibh,</p>
            </div> <!-- Fin del bloque -->

            <div <?php echo aos_animation(); ?> class="comprar__bloque">
                <picture>
                    <source srcset="build/img/garantizado.avif" type="image/avif">
                    <source srcset="build/img/garantizado.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/garantizado.png" alt="Imagen sobre DevWebCamp">
                </picture>
                <h3 class="comprar__descripcion comprar__nombre">La Mejor Calidad</h3>
                <p>Pellentesque hendrerit hendrerit mauris, in pretium est. Donec massa nibh,</p>
        </div> <!-- Fin del bloque -->
    </div> <!-- Fin de los bloques -->
</section>
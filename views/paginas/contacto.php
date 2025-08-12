    <main class="contacto">
        <h2 class="contacto__heading"><?php echo $titulo; ?></h2>
        <p class="contacto__descripcion">Llene el siguiente formulario para ser contactado</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <div class="contacto__formulario">
            <form class="formulario" action="/contacto" method="POST">
                <?php include_once __DIR__ . '/../templates/formulario.php'; ?>
            </form>
        </div>
    </main>
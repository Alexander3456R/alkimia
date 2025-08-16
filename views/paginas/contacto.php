    <main class="auth">
        <h2 class="auth__heading"><?php echo $titulo; ?></h2>
        <p class="auth__descripcion">Llene el siguiente formulario para ser contactado</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <form class="formulario" action="/contacto" method="POST">
                <?php include_once __DIR__ . '/../templates/formulario.php'; ?>
            </form>
    </main>
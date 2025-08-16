<header class="header">
    <a href="/" class="header__logo">
        <img src="/build/img/alkimia.png" alt="logotipo Alkimia">
    </a>
    <nav class="header__nav-login">
        <?php if(is_admin()) { ?>
                <a class="header__nav-login" href="/admin/dashboard">Administrar</a>
            <?php } else { ?>
                <a class="header__nav-login" href="/login">Iniciar Sesión</a>
        <?php } ?>
    </nav>
</header>

<div class="mobile-menu">
    <img src="/build/img/menu.png" alt="icono menu responsive">
</div>
<nav class="navegacion">
    <div class="navegacion__contenedor">
        <a class="navegacion__enlace <?php echo  pagina_actual('/nosotros') ? 'navegacion__enlace--actual' : ''; ?>" href="nosotros">Nosotros</a>
        <a class="navegacion__enlace <?php echo  pagina_actual('/catalogo') ? 'navegacion__enlace--actual' : ''; ?>" href="catalogo">Catálogo</a>
        <a class="navegacion__enlace <?php echo  pagina_actual('/contacto') ? 'navegacion__enlace--actual' : ''; ?>" href="contacto">Contacto</a>
    </div>
</nav>
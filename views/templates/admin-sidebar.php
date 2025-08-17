<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?>">
            <i class="fa-solid fa-house"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>
        </a>


        <a href="/admin/registrados" class="dashboard__enlace <?php echo pagina_actual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
           <i class="fa-solid fa-warehouse dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inventario
            </span>
        </a>

        <a href="/admin/registrados" class="dashboard__enlace <?php echo pagina_actual('/registrados') ? 'dashboard__enlace--actual' : ''; ?>">
           <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Registrados
            </span>
        </a>


        <a href="/admin/mensajes" class="dashboard__enlace <?php echo pagina_actual('/regalos') ? 'dashboard__enlace--actual' : ''; ?>">
           <i class="fa-solid fa-sms dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Mensajes
            </span>
        </a>
    </nav>
</aside>
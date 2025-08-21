    <main class="auth">
        <h2 class="auth__heading"><?php echo $titulo; ?></h2>
        <p class="auth__descripcion">Llene el siguiente formulario para ser contactado</p>

        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <form class="formulario" id="form-contacto" action="/contacto" method="POST" data-exito="<?php echo $exito ? '1' : '0'; ?>">
                <div class="formulario__campo">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Tu Nombre"
                        id="nombre"
                        name="nombre"
                        value="<?php echo $contacto->nombre; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="apellido" class="formulario__label">Apellido</label>
                    <input
                        type="text"
                        class="formulario__input"
                        placeholder="Tu Apellido"
                        id="apellido"
                        name="apellido"
                        value="<?php echo $contacto->apellido; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="telefono" class="formulario__label">Teléfono</label>
                    <input
                        type="tel"
                        class="formulario__input"
                        placeholder="Tu Teléfono"
                        id="telefono"
                        name="telefono"
                        maxlength="10"
                        value="<?php echo $contacto->telefono; ?>"

                    
                    />
                </div>

                <div class="formulario__campo">
                    <label for="mensaje" class="formulario__label">Mensaje:</label>
                    <textarea
                        class="formulario__input"
                        id="mensaje"
                        name="mensaje"
                        placeholder="Escriba la razón por la cual ser contactado"
                        rows="8"
                        maxlength="300"
                    ><?php echo $contacto->mensaje; ?></textarea>
                    <p id="mensaje-contador" class="formulario__label">300 caracteres restantes</p>
                </div>
        <input type="submit" class="formulario__submit" value="Enviar">
        </form>
    </main>

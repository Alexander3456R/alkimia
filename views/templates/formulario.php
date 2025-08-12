 <fieldset class="formulario__fieldset">
        <legend class="formulario__legend">Información personal</legend>

        <label for="nombre" class="formulario__label">Nombre:</label>
        <input type="text" id="nombre" class="formulario__input" placeholder="Tu nombre">

        <label for="apellido" class="formulario__label">Apellido:</label>
        <input type="text" id="apellido" class="formulario__input" placeholder="Tu apellido">
        
        <label for="mensaje" class="formulario__label">Mensaje:</label>
        <textarea id="mensaje" class="formulario__textarea"></textarea>
    </fieldset>

    <fieldset class="formulario__fieldset">
        <legend class="formulario__legend">Método de contacto</legend>

        <p class="formulario__texto">¿Cómo desea ser contactado?</p>

        <div class="formulario__forma-contacto">
            <label for="contactar-telefono" class="formulario__label">Teléfono</label>
            <input type="radio" value="telefono" name="contacto" id="contactar-telefono" class="formulario__radio">

            <label for="contactar-email" class="formulario__label">Email</label>
            <input type="radio" value="email" name="contacto" id="contactar-email" class="formulario__radio">
        </div>

        <!-- Campo Teléfono (oculto al inicio) -->
        <div class="formulario__campo-telefono" style="display: none;">
            <label for="telefono" class="formulario__label">Teléfono:</label>
            <input type="tel" id="telefono" class="formulario__input" placeholder="Tu número de teléfono">
        </div>

        <!-- Campo Email (oculto al inicio) -->
        <div class="formulario__campo-email" style="display: none;">
            <label for="email-contacto" class="formulario__label">Email:</label>
            <input type="email" id="email-contacto" class="formulario__input" placeholder="Tu correo electrónico">
        </div>
</fieldset>

<div class="boton">
    <input type="submit" value="Enviar" class="boton__enviar">
</div>
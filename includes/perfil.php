<!-- Botón para abrir el modal -->
<button id="openModalBtn" class="btn-perfil" style="display: none;">
    <i class="fa-solid fa-user"></i>
</button>

<!-- El Modal --> 
<div id="perfilModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modal-header">
            <h2 class="tm-text-primary m-auto"><span id="bienvenida"></span></h2>
        </div>
        <div id="perfil">
            <div class="text-center">
                <!-- Información del usuario -->
                <p><strong>Nombre:</strong> <span id="nombre"></span></p>
                <p><strong>Apellido:</strong> <span id="apellido"></span></p>
                <p class="text-truncate"><strong>Email:</strong> <span id="email"></span></p>
                <p class="text-truncate"><strong>Password:</strong> <span id="password"></span></p>
                <p><strong>Número de Documento:</strong> <span id="numero_documento"></span></p>
    
                <!-- Botón para habilitar el formulario de cambio de contraseña -->
                <a href="#" id="habilitarCambio" class="tm-text-primary">¿Desea cambiar su contraseña?</a>
            </div>
            <!-- Formulario para cambiar contraseña (inicialmente oculto) -->
            <form id="formulario" style="display: none;">
                <div class="modal-header">
                    <h4 class="tm-text-primary m-auto">Modificar Contraseña</h4>
                </div>
                <div class="mb-3 form-botones">
                    <label for="current_password"><strong>Ingrese su Contraseña actual: </strong></label>
                    <input class="input-pass" type="password" name="current_password" id="current_password" required>
                </div>
                <div class="mb-3 form-botones">
                    <label for="new_password"><strong>Ingrese su nueva Contraseña: </strong></label>
                    <input class="input-pass" type="password" name="new_password" id="new_password" required>
                </div>
                <div class="mb-3 form-botones">
                    <label for="confirm_password"><strong>Reingrese su Contraseña: </strong></label>
                    <input class="input-pass" type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <div class="form-botones">
                    <button class="button-pass" id="cambiarPasswordBtn" type="submit">Cambiar Contraseña</button>
                    <button class="button-cancelar" id="cancelarCambioBtn" type="button">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


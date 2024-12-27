<?php 

function mostrarFormularioModificar($mensaje, $usuarios, $perfiles) {
?>
    <link rel="stylesheet" href="<?php echo get_urlBase("css/modificarUsuario.css"); ?>">

    <section class="modificar-usuario">
        <h2>Modificar Usuario</h2>

        <?php if (!empty($mensaje)) { ?>
            <p class="mensaje-feedback"><?php echo $mensaje; ?></p>
        <?php } ?>


        <form id="updateForm" action="" method="POST">
            <label for="datusername">¿A quién debo modificar?</label>
            <select name="datusername" id="datusername" required>
                <option value="">Selecciona un usuario</option>
                <?php foreach ($usuarios as $usuario) { ?>
                    <option value="<?php echo htmlspecialchars($usuario["username"]); ?>">
                        <?php echo htmlspecialchars($usuario["username"]); ?>
                    </option>
                <?php } ?>
            </select>

            <label for="datpassword">Nueva contraseña</label>
            <input type="password" name="datpassword" id="datpassword" required placeholder="Nueva contraseña" autocomplete="off">

            <label for="datperfil">Nuevo perfil</label>
            <select name="datperfil" id="datperfil" required>
                <option value="">Selecciona un perfil</option>
                <?php foreach ($perfiles as $perfil) { ?>
                    <option value="<?php echo htmlspecialchars($perfil); ?>">
                        <?php echo htmlspecialchars($perfil); ?>
                    </option>
                <?php } ?>
            </select>

            <button type="button" id="updateButton" class="btn-modificar">Modificar usuario</button>
        </form>


        <form id="addProfileForm" action="" method="POST">
            <h3>Añadir Nuevo Perfil</h3>
            <label for="newProfile">Nombre del nuevo perfil:</label>
            <input type="text" name="newProfile" id="newProfile" required placeholder="Nuevo perfil" autocomplete="off">
            <button type="submit" name="action" value="addProfile" class="btn-crear-perfil">Añadir Perfil</button>
        </form>
    </section>

    <div class="modal" id="confirmationModal">
        <div class="modal-content">
            <p id="confirmationMessage"></p>
            <div class="modal-actions">
                <button id="confirmYes" class="btn-confirm">Sí</button>
                <button id="confirmNo" class="btn-cancel">No</button>
            </div>
        </div>
    </div>

    <script src="<?php echo get_js("modificarUsuario.js"); ?>"></script>
<?php
}
?>

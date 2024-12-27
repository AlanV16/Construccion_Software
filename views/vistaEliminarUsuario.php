<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";
function mostrarFormularioEliminar($mensaje) {
?>
    <link rel="stylesheet" href="<?php echo get_urlBase("css/eliminarUsuario.css"); ?>">
    <section class="eliminar-usuario">
        <h2>Eliminar Usuario</h2>

        <?php if (!empty($mensaje)) { ?>
            <p class="mensaje-feedback"><?php echo $mensaje; ?></p>
        <?php } ?>

        <form id="deleteForm" action="" method="POST">
            <label for="datusername">¿A quién debo eliminar?</label>
            <input type="text" name="datusername" id="datusername" required placeholder="Nombre de usuario" autocomplete="off">
            <button type="button" id="deleteButton" class="btn-eliminar">Eliminar usuario</button>
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

    <script src="<?php echo get_js("eliminarUsuario.js")?>"></script>
<?php
}
?>


<?php  
function mostrarFormularioIngreso($mensaje = "")  
{  
?>  
 
    <link rel="stylesheet" href="<?php echo get_urlBase('css/ingresarUsuario.css'); ?>">  

    <body>  
        <div class="form-container">  
            <h1>Registrar Usuario</h1>  
            <form id="form-usuario" action="<?php echo get_controllers('controladorIngresarUsuario.php'); ?>" method="POST">  
                <label for="datusername">Usuario</label>  
                <input type="text" name="datusername" id="datusername" required placeholder="Ingresa el nombre de usuario" autocomplete="off">  
                
                <label for="datpassword">Contraseña</label>  
                <input type="password" name="datpassword" id="datpassword" required placeholder="Ingresa la contraseña" autocomplete="off">  
                
                <label for="datperfil">Perfil</label>  
                <input type="text" name="datperfil" id="datperfil" required placeholder="Ingresa el perfil del usuario" autocomplete="off">  
                
                <button type="submit">Registrar Usuario</button>  
            </form>  
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>  
        </div>  

        
        <div id="myModal" class="modal">  
            <div class="modal-content">  
                <p>Ingreso de usuario exitoso</p>  
                <button id="closeModal">Cerrar</button>  
            </div>  
        </div>  

        <script src="<?php echo get_js('ingresarUsuario.js'); ?>"></script>  
    </body>  

<?php  
}  
?>

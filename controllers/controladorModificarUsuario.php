<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"]."/models/modeloUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/views/vistaModificarUsuario.php";

if (!isset($_SESSION["textusername"])) {
    header("location: " . get_urlBase("index.php"));
    exit();
}

$mensaje = "";
$usuarios = [];
$perfiles = [];

$modeloUsuario = new modeloUsuario();


try {
    $usuarios = $modeloUsuario->obtenerUsuarios();
    $perfiles = $modeloUsuario->obtenerPerfiles();
} catch (PDOException $e) {
    $mensaje = "Error al cargar datos: " . $e->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] == "addProfile") {
        
        $nuevoPerfil = $_POST["newProfile"];

        try {
            $modeloUsuario->insertarPerfil($nuevoPerfil);
            $mensaje = "Perfil añadido con éxito";
            $perfiles = $modeloUsuario->obtenerPerfiles(); 
        } catch (PDOException $e) {
            $mensaje = "Error al añadir perfil: " . $e->getMessage();
        }
    } else {
        
        $tmpdatusuario = $_POST["datusername"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];

        try {
            $modeloUsuario->actualizarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario actualizado con éxito";    
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar usuario: " . $e->getMessage();
        }
    }
}


mostrarFormularioModificar($mensaje, $usuarios, $perfiles);
?>

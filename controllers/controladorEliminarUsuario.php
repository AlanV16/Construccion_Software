<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"]."/models/modeloUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/views/vistaEliminarUsuario.php";

if (!isset($_SESSION["textusername"])) {
    header("location: ".get_urlBase("index.php"));
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = trim($_POST["datusername"]); 

    $modeloUsuario = new modeloUsuario();
    
    try {
        
        $usuarioExiste = $modeloUsuario->usuarioExiste($tmpdatusuario);

        if ($usuarioExiste) {
            $resultado = $modeloUsuario->eliminarUsuario($tmpdatusuario);
            if ($resultado) {
                $mensaje = "El usuario <strong>$tmpdatusuario</strong> ha sido eliminado con éxito.";
            } else {
                $mensaje = "No se pudo eliminar al usuario <strong>$tmpdatusuario</strong>.";
            }
        } else {
            $mensaje = "El usuario <strong>$tmpdatusuario</strong> no existe en la base de datos.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error al eliminar usuario: ".$e->getMessage();
    }

    
    header("Location: " . $_SERVER['PHP_SELF'] . "?mensaje=" . urlencode($mensaje));
    exit();
}


$mensaje = $_GET['mensaje'] ?? '';
mostrarFormularioEliminar($mensaje);

?>
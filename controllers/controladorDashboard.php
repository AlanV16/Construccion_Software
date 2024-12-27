<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";

if ((!isset($_SESSION["textusername"]))) {
    header("location: " . get_urlBase("index.php"));
    exit();
}



$opcion = $_GET["opcion"] ?? "inicio";
$contenido = "";

switch ($opcion) {
    case "inicio":
        ob_start();
        include get_controllers_disk("controladorInicio.php");
        $contenido = ob_get_clean();
        break;
    case "ver":
        ob_start();
        include get_controllers_disk("controladorUsuario.php");
        $contenido = ob_get_clean();
        break;
    case "ingresar":
        ob_start();
        include get_controllers_disk("controladorIngresarUsuario.php");
        $contenido = ob_get_clean();
        break;
    case "modificar":
        ob_start();
        include get_controllers_disk("controladorModificarUsuario.php");
        $contenido = ob_get_clean();
        break;
    case "eliminar":
        ob_start();
        include get_controllers_disk("controladorEliminarUsuario.php");
        $contenido = ob_get_clean();
        break;
    default:
        http_response_code(400);
        $contenido = "<h1>ERROR</h1>";
        break;
}



include get_views_disk("vistaDashboard.php");

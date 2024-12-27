<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"]."/models/modeloUsuario.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/views/vistaIngresarUsuario.php";

if (!isset($_SESSION["textusername"])) {
    header("location: ".get_urlBase("index.php"));
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusername"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        exit();
    } catch (PDOException $e) {
        $mensaje = "Error al registrar usuario: " . $e->getMessage();
    }
}


mostrarFormularioIngreso($mensaje);

?>

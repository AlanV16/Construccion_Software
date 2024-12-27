<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/modeloUsuario.php";

if (isset($_SESSION["textusername"])) {
    header("Location: " . get_controllers("controladorDashboard.php"));
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $v_username = htmlspecialchars(strip_tags(trim($_POST["textusername"] ?? "")));
    $v_password = htmlspecialchars(strip_tags(trim($_POST["textpassword"] ?? "")));

    $modeloUsuario = new modeloUsuario();

    try {
        $credenciales = $modeloUsuario->validarUsuario($v_username, $v_password);

        if ($credenciales) {
            $_SESSION["textusername"] = $v_username;
            $_SESSION["textpassword"] = $v_password;
            header("Location: " . get_controllers("controladorDashboard.php"));
            exit();
        } else {
            $_SESSION["error"] = "Usuario o contraseña incorrectos.";
            header("Location: " . get_views("claveequivocada.php"));
            exit();
        }
    } catch (Exception $e) {
        error_log("Error al validar usuario: " . $e->getMessage());
        $_SESSION["error"] = "Ocurrió un problema al validar tus credenciales.";
        header("Location: " . get_views("claveequivocada.php"));
        exit();
    }
}


include get_views_disk("vistaLogin.php");

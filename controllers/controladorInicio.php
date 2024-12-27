<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";

if ((!isset($_SESSION["textusername"]))) {
    header("location: " . get_urlBase("index.php"));
    exit();
}

include get_views_disk("vistaInicio.php");

?>

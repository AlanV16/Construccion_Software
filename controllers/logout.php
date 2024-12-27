<?php   

require_once $_SERVER["DOCUMENT_ROOT"]."/etc/config.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/models/connect/conexion.php"; 

session_start();  

$_SESSION = [];
// Eliminar todas las variables de sesión  
session_unset();  
// Destruir la sesión  
session_destroy();  

// Redirigir al login  
header("Location: ".get_controllers("controladorLogin.php"));  
exit(); 
?>
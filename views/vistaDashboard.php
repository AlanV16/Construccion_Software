<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo get_urlBase("css/midashboard.css") ?>">
</head>

<body>

    <div class="container">
        <div class="sidebar">
            <h3>DASHBOARD <span id="menuToggle">≡</span></h3>
            <div class="menu-contenedor">
                <ul id="menu">
                    <li class="menu-item"><a href="?opcion=inicio" class="<?php echo ($currentOption == 'inicio') ? 'active' : ''; ?>">INICIO</a></li>
                    <li class="menu-item"><a href="?opcion=ver" class="<?php echo ($currentOption == 'ver') ? 'active' : ''; ?>">VER</a></li>
                    <li class="menu-item"><a href="?opcion=ingresar" class="<?php echo ($currentOption == 'ingresar') ? 'active' : ''; ?>">INGRESAR</a></li>
                    <li class="menu-item"><a href="?opcion=modificar" class="<?php echo ($currentOption == 'modificar') ? 'active' : ''; ?>">MODIFICAR</a></li>
                    <li class="menu-item"><a href="?opcion=eliminar" class="<?php echo ($currentOption == 'eliminar') ? 'active' : ''; ?>">ELIMINAR</a></li>
                    <li class="menu-item"><a href="<?php echo get_controllers("logout.php") ?>">SALIR</a></li>
                </ul>
            </div>
        </div>
        <div class="contenido">
            <?php
            if (isset($contenido)) {
                echo $contenido;
            } else {
                echo "<h1>ERROR</h1>";
            }
            ?>
        </div>
    </div>
    <script src="<?php echo get_js("dashboard.js") ?>"></script>
</body>

</html>
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo get_urlBase("css/miInicio.css") ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="contenido-pagina">
        <div class="contenedor-titulo">
            <h1 class="titulo">ESTE ES EL INICIO</h1>
            <h1 class="titulo">DE LA PAGINA</h1>
            <p class=subtitulo>Autor: Alan Valles</p>
        </div>
        
        <img src="<?php echo get_urlBase("img/inicio/durazno1.png") ?>" alt="Durazno" class="imagen-durazno">
        <img src="<?php echo get_urlBase("img/inicio/fresa.png") ?>" alt="Fresa" class="imagen-fresa">
        <img src="<?php echo get_urlBase("img/inicio/palta1.png") ?>" alt="Palta" class="imagen-palta1">
        <img src="<?php echo get_urlBase("img/inicio/naranja.png") ?>" alt="Naranja" class="imagen-naranja">
        <img src="<?php echo get_urlBase("img/inicio/kiwi1.png") ?>" alt="Kiwi" class="imagen-kiwi">
        <img src="<?php echo get_urlBase("img/inicio/piniamorada.png") ?>" alt="Piña Morada" class="imagen-pinimamorada">
        <img src="<?php echo get_urlBase("img/inicio/fondo-amarillo.png") ?>" alt="mancha-amarilla" class="imagen-mancha-amarilla">
        <img src="<?php echo get_urlBase("img/inicio/hojas.png") ?>" alt="hojas" class="imagen-hojas1">
        <img src="<?php echo get_urlBase("img/inicio/hojitas-amarillas.png") ?>" alt="hojitas-amarillas" class="imagen-hojitas-amarillas">
        <img src="<?php echo get_urlBase("img/inicio/naranja-partida.png") ?>" alt="naranja-partida" class="imagen-naranja-partida">
        <img src="<?php echo get_urlBase("img/inicio/palta2.png") ?>" alt="palta2" class="imagen-palta2">
        <img src="<?php echo get_urlBase("img/inicio/hojas.png") ?>" alt="hojas" class="imagen-hojas2">
    </div>
</body>

</html>
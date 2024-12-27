<?php 
require_once $_SERVER["DOCUMENT_ROOT"] . "/etc/config.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo get_urlBase("css/reset.css") ?>">
    <link rel="stylesheet" href="<?php echo get_urlBase("css/style.css") ?>">
</head>

<body>

    <div class="laptop-container">
        <img src="<?php echo get_urlBase(arg1: "img/manzana.png") ?>" alt="manzana" class="manzana-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/naranja.png") ?>" alt="naranja" class="naranja-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/palta.png") ?>" alt="palta" class="palta-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/pinia.png") ?>" alt="piña" class="pinia-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/icono_usuario.png") ?>" alt="Icono usuario" class="icono-usuario-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/healthy_food.png") ?>" alt="Icono de healthy food" class="healthy-food-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/pera.png") ?>" alt="pera" class="pera-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/platanos.png") ?>" alt="platano" class="platano-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/leche.png") ?>" alt="Leche" class="leche-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/mandarina.png") ?>" alt="mandarina" class="mandarina-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/gluten.png") ?>" alt="Libre de gluten" class="gluten-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/mermelada.png") ?>" alt="mermelada" class="mermelada-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/mantequilla.png") ?>" alt="mantequilla" class="mantequilla-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/mantequilla_mani.png") ?>" alt="mantequilla de mani" class="mantequilla-mani-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/huevos.png") ?>" alt="huevo" class="huevo-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/pescado.png") ?>" alt="pescado" class="pescado-imagen">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-1">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-2">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-3">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-4">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-5">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-6">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-7">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-8">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-9">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-10">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-11">
        <img src="<?php echo get_urlBase(arg1: "img/punto_verde.png") ?>" alt="punto verde" class="punto-verde-12">


        <div class="Login-container">
            <h1>LOGIN</h1>
            <form action="/controllers/controladorLogin.php" method="POST">

                <input type="text" id="username" name="textusername" placeholder="Username" required autocomplete="off">
                <input type="password" id="password" name="textpassword" placeholder="password" required autocomplete="off">

                <div class="recuerdame">
                    <input type="checkbox" id="recuerdame" name="recuerdame" autocomplete="off">
                    <label for="recuerdame">Recuerdame</label>

                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <img src="<?php echo get_urlBase(arg1: "img/nube.png") ?>" alt="Nube" class="nube-imagen">
</body>

</html>
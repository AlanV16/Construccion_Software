<?php   
require_once $_SERVER["DOCUMENT_ROOT"]."/etc/config.php";  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Clave Equivocada</title>  
    <link rel="stylesheet" href="<?php echo get_urlBase("css/claveEquivocada.css") ?>">  
</head>  
<body>  
    <div class="container">  
        <h1>CLAVE EQUIVOCADA, VUELVA A INGRESAR</h1>  
        <br>  
        <a class="back-link" href="<?php echo get_urlBase("index.php")?>">Volver al Login</a>  
    </div>  
</body>  
</html>
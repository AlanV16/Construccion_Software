<?php 

    define("URL_BASE", "http://mi_proyecto.test/");
    define("DB_HOST", "localhost");
    define("DB_NAME", "dbmi_proyecto");
    define("DB_USER","root");
    define("DB_PASS","");
    //define("DB_CHARSET","utf8");

    //funcion generica para tener Paths
    function get_path($type,$arg1){
        $basePaths = ["base"=>URL_BASE,
                      "views"=>URL_BASE."views/",
                      "models"=>URL_BASE."models/",
                      "controllers"=>URL_BASE."controllers/",
                      "js"=>URL_BASE."js/"];
        return $basePaths[$type].$arg1;
    }
    function get_urlBase($arg1){
        return get_path("base",$arg1);
    }

    function get_views($arg1){
        return get_path("views",$arg1);
    }

    function get_models($arg1){
        return get_path("models",$arg1);
    }

    function get_controllers($arg1){
        return get_path("controllers",$arg1);
    }

    function get_js($arg1){
        return get_path("js",$arg1);
    }

    function get_controllers_disk($arg1){
        return $_SERVER["DOCUMENT_ROOT"]."/controllers/".$arg1;
    }

    function get_views_disk($arg1){
        return $_SERVER["DOCUMENT_ROOT"]."/views/".$arg1;
    }
    //echo "algo";
    //echo URL_BASE;
    //echo get_urlBase("");
    //echo get_models("modeloUsuario.php");
?>
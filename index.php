<?php

    $file = "route.php";

    $dirName = dirname($_SERVER["SCRIPT_NAME"]);
    $baseName = basename($_SERVER["SCRIPT_NAME"]);

    $url = str_replace([$dirName, $baseName], "", $_SERVER["REQUEST_URI"]);

    if(file_exists($file)){
        require_once($file);
    }else{
        die();
    }

    $route = new Route;

    $route->add("","home.php");
    $route->add("/","home.php");
    $route->add("/anasayfa","home.php");

    $route->show($url);

?>

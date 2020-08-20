<?php

    $file = "route.php";

    if(file_exists($file)){
      require_once($file);
    }else{
      die();
    }

?>

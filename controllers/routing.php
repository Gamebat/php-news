<?php

class Router{
    private $pages = array();

    //Роутинг страниц
    function route($url, $pages){
        
        
        if($url == '/about'){
            header("Location: /about.php");
            die();
        }
        else if($url == '/rules'){
            header("Location: /rules.php");
            die();
        }
        else if (!in_array($url, $pages)) {
            header("Location: /404.php");
            die();
        }
    }
}
?>
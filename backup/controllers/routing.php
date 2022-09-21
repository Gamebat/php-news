<?php

class Router{
    private $pages = array();

    function route($url, $pages){
        if (!in_array($url, $pages)) {
            header("Location: /404.php");
            die();
        }else if($url == '/about'){
            header("Location: /about.php");
            die();
        }
    }
}
?>
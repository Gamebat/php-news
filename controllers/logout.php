<?php
    session_start();
    $user=$_SESSION['user'];
    setcookie('user', $user['name'], time() - 3600, "/");
    header ('Location: /');
    session_destroy();
?>
<?php

class Autorize{

    //Проверка авторизации
    function auth(){
    
        session_start();
        require_once 'database.php';

        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $_SESSION['login']=$login;
        $_SESSION['pass']=$pass;

        $pass = md5($pass."DanyaBD");


        $result = DB::run("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");

        $user = $result->fetchAll(\PDO::FETCH_ASSOC);
        $_SESSION['user']=$user;


        if (count($user) == 0){
            $_SESSION['flash']='Неверный логин или пароль';
            header ('Location: /#zatemnenie2');

        }else{
            $_SESSION['coockie']=setcookie('user', $user['name'], time() + 3600, "/");
            header ('Location: /');
        }

    
    }
}

$ee = new Autorize;
$ee -> auth();


?>
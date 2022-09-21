<?php

class Registrator{

    // Добавляем пользователя в БД
    function reg(){
        session_start();
        require_once 'database.php';

        $name = $_POST['name'];   
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        if (mb_strlen($login)<5 || mb_strlen($login)>20){
            echo "Длина логина должна быть от 5 до 20 символов";
            exit();
        } else if (mb_strlen($name)<2 || mb_strlen($name)>30){
            echo "Недопустимая длина имени";
            exit();
        } else if (mb_strlen($pass)<6 || mb_strlen($pass)>30){
            echo "Длина пароля должна быть от 6 до 30 символов";
            exit();
        }

        $pass = md5($pass."DanyaBD");

        $user = DB::run("SELECT * FROM `users` WHERE `login` = '$login'");
        $row = $user->fetchAll(\PDO::FETCH_ASSOC);

        if (count($row) == 0){
            DB::run("INSERT INTO `users` (`name`, `login`, `pass`) VALUES('$name', '$login', '$pass')");
            $_SESSION['coockie']=setcookie('user', $row['name'], time() + 3600, "/");
            header ('Location: /');
        }
        else{
            $_SESSION['flash_message']='Пользователь с таким логином уже существует';
            header ('Location: /#zatemnenie');
        }

    }
}

$ww = new Registrator;
$ww -> reg();


?>
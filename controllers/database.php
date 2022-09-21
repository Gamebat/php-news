<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'newsBD');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHAR', 'utf8');

class DB
{   
    // задаем поля класса
    protected static $instance = null;

    // объявляем конструктор
    protected function __construct() {}

    //запрещение клонирования класса
    protected function __clone() {}

    // классический статический метод, чтобы сделать его общедоступным
    // подключаемся к базе данных с определенными параметрами
    public static function instance()
    {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => FALSE,
            );
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            self::$instance = new PDO($dsn, DB_USER, DB_PASS, $opt);
        }
        return self::$instance;
    }

    
    // вспомогательная функция для плавного запуска подготовленных операторов
    public static function run($sql, $args = [])
    {
        if (!$args)
        {
             return self::instance()->query($sql);
        }
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
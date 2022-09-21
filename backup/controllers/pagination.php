<?php

class Paginator{

    public $art;
    public $kol;
    public $str_pag;

    function makePager($total, $page)
    {
         /*
        $kol - количество записей для вывода
        $art - с какой записи выводить
        $total - всего записей
        $page - текущая страница
        $str_pag - количество страниц для пагинации
        */
        
        $this -> kol = 2;
        $this -> art = ($page * $this -> kol) - $this -> kol;
       

        // Количество страниц для пагинации
        $this -> str_pag = ceil($total / $this -> kol);

  

    }

    //возвращаем номер с которого выводим запись и количество выводимых новостей
    function limitNews(){
        return $this -> art.",".$this -> kol;
    }

    //составляем и выводим меню навигации
    function makeNav(){
        for ($i = 1; $i <= $this -> str_pag; $i++){
            echo " <li class='page-item'><a class='page-link' href=?page=".$i.">".$i." </a></li>";
        }
    }
}
?>
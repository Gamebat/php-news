<?php
require_once './controllers/database.php';
class Paginator{

    public $art;
    public $kol;
    public $str_pag;

    // Рассчитываем с какой записи выводить и сколько страниц в пагинации
    function makePager($total, $page)
    {
         /*
        $kol - количество записей для вывода
        $art - с какой записи выводить
        $total - всего записей
        $page - текущая страница
        $str_pag - количество страниц для пагинации
        */
        
        $this -> kol = 5;
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


    //вычисляем общее число новостей в SQL выборке
    function takePages($ex){
        
        if (count($ex)==0){
            $pg = DB::run("SELECT *, g.title as gtitle FROM `news` n INNER JOIN `group` g on n.id_group = g.id_group ORDER BY `date` DESC");
            $paginations = $pg->fetchAll(\PDO::FETCH_ASSOC);
            $pagination_pages = count($paginations);
        }else if (count($ex)==2){

            if (substr($ex[1], 0, 6) == 'group-'){
            $ex[1] = substr($ex[1], 6);
            }

            
            $find_group_id = DB::run("SELECT `id_group` FROM `group` WHERE `title`='$ex[1]'") ->fetch(PDO::FETCH_LAZY);
            $group_id = $find_group_id['id_group'];

            $pg = DB::run("SELECT * FROM `news` WHERE `id_group`=$group_id ");
            $paginations = $pg->fetchAll(\PDO::FETCH_ASSOC);
            $pagination_pages = count($paginations);
        }else if (count($ex)==3){
            if (substr($ex[1], 0, 6) == 'group-'){
                $ex[1] = substr($ex[1], 6);
                }

            $find_group_id = DB::run("SELECT `id_group` FROM `group` WHERE `title`='$ex[1]'") ->fetch(PDO::FETCH_LAZY);
            $group_id = $find_group_id['id_group'];
            

            $find_category_id = DB::run("SELECT `id_category` FROM `category` WHERE `title`='$ex[2]'") ->fetch(PDO::FETCH_LAZY);
            $category_id = $find_category_id['id_category'];

            $pg = DB::run("SELECT * FROM news INNER JOIN category_news ON news.id_news = category_news.id_news WHERE category_news.id_category = '$category_id' AND news.id_group = '$group_id'");
            $paginations = $pg->fetchAll(\PDO::FETCH_ASSOC);
            $pagination_pages = count($paginations);
        }

        return $pagination_pages;
    }

    //Получаем массив страниц для роутинга
    function pagesArray(){
        $pages = array("/","/about");

        $gr_p = DB::run("SELECT DISTINCT g.title, g.id_group FROM news n INNER JOIN `group` g ON n.id_group = g.id_group");
                            
        while ($pw = $gr_p->fetch(PDO::FETCH_LAZY))
        { 
            $id = $pw['id_group'];
            $title = $pw['title'];
            
            $pages[] = '/group-'.$title;

            $categ = DB::run("SELECT DISTINCT c.title FROM news n INNER JOIN `group` g ON g.id_group = n.id_group 
                INNER JOIN category_news cn ON n.id_news = cn.id_news INNER JOIN category c ON c.id_category = cn.id_category WHERE n.id_group = '$id';");
            
                while ($qqq = $categ->fetch(PDO::FETCH_LAZY))
                {
                    $catname = $qqq['title'];
                    $pages[] = '/group-'.$title.'/'.$catname;
                }
            
            
                        
        }

        return $pages;
    }
}
?>
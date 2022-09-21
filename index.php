<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TheGazette - News Magazine HTML5 Template | Catagory</title>

    <!-- Favicon  -->
    <link rel="icon" href="/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/styleuser.css">

    <!-- Responsive CSS -->
    <link href="/css/responsive.css" rel="stylesheet">

</head>

<body>

    <?php
        session_start();
        require_once './controllers/database.php';
        require_once './controllers/routing.php';
        require_once './controllers/pagination.php';

        $mp = new Paginator;

        $pages = $mp -> pagesArray();

        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


        $r = new Router();

        $r -> route($uri,$pages);

        $ex = explode("/", $uri);
        if ($ex[1]==""){
            unset($ex);
            $ex = array();
        }


        $pagination_pages = $mp -> takePages($ex);
        

        if (isset($_GET['page'])){
            $page_number = $_GET['page'];
        }else {
            $page_number = 1;
        }
        
        $mp -> makePager($pagination_pages, $page_number) ;
        $limit_numbers = $mp -> limitNews();
       
        $new_array = [];

        if(count($ex) >= 2){
            $ex[1] = substr($ex[1], 6); 
        }

        
    ?>


        <div class="modal" id="zatemnenie">
            <form id="okno" action="/controllers/registration.php" method="post">
                
                <div class="topreg">
                    <a href="/" class="close">Закрыть</a>
                    <button class="send" type="submit">Далее</button>
                    
                </div>
                <?php
                echo "<p class='dangerrr'>";
                if (isset($_SESSION['flash_message'])){
                    echo $_SESSION['flash_message'];
                    unset($_SESSION['flash_message']);
                }
                echo"</p>";
                ?>

                <div class="centerreg">
                    <p class="content-text4">Создайте учетную запись</p>
                    
                    <input type="text" id="name" name="name" placeholder="Имя">
                    <input type="text" id="login" name="login" placeholder="Логин">
                    <input type="pass" id="pass" name="pass" placeholder="Пароль">

                </div>

                <div class="bottom">
                    <h class="content-text5">Учетные данные</h>
                    <p class="content-text6">Эта информация не будет общедоступной. Ваши данные не будут распространены, даже если эта учетная запись предназначена для компании, домашнего животного и т. д.</p>
                </div>


            </form>
        </div>

        <div class="modal" id="zatemnenie2">
            <form id="okno2" action="/controllers/autorize.php" method="post">  
                
                <div class="topreg">
                    <a href="/" class="close">Закрыть</a>
                    <button class="send" type="submit">Далее</button>
                    
                </div>
                <?php
                    echo "<p class='dangerrr'>";
                    if (isset($_SESSION['flash'])){
                        echo $_SESSION['flash'];
                        unset($_SESSION['flash']);
                    }
                    echo"</p>";
                ?>

                <div class="centerreg">
                    <p class="logtext">Войти</p>
                    
                    <input type="text" id="login" name="login" placeholder="Введите логин">
                    <input type="pass" id="pass" name="pass" placeholder="Введите пароль">

                </div>


            </form>
        </div>



    <!-- Header Area Start -->
    <header class="header-area">
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-md-6">
                        <div class="breaking-news-area">
                            <h5 class="breaking-news-title">Breaking news</h5>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="/#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="/#">Brexit breakthrough in Brussels</a></li>
                                    <li><a href="/#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="/#">Brex comes after week of drama</a></li>
                                    <li><a href="/#">Brexit breakthrough in Bweek of drama</a></li>
                                    <li><a href="/#">Brexit bssels comes after week of drama</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Stock News Area -->
                    <div class="col-12 col-md-6 qwe">
                        <div class="stock-news-area">
                            <div id="stockNewsTicker" class="ticker">
                                <ul>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>3.95</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>4.78</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>11.37</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle Header Area -->
        <div class="middle-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Logo Area -->
                    <div class="col-12 col-md-4">
                        <div class="logo-area">
                            <a href="/index.html"><img src="/img/core-img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- Header Advert Area -->
                    <div class="col-12 col-md-8">
                        <div class="header-advert-area">
                            <a href="/#"><img src="/img/bg-img/top-advert.png" alt="header-add"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area -->
        <nav>
            <ul class="topmenu">
              <li><a href="/" class="active">News<span class="fa fa-angle-down"></span></a>
                <ul class="submenu">
                    <?php
    
                    $gr = DB::run("SELECT DISTINCT g.title, g.id_group FROM news n INNER JOIN `group` g ON n.id_group = g.id_group");
                            
                    while ($qw = $gr->fetch(PDO::FETCH_LAZY))
                    {
                        
    
                        $id = $qw['id_group'];
                        $title = $qw['title'];
                        
                        $pages[] = '/group-'.$title;

                        $category = DB::run("SELECT DISTINCT c.title FROM news n INNER JOIN `group` g ON g.id_group = n.id_group 
                        INNER JOIN category_news cn ON n.id_news = cn.id_news INNER JOIN category c ON c.id_category = cn.id_category WHERE n.id_group = '$id';");
                    
                        echo"
                            <li><a href='/group-$title'>$title<span class='fa fa-angle-down'></span></a>
                                <ul class='submenu'>
                                
                            ";
                                

                                while ($qq = $category->fetch(PDO::FETCH_LAZY))
                                {
                                    $catname = $qq['title'];
                                    echo "<li><a href=/group-$title/$catname>$catname</a></li>";
                                    $pages[] = '/'.'group-'.$title.'/'.$catname;
                                }
                                
                        echo "
                                </ul>
                            </li>";
                        ;
                    }  
                    

                    ?>
              </ul>
              </li>
              <li><a href="/about">About Us</a></li>
              <li><a href="/rules">Rules</a></li>
              


                <?php
                        if(isset($_SESSION['coockie'])){
                            echo "<li id='rli'><a href='/controllers/logout.php'>Выйти</a></li>";
                            
                        }
                        else{
                            echo "<li id='rli'><a href='#zatemnenie'>Регистрация</a></li>";
                            echo "<li id='rli'><a href='#zatemnenie2'>Войти</a></li>";
                            
                        }
                ?>
            </ul>
          </nav>
    </header>
    <!-- Header Area End -->

    <!-- Breadcumb Area Start -->
   
    <!-- Breadcumb Area End -->

    <!-- Editorial Area Start -->
   
    <!-- Editorial Area End -->

    <section class="catagory-welcome-post-area section_padding_36">
        <div class="container">
            <div class="row colios">

                <?php


                if (count($ex)==2){
                    
                    
                    $find_group_id = DB::run("SELECT `id_group` FROM `group` WHERE `title`='$ex[1]'") ->fetch(PDO::FETCH_LAZY);
                    $group_id = $find_group_id['id_group'];

                    $nw = DB::run("SELECT * FROM `news` WHERE `id_group`=$group_id LIMIT $limit_numbers ");

                    
                            
                    while ($news = $nw->fetch(PDO::FETCH_LAZY))
                    {
                        $news_id = $news['id_news'];
                        $title = $news['title'];
                        $body = $news['body'];
                        $date = $news['date'];
                        $category = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");
                        $rowfetch = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");

                        echo "
                            <div class='col-12 col-md-4'>
                            <!-- Gazette Welcome Post -->
                            <div class='gazette-welcome-post'>
                                <!-- Post Tag -->
                                <div class='gazette-post-tag'>"
                                ;

                                $row = $rowfetch->fetchAll(\PDO::FETCH_ASSOC);

                                if (count($row) != 0){

                                    while ($ctgry = $category->fetch(PDO::FETCH_LAZY)){
                                    $ct_title = $ctgry['title'];
                                    echo
                                    "
                                    
                                            <a href='#'>$ct_title</a>
                                    
                                    ";
                                    }
                                }else{
                                    echo
                                    "
                                            <a href='#'>no category</a>
                                    
                                    ";
                                }
                        echo 
                        "        </div> 
                                <h2 class='font-pt'>$title</h2>
                                <p class='gazette-post-date'>$date</p>
                                <p class='gazette-post-date'>Группа: $ex[1]</p>
                                <!-- Post Thumbnail -->
                            
                                <!-- Post Excerpt -->
                                <p>$body</p>
                                <!-- Reading More -->
                                <div class='post-continue-reading-share mt-30'>
                                    <div class='post-continue-btn'>
                                        <a href='#' class='font-pt'>Continue Reading <i class='fa fa-chevron-right' aria-hidden='true'></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        ";
                    }
                }elseif (count($ex)==3){
                   
                    $find_group_id = DB::run("SELECT `id_group` FROM `group` WHERE `title`='$ex[1]'") ->fetch(PDO::FETCH_LAZY);
                    $group_id = $find_group_id['id_group'];
                    

                    $find_category_id = DB::run("SELECT `id_category` FROM `category` WHERE `title`='$ex[2]'") ->fetch(PDO::FETCH_LAZY);
                    $category_id = $find_category_id['id_category'];

                    $news_in_category = DB::run("SELECT DISTINCT (news.id_news), news.title, news.body, news.date 
                    FROM news 
                    INNER JOIN category_news ON news.id_news = category_news.id_news 
                    WHERE category_news.id_category = '$category_id' AND news.id_group = '$group_id' 
                    LIMIT $limit_numbers");

                    

                    while ($nic = $news_in_category->fetch(PDO::FETCH_LAZY))
                    {
                        $news_id = $nic['id_news'];
                        $title = $nic['title'];
                        $body = $nic['body'];
                        $date = $nic['date'];
                        $category = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");
                        $rowfetch = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");

                        echo "
                            <div class='col-12 col-md-4'>
                            <!-- Gazette Welcome Post -->
                            <div class='gazette-welcome-post'>
                                <!-- Post Tag -->
                                <div class='gazette-post-tag'>"
                                ;

                                $row = $rowfetch->fetchAll(\PDO::FETCH_ASSOC);

                                if (count($row) != 0){

                                    while ($ctgry = $category->fetch(PDO::FETCH_LAZY)){
                                    $ct_title = $ctgry['title'];
                                    echo
                                    "
                                    
                                            <a href='#'>$ct_title</a>
                                    
                                    ";
                                    }
                                }else{
                                    echo
                                    "
                                            <a href='#'>no category</a>
                                    
                                    ";
                                }
                        echo 
                        "        </div> 
                                <h2 class='font-pt'>$title</h2>
                                <p class='gazette-post-date'>$date</p>
                                <p class='gazette-post-date'>Группа: $ex[1]</p>
                                <!-- Post Thumbnail -->
                            
                                <!-- Post Excerpt -->
                                <p>$body</p>
                                <!-- Reading More -->
                                <div class='post-continue-reading-share mt-30'>
                                    <div class='post-continue-btn'>
                                        <a href='#' class='font-pt'>Continue Reading <i class='fa fa-chevron-right' aria-hidden='true'></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        ";
                        }
                    }elseif (count($ex)==0){
                        
                    $news = DB::run("SELECT *, g.title as gtitle FROM `news` n INNER JOIN `group` g on n.id_group = g.id_group ORDER BY `date` DESC LIMIT $limit_numbers");


                    while ($nic = $news->fetch(PDO::FETCH_LAZY))
                    {
                        $news_id = $nic['id_news'];
                        $title = $nic['title'];
                        $body = $nic['body'];
                        $date = $nic['date'];
                        $group_title = $nic['gtitle'];
                        $category = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");
                        $rowfetch = DB::run("SELECT DISTINCT c.title FROM category_news cn, category c WHERE cn.id_category = c.id_category AND cn.id_news = '$news_id'");

                        echo "
                            <div class='col-12 col-md-4'>
                            <!-- Gazette Welcome Post -->
                            <div class='gazette-welcome-post'>
                                <!-- Post Tag -->
                                <div class='gazette-post-tag'>"
                                ;
                                $row = $rowfetch->fetchAll(\PDO::FETCH_ASSOC);

                                if (count($row) != 0){

                                    while ($ctgry = $category->fetch(PDO::FETCH_LAZY)){
                                    $ct_title = $ctgry['title'];
                                    echo
                                    "
                                    
                                            <a href='#'>$ct_title</a>
                                    
                                    ";
                                    }
                                }else{
                                    echo
                                    "
                                            <a href='#'>no category</a>
                                    
                                    ";
                                }
                        echo 
                        "        </div> 
                                <h2 class='font-pt'>$title</h2>
                                <p class='gazette-post-date'>Группа: $group_title</p>
                                <p class='gazette-post-date'>$date</p>
                                <!-- Post Thumbnail -->
                            
                                <!-- Post Excerpt -->
                                <p>$body</p>
                                <!-- Reading More -->
                                <div class='post-continue-reading-share mt-30'>
                                    <div class='post-continue-btn'>
                                        <a href='#' class='font-pt'>Continue Reading <i class='fa fa-chevron-right' aria-hidden='true'></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        ";

                        
                    }
                }                              
                ?>



            </div>
    

            <?php
                

                echo"
                <nav id='navigation'>
                <ul class='pagination justify-content-center'>
                ";
                $mp -> makeNav();
                
                echo"</ul>
                </nav>
                "
            ?>

            
        </div>
    </section>

    <!-- Footer Area Start -->
    <footer class="footer-area bg-img background-overlay" style="background-image: url(img/bg-img/4.jpg);">
        <!-- Top Footer Area -->
        <div class="top-footer-area section_padding_100_70">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Regions</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">U.S.</a></li>
                                <li><a href="/#">Africa</a></li>
                                <li><a href="/#">Americas</a></li>
                                <li><a href="/#">Asia</a></li>
                                <li><a href="/#">China</a></li>
                                <li><a href="/#">Europe</a></li>
                                <li><a href="/#">Middle</a></li>
                                <li><a href="/#">East</a></li>
                                <li><a href="/#">Opinion</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Fashion</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">Election 2016</a></li>
                                <li><a href="/#">Nation</a></li>
                                <li><a href="/#">World</a></li>
                                <li><a href="/#">Our Team</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Politics</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">Business</a></li>
                                <li><a href="/#">Markets</a></li>
                                <li><a href="/#">Tech</a></li>
                                <li><a href="/#">Luxury</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Featured</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">Football</a></li>
                                <li><a href="/#">Golf</a></li>
                                <li><a href="/#">Tennis</a></li>
                                <li><a href="/#">Motorsport</a></li>
                                <li><a href="/#">Horseracing</a></li>
                                <li><a href="/#">Equestrian</a></li>
                                <li><a href="/#">Sailing</a></li>
                                <li><a href="/#">Skiing</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">FAQ</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">Aviation</a></li>
                                <li><a href="/#">Business</a></li>
                                <li><a href="/#">Traveller</a></li>
                                <li><a href="/#">Destinations</a></li>
                                <li><a href="/#">Features</a></li>
                                <li><a href="/#">Food/Drink</a></li>
                                <li><a href="/#">Hotels</a></li>
                                <li><a href="/#">Partner Hotels</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">+More</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="/#">Fashion</a></li>
                                <li><a href="/#">Design</a></li>
                                <li><a href="/#">Architecture</a></li>
                                <li><a href="/#">Arts</a></li>
                                <li><a href="/#">Autos</a></li>
                                <li><a href="/#">Luxury</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="/https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>

</body>

</html>
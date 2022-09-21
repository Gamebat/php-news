<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>TheGazette - News Magazine HTML5 Template | About Us</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/styleuser.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

</head>

<body>

    <?php
        require_once './controllers/database.php';
        require_once './controllers/routing.php';
        require_once './controllers/pagination.php';

        $mp = new Paginator;

        $pages = $mp -> pagesArray();


        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        $ex = array();



        $pagination_pages = $mp -> takePages($ex);
        

        if (isset($_GET['page'])){
            $page_number = $_GET['page'];
        }else {
            $page_number = 1;
        }
        
        $mp -> makePager($pagination_pages, $page_number) ;
        $limit_numbers = $mp -> limitNews();
       
        $new_array = [];

    ?>

    <div class="modal" id="zatemnenie">
            <form id="okno" action="/controllers/registration.php" method="post">
                
                <div class="topreg">
                    <a href="/rules" class="close">Закрыть</a>
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
                    <a href="/rules" class="close">Закрыть</a>
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
                                    <li><a href="#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="#">Brexit breakthrough in Brussels</a></li>
                                    <li><a href="#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="#">Brex comes after week of drama</a></li>
                                    <li><a href="#">Brexit breakthrough in Bweek of drama</a></li>
                                    <li><a href="#">Brexit bssels comes after week of drama</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Stock News Area -->
                    <div class="col-12 col-md-6">
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
                            <a href="index.html"><img src="img/core-img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- Header Advert Area -->
                    <div class="col-12 col-md-8">
                        <div class="header-advert-area">
                            <a href="#"><img src="img/bg-img/top-advert.png" alt="header-add"></a>
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
                        
                        $pages[] = '/'.$title;

                        $category = DB::run("SELECT DISTINCT c.title FROM news n INNER JOIN `group` g ON g.id_group = n.id_group 
                        INNER JOIN category_news cn ON n.id_news = cn.id_news INNER JOIN category c ON c.id_category = cn.id_category WHERE n.id_group = '$id';");
                    
                        echo"
                            <li><a href='/$title'>$title<span class='fa fa-angle-down'></span></a>
                                <ul class='submenu'>
                                
                            ";
                                

                                while ($qq = $category->fetch(PDO::FETCH_LAZY))
                                {
                                    $catname = $qq['title'];
                                    echo "<li><a href=/$title/$catname>$catname</a></li>";
                                    $pages[] = '/'.$title.'/'.$catname;
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
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breacumb-content d-flex align-items-center justify-content-between">
                        <h3 class="font-pt mb-0">Rules</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->

    <section class="gazette-about-us-area section_padding_15">
        <div class="about-us-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="font-pt mb-30">Тестовый текст</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non viverra ex. Nunc non nisl lobortis, posuere risus sed, rutrum odio. Nam vitae sagittis diam, in tempus urna. Curabitur mattis augue quis sollicitudin scelerisque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam condimentum, arcu eu facilisis faucibus, dui enim efficitur turpis, in rutrum libero sem vel ex. Nunc pellentesque faucibus rhoncus. Nunc placerat nisl eget massa finibus, non lacinia velit efficitur. Praesent commodo est et massa vestibulum, ut interdum ex rutrum. Pellentesque vitae enim tortor.

Suspendisse hendrerit enim sit amet purus faucibus, tempor laoreet dui porttitor. Donec quis sodales elit, lobortis gravida tellus. Aenean sed nisi id quam vehicula vestibulum scelerisque in est. Donec elementum sit amet lorem non elementum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vel dolor enim. Aenean lectus urna, luctus a euismod ut, semper vel mi.

Sed mollis hendrerit urna sit amet mattis. Etiam accumsan consequat orci non feugiat. Nam eros justo, rhoncus porttitor erat a, tempus sodales risus. Aenean vitae consequat lorem. Sed fringilla venenatis sodales. Donec finibus facilisis justo pharetra porttitor. Aliquam dictum nibh quis fermentum tristique. Mauris sit amet leo vel ante hendrerit scelerisque vel et elit. In a eleifend libero. In hac habitasse platea dictumst.

Proin commodo justo erat. Aenean eleifend pharetra diam, non interdum lectus tincidunt vel. Ut quis mi pulvinar, blandit turpis commodo, suscipit quam. Curabitur suscipit ipsum libero, ut ullamcorper leo dignissim eget. Suspendisse rutrum eros sit amet velit tempor dignissim. Vestibulum vitae tempor purus. Nullam rutrum odio consequat nisi ullamcorper, et consectetur purus aliquam. Vivamus eu nibh non dolor facilisis pulvinar.

Nulla facilisi. Donec auctor lacus vel bibendum consequat. Vestibulum dictum tempor ante, sit amet ultrices felis maximus sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ac ex magna. Vestibulum leo arcu, suscipit sit amet lacinia eu, iaculis eu libero. Sed ornare hendrerit quam in pretium. Sed ac interdum dui. Maecenas mattis, nulla ut viverra posuere, lorem dolor placerat leo, non porttitor eros massa quis metus. Suspendisse fringilla aliquam ultricies. Nullam nec tincidunt est, sed tempor sapien. Mauris consectetur mollis eros id euismod.</p>
                    </div>
                    
                </div>
            </div>
        </div>


        
    </section>
    
    <section class="gazette-cta-area bg-img background-overlay section_padding_100" style="background-image: url(img/blog-img/cta.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="cta-content text-center">
                        <h2 class="font-pt">Join Our Team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porttitor, elit vel pellentesque faucibus, massa ligula rutrum erat, id aliquam orci urna in ante.</p>
                        <a href="#" class="btn gazette-btn font-pt">Contact Us <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
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
                                <li><a href="#">U.S.</a></li>
                                <li><a href="#">Africa</a></li>
                                <li><a href="#">Americas</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Middle</a></li>
                                <li><a href="#">East</a></li>
                                <li><a href="#">Opinion</a></li>
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
                                <li><a href="#">Election 2016</a></li>
                                <li><a href="#">Nation</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Our Team</a></li>
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
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Markets</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Luxury</a></li>
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
                                <li><a href="#">Football</a></li>
                                <li><a href="#">Golf</a></li>
                                <li><a href="#">Tennis</a></li>
                                <li><a href="#">Motorsport</a></li>
                                <li><a href="#">Horseracing</a></li>
                                <li><a href="#">Equestrian</a></li>
                                <li><a href="#">Sailing</a></li>
                                <li><a href="#">Skiing</a></li>
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
                                <li><a href="#">Aviation</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Traveller</a></li>
                                <li><a href="#">Destinations</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Food/Drink</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Partner Hotels</a></li>
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
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Arts</a></li>
                                <li><a href="#">Autos</a></li>
                                <li><a href="#">Luxury</a></li>
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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>
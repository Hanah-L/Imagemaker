<?php
if(!isset($page_name)){
    $page_name = '';
}
?>

<body>
    
        <!-- Start header -->
        <header class="header">
            <nav class="headerclip navbar row">
                <div class="menu-bar desktop-none">
                    <!-- 三明治選單 -->
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
                <a class="navbar-logo" href="imagemaker.php"><img src="./images/SVG/ImageMaker_logoW.svg" alt=""></a>
                <ul class="row mobile-none">
                    <li class="nav"><a href="shop.html">商店專區</a></li>
                    <li class="nav"><a href="news.html">最新消息</a></li>
                    <li class="nav"><a href="test.html">選香測試</a></li>
                    <li class="nav"><a href="knowledge.html">香水知識</a></li>
                    <li class="nav"><a href="QnA.html">Q & A</a> </li>
                    <li class="nav"><a href="index.html#about">關於我們</a></li>
                </ul>
                <ul class="icon-group--center row">
                    <li> <a href="login.php" class="icon-btn"><i class="icon icon-user"></i></a></li>
                    <li> <a href="logout.php" class="icon-btn"><i class="icon icon-user-o"></i></a></li>
                    <li> <a href="cart.html" class="icon-btn"><i class="icon icon-basket"></i></a></li>
                </ul>
            </nav>
            <!-- Start 手機隱藏選單 -->
            <div class="popup-menu desktop-none">
                <ul class="popup-nav row flex-column ">
                    <li><a href="shop.html" class="popup-menu__item">商店專區</a></li>
                    <li><a href="news.html" class="popup-menu__item">最新消息</a></li>
                    <li><a href="test.html" class="popup-menu__item">選香測試</a></li>
                    <li><a href="knowledge.html" class="popup-menu__item">香水知識</a></li>
                    <li><a href="QnA.html" class="popup-menu__item">Q & A</a></li>
                    <li><a href="index.html#about" class="popup-menu__item">關於我們</a></li>
                </ul>
            </div> 
            <!-- End 手機隱藏選單 -->
        </header>
        <!-- End header -->
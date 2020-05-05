<?php
if(!isset($page_name)){
    $page_name = '';
}
?>

<body>
<header class="header">
        <nav class="headerclip position-relative navbar row">
            <div class="bg position-absolute"></div>
            <a class="navbar-logo" href="imagemaker.php">
                <img src="./images/SVG/ImageMaker_logoW.svg" alt="">
            </a>
            <ul class="row mobile-none">
                <li class="nav"><a href="shop.html">商店專區</a></li>
                <li class="nav"><a href="news.html">最新消息</a></li>
                <li class="nav"><a href="test.html">選香測試</a></li>
                <li class="nav"><a href="knowledge.html">香水知識</a></li>
                <li class="nav"><a href="QnA.html">Q & A</a> </li>
                <li class="nav"><a href="index.html#about">關於我們</a></li>
            </ul>
            <ul class="icon-group--center row mobile-none position-relative">
                <!-- 未登入 -->
                <li> <a href="login.php" title="登入與註冊" class="icon-btn"><i class="icon icon-user-o"></i></a></li>
                <!-- end -->
                <!-- 已登入 -->
                <li class=""><a href="member" title="會員資訊" class="icon-btn haverlogin"><i
                            class="icon icon-user"></i></a>
                </li>
                <!-- end -->
                <li><a href="cart.html" title="購物車" class="icon-btn"><i class="icon icon-basket"></i></a></li>
                <li class="member-addmenu  position-absolute">
                    <a href="member">會員資訊</a>
                    <a href="logout.php">登出</a>
                </li>
            </ul>
            <!-- 三明治選單 -->
            <div class="menu-bar desktop-none">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <!-- end -->

        </nav>


        <!-- Start 手機隱藏選單 -->
        <div class="popup-menu desktop-none">
            <ul class="popup-nav row flex-column ">
                <div class="d-flex justify-content-center align-items-center ">
                    <!-- 未登入 -->
                    <li> <a href="login.php" title="登入與註冊" class="icon-btn"><i class="icon icon-user-o"></i></a></li>
                    <!-- end -->
                    <!-- 已登入 -->
                    <li class="haverlogin popup-icon"><i class="icon icon-user"></i>
                    </li>
                    <!-- end -->
                    <li class="popup-icon"><a href="cart.html" title="購物車" class="icon-btn"><i
                                class="icon icon-basket"></i></a></li>
                </div>
                <div class="member-addmenu">
                    <a class="popup-menu__item" href="member">會員資訊</a>
                    <a class="popup-menu__item" href="logout.php">登出</a>
                </div>
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


        <!-- Start header -->
        <!-- <header class="header">
            <nav class="headerclip navbar row">
                <div class="menu-bar desktop-none"> -->
                    <!-- 三明治選單 -->
                    <!-- <div class="bar1"></div>
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
            </nav> -->
            <!-- Start 手機隱藏選單 -->
            <!-- <div class="popup-menu desktop-none">
                <ul class="popup-nav row flex-column ">
                    <li><a href="shop.html" class="popup-menu__item">商店專區</a></li>
                    <li><a href="news.html" class="popup-menu__item">最新消息</a></li>
                    <li><a href="test.html" class="popup-menu__item">選香測試</a></li>
                    <li><a href="knowledge.html" class="popup-menu__item">香水知識</a></li>
                    <li><a href="QnA.html" class="popup-menu__item">Q & A</a></li>
                    <li><a href="index.html#about" class="popup-menu__item">關於我們</a></li>
                </ul>
            </div>  -->
            <!-- End 手機隱藏選單 -->
        <!-- </header> -->
        <!-- End header -->
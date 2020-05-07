<?php
if(!isset($page_name)){
    $page_name = '';
}
?>

<!-- TOPHP=>navbar ------------------------------------------------------------------------------------------------------------------------------------------------------->

<body>
    <!-- Start header -->

    <header class="header">
        <nav class="headerclip position-relative navbar row">
            <div class="bg position-absolute"></div>
            <a class="navbar-logo" href="imagemaker.php">
                <img src="./images/SVG/ImageMaker_logoW.svg" alt="">
            </a>
            <ul class="row mobile-none">
                <li class="nav"><a href="product_list.php">商店專區</a></li>
                <li class="nav"><a href="news.php">染香分享</a></li>
                <li class="nav"><a href="testcover.php">選香測試</a></li>
                <!-- <li class="nav"><a href="knowledge.html">香水知識</a></li> -->
                <li class="nav"><a href="QnA.html">Q & A</a> </li>
                <li class="nav"><a href="index.html#about">關於我們</a></li>
            </ul>
            <ul class="icon-group--center row mobile-none position-relative">
                <!-- 未登入 -->
                <li class="icon-btn"><i class="icon icon-user-o"></i></li>
                <!-- end -->
                <!-- 已登入 -->
                <li class=""><a href="member_edit.php" title="會員資訊" class="icon-btn"><i class="icon icon-user"></i></a>
                </li>
                <!-- end -->
                <li><a href="cart_list.php" title="購物車" class="icon-btn"><i class="icon icon-basket"></i></a></li>
                <li class="login-addmenu  position-absolute">
                    <a class="tologin" href="login.php">登入</a>
                    <a class="tosignin" href="signin.php">註冊</a>
                </li>
                <li class="member-addmenu  position-absolute">
                    <a href="member_edit.php">會員資訊</a>
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
                    <li class="popup-icon"><i class="icon icon-user-o"></i></li>
                    <!-- end -->
                    <!-- 已登入 -->
                    <li class="popup-icon"><i class="icon icon-user"></i>
                    </li>
                    <!-- end -->
                    <li class="popup-icon"><a href="cart_list.php" title="購物車" class="icon-btn"><i
                                class="icon icon-basket"></i></a></li>
                </div>
                <div class="login-addmenu ">
                    <a class="popup-menu__item tologin">登入</a>
                    <a class="popup-menu__item tosignin">註冊</a>
                </div>
                <div class="member-addmenu">
                    <a class="popup-menu__item" href="member_edit.php">會員資訊</a>
                    <a class="popup-menu__item" href="logout.php">登出</a>
                </div>
                <li><a href="product_list.php" class="popup-menu__item">商店專區</a></li>
                <li><a href="news.php" class="popup-menu__item">染香分享</a></li>
                <li><a href="testcover.php" class="popup-menu__item">選香測試</a></li>
                <!-- <li><a href="knowledge.html" class="popup-menu__item">香水知識</a></li> -->
                <li><a href="QnA.html" class="popup-menu__item">Q & A</a></li>
                <li><a href="index.html#about" class="popup-menu__item">關於我們</a></li>
            </ul>
        </div>
        <!-- End 手機隱藏選單 -->
    </header>
    <!-- End header -->
    <!-- PHP end ----------------------------------------------------------------------------------------------------------------------------------->
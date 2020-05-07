<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'news';
?>

<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>



<body>
    <div class="wrapper bg-color-white">
        <!-- Start header -->
        <!-- TODO slider套資料庫要換運算-->
        <!-- TODO RWD時slider-icon要改變-->
        <section class="news">
            <h1 class="subtitle">最新消息</h1>
            <div class="slide position-relative">
                <div class="row justify-content-between position-absolute slide-back mobile-none">
                    <!-- slide左邊的圖片和箭頭 -->

                    <div class="d-flex align-items-center slider-left" href="">
                        <div class="slider-icon d-flex align-items-center justify-content-center"> <i
                                class="icon-left-open font-white"></i>
                        </div>
                        <div class="situation">
                            <div class="mask"></div>
                            <img src="./images/pexels-photo-3171815.jpeg" alt="">
                        </div>
                    </div>

                    <!-- slide右邊的圖片和箭頭 -->

                    <div class="d-flex align-items-center slider-right" href="">
                        <div class="situation">
                            <div class="mask"></div>
                            <img src="./images/pexels-photo-3171815.jpeg" alt="">
                        </div>
                        <div class="slider-icon d-flex align-items-center justify-content-center"> <i
                                class="icon-right-open font-white"></i>
                        </div>
                    </div>
                </div>

                <!-- slide中間的圖片和內容 -->
                <div class="news-preview row justify-content-center" href="">
                    <div class="position-relative">


                        <img class="situ-news" src="./images/pexels-photo-1105666.jpeg" alt="">
                        <!-- 若.news-preview .insite的height:100%會多出一點點，故現在用99% -->
                        <div class="insite position-absolute">
                            <div>
                                <div class="row justify-content-between">
                                    <h2 class="font-white">新設調香實驗室</h2>
                                    <h4 class="font-white">2020/04/21</h4>
                                </div>
                                <!-- 內容超過2行的，多餘部分用...顯示 -->
                                <h4 class="font-white">濡濕、甜美，又柔軟。起初熟潤的梨香多汁還帶著酸氣，幾乎有點像水果酒，接著，清澄又明亮的花香...</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="Lightbox newsLightbox none">
            <div class="fake">
                <!-- 加一個假的底當感應區 -->
            </div>
            <div class="d-flex  position-relative align-items-center">

                <img src="./images/pexels-photo-1105666.jpeg" alt="">

                <div class="txt">
                    <h2>新設調香實驗室</h2>
                    <h3>2020/04/21</h3>
                    <p>濡濕、甜美，又柔軟。起初熟潤的梨香多汁還帶著酸氣，幾乎有點像水果酒，接著，清澄又明亮的花香浮現，好似晨光灑進飄著薄霧的花園，接下來所有的花兒都盛開了！神奇的是，明明有著百花齊放的感覺，卻仍然維持著飄逸瀟灑的氣質，很像一縷絲質的薄紗圍繞著周身，輕鬆無壓，是很舒服的香氛。
                    </p>
                </div>

            </div>
        </section>
        <div class="position-relative">
            <h1 class="subtitle">染香分享</h1>
            <!-- Start Share -->

            <?php include __DIR__ . '/share.php'; ?>
            <!-- End Share -->
        </div>

    </div>

    <?php include __DIR__ . '/parts/script.php'; ?>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="./js/main.js">    </script>
</body>

<?php include __DIR__ . '/parts/footer.php'; ?>
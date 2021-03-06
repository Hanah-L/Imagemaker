<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'Q-A';
?>


<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<body>
    <section class="ask-group">
        <!-- TODO : "我想問"icon按了要顯示表單-->
        <!-- TODO : 手機板"我想問"跟表單還沒用好，現在會爆版 -->
        <!-- TODO : 少一個搜尋icon，要跟商品專區的一樣，功能也未做 -->
        <div class="ask-form ">
            <div class="ask-icon">
                <h4> 我想問</h4>
            </div>
            <form action="" class="QA-contact">

                <input type="text" placeholder="姓名">
                <input type="email" placeholder="e-mail">
                <input type="tel" placeholder="手機">
                <textarea rows="5">我想問……</textarea>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn--primary">提交</button>
                </div>
            </form>
        </div>
    </section>
    <section class="QA container">
        <div class="subtitle">
            常見問題
        </div>
        <ul class="list">
            <li class="list-item">
                <div class="d-flex align-items-center justify-content-stert">
                    <h2 class="title pr-2">Q1</h2>
                    <h3 class="question">請問有實體店面嗎？</h3>
                    <!-- plus-icon bedash 是-號 -->
                    <div class="plus-icon ">
                        <div class="dash"></div>
                        <div class="plus"></div>
                    </div>
                    <!-- plus-icon 是+號 js toggleClass-->
                    <!-- <div class="plus-icon">
                    <div class="dash"></div>
                    <div class="plus"></div>
                </div> -->
                </div>
                <div class="answer">
                    <p>Image Maker品牌皆為網路購物網站，持續提供平實及高品質商品，目前都沒有實體商店及銷售人員可以提供客戶現場購買付款試用和親自取貨的服務。</p>
                </div>
            </li>
            <!-- 表單頭 -->
            <hr>

            <li class="list-item">
                <div class="d-flex align-items-center justify-content-stert">
                    <h2 class="title pr-2">Q2</h2>
                    <h3 class="question">購買需要加入會員嗎？</h3>
                    <!-- plus-icon bedash 是-號 -->
                    <!-- <div class="plus-icon bedash">
                    <div class="dash"></div>
                    <div class="plus"></div>
                </div> -->
                    <!-- plus-icon 是+號 js toggleClass-->
                    <div class="plus-icon">
                        <div class="dash"></div>
                        <div class="plus"></div>
                    </div>
                </div>
                <div class="answer">
                    <p>購買時，並沒有強制加入會員，但通過簡單的輸入慣用的E-mail、
                        用戶名稱及密碼即可，成為會員下次購物就會自動帶入收件資訊！</p>
                </div>
                </div>
            </li>
            <!-- 表單尾 -->
        </ul>
    </section>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/main.js"></script> -->

    <?php include __DIR__ . '/parts/script.php'; ?>
</body>

<?php include __DIR__ . '/parts/footer.php'; ?>
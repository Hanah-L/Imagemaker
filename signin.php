<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'signin';
?>

<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/SVG/ImageMaker_logo.svg" />
    <title>登入/註冊</title> -->
    <!-- CSS link -->
    <!-- <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/signin.css"> -->

</head>

<?php
$cookieEmail = '';
if(isset($_COOKIE['isRemembered']) && isset($_COOKIE['email'])) {
    if($_COOKIE['isRemembered'] == 1){
        $cookieEmail = $_COOKIE['email'];
    }
}
?>

<body>
    <!-- TODO JS功能沒寫 -->
    <!-- TPPHP=>signin       要綁進所有頁面--------------------------------------------------------------------------------------------- -->
    <section class="Lightbox login-signin  signin-Lightbox">
        <div class="fake">
            <!-- 加一個假的底當感應區 -->
        </div>
        <div class="position-relative align-items-center">
            <i class="icon icon-cancel"></i>
            <div class="title d-flex justify-content-center">
                <h2 class="font-bold font-primary text-center">註冊</h2>
            </div>
            <form name="signin-form" class="signin-form" method="post" onsubmit="return signinForm()">

                <ul class="flex-column">
                    <li>
                        <input type="email" class="" id="email" name="email" placeholder="請輸入email"
                            value="<?= $cookieEmail ?>" required>
                        <small id="emailHelp" class="form-text"></small>
                    </li>
                    <li>
                        <input type="password" class="" id="password" name="password" placeholder="請輸入密碼"
                            value="<?= $cookiePassword ?>" required>
                        <small id="emailHelp" class="form-text"></small>
                    </li>
                    <li>
                        <input type="password" class="signin" id="password" name="password" placeholder="請再次輸入密碼"
                            required>
                        <!-- 再次輸入密碼的small先不下，因要抓取輸入密碼input的值，待與老師確認 -->
                    </li>
                    <li class="d-flex align-items-center toterm">
                        <input id='agree' type="checkbox" name="">
                        <label for="agree">我同意 <span class="font-primary">使用條款</span></label>
                    </li>
                    <li class="d-flex align-items-center ">
                        <input id='receive' type="checkbox" checked name="">
                        <label for="receive">接收來自Image Maker的優惠資訊</label>
                    </li>
                    <!-- <input class="" type="email" name="" id="" placeholder="帳號">
                    <input class="" type="password" name="" id="" placeholder="密碼">
                    <input class="signin none" type="password" name="" id="" placeholder="確認密碼"> -->

                </ul>
                <div class="d-flex justify-content-center ">
                    <button type="submit" class="btn btn--primary">創建新帳號 </button>
                    <!-- <button class=" btn btn--secondary">忘記密碼 </button> -->
                </div>

            </form>
        </div>
    </section>



    <section class="Lightbox term none">
        <div class="fake">
            <!-- 加一個假的底當感應區 -->
        </div>
        <div class="d-flex  position-relative align-items-center">
            <i class="icon icon-cancel"></i>
            <div class="termBox">
                <div class="title font-primary font-bold text-center">使用條款</div>
                <div class="text">
                    <h6>如果您考慮使用Image
                        Maker網站中的任何內容、服務或資訊，請先閱讀這些「使用條款」。請注意，造訪及/或使用我們的網站，即表示您同意這些使用條款之規範。如果您不同意我們的使用條款，請中斷連線並停止使用本網站。
                        本「網站」上所公佈的「使用條款」及所有其他條款，為Image Maker與您之間有關使用本「網站」時的全部合約。若Image Maker未能要求任何上述內容的履行，也不會影響 Image
                        Maker 在日後的任何時間要求履行的完整權利；Image Maker對於上述內容的任何部份違約時所為之權利拋棄，不得視為對上述內容本身拋棄權利的依據。任何 Image
                        Maker所做出之權利拋棄，皆須以書面方式進行，始能生效。任何導致您在使用本網站時採取之法律行動必須於事件發生後的一 (1) 年內提出。
                        如果法院或有裁定權利的司法機構將這些使用條款的任何規定視為無效，則該部份將以可被允許的最大限度內執行，以便充分反應本合約的目的，但本合約中的剩餘條款與條件的效力將完全不受影響。這些使用條款係台灣的法律建構，並受其管轄，無須參考與其抵觸的法律規則。
                    </h6>
                </div>
                <div class="d-flex justify-content-center ">
                    <button type="button" class="btn btn--secondary">我同意 </button>
                </div>
            </div>
        </div>
    </section>
    <!-- PHP end -->
    
    <script>
        function signinForm(){
            $.post('signin-api.php', $(document.signin-form).serialize(), function(data) {
                if (data.success) {
                    // info-bar應該是bootstrap的內建的提示樣式，不用bootstrap要如何跳出提示，跳出什麼提示待確
                    // 老師說看我們要怎麼顯示
                    $('#info-bar').show().text('新增成功，請填寫會員資料');

                    setTimeout(function() {
                        location.href = 'login.php';
                    }, 1000);

                } else {
                    $('#info-bar').show().text('註冊失敗，請確認帳號或密碼是否有誤');

                }
            }, 'json');

            return false;
        }
    </script>
</body>

</html>
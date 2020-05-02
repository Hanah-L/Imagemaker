<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'login';
?>

<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<style>
    .inputbox {
        /* width超過300px就會掉到下面，故先用300px */
        width: 300px;
        align-items: center;
        align-self: center;
    }

    .btnbox {
        width: 300px;
    }

    .container {
        padding-top: 5em;
        padding-bottom: 5em;
    }
</style>

<?php
$cookieEmail = '';
if(isset($_COOKIE['isRemembered']) && isset($_COOKIE['email'])) {
    if($_COOKIE['isRemembered'] == 1){
        $cookieEmail = $_COOKIE['email'];
    }
}
?>



<!-- 暫用登入頁 -->
<div class="container">
    <div id="info-bar" class="alert alert-info" role="alert" style="display: none">
        123
    </div>
    <div class="col-lg-6">
        <form name="form1" class="" method="post" onsubmit="return checkForm()">
            <!-- email輸入欄 -->
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="請輸入email" value="<?= $cookieEmail ?>" required>
                <small id="emailHelp" class="form-text"></small>
            </div>

            <!-- 密碼輸入欄 -->
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" value="<?= $cookiePassword ?>" required>
                <small id="emailHelp" class="form-text"></small>
                <!-- 測試登入，暫不顯示再次確認密碼 -->
                <!-- <input type="password" class="form-control" id="password" name="password" placeholder="請再次輸入密碼" required> -->
                <!-- 再次輸入密碼的small先不下，因要抓取輸入密碼input的值，待與老師確認 -->
            </div>
            <div>
            <input type="checkbox" name="remember" id="" value="" checked="checked" autocomplete="off"> -->
            <?php if($cookieEmail!=''):?>
                <input type="checkbox" name="remember" id="" value="" checked="checked" autocomplete="off">
            <?php else: ?>
                <input type="checkbox" name="remember" id="" value="" autocomplete="off">
            <?php endif; ?>
            <!-- ?php }?>     -->
            <label for="">記住我的帳號、密碼</label>
            </div>
            <div class="btnbox">
                <button type="submit" class="btn-group btns btn--primary">登入/創建新帳號</button>
                <!-- 4/28忘記密碼功能確認刪除，待終版確認是否移除 -->
                <!-- <button class="btn-group btns btn--secondary">忘記密碼</button>
        </form>
    </div>

    <?php include __DIR__ . '/parts/script.php'; ?>

    <script>
        // const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        // const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        function checkForm() {
            // 記得api路徑要正確
            $.post('login-api.php', $(document.form1).serialize(), function(data) {

                if (data.success) {
                    // info-bar應該是bootstrap的內建的提示樣式，不用bootstrap要如何跳出提示，跳出什麼提示待確
                    // 老師說看我們要怎麼顯示
                    $('#info-bar').show().text('登入成功');

                    setTimeout(function() {
                        location.href = 'imagemaker.php';
                    }, 1000);

                } else {
                    $('#info-bar').show().text('登入失敗，帳號或密碼錯誤');

                }
            }, 'json');

            return false;
        }

        
        // 記住我的帳號密碼
        <?php
        //讀取COOKIE的使用者名稱和密碼的值即可
        if(isset($_COOKIE['email']) && $_COOKIE['email'] != '') {
            echo $_COOKIE['email'];
        }
        if(isset($_COOKIE['password']) && $_COOKIE['password']!='') { 
            echo $_COOKIE['password'];
        }
        
        //登入，將使用者名稱和密碼存入到COOKIE
        if($_POST['input'!='']){
            $email = $_POST['email'];
            $password = $_POST['password'];
            //如果輸入的加密密碼和COOKIE中不一樣，那麼就加密
            if($password != $cookiePassword) {
                $password = sha1($password);
            }
            $remember = $_POST['remember'];
            setcookie('email', $_POST['email'], time() + 1440);
            setcookie('isRemembered', 1, time() + 1440);
            // if($remember==1){
            //     setcookie("email", $email, time() 3600*24*30);
            //     setcookie("password", $password, time() 3600*24*30);
            // }
        }
        ?>

    </script>

    <?php include __DIR__ . '/parts/footer.php'; ?>
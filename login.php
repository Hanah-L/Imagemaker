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

<!-- 暫用登入頁 -->
<div class="container">
<div id="info-bar" class="alert alert-info" role="alert" style="display: none">
        123
    </div>
    <div class="col-lg-6">
        <form name="form1" class="" method="post" onsubmit="return checkForm()">
            <!-- email輸入欄 -->
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="請輸入email" required>
                <small id="emailHelp" class="form-text"></small>
            </div>

            <!-- 密碼輸入欄 -->
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="請輸入密碼" required>
                <small id="emailHelp" class="form-text"></small>
                <!-- 測試登入，暫不顯示再次確認密碼 -->
                <!-- <input type="password" class="form-control" id="password" name="password" placeholder="請再次輸入密碼" required> -->
                <!-- 再次輸入密碼的small先不下，因要抓取輸入密碼input的值，待與老師確認 -->
            </div>
            <input class="btn btn-primary" type="checkbox" name="" id="" check autocomplete="off">記住我的帳號、密碼
            <div class="btnbox">
                <button type="submit" class="btn-group btns btn--primary">登入/創建新帳號</button>
                <!-- 4/28忘記密碼功能確認刪除，待終版確認是否移除 -->
                <button class="btn-group btns btn--secondary">忘記密碼</button>
        </form>
    </div>

<?php include __DIR__ . '/parts/script.php';?>

<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    function checkForm() {
        // 記得api路徑要正確
        $.post('login-api.php', $(document.form1).serialize(), function(data) {
            
            if (data.success) {
                // info-bar應該是bootstrap的內建的提示樣式，不用bootstrap要如何跳出提示，跳出什麼提示待確
                // 老師說看我們要怎麼顯示
                $('#info-bar').show().text('登入成功');
                 
                setTimeout(function() {
                    location.href='imagemaker.php';
                }, 1000);

            } else {
                $('#info-bar').show().text('登入失敗，帳號或密碼錯誤');
                
            }
        }, 'json');

        return false;
    }
</script>

<?php include __DIR__.'/parts/footer.php';?>
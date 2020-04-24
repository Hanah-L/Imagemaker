<?php
require __DIR__ . '/_connect_db.php';
$page_name = 'member_insert';
?>

<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<style>
    .container {
        padding-top: 5em;
    }
    .form-group small.form-text {
        color: red;
    }
</style>

<div class="container">
    <div id="info-bar" class="alert alert-success" role="alert" style="display: none">
        123
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                <div class="form-group">
                    <label for="name">* 姓名</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <small id="nameHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="email">* Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <small id="emailHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="gender">性別</label>
                    <input type="gender" class="form-control" id="gender" name="gender" placeholder="Male / Female">
                    <small id="genderHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="birthday">出生年月日</label>
                    <input type="date" class="form-control" id="birthday" name="birthday">
                    <small id="birthdayHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="mobile">手機號碼</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}">
                    <small id="mobileHelp" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="address">地址</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                    <small id="addressHelp" class="form-text"></small>
                </div>
                <button type="submit" class="btn btn-primary">送出</button>
            </form>
        </div>
    </div>

</div>

<?php include __DIR__ . '/parts/script.php'; ?>

<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    const $name = $('#name'),
        $mobile = $('#mobile'),
        $email = $('#email'),
        $nameHelp = $('#nameHelp'),
        $emailHelp = $('#emailHelp'),
        $mobileHelp = $('#mobileHelp')

    function checkForm() {
        let isPass = true; // 有沒有通過檢查
        // 回復提示設定
        $name.css('border-color', '#CCCCCC');
        $nameHelp.text('');

        $email.css('border-color', '#CCCCCC');
        $emailHelp.text('');

        $mobile.css('border-color', '#CCCCCC');
        $mobileHelp.text('');

        if ($name.val().length < 2) {
            $name.css('border-color', 'red');
            $nameHelp.text('請填寫正確的姓名');
            isPass = false;
        }

        if ($email.val()) {
            if (!email_re.test($email.val())) {
                $email.css('border-color', 'red');
                $emailHelp.text('請填寫正確的 Email 格式');
                isPass = false;
            }
        }

        // 手機不是必填，但填了以後要檢查是否符合格式
        // if (!mobile_re.test($mobile.val())) {
        //     $mobile.css('border-color', 'red');
        //     $mobileHelp.text('請填寫正確的手機號碼');
        //     isPass = false;
        // }

        if (isPass) {
            $.post('member_insert-api.php', $(document.form1).serialize(), function(data) {
                console.log(data)
                if (data.success) {
                    $('#info-bar').show().text('新增成功');
                } else {
                    // $('#info-bar').show().text('新增失敗，請重新確認');
                }
            }, 'json');
        }

        return false;
    }
</script>

<?php include __DIR__ . '/parts/footer.php'; ?>
<?php
$page_name = 'member-edit';
require __DIR__ . '/_connect_db.php';

// 此段作用??
// $sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
// // 如果沒有給 sid, 就轉到列表頁
// if (empty($sid)) {
//     header('Location: login.php');
//     exit;
// }

$sql = "SELECT * FROM member_list WHERE sid=?";
$stmt = $pdo->prepare($sql);
$stmt->execute( $_SESSION['loginUser']);
$row = $stmt->fetch();
// 如果沒有拿到資料, 就轉到列表頁
// if (empty($row)) {
//     header('Location: login.php');
//     exit;
// }

?>
<?php include __DIR__ . '/parts/header.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<style>
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5>
                    <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="form-group">
                            <label for="name">*姓名</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name']) ?>">
                            <small id="nameHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" id="email" name="email" readonly disable value="<?= htmlentities($row['email']) ?>">
                            <small id="emailHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="gender">性別</label>
                            <select type="gender" class="form-control" id="gender" name="gender" value="<?= htmlentities($row['gender']) ?>">
                                <option value="男"></option>
                                <option value="女"></option>
                                <small id="genderHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">出生年月日</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                            <small id="birthdayHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">手機</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" value="<?= htmlentities($row['mobile']) ?>">
                            <small id="mobileHelp" class="form-text"></small>
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <!-- <textarea class="form-control" name="address" id="address" cols="30" rows="3">?= htmlentities($row['address']) ?></textarea> -->
                            <input type="text" class="form-control" name="zipcode" id="zipcode" value="">

                            <select type="text" class="form-control" name="county" id="county" cols="30" rows="3">
                                <option value="">請選擇縣市</option>
                                <?php foreach ($counties as $county) { ?>
                                    <option value="<?= $county["sn"] ?>"><?= $county["name"] ?></option>
                                <?php } ?>
                            </select>
                            
                            <select type="text" class="form-control" name="city" id="city" cols="30" rows="3">
                                <option class="county0" value="">請選擇區域</option>
                                <?php foreach ($cities as $city) { ?>
                                    <option class="county<?= $city["county"] ?>" value="<?= $city["zipcode"] ?>"><?= $city["name"] ?></option>
                                <?php } ?>
                            </select>
                            
                            <!-- 填寫之後的詳細地址 -->
                            <input type="text" class="form-control" id="address_detail" name="address_detail" value="">
                            <small id="addressHelp" class="form-text"></small>
                        </div>
                </div>
                <button type="submit" class="btn btn-primary">儲存變更</button>
                </form>
            </div>
        </div>

    </div>

    <?php include __DIR__ . '/parts/script.php'; ?>

    <script>
        const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

        const $name = $('#name'),
            $mobile = $('#mobile'),
            $email = $('#email'),

            $nameHelp = $('#nameHelp'),
            $emailHelp = $('#emailHelp'),
            $mobileHelp = $('#mobileHelp'),
            $info = $('#info-bar')

        function checkForm() {
            let isPass = true; // 有沒有通過檢查
            // 回復提示設定
            $('#info-bar').hide();
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

            if (!mobile_re.test($mobile.val())) {
                $mobile.css('border-color', 'red');
                $mobileHelp.text('請填寫正確的手機號碼');
                isPass = false;
            }

            if (isPass) {
                $.post('member_edit-api.php', $(document.form1).serialize(), function(data) {
                    if (data.success) {
                        $info.removeClass('alert-danger').addClass('alert-success');
                        $info.show().text('修改成功');
                    } else {
                        $info.removeClass('alert-success').addClass('alert-danger');
                        $info.show().text(data.error);
                    }
                }, 'json');
            }

            

            return false;
        }
    </script>
    <?php include __DIR__ . '/parts/footer.php'; ?>
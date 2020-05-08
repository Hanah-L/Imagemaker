<?php
$page_name = 'member_edit';
require __DIR__ . '/_connect_db.php';


// 此段作用??
$email = isset($_POST['email']) ? intval($_POST['email']) : 0;
// $sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
// 如果沒有給 sid, 就轉到列表頁
// if (empty($email)) {
// if (empty($sid)) {
//     header('Location: login.php');
//     exit;
// }

$sql = "SELECT * FROM member_list WHERE email=?";
// $sql = "SELECT * FROM member_list WHERE sid=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
// $stmt->execute([$sid]);
// $stmt->execute( $_SESSION['loginUser']);
$row = $stmt->fetch();
// 如果沒有拿到資料, 就轉到列表頁
// if (empty($row)) {
//     header('Location: login.php');
//     exit;
// } else{
//     header('location: member_edit.php');
//     exit;
// }

// 郵遞區號(行6-12)
$sql = "SELECT * FROM county";
$stmt = $pdo->query($sql);
$counties = $stmt->fetchAll();

$sqlCity = "SELECT * FROM city";
$stmtCity = $pdo->query($sqlCity);
$cities = $stmtCity->fetchAll();

?>


<?php include __DIR__ . '/parts/header.php'; ?>


<style>
    .form-group small.form-text {
        color: red;
    }
</style>

<section class="member-icon icon-group--center ">
    <ul>
        <li class="circle"> <a href="member-info.html" class="icon-btn"><i class="icon icon-user"></i></a></li>
        <li class="circle"> <a href="member-love.html" class="icon-btn"><i class="icon icon-heart"></i></a></li>
        <li class="circle"> <a href="member-order.html" class="icon-btn"><i class="icon icon-th-list"></i></a>
        </li>
        <li class="circle"> <a href="member-share.html" class="icon-btn"><i class="icon icon-reply"></i></a>
        </li>
    </ul>
</section>
<div class="member bg-color-grey">

    <div class="container">

        <div id="info-bar" class="alert alert-success" role="alert" style="display: none">
            123
        </div>


        <!-- Start Section -->
        <!-- TODO有空可以寫icon浮入的動畫 -->
        <section class="member-info">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-md-12">
                        <h1 class="subtitle">會員資訊</h1>
                        <form name="form1" method="post" onsubmit="return checkForm()" novalidate>
                            <ul>
                                <li class="form-group">
                                    <label class="label" for="namel">*姓名:</label>
                                    <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['namel']) ?>">
                                    <small id="nameHelp" class="form-text"></small>
                                </li>
                                <li class="form-group">
                                    <!-- email的檢查條件在下面count email_re -->
                                    <label class="label" for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" readonly style="background:rgb(235,235,228)" value="<?= htmlentities($row['email']) ?>">
                                    <small id="emailHelp" class="form-text"></small>
                                </li>
                                <li class="form-group">
                                    <label class="label" for="gender">性別:</label>
                                    <select type="gender" class="form-control" id="gender" name="gender" value="<?= htmlentities($row['gender']) ?>">
                                        <!-- <select type="gender" class="other-width" id="gender" name="gender"> -->
                                        <!-- <option value="">－</option> -->
                                        <option value="male">男</option>
                                        <option value="female">女</option>
                                        <option value="other">其他</option>
                                        <small id="genderHelp" class="form-text"></small>
                                    </select>
                                </li>
                                <li class="form-group">
                                    <label class="label" for="birthday">生日:</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?= htmlentities($row['birthday']) ?>">
                                    <!-- <input type="date" class="other-width" id="birthday" name="birthday"> -->
                                    <small id="birthdayHelp" class="form-text"></small>

                                    <!-- width沒變 -->
                                </li>
                                <li class="form-group">
                                    <label class="label" for="mobile">手機:</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($row['mobile']) ?>">
                                    <small id="mobileHelp" class="form-text"></small>
                                </li>
                                <li class="form-group address">
                                    <label class="label" for="address">地址:</label>
                                    <!-- <textarea class="form-control" name="address" id="address" cols="30" rows="3">?= htmlentities($row['address']) ?></textarea> -->
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" value="" size="1" readonly disabled>
                                    <select type="text" class="other-width" name="county" id="county" cols="30" rows="3">
                                        <!-- <select type="text" class="other-width" name="county" id="county" cols="30" rows="3"> -->

                                        <option value="">請選擇縣市</option>
                                        <?php foreach ($counties as $county) { ?>
                                            <option value="<?= $county["sn"] ?>"><?= $county["name"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- 選擇縣市，連接county.sql -->
                                    <select type="text" class="form-control" name="city" id="city" cols="30" rows="3">
                                        <!-- <select type="text" class="other-width" name="city" id="city" cols="30" rows="3"> -->
                                        <option class="county0" value="">請選擇區域</option>
                                        <?php foreach ($cities as $city) { ?>
                                            <option class="county<?= $city["county"] ?>" value="<?= $city["zipcode"] ?>">
                                                <?= $city["name"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <!-- 選擇區域，連接city.sql -->
                                </li>
                                <!-- <li class="form-group"> -->
                                <!-- 填寫之後的詳細地址 -->
                                <input type="text" class="form-control" id="address_detail" name="address_detail" value="">
                                <small id="addressHelp" class="form-text"></small>
                                <!-- </li> -->
                                <!-- <li class="form-group justify-content-end"> -->
                                <button class="btn btn--primary" type="submit">儲存資料</button>
                                <!-- </li> -->
                            </ul>
                        </form>
                    </div>


                    <div class="col-6 col-md-12">
                        <h1 class="subtitle">修改密碼</h1>
                        <form class="form-cPwd" name="changePwd" action="" method="post" onsubmit="return changePwd()">
                            <ul>
                                <li class="form-group">
                                    <label class="" for="name">舊密碼:</label>
                                    <input class="input" type="password" name="password" id="password" required>
                                </li>
                                <li class="form-group">
                                    <label class="" for="name">新密碼:</label>
                                    <input class="input" type="password" name="pwd_new" id="pwd_new" required>
                                </li>
                                <li class="form-group">
                                    <label class="" for="name">確認密碼:</label>
                                    <input class="input" type="password" name="comfirm_pwd" id="comfirm_pwd" required>
                                </li>
                                <li class="form-group justify-content-end">
                                    <button class="btn btn--primary" type="submit">確認修改</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- End Section -->


        <?php include __DIR__ . '/parts/script.php'; ?>

        <script>
            const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            // const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

            const $namel = $('#namel'),
                $mobile = $('#mobile'),
                $email = $('#email'),

                $nameHelp = $('#nameHelp'),
                $emailHelp = $('#emailHelp'),
                $mobileHelp = $('#mobileHelp'),
                $info = $('#info-bar')


            // 會員資料修改
            function checkForm() {
                let isPass = true; // 有沒有通過檢查
                // 回復提示設定
                $('#info-bar').hide();
                $namel.css('border-color', '#CCCCCC');
                $nameHelp.text('');

                $email.css('border-color', '#CCCCCC');
                $emailHelp.text('');

                $mobile.css('border-color', '#CCCCCC');
                $mobileHelp.text('');

                if ($namel.val().length < 2) {
                    $namel.css('border-color', 'red');
                    $nameHelp.text('請填寫正確的姓名');
                    isPass = false;
                }

                // email不可修改
                // if ($email.val()) {
                //     if (!email_re.test($email.val())) {
                //         $email.css('border-color', 'red');
                //         $emailHelp.text('請填寫正確的 Email 格式');
                //         isPass = false;
                //     }
                // }

                // if (!mobile_re.test($mobile.val())) {
                //     $mobile.css('border-color', 'red');
                //     $mobileHelp.text('請填寫正確的手機號碼');
                //     isPass = false;
                // }

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

            // 密碼修改
            if (isPass) {
                $.post('changePassword-api.php', $(document.form - cPwd).serialize(), function changePwd(change) {
                    if (change.success) {
                        $info.removeClass('alert-danger').addClass('alert-success');
                        $info.show().text('修改成功，之後登入請記得使用新密碼喔!');
                    } else {
                        $info.removeClass('alert-success').addClass('alert-danger');
                        $info.show().text(change.error);
                    }
                }, 'json');
            }
            return false;


            //郵遞區號，合併city.sql和county.sql兩個資料表(死神提供)(行185-196)
            $("#county").change(function() {
                let county = $(this).val();
                $("#city option:not(.county0)").hide();
                $(".county" + county).show();
            });

            $("#city").change(function() {
                let zipcode = $(this).val();
                // console.log(zipcode);
                $("#zipcode").val(zipcode)
            })
        </script>
        <?php include __DIR__ . '/parts/footer.php'; ?>
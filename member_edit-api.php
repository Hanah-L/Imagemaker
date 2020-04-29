<?php
require __DIR__ . '/_connect_db.php';

// 回應的資料類型為 JSON
header('Content-Type: application/json');
// mime type 預設為 text/html
// jpg 檔的 mime type ?

// 讓 email 的內容不要重複
// UPDATE `address_book` SET `email`=CONCAT(ROUND(RAND()*100000),'@gmail.com')

$output = [
    'success' => false,
    'error' => '沒有sid',
    'code' => 0,
    'postData' => $_POST
];

//if(isset($_POST['name']) and isset($_POST['mobile'])) {

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
// 如果沒有給 sid, 就回傳訊息然後結束
if (empty($sid)) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// TODO: 欄位資料檢查

// 檢查 Email 是否重複
$e_sql = "SELECT 1 FROM member_list WHERE email=? AND sid<>?";
$e_stmt = $pdo->prepare($e_sql);
$e_stmt->execute([$_POST['email'], $sid]);

if ($e_stmt->rowCount()) {
    $output['error'] = 'Email 重複了';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 檢查手機號碼格式
$mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
if (empty(preg_grep($mobile_re, [$_POST['mobile']]))) {
    $output['error'] = '手機號碼格式不符';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// $sql = "UPDATE `member_list` SET `member_num`=?,`name`=?,`email`=?,`gender`=?,`birthday`=?,`mobile`=?,`address`=? WHERE sid=?";
$sql = "UPDATE `member_list` SET `name`=?,`email`=?,`gender`=?,`birthday`=?,`mobile`=?,`city`=?,`county`=?,`address_detail`=? WHERE sid=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    // $_POST['member_num'],
    $_POST['name'],
    $_POST['email'],
    $_POST['gender'],
    $_POST['birthday'],
    $_POST['mobile'],
    // $_POST['address'],
    $_POST['city'],
    $_POST['county'],
    $_POST['address_detail'],
    $sid
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['error'] = '';
} else {
    $output['error'] = '資料沒有修改';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);

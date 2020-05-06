<?php
require __DIR__ . '/_connect_db.php';

// 回應的資料類型為 JSON
header('Content-Type: application/json');
// mime type 預設為 text/html
// jpg 檔的 mime type 為jpeg

$output = [
    'success' => false,
    'error' => '欄位資料不足',
    'code' => 0,
    'postData' => $_POST,
];

if (isset($_POST['name']) and isset($_POST['email'])) {
    // TODO: 欄位資料檢查

    // 檢查 Email 是否重複
    $e_sql = "SELECT 1 FROM member_list WHERE email=?";
    $e_stmt = $pdo->prepare($e_sql);
    $e_stmt->execute([$_POST['email']]);

    if ($e_stmt->rowCount()) {
        $output['error'] = 'Email已註冊過了';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    // 由郵遞區號抓取縣市與區域資料寫入資料庫(楊老師寫)(行31-46)
    $sql_city = "SELECT `name` FROM `city` WHERE `zipcode` = '{$_POST['city']}'";
    $strCityName = $pdo->query($sql_city)->fetch()['name'];

    $sql_county = "SELECT `name` FROM `county` WHERE `sn` = {$_POST['county']}";
    $strCountyName = $pdo->query($sql_county)->fetch()['name'];

    $data = [
        $_POST['name'],
        $_POST['email'],
        $_POST['gender'],
        $_POST['birthday'],
        $_POST['mobile'],
        $strCityName,
        $strCountyName,
        $_POST['address_detail']
    ];

    // member_insert已檢查過，故這裡不需再次檢查
    // 檢查手機號碼格式
    // $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    // if (empty(preg_grep($mobile_re, [$_POST['mobile']]))) {
    //     $output['error'] = '手機號碼格式有誤，請輸入正確格式';
    //     echo json_encode($output, JSON_UNESCAPED_UNICODE);
    //     exit;
    // }

    

    $sql = "UPDATE `member_list` SET `name`=?,`gender`=?,`birthday`=?,`mobile`=?,`county`=?,`city`=?,`address_detail`=?,`password`=? WHERE 1";

    $stmt = $pdo->prepare($sql);

    $stmt->execute($data);

    // 簡單指派的陳述式會將rowCount預設為1，不會將資料傳回用戶端，參考https://docs.microsoft.com/zh-tw/sql/t-sql/functions/rowcount-transact-sql?view=sql-server-ver15
    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['error'] = '';

               
    } else {
        $output['error'] = '資料無法新增，請再確認一下喔';
    }    
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

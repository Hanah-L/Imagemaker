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
        $output['error'] = 'Email已註冊過';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $data=array(
        "name"=>$_POST['name'],
        "email"=>$_POST['email'],
        "gender"=>$_POST['gender'],
        "birthday"=>$_POST['birthday'],
        "mobile"=>$_POST['mobile'],
        // "address"=>$_POST['address']
        "city"=>$_POST['city'],
        "county"=>$_POST['county'],
        "address_detail"=>$_POST['address_detail'],
    );


    // 檢查手機號碼格式
    // $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    // if (empty(preg_grep($mobile_re, [$_POST['mobile']]))) {
    //     $output['error'] = '手機號碼格式有誤，請輸入正確格式';
    //     echo json_encode($output, JSON_UNESCAPED_UNICODE);
    //     exit;
    // }

    $sql = "INSERT INTO `member_list`(`name`,`email`,`gender`,`birthday`,`mobile`,`city`,`county`,`address_detail`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['email'], 
        $_POST['gender'],
        $_POST['birthday'], 
        $_POST['mobile'],        
        $_POST['city'],
        $_POST['county'],
        $_POST['address_detail'],
    ]);
    $stmt->execute($data);

    // 簡單指派的陳述式會將rowCount預設為1，不會將資料傳回用戶端，參考https://docs.microsoft.com/zh-tw/sql/t-sql/functions/rowcount-transact-sql?view=sql-server-ver15
    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['error'] = '';
    } else {
        $output['error'] = '資料無法新增';
    }

    
    
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

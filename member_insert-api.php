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

if (isset($_POST['name']) and isset($_POST['mobile'])) {
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
    // $data=array(
    //     "name"=>$_POST['name'],
    //     "email"=>$_POST['email'],
    //     "gender"=>$_POST['gender'],
    //     "birthday"=>$_POST['birthday'],
    //     "mobile"=>$_POST['mobile'],
    //     "address"=>$_POST['address']
    // );

    // $data=array(
    //     "name"=>"hh",
    //     "email"=>"hh@gmail.com",
    //     "gender"=>1,
    //     "birthday"=>"",
    //     "mobile"=>"0900000000",
    //     "address"=>""
    // );
    


    // 檢查手機號碼格式，因手機不是必填故先碼掉
    // $mobile_re = "/^09\d{2}-?\d{3}-?\d{3}$/";
    // if (empty(preg_grep($mobile_re, [$_POST['mobile']]))) {
    //     $output['error'] = '手機號碼格式不符';
    //     echo json_encode($output, JSON_UNESCAPED_UNICODE);
    //     exit;
    // }

    $sql = "INSERT INTO `member_list`(
`name`,`email`,`gender`,`birthday`,`mobile`,`address`) 
VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $_POST['name'],
        $_POST['email'], 
        $_POST['gender'],
        $_POST['birthday'], 
        $_POST['mobile'],        
        $_POST['address'],
    ]);
    $stmt->execute($data);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['error'] = '';
    } else {
        $output['error'] = '資料無法新增';
    }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
